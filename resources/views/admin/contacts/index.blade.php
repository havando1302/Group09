@extends('layouts.app')

@section('content')
<style>
    .contact-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        background-color: #fff;
    }
    .contact-card strong {
        color: #333;
    }
    .btn-group {
        margin-top: 15px;
    }
    .btn-warning {
        margin-right: 10px;
    }
</style>

<div class="container mt-4">
    <h2 class="mb-4">Thông tin liên hệ</h2>
    <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary mb-4">Thêm liên hệ</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach($contacts as $contact)
        <div class="contact-card">
            <p><strong>Hotline:</strong> {{ $contact->hotline }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Facebook:</strong> 
    <a href="{{ $contact->facebook }}" target="_blank">
        {{ $contact->facebook_name }}
    </a>
</p>


            <p><strong>Địa chỉ:</strong> {{ $contact->address }}</p>
            <p><strong>Mô tả:</strong> {{ $contact->description }}</p>

            <div class="btn-group">
                <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="btn btn-warning">Sửa</a>
                <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
