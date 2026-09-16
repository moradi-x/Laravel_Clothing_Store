@extends('home.layouts.home')

@section('title')
    - صفحه ورود
@endsection
@section('script')
@endsection

@section('content')
    <div class="breadcrumb-area pt-35 pb-35 bg-gray" style="direction: rtl;">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="{{ route('home.index') }}">صفحه ی اصلی</a>
                    </li>
                    <li class="active"> ورود </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="login-register-area pt-100 pb-100" style="direction: rtl;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-toggle="tab" href="#lg1">
                                <h4> عضویت </h4>
                            </a> 
                            
                        </div>
                        <div class="tab-content">
                            <div id="lg2" class="tab-pane active ">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="#" method="post">
                                            <input name="name" placeholder="نام" type="email">
                                            <input name="user-email" placeholder="ایمیل" type="email">
                                            <input type="password" name="user-password" placeholder="رمز عبور">
                                            <input type="text" name="user-name" placeholder="تکرار رمز عبور">
                                            <div class="button-box">
                                                <button type="submit">عضویت</button>
                                                <a href="index.html" class="btn btn-google btn-block mt-4">
                                                    <i class="sli sli-social-google"></i>
                                                    ایجاد اکانت با گوگل
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
