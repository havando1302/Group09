@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-10 px-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">🧾 Thông tin đặt hàng</h2>

    <form action="{{ route('checkout') }}" method="POST">
        @csrf

        {{-- Thông tin người đặt hàng --}}
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Tên khách hàng</label>
            <input type="text" name="name" id="name" required
                   class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>

        <div class="mb-6">
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại</label>
            <input type="text" name="phone" id="phone" required pattern="[0-9]{10,11}"
                   class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                   placeholder="VD: 0901234567">
        </div>

        <div class="mb-6">
            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ nhận hàng</label>
            <textarea name="address" id="address" rows="3" required
                      class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                      placeholder="Nhập địa chỉ đầy đủ (Số nhà, phường, quận, thành phố...)"></textarea>
        </div>

        {{-- Hiển thị các phương thức thanh toán --}}
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Chọn phương thức thanh toán:</label>
            <div class="space-y-3">
                <label class="flex items-center">
                    <input type="radio" name="payment_method" value="cod" checked class="form-radio text-indigo-600">
                    <span class="ml-2">Thanh toán khi nhận hàng (COD)</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="payment_method" value="bank_transfer" class="form-radio text-indigo-600">
                    <span class="ml-2">Chuyển khoản ngân hàng</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="payment_method" value="momo" class="form-radio text-indigo-600">
                    <span class="ml-2">Ví MoMo</span>
                </label>
            </div>
        </div>

        {{-- Ghi chú thêm (nếu người dùng muốn để lại lời nhắn hoặc yêu cầu) --}}
        <div class="mb-6">
            <label for="note" class="block text-sm font-medium text-gray-700 mb-1">Ghi chú thêm (tuỳ chọn)</label>
            <textarea name="note" id="note" rows="2"
                      class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                      placeholder="Ví dụ: Giao trong giờ hành chính, gọi trước khi giao..."></textarea>
        </div>

        <button type="submit"
            class="w-full flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-semibold text-black bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400 transition duration-150 ease-in-out">
            Xác nhận đặt đơn hàng
        </button>
    </form>
</div>
@endsection
