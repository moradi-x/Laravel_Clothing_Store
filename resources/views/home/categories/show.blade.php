@extends('home.layouts.home')

@section('title')
    - صفحه فروشگاه
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

    <div class="shop-area pt-95 pb-100">
      <div class="container">
        <div class="row flex-row-reverse text-right">

          <!-- sidebar -->
          <div class="col-lg-3 order-2 order-sm-2 order-md-1">
            <div class="sidebar-style mr-30">
              <div class="sidebar-widget">
                <h4 class="pro-sidebar-title">جستجو </h4>
                <div class="pro-sidebar-search mb-50 mt-25">
                  <form class="pro-sidebar-search-form" action="#">
                    <input type="text" placeholder="... جستجو ">
                    <button>
                      <i class="sli sli-magnifier"></i>
                    </button>
                  </form>
                </div>
              </div>
              <div class="sidebar-widget">
                <h4 class="pro-sidebar-title"> دسته بندی </h4>
                <div class="sidebar-widget-list mt-30">
                  <ul>
                    {{ $category->parent->name }}
                    @foreach ($category->parent->children as $childCategory)
                       <li>
                         <a href="{{ route('home.categories.show', ['category' => $childCategory->slug]) }}" 
                           style=" {{ $childCategory->slug == $category->slug ? 'color: #ff3535' : '' }}" >
                            {{ $childCategory->name }}
                        </a>
                       </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <hr>

              <div class="sidebar-widget mt-30">
                <h4 class="pro-sidebar-title">رنگ </h4>
                <div class="sidebar-widget-list mt-20">
                  <ul>
                    <li>
                      <div class="sidebar-widget-list-left">
                        <input type="checkbox" value=""> <a href="#">سبز </a>
                        <span class="checkmark"></span>
                      </div>
                    </li>
                    <li>
                      <div class="sidebar-widget-list-left">
                        <input type="checkbox" value=""> <a href="#">کرم </a>
                        <span class="checkmark"></span>
                      </div>
                    </li>
                    <li>
                      <div class="sidebar-widget-list-left">
                        <input type="checkbox" value=""> <a href="#">آبی </a>
                        <span class="checkmark"></span>
                      </div>
                    </li>
                    <li>
                      <div class="sidebar-widget-list-left">
                        <input type="checkbox" value=""> <a href="#">مشکی </a>
                        <span class="checkmark"></span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <hr>
              <div class="sidebar-widget mt-30">
                <h4 class="pro-sidebar-title">سایز </h4>
                <div class="sidebar-widget-list mt-20">
                  <ul>
                    <li>
                      <div class="sidebar-widget-list-left">
                        <input type="checkbox" value=""> <a href="#">XL </a>
                        <span class="checkmark"></span>
                      </div>
                    </li>
                    <li>
                      <div class="sidebar-widget-list-left">
                        <input type="checkbox" value=""> <a href="#">L </a>
                        <span class="checkmark"></span>
                      </div>
                    </li>
                    <li>
                      <div class="sidebar-widget-list-left">
                        <input type="checkbox" value=""> <a href="#">SM </a>
                        <span class="checkmark"></span>
                      </div>
                    </li>
                    <li>
                      <div class="sidebar-widget-list-left">
                        <input type="checkbox" value=""> <a href="#">XXL </a>
                        <span class="checkmark"></span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>

            </div>
          </div>

          <!-- content -->
          <div class="col-lg-9 order-1 order-sm-1 order-md-2">
            <!-- shop-top-bar -->
            <div class="shop-top-bar" style="direction: rtl;">

              <div class="select-shoing-wrap">
                <div class="shop-select">
                  <select>
                    <option value=""> مرتب سازی </option>
                    <option value=""> بیشترین قیمت </option>
                    <option value=""> کم ترین قیمت </option>
                    <option value=""> جدیدترین </option>
                    <option value=""> قدیمی ترین </option>
                  </select>
                </div>

              </div>

            </div>

            <div class="shop-bottom-area mt-35">
              <div class="tab-content jump">

                <div class="row ht-products" style="direction: rtl;">
                  <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                    <!--Product Start-->
                    <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                      <div class="ht-product-inner">
                        <div class="ht-product-image-wrap">
                          <a href="product-details.html" class="ht-product-image">
                            <img src="assets/img/product/product-1.svg" alt="Universal Product Style" />
                          </a>
                          <div class="ht-product-action">
                            <ul>
                              <li>
                                <a href="#" data-toggle="modal" data-target="#exampleModal"><i
                                    class="sli sli-magnifier"></i><span class="ht-product-action-tooltip"> مشاهده سریع
                                  </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">
                                    افزودن به علاقه مندی ها </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">
                                    مقایسه </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip"> افزودن
                                    به سبد خرید </span></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="ht-product-content">
                          <div class="ht-product-content-inner">
                            <div class="ht-product-categories">
                              <a href="#">لورم</a>
                            </div>
                            <h4 class="ht-product-title text-right">
                              <a href="product-details.html"> لورم ایپسوم </a>
                            </h4>
                            <div class="ht-product-price">
                              <span class="new">
                                55,000
                                تومان
                              </span>
                              <span class="old">
                                75,000
                                تومان
                              </span>
                            </div>
                            <div class="ht-product-ratting-wrap">
                              <span class="ht-product-ratting">
                                <span class="ht-product-user-ratting" style="width: 100%;">
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                </span>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                              </span>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!--Product End-->
                  </div>
                  <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                    <!--Product Start-->
                    <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                      <div class="ht-product-inner">
                        <div class="ht-product-image-wrap">
                          <a href="product-details.html" class="ht-product-image">
                            <img src="assets/img/product/product-2.svg" alt="Universal Product Style" />
                          </a>
                          <div class="ht-product-action">
                            <ul>
                              <li>
                                <a href="#" data-toggle="modal" data-target="#exampleModal"><i
                                    class="sli sli-magnifier"></i><span class="ht-product-action-tooltip"> مشاهده سریع
                                  </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">
                                    افزودن به
                                    علاقه مندی ها </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">
                                    مقایسه
                                  </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip"> افزودن
                                    به سبد
                                    خرید </span></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="ht-product-content">
                          <div class="ht-product-content-inner">
                            <div class="ht-product-categories">
                              <a href="#">لورم </a>
                            </div>
                            <h4 class="ht-product-title text-right">
                              <a href="product-details.html">لورم ایپسوم</a>
                            </h4>
                            <div class="ht-product-price">
                              <span class="new">
                                25,000
                                تومان
                              </span>
                            </div>
                            <div class="ht-product-ratting-wrap">
                              <span class="ht-product-ratting">
                                <span class="ht-product-user-ratting" style="width: 100%;">
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                </span>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                              </span>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!--Product End-->
                  </div>
                  <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                    <!--Product Start-->
                    <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                      <div class="ht-product-inner">
                        <div class="ht-product-image-wrap">
                          <a href="product-details.html" class="ht-product-image">
                            <img src="assets/img/product/product-3.svg" alt="Universal Product Style" />
                          </a>
                          <div class="ht-product-action">
                            <ul>
                              <li>
                                <a href="#" data-toggle="modal" data-target="#exampleModal"><i
                                    class="sli sli-magnifier"></i><span class="ht-product-action-tooltip"> مشاهده سریع
                                  </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">
                                    افزودن به
                                    علاقه مندی ها </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">
                                    مقایسه
                                  </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip"> افزودن
                                    به سبد
                                    خرید </span></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="ht-product-content">
                          <div class="ht-product-content-inner">
                            <div class="ht-product-categories">
                              <a href="#">لورم</a>
                            </div>
                            <h4 class="ht-product-title text-right">
                              <a href="product-details.html">لورم ایپسوم</a>
                            </h4>
                            <div class="ht-product-price">
                              <span class="new">
                                60,000
                                تومان
                              </span>
                              <span class="old">
                                90,000
                                تومان
                              </span>
                            </div>
                            <div class="ht-product-ratting-wrap">
                              <span class="ht-product-ratting">
                                <span class="ht-product-user-ratting" style="width: 100%;">
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                </span>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                              </span>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!--Product End-->
                  </div>
                  <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                    <!--Product Start-->
                    <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                      <div class="ht-product-inner">
                        <div class="ht-product-image-wrap">
                          <a href="product-details.html" class="ht-product-image">
                            <img src="assets/img/product/product-4.svg" alt="Universal Product Style" />
                          </a>
                          <div class="ht-product-action">
                            <ul>
                              <li>
                                <a href="#" data-toggle="modal" data-target="#exampleModal"><i
                                    class="sli sli-magnifier"></i><span class="ht-product-action-tooltip"> مشاهده سریع
                                  </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">
                                    افزودن به
                                    علاقه مندی ها </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">
                                    مقایسه
                                  </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip"> افزودن
                                    به سبد
                                    خرید </span></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="ht-product-content">
                          <div class="ht-product-content-inner">
                            <div class="ht-product-categories">
                              <a href="#">لورم</a>
                            </div>
                            <h4 class="ht-product-title text-right">
                              <a href="product-details.html">لورم ایپسوم</a>
                            </h4>
                            <div class="ht-product-price">
                              <span class="new">
                                60,000
                                تومان
                              </span>
                            </div>
                            <div class="ht-product-ratting-wrap">
                              <span class="ht-product-ratting">
                                <span class="ht-product-user-ratting" style="width: 100%;">
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                </span>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Product End-->
                  </div>
                  <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                    <!--Product Start-->
                    <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                      <div class="ht-product-inner">
                        <div class="ht-product-image-wrap">
                          <a href="product-details.html" class="ht-product-image">
                            <img src="assets/img/product/product-2.svg" alt="Universal Product Style" />
                          </a>
                          <div class="ht-product-action">
                            <ul>
                              <li>
                                <a href="#" data-toggle="modal" data-target="#exampleModal"><i
                                    class="sli sli-magnifier"></i><span class="ht-product-action-tooltip"> مشاهده سریع
                                  </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">
                                    افزودن به
                                    علاقه مندی ها </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">
                                    مقایسه
                                  </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip"> افزودن
                                    به سبد
                                    خرید </span></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="ht-product-content">
                          <div class="ht-product-content-inner">
                            <div class="ht-product-categories">
                              <a href="#">لورم </a>
                            </div>
                            <h4 class="ht-product-title text-right">
                              <a href="product-details.html">لورم ایپسوم</a>
                            </h4>
                            <div class="ht-product-price">
                              <span class="new">
                                60,000
                                تومان
                              </span>
                            </div>
                            <div class="ht-product-ratting-wrap">
                              <span class="ht-product-ratting">
                                <span class="ht-product-user-ratting" style="width: 100%;">
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                </span>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Product End-->
                  </div>
                  <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                    <!--Product Start-->
                    <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                      <div class="ht-product-inner">
                        <div class="ht-product-image-wrap">
                          <a href="product-details.html" class="ht-product-image">
                            <img src="assets/img/product/product-1.svg" alt="Universal Product Style" />
                          </a>
                          <div class="ht-product-action">
                            <ul>
                              <li>
                                <a href="#" data-toggle="modal" data-target="#exampleModal"><i
                                    class="sli sli-magnifier"></i><span class="ht-product-action-tooltip"> مشاهده سریع
                                  </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">
                                    افزودن به علاقه مندی ها </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">
                                    مقایسه </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip"> افزودن
                                    به سبد خرید </span></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="ht-product-content">
                          <div class="ht-product-content-inner">
                            <div class="ht-product-categories">
                              <a href="#">لورم</a>
                            </div>
                            <h4 class="ht-product-title text-right">
                              <a href="product-details.html"> لورم ایپسوم </a>
                            </h4>
                            <div class="ht-product-price">
                              <span class="new">
                                55,000
                                تومان
                              </span>
                              <span class="old">
                                75,000
                                تومان
                              </span>
                            </div>
                            <div class="ht-product-ratting-wrap">
                              <span class="ht-product-ratting">
                                <span class="ht-product-user-ratting" style="width: 100%;">
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                </span>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                              </span>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!--Product End-->
                  </div>
                  <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                    <!--Product Start-->
                    <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                      <div class="ht-product-inner">
                        <div class="ht-product-image-wrap">
                          <a href="product-details.html" class="ht-product-image">
                            <img src="assets/img/product/product-2.svg" alt="Universal Product Style" />
                          </a>
                          <div class="ht-product-action">
                            <ul>
                              <li>
                                <a href="#" data-toggle="modal" data-target="#exampleModal"><i
                                    class="sli sli-magnifier"></i><span class="ht-product-action-tooltip"> مشاهده سریع
                                  </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">
                                    افزودن به
                                    علاقه مندی ها </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">
                                    مقایسه
                                  </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip"> افزودن
                                    به سبد
                                    خرید </span></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="ht-product-content">
                          <div class="ht-product-content-inner">
                            <div class="ht-product-categories">
                              <a href="#">لورم </a>
                            </div>
                            <h4 class="ht-product-title text-right">
                              <a href="product-details.html">لورم ایپسوم</a>
                            </h4>
                            <div class="ht-product-price">
                              <span class="new">
                                25,000
                                تومان
                              </span>
                            </div>
                            <div class="ht-product-ratting-wrap">
                              <span class="ht-product-ratting">
                                <span class="ht-product-user-ratting" style="width: 100%;">
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                </span>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                              </span>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!--Product End-->
                  </div>
                  <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                    <!--Product Start-->
                    <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                      <div class="ht-product-inner">
                        <div class="ht-product-image-wrap">
                          <a href="product-details.html" class="ht-product-image">
                            <img src="assets/img/product/product-3.svg" alt="Universal Product Style" />
                          </a>
                          <div class="ht-product-action">
                            <ul>
                              <li>
                                <a href="#" data-toggle="modal" data-target="#exampleModal"><i
                                    class="sli sli-magnifier"></i><span class="ht-product-action-tooltip"> مشاهده سریع
                                  </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">
                                    افزودن به
                                    علاقه مندی ها </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">
                                    مقایسه
                                  </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip"> افزودن
                                    به سبد
                                    خرید </span></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="ht-product-content">
                          <div class="ht-product-content-inner">
                            <div class="ht-product-categories">
                              <a href="#">لورم</a>
                            </div>
                            <h4 class="ht-product-title text-right">
                              <a href="product-details.html">لورم ایپسوم</a>
                            </h4>
                            <div class="ht-product-price">
                              <span class="new">
                                60,000
                                تومان
                              </span>
                              <span class="old">
                                90,000
                                تومان
                              </span>
                            </div>
                            <div class="ht-product-ratting-wrap">
                              <span class="ht-product-ratting">
                                <span class="ht-product-user-ratting" style="width: 100%;">
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                </span>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                              </span>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!--Product End-->
                  </div>
                  <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                    <!--Product Start-->
                    <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                      <div class="ht-product-inner">
                        <div class="ht-product-image-wrap">
                          <a href="product-details.html" class="ht-product-image">
                            <img src="assets/img/product/product-2.svg" alt="Universal Product Style" />
                          </a>
                          <div class="ht-product-action">
                            <ul>
                              <li>
                                <a href="#" data-toggle="modal" data-target="#exampleModal"><i
                                    class="sli sli-magnifier"></i><span class="ht-product-action-tooltip"> مشاهده سریع
                                  </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">
                                    افزودن به
                                    علاقه مندی ها </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">
                                    مقایسه
                                  </span></a>
                              </li>
                              <li>
                                <a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip"> افزودن
                                    به سبد
                                    خرید </span></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="ht-product-content">
                          <div class="ht-product-content-inner">
                            <div class="ht-product-categories">
                              <a href="#">لورم </a>
                            </div>
                            <h4 class="ht-product-title text-right">
                              <a href="product-details.html">لورم ایپسوم</a>
                            </h4>
                            <div class="ht-product-price">
                              <span class="new">
                                60,000
                                تومان
                              </span>
                            </div>
                            <div class="ht-product-ratting-wrap">
                              <span class="ht-product-ratting">
                                <span class="ht-product-user-ratting" style="width: 100%;">
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                  <i class="sli sli-star"></i>
                                </span>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                                <i class="sli sli-star"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Product End-->
                  </div>
                </div>

              </div>

              <div class="pro-pagination-style text-center mt-30">
                <ul class="d-flex justify-content-center">
                  <li><a class="prev" href="#"><i class="sli sli-arrow-left"></i></a></li>
                  <li><a class="active" href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a class="next" href="#"><i class="sli sli-arrow-right"></i></a></li>
                </ul>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-7 col-sm-12 col-xs-12" style="direction: rtl;">
                <div class="product-details-content quickview-content">
                  <h2 class="text-right mb-4">لورم ایپسوم</h2>
                  <div class="product-details-price">
                    <span>
                      50,000
                      تومان
                    </span>
                    <span class="old">
                      75,000
                      تومان
                    </span>
                  </div>
                  <div class="pro-details-rating-wrap">
                    <div class="pro-details-rating">
                      <i class="sli sli-star yellow"></i>
                      <i class="sli sli-star yellow"></i>
                      <i class="sli sli-star yellow"></i>
                      <i class="sli sli-star"></i>
                      <i class="sli sli-star"></i>
                    </div>
                    <span>3 دیدگاه</span>
                  </div>
                  <p class="text-right">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها
                    و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                  </p>
                  <div class="pro-details-list text-right">
                    <ul class="text-right">
                      <li>- لورم ایپسوم</li>
                      <li>- لورم ایپسوم متن ساختگی</li>
                      <li>- لورم ایپسوم متن</li>
                    </ul>
                  </div>
                  <div class="pro-details-size-color text-right">
                    <div class="pro-details-size">
                      <span>سایز</span>
                      <div class="pro-details-size-content">
                        <ul>
                          <li><a href="#">s</a></li>
                          <li><a href="#">m</a></li>
                          <li><a href="#">l</a></li>
                          <li><a href="#">xl</a></li>
                          <li><a href="#">xxl</a></li>
                        </ul>
                      </div>
                    </div>

                  </div>
                  <div class="pro-details-quality">
                    <div class="cart-plus-minus">
                      <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2" />
                    </div>
                    <div class="pro-details-cart">
                      <a href="#">افزودن به سبد خرید</a>
                    </div>
                    <div class="pro-details-wishlist">
                      <a title="Add To Wishlist" href="#"><i class="sli sli-heart"></i></a>
                    </div>
                    <div class="pro-details-compare">
                      <a title="Add To Compare" href="#"><i class="sli sli-refresh"></i></a>
                    </div>
                  </div>
                  <div class="pro-details-meta">
                    <span>دسته بندی :</span>
                    <ul>
                      <li><a href="#">پالتو</a></li>
                    </ul>
                  </div>
                  <div class="pro-details-meta">
                    <span>تگ ها :</span>
                    <ul>
                      <li><a href="#">لباس, </a></li>
                      <li><a href="#">پیراهن</a></li>
                      <li><a href="#">مانتو</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="tab-content quickview-big-img">
                  <div id="pro-1" class="tab-pane fade show active">
                    <img src="assets/img/product/quickview-l1.svg" alt="" />
                  </div>
                  <div id="pro-2" class="tab-pane fade">
                    <img src="assets/img/product/quickview-l2.svg" alt="" />
                  </div>
                  <div id="pro-3" class="tab-pane fade">
                    <img src="assets/img/product/quickview-l3.svg" alt="" />
                  </div>
                  <div id="pro-4" class="tab-pane fade">
                    <img src="assets/img/product/quickview-l2.svg" alt="" />
                  </div>
                </div>
                <!-- Thumbnail Large Image End -->
                <!-- Thumbnail Image End -->
                <div class="quickview-wrap mt-15">
                  <div class="quickview-slide-active owl-carousel nav nav-style-2" role="tablist">
                    <a class="active" data-toggle="tab" href="#pro-1"><img src="assets/img/product/quickview-s1.svg"
                        alt="" /></a>
                    <a data-toggle="tab" href="#pro-2"><img src="assets/img/product/quickview-s2.svg" alt="" /></a>
                    <a data-toggle="tab" href="#pro-3"><img src="assets/img/product/quickview-s3.svg" alt="" /></a>
                    <a data-toggle="tab" href="#pro-4"><img src="assets/img/product/quickview-s2.svg" alt="" /></a>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal end -->
  </div>


@endsection
