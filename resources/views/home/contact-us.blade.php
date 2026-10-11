@extends('home.layouts.home')

@section('title')
    صفحه تماس با ما
@endsection

@section('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
@endsection


@section('script')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const latitude = {{ (float) $setting->latitude }};
            const longitude = {{ (float) $setting->longitude }};

            const map = L.map('map').setView([latitude, longitude], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            L.marker([latitude, longitude])
                .addTo(map)
                .bindPopup(@json($setting->address))
                .openPopup();
        });
    </script>
@endsection


@section('content')
    <div class="breadcrumb-area pt-35 pb-35 bg-gray" style="direction: rtl;">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="{{ route('home.index') }}">صفحه ای اصلی</a>
                    </li>
                    <li class="active">فروشگاه </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="contact-area pt-100 pb-100">
        <div class="container">
            <div class="row text-right" style="direction: rtl;">
                <div class="col-lg-5 col-md-6">
                    <div class="contact-info-area">
                        <h2> لورم ایپسوم متن </h2>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است.
                        </p>
                        <div class="contact-info-wrap">
                            <div class="single-contact-info">
                                <div class="contact-info-icon">
                                    <i class="sli sli-location-pin"></i>
                                </div>
                                <div class="contact-info-content">
                                    <p> {{ $setting->address }} </p>
                                </div>
                            </div>

                            <div class="single-contact-info">
                                <div class="contact-info-icon">
                                    <i class="sli sli-share"></i>
                                </div>

                                <div class="contact-info-content">
                                    <p class=" mb-3">
                                        ما را در شبکه‌های اجتماعی دنبال کنید
                                    </p>

                                    <div style="display: flex; align-items: center; gap: 12px; direction: rtl;">

                                        <a href="{{ $setting->instagram }}" target="_blank" rel="noopener noreferrer"
                                            aria-label="اینستاگرام"
                                            style="display:flex; align-items:center; justify-content:center; width:48px; height:48px; border-radius:14px; color:white; background:linear-gradient(45deg,#feda75,#fa7e1e,#d62976,#962fbf,#4f5bd5); text-decoration:none; box-shadow:0 4px 12px #0002;">

                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2">
                                                <rect x="3" y="3" width="18" height="18" rx="5" />
                                                <circle cx="12" cy="12" r="4" />
                                                <circle cx="17.5" cy="6.5" r="1" fill="currentColor"
                                                    stroke="none" />
                                            </svg>
                                        </a>

                                        <a href="{{ $setting->telegram }}" target="_blank" rel="noopener noreferrer"
                                            aria-label="تلگرام"
                                            style="display:flex; align-items:center; justify-content:center; width:48px; height:48px; border-radius:14px; color:white; background:#229ED9; text-decoration:none; box-shadow:0 4px 12px #0002;">

                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M21.8 3.2a1.5 1.5 0 0 0-1.6-.3L2.8 9.7c-1.2.5-1.1 2.2.1 2.6l4.4 1.4 1.7 5.1c.4 1.1 1.8 1.3 2.5.4l2.5-3.1 4.3 3.1c.9.6 2.1.1 2.3-1l2.1-13.4a1.6 1.6 0 0 0-.9-1.6ZM9 13.1l8.5-6.2-6.9 7.7-.4 3-1.2-3.8Z" />
                                            </svg>
                                        </a>

                                    </div>
                                </div>
                            </div>



                            <div class="single-contact-info">
                                <div class="contact-info-icon">
                                    <i class="sli sli-screen-smartphone"></i>
                                </div>
                                <div class="contact-info-content">
                                    <p style="direction: ltr;"> {{ $setting->telephone }} / {{ $setting->telephone2 }} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="contact-from contact-shadow">
                        <form id="contact-form" action="{{ route('home.contact-us.form') }}" method="post">
                            @csrf
                            <input name="name" type="text" placeholder="نام شما" value="{{ old('name') }}">
                            @error('name')
                                <div class="input-error-validation">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <input name="email" type="email" placeholder="ایمیل شما " value="{{ old('email') }}">
                            @error('email')
                                <div class="input-error-validation">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <input name="subject" type="text" placeholder="موضوع پیام " value="{{ old('subject') }}">
                            @error('subject')
                                <div class="input-error-validation">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <textarea name="text" placeholder="متن پیام">{{ old('text') }}</textarea>
                            @error('text')
                                <div class="input-error-validation">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <div id="contact_us_id"></div>
                            @error('g-recaptcha-response')
                                <div class="input-error-validation">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <button class="submit" type="submit"> ارسال پیام </button>
                        </form>

                        {!! GoogleReCaptchaV3::renderOne('contact_us_id', 'contact_us') !!}
                    </div>
                </div>
            </div>
            <div class="contact-map pt-100">
                <div id="map" style="height: 400px; width: 100%; border-radius: 12px; overflow: hidden;"></div>

                <div style="text-align: center; margin-top: 20px;">
                    <a href="https://nshn.ir/?lat={{ $setting->latitude }}&lng={{ $setting->longitude }}"
                        style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; border-radius: 10px; background: #229ED9; color: #fff; text-decoration: none; font-weight: 600;">
                        مسیریابی تا فروشگاه
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
