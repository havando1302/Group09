@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Sửa sản phẩm</h1>

    {{-- Hiển thị lỗi validation --}}
    @if ($errors->any())
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-lg shadow-md p-6">
            {{-- Tên sản phẩm --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
                <input type="text" id="name" name="name" 
                       value="{{ old('name', $product->name) }}" 
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            {{-- Mô tả --}}
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                <textarea id="description" name="description" rows="4" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('description', $product->description) }}</textarea>
            </div>

            {{-- Giá --}}
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Giá</label>
                <input type="number" id="price" name="price" step="0.01" 
                       value="{{ old('price', $product->price) }}" 
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            {{-- Số lượng tồn kho --}}
            <div class="mb-4">
                <label for="stock" class="block text-sm font-medium text-gray-700">Số lượng tồn kho</label>
                <input type="number" id="stock" name="stock" 
                       value="{{ old('stock', $product->stock) }}" 
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            {{-- Danh mục con --}}
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Danh mục con</label>
                <select id="category_id" name="category_id" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="">-- Chọn danh mục con --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Hình ảnh --}}
            <div class="mb-4">
                <label for="image_url" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                <input type="file" id="image_url" name="image_url" accept="image/*" 
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">

                @if ($product->image_url)
                    <img src="{{ Storage::url($product->image_url) }}" 
                         alt="{{ $product->name }}" 
                         class="mt-2 w-32 h-32 object-cover rounded-md">
                @endif
            </div>

            {{-- Nút cập nhật --}}
            <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Cập nhật sản phẩm
            </button>
        </div>
    </form>
</div>
@endsection
