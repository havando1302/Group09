@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Tổng quan hệ thống</h1>
        <form action="{{ route('admin.dashboard') }}" method="GET" class="mb-6 flex items-center space-x-4">
    <label for="date" class="font-medium">Chọn ngày:</label>
    <input type="date" name="date" id="date"
        value="{{ request('date') }}"
        class="border px-3 py-2 rounded shadow-sm focus:outline-none focus:ring">
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Lọc
    </button>
</form>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <div class="bg-white shadow p-4 rounded">
                <p class="text-gray-500">💰 Tổng doanh thu</p>
                <h2 class="text-2xl font-semibold text-green-600">{{ number_format($totalRevenue) }} VNĐ</h2>
            </div>
            <div class="bg-white shadow p-4 rounded">
                <p class="text-gray-500">📦 Số lượng đơn hàng</p>
                <h2 class="text-2xl font-semibold">{{ $totalOrders }}</h2>
            </div>
            <div class="bg-white shadow p-4 rounded">
                <p class="text-gray-500">👥 Số lượng khách hàng</p>
                <h2 class="text-2xl font-semibold">{{ $totalCustomers }}</h2>
            </div>
            <div class="bg-white shadow p-4 rounded">
                <p class="text-gray-500">🛒 Sản phẩm đang bán</p>
                <h2 class="text-2xl font-semibold">{{ $totalProducts }}</h2>
            </div>
            <div class="bg-white shadow p-4 rounded">
                <p class="text-gray-500">🆕 Đơn hàng mới</p>
                <h2 class="text-2xl font-semibold text-blue-600">{{ $newOrders }}</h2>
            </div>
            <div class="bg-white shadow p-4 rounded">
                <p class="text-gray-500">👤 Khách hàng mới</p>
                <h2 class="text-2xl font-semibold text-blue-600">{{ $newCustomers }}</h2>
            </div>
            <div class="bg-white shadow p-4 rounded">
                <p class="text-gray-500">🆕 Sản phẩm mới</p>
                <h2 class="text-2xl font-semibold text-blue-600">{{ $newProducts }}</h2>
            </div>
        </div>

        <h2 class="text-2xl font-bold mb-4">📊 Quản lý hệ thống</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('admin.products.index') }}" 
               class="bg-green-500 hover:bg-green-600 text-black p-4 rounded text-center text-lg font-semibold">
                Quản lý sản phẩm
            </a>
            <a href="{{ route('admin.orders.index') }}" 
               class="bg-green-500 hover:bg-green-600 text-black p-4 rounded text-center text-lg font-semibold">
                Quản lý đơn hàng
            </a>
            <a href="{{ route('admin.categories.index') }}" 
               class="bg-green-500 hover:bg-green-600 text-black p-4 rounded text-center text-lg font-semibold">
                Quản lý danh mục sản phẩm
            </a>
        </div>
    </div>
@endsection
