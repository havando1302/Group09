<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Teddy Paradise') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-free-6.6.0/css/all.min.css') }}" />

  {{-- Fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" />
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<!-- <style>
  .grid {
    width: 100%;
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 20px;
  }

  .intro_container {
    margin-bottom: 40px;
  }

  .intro_content-header {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 20px;
  }

  .content_introduce {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 30px;
  }

  .content_logo-image {
    max-width: 240px;
    height: auto;
  }

  .content_intro-text-paragraph {
    margin-bottom: 12px;
    font-size: 16px;
  }

  .intro_content-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
  }

  .intro_content-container-half {
    flex: 1;
    min-width: 300px;
  }

  .intro_content-container-img {
    width: 100%;
    height: auto;
    margin-top: 10px;
  }

  .footer {
    background-color: #e2a57c;
    color: #fff;
    padding: 40px 20px;
  }

  .footer_info {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 30px;
  }

  .footer_info-content {
    flex: 1;
    min-width: 220px;
  }

  .footer_info-logo {
    max-width: 140px;
    margin-bottom: 15px;
  }

  .footer_info-heading {
    font-weight: 700;
    margin-bottom: 10px;
  }

  .footer_info-line {
    width: 40px;
    height: 2px;
    background-color: #fff;
    margin-bottom: 10px;
  }

  .footer_info-text {
    font-size: 14px;
    margin-bottom: 6px;
  }

  .footer_info-policy {
    color: #fff;
    text-decoration: none;
  }
  </style> -->
<script type="text/javascript">
  var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
  (function () {
    var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/68406f2a90125c190bccd498/1istr4g4p';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
  })();
</script>
<!--End of Tawk.to Script-->

<body class="font-sans antialiased">
  <div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <main>
      @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer bg-[#e2a57c] text-white py-10">
      <div class="grid max-w-7xl mx-auto px-5">
        <div class="footer_info flex flex-wrap justify-between gap-8">
          <div class="footer_info-content flex-1 min-w-[220px]">
            <img
              src="{{ asset('storage/products/Gemini_Generated_Image_krh9ixkrh9ixkrh9-fotor-20241009183056-removebg-preview.png') }}"
              alt="Logo" class="footer_info-logo max-w-[140px] mb-4">
          </div>

          <div class="footer_info-content flex-1 min-w-[220px]">
            <h4 class="footer_info-heading font-bold mb-2">THÔNG TIN LIÊN HỆ</h4>
            <div class="footer_info-line w-10 h-0.5 bg-white mb-2"></div>
            <p class="footer_info-text text-sm mb-1.5">Số hotline được trực trong khung giờ từ 9h-17h mỗi T2 – T7 hàng
              tuần</p>
            <p class="footer_info-text text-sm mb-1.5">Đường dây nóng: +84 904 091 648</p>
            <p class="footer_info-text text-sm mb-1.5">P. Nguyễn Trác, Yên Nghĩa, Hà Đông, Hà Nội</p>
          </div>

          <div class="footer_info-content flex-1 min-w-[220px]">
            <h4 class="footer_info-heading font-bold mb-2">CHÍNH SÁCH</h4>
            <div class="footer_info-line w-10 h-0.5 bg-white mb-2"></div>
            <a href="#" class="footer_info-policy block text-white text-sm mb-1.5 hover:underline">Chính sách bảo
              hành</a>
            <a href="#" class="footer_info-policy block text-white text-sm mb-1.5 hover:underline">Chính sách đổi
              trả</a>
            <a href="#" class="footer_info-policy block text-white text-sm mb-1.5 hover:underline">Chính sách vận
              chuyển</a>
            <a href="#" class="footer_info-policy block text-white text-sm mb-1.5 hover:underline">Chính sách bảo
              mật</a>
            <a href="#" class="footer_info-policy block text-white text-sm mb-1.5 hover:underline">Câu hỏi thường
              gặp</a>
          </div>

          <div class="footer_info-content flex-1 min-w-[220px]">
            <h4 class="footer_info-heading font-bold mb-2">KẾT NỐI VỚI CHÚNG TÔI</h4>
            <div class="footer_info-line w-10 h-0.5 bg-white mb-2"></div>
            <a href="https://www.facebook.com/profile.php?id=61576996803922" class="footer_info-btn">
              <img src="{{ asset('storage/products/Facebook_Logo_(2019).png') }}" alt="Facebook"
                class="footer_info-logo max-w-[100px] mb-4">
            </a>
          </div>
        </div>

        <div class="footer_payment mt-8 border-t border-white/30 pt-5 text-center">
          <div class="footer_payment-wrapper inline-flex gap-5">
            <div class="footer_payment-app">
              <i class="fa-brands fa-cc-visa text-2xl text-white"></i>
            </div>
            <div class="footer_payment-app">
              <i class="fa-brands fa-cc-paypal text-2xl text-white"></i>
            </div>
            <div class="footer_payment-app">
              <i class="fa-brands fa-stripe text-2xl text-white"></i>
            </div>
            <div class="footer_payment-app">
              <i class="fa-brands fa-cc-mastercard text-2xl text-white"></i>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!--Start of Tawk.to Script-->
  </div>
</body>

</html>