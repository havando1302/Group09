@extends('layouts.app')

@section('content')
 <div class="grid">
            <div class="contact_container">
                <div class="contact_container-map">
                    <div class="contact_container-content">
                        <h2 class="contact_container-heading">LIÊN HỆ HỖ TRỢ</h2>
                        <div class="contact_container-text">
                            <p style="margin-top: 0;">Mọi thắc mắc xin của quý khách xin vui lòng liên hệ bộ phận hỗ trợ
                                của chúng tôi hoặc có thể để lại thông tin bên dưới form ” THÔNG TIN LIÊN HỆ ” chúng tôi
                                sẽ liên hệ với bạn trong thời gian sớm nhất. Cảm ơn bạn!</p>
                        </div>
                        <div class="contact_container-text">
                            <p class="contact_container-text-heading">Hotline:</p>
                            <p>+84 904 091 648</p>
                        </div>
                        <div class="contact_container-text">
                            <p class="contact_container-text-heading">Email:</p>
                            <p>23010338@st.phenikaa-uni.edu.vn</p>
                        </div>
                        <div class="contact_container-text">
                            <p class="contact_container-text-heading">Facebook:</p>
                            <p>Phạm Hồng Đức</p>
                        </div>
                    </div>

                    <div class="contact_container-content">
                        <h2 class="contact_container-heading">VỊ TRÍ CỬA HÀNG</h2>
                        <div class="contact_container-google-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.9928401242313!2d105.7461115!3d20.9626112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313452efff394ce3%3A0x391a39d4325be464!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBQaGVuaWthYQ!5e0!3m2!1svi!2s!4v1693737315780!5m2!1svi!2s"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>

                <div class="contact_container-info">
                    <h2 class="contact_container-info-heading">THÔNG TIN LIÊN HỆ</h2>
                    <div class="contact_container-form">
                        <div class="auth_form-group">
                            <input type="text" class="auth_form-input" placeholder="Họ và tên">
                        </div>
                        <div class="auth_form-group">
                            <input type="text" class="auth_form-input" placeholder="Tên đăng nhập">
                        </div>
                        <div class="auth_form-group">
                            <input type="text" class="auth_form-input" placeholder="Số điện thoại">
                        </div>
                    </div>
                    <button class="contact_container-info-btn">ĐĂNG KÝ</button>
                </div>
            </div>
        </div>
@endsection
