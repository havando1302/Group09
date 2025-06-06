<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Notifications\OrderCancelled;
class OrderController extends Controller
{
    public function __construct()
    {
        // Chỉ admin được quản lý đơn hàng, ngoại trừ 'checkout'
        $this->middleware('admin')->except(['checkout']);
    }

    /**
     * Xử lý đặt hàng từ giỏ hàng
     */
    public function checkout(Request $request)
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Vui lòng đăng nhập để thanh toán.');
        }

        $request->validate([
            'payment_method' => 'required|in:cod,bank_transfer,momo',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'note' => 'nullable|string|max:1000',
        ]);

        $user = auth()->user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $total = $cartItems->sum(function ($item) {
            return ($item->product->price ?? 0) * $item->quantity;
        });

        // Tạo đơn hàng
        $order = Order::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'note' => $request->note,
            'payment_method' => $request->payment_method,
            'total' => $total,
            'status' => 'pending',
        ]);

        // Tạo chi tiết đơn hàng
        foreach ($cartItems as $item) {
            if (!$item->product) continue; // Bỏ qua sản phẩm không tồn tại

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price ?? 0,
                'size' => $item->size ?? null,
                'color' => $item->color ?? null,
            ]);
        }

        // Xóa giỏ hàng
        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('checkout.success')->with('message', 'Đặt hàng thành công!');
    }

    /**
     * Danh sách đơn hàng (admin)
     */
    public function index()
    {
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Trang chỉnh sửa đơn hàng (admin)
     */
    public function edit($id)
    {
        $order = Order::with(['user', 'items.product'])->findOrFail($id);
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Cập nhật đơn hàng (admin)
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'payment_method' => 'required|string|in:cod,bank_transfer,momo',
            'note' => 'nullable|string',
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:pending,processing,shipped,completed,cancelled',
        ]);

        $oldStatus = $order->status;

        $order->update($validated);

        // Gửi thông báo nếu trạng thái thay đổi
        if ($order->status !== $oldStatus && $order->user) {
            $order->user->notify(new OrderCancelled($order));
        }

        return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã được cập nhật.');
    }
}
