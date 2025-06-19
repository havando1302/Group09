@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Baloo+2&display=swap');

  body {
    font-family: 'Baloo 2', cursive;
    background: #fff;
  }

  .grid {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 20px;
  }

  .content_banner img {
    width: 100%;
    height: auto;
    margin-bottom: 40px;
    border-radius: 12px;
  }

  .content_introduce {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 30px;
    margin-bottom: 60px;
    padding-top: 20px;
  }

  .content_logo-image {
    max-width: 240px;
    height: auto;
  }

  .content_intro-text {
    max-width: 600px;
  }

  .content_intro-text-paragraph {
    margin-bottom: 12px;
    font-size: 16px;
    color: #333;
  }

  .page-title {
    font-size: 28px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 30px;
    color: #4f46e5;
  }

  .product-card {
    border: 2px solid transparent;
    border-radius: 0.5rem;
    padding: 1rem;
    background: linear-gradient(to bottom right, #ffffff, #f0f8ff);
    transition: 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-shadow: 0 1px 5px rgba(0,0,0,0.1);
  }

  .product-card:hover {
    transform: scale(1.03);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    border-color: #60a5fa;
  }

  .product-image-container {
    width: 100%;
    height: 12rem;
    overflow: hidden;
    border-radius: 0.375rem;
    margin-bottom: 1rem;
  }

  .product-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }

  .btn-add-to-cart, .btn-login {
    font-weight: 600;
    text-align: center;
    display: block;
    width: 100%;
    padding: 0.5rem;
    border-radius: 0.375rem;
    text-decoration: none;
    margin-top: 0.5rem;
  }

  .btn-add-to-cart {
    background: linear-gradient(to right, #60a5fa, #3b82f6);
    color: white;
  }

  .btn-add-to-cart:hover {
    background: linear-gradient(to right, #3b82f6, #2563eb);
  }

  .btn-login {
    background: linear-gradient(to right, #a78bfa, #6366f1);
    color: white;
  }

  .btn-login:hover {
    background: linear-gradient(to right, #7c3aed, #4338ca);
  }

  .variant-label {
    padding: 2px 8px;
    border-radius: 0.25rem;
    font-size: 0.875rem;
    background-color: #e0e7ff;
    color: #1e3a8a;
    margin-right: 6px;
    margin-top: 4px;
    display: inline-block;
  }

  .variant-label.size {
    background-color: #bfdbfe;
    color: #1e40af;
  }

  .content_section {
    text-align: center;
    margin: 60px auto;
  }

  .content_section-benefit {
    display: inline-block;
    width: 240px;
    margin: 0 10px 30px;
  }

  .content_section-benefit-image {
    width: 100px;
    height: 100px;
    margin-bottom: 15px;
    border-radius: 50%;
  }

  .content_section-benefit-text-heading {
    font-weight: 700;
    font-size: 16px;
    margin-bottom: 6px;
  }

  .content_section-benefit-text-paragraph {
    font-size: 14px;
    color: #666;
  }
  .carousel-inner {
    height: 700px; /* Bạn có thể điều chỉnh kích thước này */
  }

  .carousel-inner img {
    height: 100%;
    width: 100%;
    object-fit: cover; /* Giữ tỷ lệ, cắt ảnh nếu cần */
  }

  @media (max-width: 768px) {
    .carousel-inner {
      height: 250px; /* Giảm chiều cao trên thiết bị nhỏ */
    }
  }
</style>

<div class="grid">
  <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('assets/img/DALL.png') }}" class="d-block w-100" alt="Banner 1">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('assets/img/DALL2.jpg') }}" class="d-block w-100" alt="Banner 2">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('assets/img/DALL4.png') }}" class="d-block w-100" alt="Banner 3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

  {{-- Giới thiệu --}}
  <div class="content_introduce">
    <div class="content_logo">
      <img src="{{ asset('assets/img/LoGo.jpg') }}" alt="Logo" class="content_logo-image">
    </div>
    <div class="content_intro-text">
      <p class="content_intro-text-paragraph">
        **Teddy Paradise** là thiên đường dành cho những ai yêu thích sự dễ thương và ấm áp. Với sứ mệnh mang đến niềm vui cho mọi lứa tuổi, chúng tôi cung cấp những chú gấu bông chất lượng, dễ thương và đầy cảm xúc.
      </p>
      <p class="content_intro-text-paragraph">
        Với phương châm “Dễ Thương – Chất Lượng – Tận Tâm”, Teddy Paradise cam kết đem lại trải nghiệm mua sắm tuyệt vời với sản phẩm tuyển chọn kỹ lưỡng và dịch vụ tận tình.
      </p>
      <p class="content_intro-text-paragraph">
        Mỗi chú gấu là biểu tượng của tình cảm và sự quan tâm. Với chất liệu cao cấp, thiết kế đáng yêu và phong cách đa dạng, Teddy Paradise là điểm đến lý tưởng cho những người yêu gấu bông tại Việt Nam.
      </p>
    </div>
  </div>

  {{-- Sản phẩm nổi bật --}}
@php
    use Illuminate\Support\Str;

    // Đường dẫn ảnh mặc định khi ảnh lỗi
    $defaultImageUrl = asset('assets/img/default.jpg');
@endphp

<h2 class="page-title">SẢN PHẨM NỔI BẬT</h2>

<div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-product">
    @foreach($popularProducts->chunk(3) as $chunkIndex => $chunk)
      <div class="carousel-item @if($chunkIndex === 0) active @endif">
        <div class="d-flex justify-content-center gap-4 px-4">
          @foreach($chunk as $product)
            @php
                $imageUrl = $product->image_url;

                // Kiểm tra nguồn ảnh: assets hay storage
                if (Str::startsWith($imageUrl, 'assets/')) {
                    $imagePath = asset($imageUrl);
                } else {
                    $imagePath = asset('storage/' . $imageUrl);
                }

                $totalStock = $product->variants->sum('stock');
            @endphp

            <div class="product-card" style="width: 300px;">
              <a href="{{ route('products.show', $product->id) }}">
                <div class="product-image-container">
                  <img src="{{ $imagePath }}"
                       alt="{{ $product->name }}"
                       onerror="this.onerror=null; this.src='{{ $defaultImageUrl }}';">
                </div>
                <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
              </a>

              <p class="text-gray-600">{{ number_format($product->price) }} VNĐ</p>
              <p class="text-sm text-gray-500">Còn {{ $totalStock }} sản phẩm</p>

              @if($product->variants->count())
                <div class="mt-2">
                  <p class="text-sm font-medium text-gray-700">Màu sắc:</p>
                  <div class="flex flex-wrap">
                    @foreach($product->variants->pluck('color_name')->unique() as $color)
                      <span class="variant-label">{{ $color }}</span>
                    @endforeach
                  </div>
                </div>

                <div class="mt-2">
                  <p class="text-sm font-medium text-gray-700">Kích cỡ:</p>
                  <div class="flex flex-wrap">
                    @foreach($product->variants->pluck('size_name')->unique() as $size)
                      <span class="variant-label size">{{ $size }}</span>
                    @endforeach
                  </div>
                </div>
              @endif

              <div class="mt-4">
                @auth
                  <a href="{{ route('products.show', $product->id) }}" class="btn-add-to-cart">Thêm vào giỏ hàng</a>
                @else
                  <a href="{{ route('login') }}" class="btn-login">Đăng nhập để mua hàng</a>
                @endauth
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endforeach
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
    <span class="visually-hidden">Trước</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
    <span class="visually-hidden">Tiếp</span>
  </button>
</div>


  {{-- Lợi ích khách hàng --}}
  <div class="content_section">
    <h2 class="content_section-heading">LÝ DO BẠN NÊN MUA SẢN PHẨM CỦA CHÚNG TÔI</h2>

    <div class="content_section-benefit">
      <img src="{{ asset('assets/img/HT.jpg') }}" alt="Giao hàng" class="content_section-benefit-image">
      <h3 class="content_section-benefit-text-heading">GIAO HÀNG HỎA TỐC</h3>
      <p class="content_section-benefit-text-paragraph">Thời gian giao hàng nhanh chóng</p>
    </div>

    <div class="content_section-benefit">
      <img src="{{ asset('assets/img/CK.png') }}" alt="Chăm sóc" class="content_section-benefit-image">
      <h3 class="content_section-benefit-text-heading">CHĂM SÓC KHÁCH HÀNG</h3>
      <p class="content_section-benefit-text-paragraph">Hỗ trợ 24/7 tận tình</p>
    </div>

    <div class="content_section-benefit">
      <img src="{{ asset('assets/img/DT.jpg') }}" alt="Đổi trả" class="content_section-benefit-image">
      <h3 class="content_section-benefit-text-heading">CHÍNH SÁCH ĐỔI TRẢ</h3>
      <p class="content_section-benefit-text-paragraph">1 đổi 1 trong vòng 3 ngày nếu hàng lỗi</p>
    </div>

    <div class="content_section-benefit">
      <img src="{{ asset('assets/img/TT.jpg') }}" alt="Thanh toán" class="content_section-benefit-image">
      <h3 class="content_section-benefit-text-heading">THANH TOÁN AN TOÀN</h3>
      <p class="content_section-benefit-text-paragraph">Bảo mật thông tin khách hàng</p>
    </div>
  </div>
</div>
@endsection
