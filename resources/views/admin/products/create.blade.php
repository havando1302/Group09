@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Thêm sản phẩm mới</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Tên sản phẩm --}}
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        {{-- Mô tả ngắn --}}
        <div class="mb-4">
            <label for="short_description" class="block text-sm font-medium text-gray-700">Mô tả ngắn</label>
            <textarea name="short_description" id="short_description" rows="2" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
        </div>

        {{-- Mô tả chi tiết --}}
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Mô tả chi tiết</label>
            <textarea name="description" id="description" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
        </div>

        {{-- Giá --}}
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Giá</label>
            <input type="number" name="price" id="price" step="1000" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        {{-- Danh mục con --}}
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Danh mục con</label>
            <select name="category_id" id="category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="">-- Chọn danh mục --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Hình ảnh --}}
        <div class="mb-4">
            <label for="image_url" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
            <input type="file" name="image_url" id="image_url" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        {{-- Biến thể sản phẩm --}}
        <div class="mb-4">
            <label class="block text-lg font-bold text-gray-800 mb-2">Biến thể sản phẩm</label>
            <div id="variant-container">
                <div class="variant-group grid grid-cols-3 gap-4 mb-2">
                    <div>
                        <label>Màu (nhập tên màu)</label>
                        <input type="text" name="variants[0][color_name]" class="w-full border rounded" required>
                    </div>

                    <div>
                        <label>Size (nhập tên size)</label>
                        <input type="text" name="variants[0][size_name]" class="w-full border rounded" required>
                    </div>

                    <div>
                        <label>Số lượng</label>
                        <input type="number" name="variants[0][stock]" class="w-full border rounded" min="0" required>
                    </div>
                </div>
            </div>

            <button type="button" onclick="addVariant()" class="mt-2 text-blue-600 hover:underline">+ Thêm biến thể</button>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Lưu sản phẩm</button>
    </form>
</div>

<script>
    let variantIndex = 1;

    function addVariant() {
        const container = document.getElementById('variant-container');
        const html = `
            <div class="variant-group grid grid-cols-3 gap-4 mb-2">
                <div>
                    <label>Màu (nhập tên màu)</label>
                    <input type="text" name="variants[${variantIndex}][color_name]" class="w-full border rounded" required>
                </div>

                <div>
                    <label>Size (nhập tên size)</label>
                    <input type="text" name="variants[${variantIndex}][size_name]" class="w-full border rounded" required>
                </div>

                <div>
                    <label>Số lượng</label>
                    <input type="number" name="variants[${variantIndex}][stock]" class="w-full border rounded" min="0" required>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        variantIndex++;
    }
</script>
@endsection
