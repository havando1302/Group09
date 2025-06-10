@extends('layouts.app')

@section('title', 'Tạo Danh mục con mới')

@section('content')
<style>
    /* CSS tùy chỉnh để làm đẹp hơn */
    .card-header-custom {
        background: linear-gradient(to right, #4e73df, #1cc88a); /* Màu gradient bạn đã có */
        color: white;
        padding: 1.5rem; /* Tăng padding */
        border-top-left-radius: 0.5rem; /* Bo tròn góc trên */
        border-top-right-radius: 0.5rem;
    }

    .form-control-highlight {
        border-color: #1cc88a; /* Viền xanh lá */
        box-shadow: 0 0 0 0.25rem rgba(28, 200, 138, 0.25); /* Hiệu ứng shadow khi focus */
    }

    .btn-create-category {
        background-color: #1cc88a; /* Màu xanh lá cây */
        color: white;
        padding: 0.75rem 2rem; /* Tăng padding nút */
        font-size: 1.1rem; /* Tăng kích thước chữ */
        border-radius: 0.5rem; /* Bo tròn nút */
        transition: background-color 0.3s ease; /* Hiệu ứng hover mượt mà */
    }

    .btn-create-category:hover {
        background-color: #17a673; /* Màu xanh đậm hơn khi hover */
        color: white; /* Giữ màu chữ trắng */
    }

    .form-label-custom {
        font-size: 1.1rem;
        color: #333;
    }

    .parent-category-display {
        background-color: #f8f9fc; /* Nền xám nhạt */
        border: 1px solid #e0e0e0; /* Viền nhẹ */
        padding: 0.75rem 1rem;
        font-size: 1.1rem;
        font-weight: 600;
        color: #4e73df; /* Màu xanh dương */
        border-radius: 0.375rem;
        display: block; /* Đảm bảo nó là block để có độ rộng 100% */
        text-align: center;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9"> {{-- Tăng kích thước cột cho đẹp hơn trên màn hình lớn --}}

            <div class="card shadow-lg rounded-lg border-0"> {{-- Thêm shadow lớn hơn và bo tròn --}}
                <div class="card-header card-header-custom text-center">
                    <h3 class="mb-0 fw-bold">Tạo mới danh mục mới cho <span class="text-warning">"Sản phẩm"</span></h3>
                </div>

                <div class="card-body p-4"> {{-- Tăng padding trong card-body --}}
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf

                        {{-- Tên danh mục con --}}
                        <div class="mb-4">
                            <label for="name" class="form-label form-label-custom d-block text-center mb-2">Tên danh mục:</label>
                            <input type="text" name="name" id="name"
                                   class="form-control form-control-lg w-75 mx-auto @error('name') is-invalid @enderror" {{-- Thêm form-control-lg và kiểm tra lỗi --}}
                                   value="{{ old('name') }}" required
                                   placeholder="Ví dụ: Gấu bông, Đồ chơi nhồi bông">
                            @error('name')
                                <div class="text-danger mt-2 text-center small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Danh mục cha (được hiển thị tĩnh và ẩn đi input) --}}
                        <div class="mb-5"> {{-- Tăng khoảng cách dưới --}}
                            <label class="form-label form-label-custom d-block text-center mb-2">Danh mục cha:</label>
                            <div class="parent-category-display w-75 mx-auto">
                                {{ $mainCategory->name ?? 'Sản phẩm' }} {{-- Hiển thị tên danh mục cha --}}
                            </div>
                            {{-- Input ẩn chứa ID của danh mục cha, quan trọng cho việc submit form --}}
                            <input type="hidden" name="parent_id" value="{{ $mainCategory->id ?? $mainProductCategoryID }}">
                            @error('parent_id') {{-- Xử lý lỗi nếu có vấn đề với parent_id --}}
                                <div class="text-danger mt-2 text-center small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Nút submit --}}
                        <div class="text-center">
                            <button type="submit" class="btn btn-create-category">
                                <i class="fas fa-plus-circle me-2"></i> Tạo mới danh mục con
                            </button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary btn-lg ms-3">
                                <i class="fas fa-arrow-left me-2"></i> Quay lại
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
