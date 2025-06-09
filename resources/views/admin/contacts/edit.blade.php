@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Chỉnh Sửa Thông Tin Liên Hệ</h2>
    <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="hotline" class="form-label">Hotline</label>
            <input type="text" class="form-control" id="hotline" name="hotline" value="{{ $contact->hotline }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}" required>
        </div>

        <div class="mb-3">
            <label for="facebook" class="form-label">Facebook</label>
            <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $contact->facebook }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $contact->address }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $contact->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
