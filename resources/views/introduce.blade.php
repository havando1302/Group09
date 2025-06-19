@extends('layouts.app')

@section('content')

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

<!-- Page CSS -->
<style>
  .grid {
    width: 100%;
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 20px;
  }

  .intro_container {
    margin-bottom: 30px;
  }
  .intro_content {
    padding-top: 20px;
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

<!-- Content -->
<div class="grid">
  <div class="intro_container">
    <!-- Giới thiệu -->
    <div class="intro_content">
      <h2 class="intro_content-header">Về Teddy Paradise</h2>
      <div class="content_introduce">
        <div class="content_logo">
          <img src="{{ asset('assets/img/LoGo.jpg') }}" alt="Logo Teddy Paradise" class="content_logo-image">
        </div>
        <div class="content_intro-text">
          <p class="content_intro-text-paragraph">
            <strong>Teddy Paradise</strong> là ngôi nhà của những chú gấu bông mềm mại, ấm áp và đầy cảm xúc. Thành lập vào ngày <strong>12/10/2024</strong>, chúng tôi mang trong mình sứ mệnh lan tỏa yêu thương qua từng món quà nhỏ nhắn nhưng tràn đầy ý nghĩa.
          </p>
          <p class="content_intro-text-paragraph">
            Với tinh thần “<em>Ôm trọn yêu thương – Gửi trọn tình cảm</em>”, Teddy Paradise không chỉ đơn thuần là cửa hàng gấu bông, mà là nơi gắn kết những tâm hồn thông qua các sản phẩm dễ thương, an toàn và chất lượng cao.
          </p>
          <p class="content_intro-text-paragraph">
            Chúng tôi tự hào mang đến trải nghiệm mua sắm thân thiện, đáng tin cậy và dịch vụ tận tâm, để mỗi món quà bạn chọn đều trở thành một phần ký ức ngọt ngào.
          </p>
        </div>
      </div>
    </div>

    <!-- Tầm nhìn - Giá trị -->
    <div class="intro_content">
      <h2 class="intro_content-header">Tầm nhìn - Giá trị cốt lõi</h2>
      <div class="intro_content-container">
        <div class="intro_content-container-half">
          <h3 style="margin-top: 0;font-weight: bold;">Tầm nhìn</h3>
          <p>
            Teddy Paradise hướng đến trở thành <strong>thương hiệu gấu bông và quà tặng được yêu thích nhất</strong> tại Việt Nam – nơi khách hàng luôn tìm thấy điều ngọt ngào và chân thành trong từng món quà.
          </p>
          <p>
            Chúng tôi mong muốn mỗi chú gấu bông không chỉ là một món đồ chơi, mà còn là người bạn đồng hành, là món quà lưu giữ kỷ niệm và cảm xúc.
          </p>

          <h3 style="margin-top: 35px;font-weight: bold;">Giá trị</h3>
          <p>
            <strong>Yêu thương – Tận tâm – Chất lượng – Sáng tạo</strong> là kim chỉ nam trong mọi hoạt động tại Teddy Paradise.
          </p>
          <p>
            Từng sản phẩm đều được chăm chút kỹ lưỡng từ chất liệu đến thiết kế, đảm bảo an toàn cho mọi lứa tuổi và tạo nên trải nghiệm đáng nhớ cho người nhận.
          </p>
        </div>
        <div class="intro_content-container-half">
          <img
            src="{{ asset('assets/img/DALL.png') }}"
            alt="Hình ảnh gấu bông Teddy Paradise"
            class="intro_content-container-img"
          >
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
