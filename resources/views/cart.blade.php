@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6">🛒 Tydy xin chào quý khách!</h2>

    <!-- Tabs -->
    <div class="flex border-b border-gray-200 mb-6">
        <button id="tab-cart-btn" class="py-2 px-4 text-blue-600 border-b-2 border-blue-600 font-semibold focus:outline-none">
            Giỏ hàng của bạn
        </button>
        <button id="tab-orders-btn" class="ml-4 py-2 px-4 text-gray-600 hover:text-blue-600 border-b-2 border-transparent font-semibold focus:outline-none">
            Đơn hàng của bạn
        </button>
    </div>

    <!-- Tab Cart -->
    <div id="tab-cart" class="">
        @if ($cartItems->isEmpty())
            <!-- Giỏ hàng trống -->
            <div class="text-center text-gray-500 py-12">
                <svg class="mx-auto h-16 w-16 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218
                          c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6
                          20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/>
                </svg>
                <p class="mt-4 text-xl font-semibold text-gray-700">Giỏ hàng của bạn đang trống.</p>
                <p class="mt-2 text-gray-500">Có vẻ như bạn chưa thêm sản phẩm nào. Hãy khám phá cửa hàng nhé!</p>

                <div class="mt-8">
                    <a href="{{ route('products.index') }}"
                       class="inline-flex items-center px-6 py-3 text-base font-medium rounded-md shadow-sm text-black bg-blue-500 hover:bg-blue-600">
                        Khám phá sản phẩm
                    </a>
                </div>

                <div class="mt-12">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">🔥 Sản phẩm được yêu thích</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($popularProducts as $product)
                            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                                <img src="{{ $product->image_url ? asset('storage/' . $product->image_url) : asset('images/default-product.png') }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-48 object-cover"
                                     onerror="this.onerror=null; this.src='{{ asset('images/default-product.png') }}';">
                                <div class="p-4">
                                    <h4 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h4>
                                    <p class="text-green-600 font-bold mt-2">{{ number_format($product->price) }} VNĐ</p>
                                    <a href="{{ route('products.show', $product->id) }}"
                                       class="w-full flex justify-center px-4 py-3 rounded-md text-base font-semibold text-black bg-green-500 hover:bg-green-600">
                                        Xem chi tiết
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500">Chưa có sản phẩm yêu thích nào được hiển thị.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @else
            <!-- Giỏ hàng có sản phẩm -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sản phẩm</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Giá</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Số lượng</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tổng cộng</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($cartItems as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img class="h-16 w-16 rounded-md object-cover border border-gray-200"
                                                 src="{{ $item->product && $item->product->image_url ? asset('storage/' . $item->product->image_url) : asset('images/default-product.png') }}"
                                                 alt="{{ $item->product->name ?? 'Hình ảnh sản phẩm' }}"
                                                 onerror="this.onerror=null; this.src='{{ asset('images/default-product.png') }}';">
                                            <div class="ml-4 text-sm font-medium text-gray-900">
                                                {{ $item->product->name ?? 'Sản phẩm không có tên' }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ number_format($item->product->price ?? 0) }} VNĐ
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-semibold text-gray-700">
                                        {{ number_format(($item->product->price ?? 0) * $item->quantity) }} VNĐ
                                    </td>
                                    <td class="px-6 py-4 text-center text-sm font-medium">
                                        <form action="{{ route('cart.remove', $item->product_id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?')"
                                                    class="text-red-600 hover:text-red-800">
                                                Xóa
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="p-6 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-gray-900">Tổng thanh toán:</span>
                        <span class="text-2xl font-bold text-red-600">
                            {{ number_format($cartItems->sum(fn($item) => ($item->product->price ?? 0) * $item->quantity)) }} VNĐ
                        </span>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('checkout') }}"
                           class="w-full flex justify-center px-6 py-3 rounded-md text-base font-semibold text-black bg-green-500 hover:bg-green-600">
                            Xác nhận đặt hàng
                        </a>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="{{ route('home') }}"
                           class="text-sm text-indigo-600 hover:text-indigo-500 font-medium">
                            Hoặc tiếp tục mua sắm →
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Tab Orders -->
    <div id="tab-orders" class="hidden">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">📦 Đơn hàng của bạn</h3>

        @forelse ($orders as $order)
    <div class="bg-white rounded-lg shadow p-4 mb-6 border border-gray-200">
        <p class="text-sm text-gray-700"><strong>Khách hàng:</strong> {{ $order->name }}</p>
        <p class="text-sm text-gray-700"><strong>SĐT:</strong> {{ $order->phone }}</p>
        <p class="text-sm text-gray-700"><strong>Địa chỉ:</strong> {{ $order->address }}</p>
        <p class="text-sm mt-1"><strong>Trạng thái:</strong>
            <span class="inline-block px-2 py-1 text-xs font-semibold rounded
                {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' :
                   ($order->status === 'shipped' ? 'bg-blue-100 text-blue-800' :
                   ($order->status === 'processing' ? 'bg-yellow-100 text-yellow-800' :
                   ($order->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800'))) }}">
                {{ $order->status_text }} {{-- dùng accessor trong model --}}
            </span>
        </p>

        <button
            class="mt-3 mb-2 text-blue-600 hover:text-blue-800 font-semibold"
            onclick="document.getElementById('order-details-{{ $order->id }}').classList.toggle('hidden')">
            Xem chi tiết
        </button>

        <div id="order-details-{{ $order->id }}" class="hidden border-t pt-3 border-gray-200 space-y-2">
            @foreach ($order->items as $item)
                <div class="text-sm text-gray-800">
                    <strong>Sản phẩm:</strong> {{ $item->product ? $item->product->name : 'Sản phẩm không tồn tại' }} |
                    <strong>Size:</strong> {{ $item->size ?? 'N/A' }} |
                    <strong>Màu:</strong> {{ $item->color ?? 'N/A' }} |
                    <strong>Số lượng:</strong> {{ $item->quantity }} |
                    <strong>Giá:</strong> {{ number_format($item->price) }} VNĐ
                </div>
            @endforeach
        </div>

        <p class="mt-3 text-right font-bold text-lg text-red-600">
            Tổng tiền: {{ number_format($order->items->sum(fn($item) => $item->price * $item->quantity)) }} VNĐ
        </p>
    </div>
@empty
    <p class="text-gray-500">Bạn chưa có đơn hàng nào.</p>
@endforelse
    </div>
</div>

<!-- JS đổi tab -->
<script>
    const tabCartBtn = document.getElementById('tab-cart-btn');
    const tabOrdersBtn = document.getElementById('tab-orders-btn');
    const tabCart = document.getElementById('tab-cart');
    const tabOrders = document.getElementById('tab-orders');

    tabCartBtn.addEventListener('click', () => {
        tabCart.classList.remove('hidden');
        tabOrders.classList.add('hidden');

        tabCartBtn.classList.add('text-blue-600', 'border-blue-600');
        tabCartBtn.classList.remove('text-gray-600', 'border-transparent');

        tabOrdersBtn.classList.remove('text-blue-600', 'border-blue-600');
        tabOrdersBtn.classList.add('text-gray-600', 'border-transparent');
    });

    tabOrdersBtn.addEventListener('click', () => {
        tabOrders.classList.remove('hidden');
        tabCart.classList.add('hidden');

        tabOrdersBtn.classList.add('text-blue-600', 'border-blue-600');
        tabOrdersBtn.classList.remove('text-gray-600', 'border-transparent');

        tabCartBtn.classList.remove('text-blue-600', 'border-blue-600');
        tabCartBtn.classList.add('text-gray-600', 'border-transparent');
    });
</script>
@endsection
