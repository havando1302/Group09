@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    background-color: #fff;
    line-height: 1.6;
  }

  .grid {
    width: 100%;
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 20px;
  }

  .content_banner img {
    width: 100%;
    height: auto;
    display: block;
    margin-bottom: 40px;
  }

  .content_introduce {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 30px;
    margin-bottom: 60px;
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
  }

  .content_section {
    text-align: center;
    margin-bottom: 60px;
  }

  .content_section-heading {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 40px;
  }

  .content_section-benefit {
    display: inline-block;
    width: 240px;
    margin: 0 10px 30px;
    vertical-align: top;
  }

  .content_section-benefit-background {
    width: 100px;
    height: 100px;
    margin: 0 auto 15px;
  }

  .content_section-benefit-image {
    width: 100%;
    height: auto;
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
</style>

<div class="grid">
  <div class="content_banner">
    <img src="{{ asset('storage/products/DALL.png') }}" alt="Banner">
  </div>

  <div class="content_introduce">
    <div class="content_logo">
      <img src="{{ asset('storage/products/Gemini_Generated_Image_opu087opu087opu0-fotor-20241009172321.jpg') }}" alt="Logo" class="content_logo-image">
    </div>
    <div class="content_intro-text">
      <p class="content_intro-text-paragraph">
        **Teddy Paradise** là điểm đến lý tưởng cho những tín đồ yêu thích gấu bông, với sứ mệnh mang đến cho người tiêu dùng Việt Nam những sản phẩm gấu bông chất lượng cao, đáng yêu và phong phú. Chúng tôi không chỉ cung cấp những món đồ chơi dễ thương, mà còn gửi gắm vào đó tình yêu, sự chăm sóc và niềm vui cho mỗi khách hàng.
      </p>
      <p class="content_intro-text-paragraph">
        Với phương châm “Yêu Thương – Chất Lượng”, Teddy Paradise không ngừng nỗ lực để phát triển và cải thiện sản phẩm cũng như dịch vụ của mình. Chúng tôi cam kết mang đến cho khách hàng những trải nghiệm tuyệt vời với mỗi sản phẩm gấu bông.
      </p>
      <p class="content_intro-text-paragraph">
        Chúng tôi luôn đặt khách hàng làm trung tâm. Mỗi sản phẩm từ Teddy Paradise không chỉ là một món quà, mà còn là biểu tượng của sự quan tâm và tình yêu, mang lại giá trị cảm xúc cho người nhận. Với 100% sản phẩm được làm từ chất liệu an toàn, chúng tôi tự hào là điểm đến tin cậy cho những ai yêu thích và tìm kiếm những chú gấu bông đáng yêu.
      </p>
    </div>
  </div>

  <div class="content_section">
    <h2 class="content_section-heading">LÝ DO BẠN NÊN MUA SẢN PHẨM CỦA CHÚNG TÔI</h2>

    <div class="content_section-benefit">
      <div class="content_section-benefit-background">
        <img src="https://lenxinhxiu.com/wp-content/uploads/2024/07/1.png" alt="Lợi ích 1" class="content_section-benefit-image">
      </div>
      <div class="content_section-benefit-text">
        <h3 class="content_section-benefit-text-heading">GIAO HÀNG HỎA TỐC</h3>
        <p class="content_section-benefit-text-paragraph">THỜI GIAN GIAO HÀNG NHANH CHÓNG</p>
      </div>
    </div>

    <div class="content_section-benefit">
      <div class="content_section-benefit-background">
        <img src="https://lenxinhxiu.com/wp-content/uploads/2024/07/2-1.jpg" alt="Lợi ích 2" class="content_section-benefit-image">
      </div>
      <div class="content_section-benefit-text">
        <h3 class="content_section-benefit-text-heading">CHĂM SÓC KHÁCH HÀNG</h3>
        <p class="content_section-benefit-text-paragraph">CHĂM SÓC KHÁCH HÀNG 24/7</p>
      </div>
    </div>

    <div class="content_section-benefit">
      <div class="content_section-benefit-background">
        <img src="https://lenxinhxiu.com/wp-content/uploads/2024/07/3.png" alt="Lợi ích 3" class="content_section-benefit-image">
      </div>
      <div class="content_section-benefit-text">
        <h3 class="content_section-benefit-text-heading">CHÍNH SÁCH ĐỔI TRẢ</h3>
        <p class="content_section-benefit-text-paragraph">1 ĐỔI 1 TRONG VÒNG 3 NGÀY NẾU HÀNG LỖI</p>
      </div>
    </div>

    <div class="content_section-benefit">
      <div class="content_section-benefit-background">
        <img src="https://lenxinhxiu.com/wp-content/uploads/2024/07/4-1.jpg" alt="Lợi ích 4" class="content_section-benefit-image">
      </div>
      <div class="content_section-benefit-text">
        <h3 class="content_section-benefit-text-heading">THANH TOÁN AN TOÀN</h3>
        <p class="content_section-benefit-text-paragraph">BẢO MẬT THÔNG TIN KHÁCH HÀNG</p>
      </div>
    </div>
  </div>
</div>
@endsection