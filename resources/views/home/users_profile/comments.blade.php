@extends('home.layouts.home')

@section('title')
    - صفحه پروفایل
@endsection

@section('script')
    <script></script>
@endsection

@section('content')
    <div class="breadcrumb-area pt-35 pb-35 bg-gray" style="direction: rtl;">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="{{ route('home.index') }}">صفحه ای اصلی</a>
                    </li>
                    <li class="active"> نظرات </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- my account wrapper start -->
    <div class="my-account-wrapper pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row text-right" style="direction: rtl;">
                            <div class="col-lg-3 col-md-4">
                                @include('home.sections.profile_sidebar')
                            </div>
                            <!-- My Account Tab Menu End -->
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">

                                    <!-- Single Tab Content Start -->
                                    <div class="myaccount-content">
                                        <h3> نظرات </h3>
                                        <div class="review-wrapper">

                                            @if ($comments->isEmpty())
                                                <div class="alert alert-danger">
                                                    لیست  نظرات  شما خالی میباشد
                                                </div>
                                            @else
                                                @foreach ($comments as $comment)
                                                    <div class="single-review">
                                                        <div class="review-img">
                                                            <img src="{{ $comment->user->avatar == null ? asset('/images/home/user.png') : $comment->user->avatar }}"
                                                                alt="">
                                                        </div>
                                                        <div class="review-content w-100 text-right">
                                                            <p class="text-right">
                                                                {{ $comment->text }}
                                                            </p>
                                                            <div class="review-top-wrap">
                                                                <div class="review-name d-flex align-items-center">
                                                                    <h4>
                                                                        برای محصول :
                                                                    </h4>
                                                                    <a class="mr-1"
                                                                        href="{{ route('home.products.show', ['product' => $comment->product->slug]) }}"
                                                                        style="color:#ff3535;">
                                                                        {{ $comment->product->name }}
                                                                    </a>
                                                                </div>
                                                                <div>
                                                                    در تاریخ :
                                                                    {{ verta($comment->created_at)->format('%d %B، %Y ') }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->

@endsection
