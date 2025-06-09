@extends('layouts.app')

@section('content')
    <style>
        .contact_container {
            margin-top: 150px;
        }

        .contact_container-map {
            display: flex;
            flex-wrap: wrap;
            padding-bottom: 90px;
            border-bottom: 3px solid #e6e6e6;
        }

        .contact_container-content {
            width: 100%;
            max-width: 50%;
            padding: 0 30px;
            box-sizing: border-box;
        }

        .contact_container-heading {
            margin: 0 0 30px 0;
            padding-bottom: 16px;
            display: inline-block;
            font-size: 2.4rem;
            border-bottom: 2px solid #d4d4d4;
        }

        .contact_container-text {
            display: flex;
            margin-bottom: 10px;
        }

        .contact_container-text-heading {
            font-weight: bold;
            margin-right: 6px;
        }

        .contact_container-content p {
            font-size: 1.6rem;
            color: var(--text-color, #333);
            line-height: 24px;
        }

        .contact_container-google-map {
            height: 250px;
            width: 100%;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        @media screen and (max-width: 768px) {
            .contact_container-content {
                max-width: 100%;
                margin-bottom: 30px;
            }
        }
    </style>

    <div class="grid">
        <div class="contact_container">
            <div class="contact_container-map">
                <!-- THÔNG TIN LIÊN HỆ -->
                <div class="contact_container-content">
                    <h2 class="contact_container-heading">LIÊN HỆ HỖ TRỢ</h2>

                   

                    @if ($contact)
                    <div class="contact_container-text">
                            <p class="contact_container-text-heading"></p>
                            <p>{{ $contact->description }}</p>
                        </div>
                        <div class="contact_container-text">
                            <p class="contact_container-text-heading">Hotline:</p>
                            <p>{{ $contact->hotline }}</p>
                        </div>
                        <div class="contact_container-text">
                            <p class="contact_container-text-heading">Email:</p>
                            <p>{{ $contact->email }}</p>
                        </div>
                        <div class="contact_container-text">
                            <p class="contact_container-text-heading">Facebook:</p>
                            <p><a href="https://{{ $contact->facebook }}" target="_blank">{{ $contact->facebook }}</a></p>
                        </div>
                        <div class="contact_container-text">
                            <p class="contact_container-text-heading">Địa chỉ:</p>
                            <p>{{ $contact->address }}</p>
                        </div>
                        
                    @else
                        <p>Thông tin liên hệ chưa được cập nhật.</p>
                    @endif
                </div>

                <!-- GOOGLE MAP -->
                <div class="contact_container-content">
                    <h2 class="contact_container-heading">VỊ TRÍ CỬA HÀNG</h2>
                    <div class="contact_container-google-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.9928401242313!2d105.7461115!3d20.9626112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313452efff394ce3%3A0x391a39d4325be464!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBQaGVuaWthYQ!5e0!3m2!1svi!2s!4v1693737315780!5m2!1svi!2s"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
