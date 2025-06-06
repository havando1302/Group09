@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-white shadow-md rounded-lg flex flex-col md:flex-row overflow-hidden">
        <!-- Bên trái: Hình ảnh sản phẩm -->
        <div class="w-full md:w-1/2 bg-gray-100 p-4 grid grid-cols-2 gap-4 place-items-center">
            @foreach($product->images ?? [$product->image_url] as $image)
                <div class="w-40 h-40 overflow-hidden rounded shadow">
                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                </div>
            @endforeach
        </div>

        <!-- Bên phải: Thông tin + form -->
        <div class="w-full md:w-1/2 p-6 flex flex-col justify-start">
            <h1 class="text-2xl font-bold mb-1 uppercase">{{ $product->name }}</h1>
            <p class="text-sm text-gray-500 mb-1">Mã SP: {{ $product->code ?? 'S383' }}</p>
            <p class="text-sm text-gray-600 mb-2">Đã bán: {{ $product->sold ?? '88' }}</p>

            <!-- Giá -->
            <div class="mb-3">
                <span class="text-gray-400 line-through mr-2">{{ number_format($product->original_price ?? $product->price + 100000) }}₫</span>
                <span class="text-xl text-red-600 font-semibold">{{ number_format($product->price) }}₫</span>
            </div>

            <!-- Mô tả -->
            <p class="text-gray-700 mb-4">{{ $product->description }}</p>

            <!-- Form thêm vào giỏ hàng -->
            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="space-y-4">
                @csrf

                <!-- Kích thước -->
                <div>
                    <span class="block text-sm font-medium text-gray-700 mb-1">Kích thước:</span>
                    <div class="grid grid-cols-6 gap-2">
                        @foreach(['38','39','40','41','42','43'] as $size)
                            <label class="border px-3 py-1 text-center rounded cursor-pointer hover:bg-gray-200">
                                <input type="radio" name="size" value="{{ $size }}" class="hidden" required>
                                <span class="block">{{ $size }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Số lượng -->
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Số lượng:</label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1" required
                           class="w-24 border border-gray-300 rounded px-3 py-2">
                </div>

                <!-- Nút thêm vào giỏ hàng -->
                <div class="mt-4">
                    <button type="submit"
                            class="w-full md:w-auto bg-black text-white px-6 py-2 rounded hover:opacity-90 transition">
                        THÊM VÀO GIỎ HÀNG
                    </button>
                </div>
            </form>

            <!-- Quay lại -->
            <div class="mt-6">
                <a href="{{ url()->previous() }}" class="text-blue-500 hover:underline">← Quay lại</a>
            </div>

            <!-- Thông tin thêm -->
            <div class="mt-6 border-t pt-4 text-sm text-gray-600 space-y-1">
                <p>✔ Miễn phí vận chuyển toàn quốc với đơn hàng trên 1 triệu</p>
                <p>✔ Kiểm tra và thanh toán khi nhận hàng</p>
                <p>✔ Đổi hàng trong 15 ngày</p>
                <p>✔ 1900 4510 (10:00 – 22:00)</p>
            </div>

            <!-- Thông tin chi tiết -->
            <div class="mt-6 border-t pt-4 text-sm text-gray-700">
                <strong>Thông tin sản phẩm</strong>
                <ul class="list-disc ml-5 mt-2 space-y-1">
                    <li>Mã sản phẩm: {{ $product->code ?? 'S383' }}</li>
                    <li>Màu sắc: Đen - Trắng</li>
                    <li>Size: 38 - 43</li>
                    <li>Thiết kế trẻ trung, hiện đại</li>
                    <li>Chất liệu: EVA/Phylon êm nhẹ, bám đường, bảo vệ khớp</li>
                    <li>Phù hợp: đi bộ, hoạt động thể chất, đi học, đi chơi</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
