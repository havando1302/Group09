@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
<style>
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
</style>

<div class="grid">
  <div class="intro_container">
    <div class="intro_content">
      <h2 class="intro_content-header">Về Teddy Paradise</h2>
      <div class="content_introduce">
        <div class="content_logo">
          <img src="{{ asset('storage/products/Gemini_Generated_Image_opu087opu087opu0-fotor-20241009172321.jpg') }}" alt="" class="content_logo-image">
        </div>
        <div class="content_intro-text">
          <p class="content_intro-text-paragraph">
            Teddy Paradise, một thương hiệu chuyên về gấu bông, ra đời vào ngày 12/10/2024 với sứ mệnh mang đến cho người tiêu dùng Việt Nam những chú gấu bông đáng yêu, chất lượng cao với giá cả cạnh tranh.
          </p>
          <p class="content_intro-text-paragraph">
            Với phương châm ‘Yêu thương - Chất Lượng’, Teddy Paradise luôn nỗ lực không ngừng trong việc phát triển và nâng cao chất lượng sản phẩm cũng như dịch vụ.
          </p>
          <p class="content_intro-text-paragraph">
            Cam kết 100% sản phẩm gấu bông của chúng tôi đều an toàn, mềm mại, và bền bỉ.
          </p>
        </div>
      </div>
    </div>

    <div class="intro_content">
      <h2 class="intro_content-header">Tầm nhìn - Giá trị cốt lõi</h2>
      <div class="intro_content-container">
        <div class="intro_content-container-half">
          <h3 style="margin-top: 0;">Tầm nhìn</h3>
          <p>
            Teddy Paradise hướng tới việc trở thành thương hiệu hàng đầu trong lĩnh vực quà tặng gấu bông.
          </p>
          <p>
            Sứ mệnh là mang đến cho khách hàng những chú gấu bông độc đáo, chất lượng cao và tràn đầy ý nghĩa.
          </p>
          <h3 style="margin-top: 35px;">Giá trị</h3>
          <p>
            Mỗi sản phẩm gấu bông đều được làm ra với sự chăm chút tỉ mỉ trong từng chi tiết.
          </p>
        </div>
        <div class="intro_content-container-half">
          <img src="{{ asset('storage/products/DALL.png') }}" alt="" class="intro_content-container-img">
          <img src="{{ asset('storage/products/20.10_Banner.jpg') }}" alt="" class="intro_content-container-img">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection