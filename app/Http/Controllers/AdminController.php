<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function dashboard(Request $request)
{
    $date = $request->input('date');
    $queryDate = $date ? Carbon::parse($date) : Carbon::today();

    // Tổng doanh thu trong ngày
    $totalRevenue = Order::whereDate('created_at', $queryDate)->sum('total');

    // Tổng số đơn hàng trong ngày
    $totalOrders = Order::whereDate('created_at', $queryDate)->count();

    // Khách hàng đã mua hàng (tính đến ngày đó)
    $totalCustomers = User::whereHas('orders', function ($query) use ($queryDate) {
        $query->whereDate('created_at', '<=', $queryDate);
    })->count();

    // Tổng số sản phẩm hiện có (tính đến ngày đó)
    $totalProducts = Product::whereDate('created_at', '<=', $queryDate)->count();

    // Đơn hàng mới trong ngày
    $newOrders = Order::whereDate('created_at', $queryDate)->count();

    // Khách hàng mới trong ngày
    $newCustomers = User::whereDate('created_at', $queryDate)->count();

    // Sản phẩm mới trong ngày
    $newProducts = Product::whereDate('created_at', $queryDate)->count();

    return view('admin.dashboard', compact(
        'totalRevenue',
        'totalOrders',
        'totalCustomers',
        'totalProducts',
        'newOrders',
        'newCustomers',
        'newProducts'
    ));
}

}
