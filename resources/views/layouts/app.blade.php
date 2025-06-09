<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Teddy Paradise') }}</title>

  <!-- Fonts -->
  @yield('styles')
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
    }

    .page-wrapper {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1;
    }

    .grid {
      width: 100%;
      max-width: 1280px;
      margin: 0 auto;
      padding: 0 20px;
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
  </style>

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
</head>

<body class="font-sans antialiased">
  <div class="page-wrapper min-h-screen bg-gray-100">

    @include('layouts.navigation')

    <main>
      @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
      <div class="grid max-w-7xl mx-auto px-5">
        <div class="footer_info flex flex-wrap justify-between gap-8">
          <div class="footer_info-content">
            <img src="{{ asset('storage/products/Gemini_Generated_Image_krh9ixkrh9ixkrh9-fotor-20241009183056-removebg-preview.png') }}"
              alt="Logo" class="footer_info-logo">
          </div>

          <div class="footer_info-content">
            <h4 class="footer_info-heading">THÔNG TIN LIÊN HỆ</h4>
            <div class="footer_info-line"></div>
            <p class="footer_info-text">Số hotline được trực trong khung giờ từ 9h-17h mỗi T2 – T7 hàng tuần</p>
            <p class="footer_info-text">Đường dây nóng: +84 904 091 648</p>
            <p class="footer_info-text">P. Nguyễn Trác, Yên Nghĩa, Hà Đông, Hà Nội</p>
          </div>

          <div class="footer_info-content">
            <h4 class="footer_info-heading">CHÍNH SÁCH</h4>
            <div class="footer_info-line"></div>
            <a href="#" class="footer_info-policy block mb-1.5 hover:underline">Chính sách bảo hành</a>
            <a href="#" class="footer_info-policy block mb-1.5 hover:underline">Chính sách đổi trả</a>
            <a href="#" class="footer_info-policy block mb-1.5 hover:underline">Chính sách vận chuyển</a>
            <a href="#" class="footer_info-policy block mb-1.5 hover:underline">Chính sách bảo mật</a>
            <a href="#" class="footer_info-policy block mb-1.5 hover:underline">Câu hỏi thường gặp</a>
          </div>

          <div class="footer_info-content">
            <h4 class="footer_info-heading">KẾT NỐI VỚI CHÚNG TÔI</h4>
            <div class="footer_info-line"></div>
            <a href="https://www.facebook.com/profile.php?id=61576996803922">
              <img src="{{ asset('storage/products/Facebook_Logo_(2019).png') }}" alt="Facebook"
                class="footer_info-logo max-w-[100px]">
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

  </div>
</body>
</html>
