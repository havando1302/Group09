@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow rounded">
                    <div class="card-header bg-gradient text-center" style="background: linear-gradient(to right, #4e73df, #1cc88a); color: white;">
                        <h4 class="mb-0">Tạo mới danh mục con cho <span class="text-warning">"Sản phẩm"</span></h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.categories.store') }}" method="POST">
                            @csrf

                            {{-- Tên danh mục --}}
                            <div class="mb-4 text-center">
                                <label for="name" class="form-label fw-semibold">Tên danh mục con</label>
                                <input type="text" name="name" id="name" class="form-control w-75 mx-auto" 
                                       value="{{ old('name') }}" required placeholder="Ví dụ: Gấu tốt nghiệp">
                                @error('name')
                                    <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Danh mục cha --}}
                            <div class="mb-4 text-center">
                                <label class="form-label fw-semibold">Danh mục cha</label>
                                <div class="form-control w-75 mx-auto bg-light text-dark fw-bold">
                                    {{ $mainCategory->name ?? 'Sản phẩm' }}
                                </div>
                                <input type="hidden" name="parent_id" value="{{ $mainCategory->id ?? $mainProductCategoryID }}">
                            </div>

                            {{-- Nút submit --}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg" style="background-color: #1cc88a; color: white;">
                                    <i class="fas fa-plus-circle me-1"></i> Tạo mới danh mục con
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
