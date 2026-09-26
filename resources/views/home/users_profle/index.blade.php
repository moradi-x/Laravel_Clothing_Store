@extends('home.layouts.home')

@section('title')
    - صفحه پروفایل
@endsection

@section('script')
    <script>
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
                        <li class="active"> پروفایل </li>
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
                                        <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3> پروفایل </h3>
                                                <div class="account-details-form">
                                                    <form action="#">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="first-name" class="required">
                                                                        نام
                                                                    </label>
                                                                    <input type="text" id="first-name" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="last-name" class="required">
                                                                        نام خانوادگی
                                                                    </label>
                                                                    <input type="text" id="last-name" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="email" class="required"> ایمیل </label>
                                                            <input type="email" id="email" disabled />
                                                        </div>

                                                        <div class="single-input-item">
                                                            <button class="check-btn sqr-btn "> تبت تغییرات </button>
                                                        </div>

                                                    </form>
                                                    <form action="#">
                                                        <fieldset>
                                                            <legend> تغییر پسورد </legend>
                                                            <div class="single-input-item">
                                                                <label for="current-pwd" class="required">
                                                                    رمز عبور
                                                                </label>
                                                                <input type="password" id="current-pwd" />
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="new-pwd" class="required">
                                                                            رمز عبور جدید
                                                                        </label>
                                                                        <input type="password" id="new-pwd" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="confirm-pwd" class="required"> تکرار
                                                                            رمز عبور </label>
                                                                        <input type="password" id="confirm-pwd" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="single-input-item">
                                                            <button class="check-btn sqr-btn "> تغییر رمز عبور </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="orders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>سفارشات</h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th> سفارش </th>
                                                                <th> تاریخ </th>
                                                                <th> وضعیت </th>
                                                                <th> جمع کل </th>
                                                                <th> عملیات </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td> 22 تیر 1399 </td>
                                                                <td>Pending</td>
                                                                <td>
                                                                    30000
                                                                    تومان
                                                                </td>
                                                                <td><a href="#" data-toggle="modal"
                                                                        data-target="#ordersDetiles"
                                                                        class="check-btn sqr-btn "> نمایش جزئیات </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td> 22 تیر 1399 </td>
                                                                <td>Approved</td>
                                                                <td>
                                                                    50000
                                                                    تومان
                                                                </td>
                                                                <td><a href="#" data-toggle="modal"
                                                                        data-target="#ordersDetiles"
                                                                        class="check-btn sqr-btn "> نمایش جزئیات </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td> 22 تیر 1399 </td>
                                                                <td>On Hold</td>
                                                                <td>
                                                                    20000
                                                                    تومان
                                                                </td>
                                                                <td><a href="#" data-toggle="modal"
                                                                        data-target="#ordersDetiles"
                                                                        class="check-btn sqr-btn "> نمایش جزئیات </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="address" role="tabpanel">
                                            <div class="myaccount-content address-content">
                                                <h3> آدرس ها </h3>

                                                <div>
                                                    <address>
                                                        <p>
                                                            <strong> علی شیخ </strong>
                                                            <span class="mr-2"> عنوان آدرس : <span> منزل </span> </span>
                                                        </p>
                                                        <p>
                                                            خ شهید فلان ، کوچه ۸ فلان ،فرعی فلان ، پلاک فلان
                                                            <br>
                                                            <span> استان : تهران </span>
                                                            <span> شهر : تهران </span>
                                                        </p>
                                                        <p>
                                                            کدپستی :
                                                            89561257
                                                        </p>
                                                        <p>
                                                            شماره موبایل :
                                                            89561257
                                                        </p>

                                                    </address>
                                                    <a href="#" class="check-btn sqr-btn collapse-address-update">
                                                        <i class="sli sli-pencil"></i>
                                                        ویرایش آدرس
                                                    </a>

                                                    <div class="collapse-address-update-content">

                                                        <form action="#">

                                                            <div class="row">

                                                                <div class="tax-select col-lg-6 col-md-6">
                                                                    <label>
                                                                        عنوان
                                                                    </label>
                                                                    <input type="text" required="" name="title">
                                                                </div>
                                                                <div class="tax-select col-lg-6 col-md-6">
                                                                    <label>
                                                                        شماره تماس
                                                                    </label>
                                                                    <input type="text">
                                                                </div>
                                                                <div class="tax-select col-lg-6 col-md-6">
                                                                    <label>
                                                                        استان
                                                                    </label>
                                                                    <select class="email s-email s-wid">
                                                                        <option>Bangladesh</option>
                                                                        <option>Albania</option>
                                                                        <option>Åland Islands</option>
                                                                        <option>Afghanistan</option>
                                                                        <option>Belgium</option>
                                                                    </select>
                                                                </div>
                                                                <div class="tax-select col-lg-6 col-md-6">
                                                                    <label>
                                                                        شهر
                                                                    </label>
                                                                    <select class="email s-email s-wid">
                                                                        <option>Bangladesh</option>
                                                                        <option>Albania</option>
                                                                        <option>Åland Islands</option>
                                                                        <option>Afghanistan</option>
                                                                        <option>Belgium</option>
                                                                    </select>
                                                                </div>
                                                                <div class="tax-select col-lg-6 col-md-6">
                                                                    <label>
                                                                        آدرس
                                                                    </label>
                                                                    <input type="text">
                                                                </div>
                                                                <div class="tax-select col-lg-6 col-md-6">
                                                                    <label>
                                                                        کد پستی
                                                                    </label>
                                                                    <input type="text">
                                                                </div>

                                                                <div class=" col-lg-12 col-md-12">
                                                                    <button class="cart-btn-2" type="submit"> ویرایش
                                                                        آدرس
                                                                    </button>
                                                                </div>

                                                            </div>

                                                        </form>

                                                    </div>

                                                </div>

                                                <hr>

                                                <div>
                                                    <address>
                                                        <p>
                                                            <strong> علی شیخ </strong>
                                                            <span class="mr-2"> عنوان آدرس : <span> محل کار </span>
                                                            </span>
                                                        </p>
                                                        <p>
                                                            خ شهید فلان ، کوچه ۸ فلان ،فرعی فلان ، پلاک فلان
                                                            <br>
                                                            <span> استان : تهران </span>
                                                            <span> شهر : تهران </span>
                                                        </p>
                                                        <p>
                                                            کدپستی :
                                                            89561257
                                                        </p>
                                                        <p>
                                                            شماره موبایل :
                                                            89561257
                                                        </p>

                                                    </address>
                                                    <a href="#" class="check-btn sqr-btn ">
                                                        <i class="sli sli-pencil"></i>
                                                        ویرایش آدرس
                                                    </a>
                                                </div>

                                                <hr>

                                                <button class="collapse-address-create mt-3" type="submit"> ایجاد آدرس
                                                    جدید </button>
                                                <div class="collapse-address-create-content">

                                                    <form action="#">

                                                        <div class="row">

                                                            <div class="tax-select col-lg-6 col-md-6">
                                                                <label>
                                                                    عنوان
                                                                </label>
                                                                <input type="text" required="" name="title">
                                                            </div>
                                                            <div class="tax-select col-lg-6 col-md-6">
                                                                <label>
                                                                    شماره تماس
                                                                </label>
                                                                <input type="text">
                                                            </div>
                                                            <div class="tax-select col-lg-6 col-md-6">
                                                                <label>
                                                                    استان
                                                                </label>
                                                                <select class="email s-email s-wid">
                                                                    <option>Bangladesh</option>
                                                                    <option>Albania</option>
                                                                    <option>Åland Islands</option>
                                                                    <option>Afghanistan</option>
                                                                    <option>Belgium</option>
                                                                </select>
                                                            </div>
                                                            <div class="tax-select col-lg-6 col-md-6">
                                                                <label>
                                                                    شهر
                                                                </label>
                                                                <select class="email s-email s-wid">
                                                                    <option>Bangladesh</option>
                                                                    <option>Albania</option>
                                                                    <option>Åland Islands</option>
                                                                    <option>Afghanistan</option>
                                                                    <option>Belgium</option>
                                                                </select>
                                                            </div>
                                                            <div class="tax-select col-lg-6 col-md-6">
                                                                <label>
                                                                    آدرس
                                                                </label>
                                                                <input type="text">
                                                            </div>
                                                            <div class="tax-select col-lg-6 col-md-6">
                                                                <label>
                                                                    کد پستی
                                                                </label>
                                                                <input type="text">
                                                            </div>

                                                            <div class=" col-lg-12 col-md-12">

                                                                <button class="cart-btn-2" type="submit"> ثبت آدرس
                                                                </button>
                                                            </div>



                                                        </div>

                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="wishlist" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3> لیست علاقه مندی ها </h3>
                                                <form class="mt-3" action="#">
                                                    <div class="table-content table-responsive cart-table-content">
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th> تصویر محصول </th>
                                                                    <th> نام محصول </th>
                                                                    <th> حذف </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="product-thumbnail">
                                                                        <a href="#"><img
                                                                                src="assets/img/cart/cart-3.svg"
                                                                                alt=""></a>
                                                                    </td>
                                                                    <td class="product-name"><a href="#"> لورم ایپسوم
                                                                        </a>
                                                                    </td>
                                                                    <td class="product-name">
                                                                        <a href="#"> <i class="sli sli-trash" style="font-size: 20px"></i> </a>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="product-thumbnail">
                                                                        <a href="#"><img
                                                                                src="assets/img/cart/cart-4.svg"
                                                                                alt=""></a>
                                                                    </td>
                                                                    <td class="product-name"><a href="#"> لورم ایپسوم
                                                                            متن
                                                                        </a>
                                                                    </td>
                                                                    <td class="product-name">
                                                                        <a href="#"> <i class="sli sli-trash" style="font-size: 20px"></i> </a>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="product-thumbnail">
                                                                        <a href="#"><img
                                                                                src="assets/img/cart/cart-5.svg"
                                                                                alt=""></a>
                                                                    </td>
                                                                    <td class="product-name"><a href="#"> لورم ایپسوم
                                                                        </a>
                                                                    </td>
                                                                    <td class="product-name">
                                                                        <a href="#"> <i class="sli sli-trash" style="font-size: 20px"></i> </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="comments" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3> نظرات </h3>
                                                <div class="review-wrapper">

                                                    <div class="single-review">
                                                        <div class="review-img">
                                                            <img src="assets/img/product-details/client-1.jpg" alt="">
                                                        </div>
                                                        <div class="review-content w-100 text-right">
                                                            <p class="text-right">
                                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت
                                                                چاپ و با
                                                                استفاده از طراحان گرافیک است.
                                                            </p>
                                                            <div class="review-top-wrap">
                                                                <div class="review-name d-flex align-items-center">
                                                                    <h4>
                                                                        برای محصول :
                                                                    </h4>
                                                                    <a class="mr-1" href="#" style="color:#ff3535;">
                                                                        لورم ایپسوم </a>
                                                                </div>
                                                                <div>
                                                                    در تاریخ :
                                                                    22 تیر 1399
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="single-review">
                                                        <div class="review-img">
                                                            <img src="assets/img/product-details/client-2.jpg" alt="">
                                                        </div>
                                                        <div class="review-content w-100 text-right">
                                                            <p class="text-right">
                                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت
                                                                چاپ و با
                                                                استفاده از طراحان گرافیک است. چاپگرها و متون بلکه
                                                                روزنامه و مجله در
                                                                ستون و سطرآنچنان که لازم است
                                                            </p>
                                                            <div class="review-top-wrap text-right">
                                                                <div class="review-name d-flex align-items-center">
                                                                    <h4>
                                                                        برای محصول :
                                                                        <a class="mr-1" href="#" style="color:#ff3535;">
                                                                            لورم ایپسوم </a>
                                                                    </h4>
                                                                </div>
                                                                <div>
                                                                    در تاریخ :
                                                                    22 تیر 1399
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="single-review">
                                                        <div class="review-img">
                                                            <img src="assets/img/product-details/client-1.jpg" alt="">
                                                        </div>
                                                        <div class="review-content w-100 text-right">
                                                            <p class="text-right">
                                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت
                                                                چاپ و با
                                                                استفاده از طراحان گرافیک است.
                                                            </p>
                                                            <div class="review-top-wrap">
                                                                <div class="review-name d-flex align-items-center">
                                                                    <h4>
                                                                        برای محصول :
                                                                    </h4>
                                                                    <a class="mr-1" href="#" style="color:#ff3535;">
                                                                        لورم ایپسوم </a>
                                                                </div>
                                                                <div>
                                                                    در تاریخ :
                                                                    22 تیر 1399
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div> <!-- Single Tab Content End -->

                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->

        <!-- Modal Order -->
        <div class="modal fade" id="ordersDetiles" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12" style="direction: rtl;">
                                <form action="#">
                                    <div class="table-content table-responsive cart-table-content">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th> تصویر محصول </th>
                                                    <th> نام محصول </th>
                                                    <th> فی </th>
                                                    <th> تعداد </th>
                                                    <th> قیمت کل </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <a href="#"><img src="assets/img/cart/cart-3.svg" alt=""></a>
                                                    </td>
                                                    <td class="product-name"><a href="#"> لورم ایپسوم </a></td>
                                                    <td class="product-price-cart"><span class="amount">
                                                            20000
                                                            تومان
                                                        </span></td>
                                                    <td class="product-quantity">
                                                        2
                                                    </td>
                                                    <td class="product-subtotal">
                                                        40000
                                                        تومان
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <a href="#"><img src="assets/img/cart/cart-4.svg" alt=""></a>
                                                    </td>
                                                    <td class="product-name"><a href="#"> لورم ایپسوم متن ساختگی </a>
                                                    </td>
                                                    <td class="product-price-cart"><span class="amount">
                                                            10000
                                                            تومان
                                                        </span></td>
                                                    <td class="product-quantity">
                                                        3
                                                    </td>
                                                    <td class="product-subtotal">
                                                        30000
                                                        تومان
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <a href="#"><img src="assets/img/cart/cart-5.svg" alt=""></a>
                                                    </td>
                                                    <td class="product-name"><a href="#"> لورم ایپسوم </a></td>
                                                    <td class="product-price-cart"><span class="amount">
                                                            40000
                                                            تومان
                                                        </span></td>
                                                    <td class="product-quantity">
                                                        2
                                                    </td>
                                                    <td class="product-subtotal">
                                                        80000
                                                        تومان
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->

@endsection