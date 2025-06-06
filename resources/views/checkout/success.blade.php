@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-12 px-6 text-center bg-white shadow-md rounded-lg">
    <h2 class="text-3xl font-bold text-green-600 mb-4">🎉 Đặt hàng thành công!</h2>
    <p class="text-gray-700 text-lg mb-6">
        {{ session('message') ?? 'Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ xử lý đơn hàng sớm nhất.' }}
    </p>
    <a href="{{ route('products.indexPublic') }}"
   class="inline-block px-6 py-3 text-black bg-green-500 rounded-md shadow hover:bg-green-600 transition">
    Tiếp tục mua sắm
</a>

</div>
@endsection
