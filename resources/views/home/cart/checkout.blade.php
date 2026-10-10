@extends('home.layouts.home')

@section('title')
    صفحه سفارش
@endsection
@section('script')
    <script>
        const provinceSelect = document.getElementById('province-select-create');
        const citySelect = document.getElementById('city-select-create');
        const oldCityId = "{{ old('city_id') }}";

        $('#address-input').val($('#address-select').val());


        $('#address-select').change(function() {
            $('#address-input').val($(this).val());
        });

        function loadCities(provinceId, selectedId = null) {
            citySelect.innerHTML = '<option value="">انتخاب شهر</option>';
            if (!provinceId) return;

            fetch(`{{ route('getProvinceCitiesList') }}?province_id=${provinceId}`, {
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(cities => {
                    cities.forEach(city => {
                        const opt = new Option(city.name, city.id);
                        if (selectedId && selectedId == city.id) opt.selected = true;
                        citySelect.add(opt);
                    });
                });
        }

        // console.log('script loaded');
        provinceSelect.addEventListener('change', () => loadCities(provinceSelect.value));

        // اگر فرم با خطا برگشت، شهر قبلی دوباره انتخاب شود
        if (provinceSelect.value) loadCities(provinceSelect.value, oldCityId);

        function fillCities(citySelect, provinceId, selectedId = null) {
            citySelect.innerHTML = '<option value="">انتخاب شهر</option>';
            if (!provinceId) return;

            fetch(`{{ route('getProvinceCitiesList') }}?province_id=${provinceId}`, {
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(cities => {
                    cities.forEach(city => {
                        const opt = new Option(city.name, city.id);
                        if (selectedId && selectedId == city.id) opt.selected = true;
                        citySelect.add(opt);
                    });
                });
        }

        document.querySelectorAll('.province-select-edit').forEach(provinceSel => {
            const citySel = document.getElementById('city-select-edit-' + provinceSel.dataset.addressId);

            // موقع لود صفحه: شهرهای استان فعلی را بیاور و شهر فعلی را انتخاب کن
            fillCities(citySel, provinceSel.value, citySel.dataset.selected);

            // موقع عوض کردن استان: شهرهای استان جدید
            provinceSel.addEventListener('change', () => fillCities(citySel, provinceSel.value));
        });
    </script>
@endsection
@section('content')
    @php
        use Darryldecode\Cart\Facades\CartFacade;
    @endphp
    <div class="breadcrumb-area pt-35 pb-35 bg-gray" style="direction: rtl;">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="{{ route('home.index') }}"> صفحه ای اصلی </a>
                    </li>
                    <li class="active"> سفارش </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="checkout-main-area pt-70 pb-70 text-right" style="direction: rtl;">

        <div class="container">

            @if (!session()->has('coupon'))
                <div class="customer-zone mb-20">
                    <p class="cart-page-title">
                        کد تخفیف دارید؟
                        <a class="checkout-click3" href="#"> میتوانید با کلیک در این قسمت کد خود را اعمال کنید </a>
                    </p>
                    <div class="checkout-login-info3">
                        <form action="{{ route('home.coupons.check') }}" method="post">
                            @csrf
                            <input type="text" name="code" placeholder="کد تخفیف">
                            <input type="submit" value="اعمال کد تخفیف">
                        </form>
                    </div>
                </div>
            @endif

            <div class="checkout-wrap pt-30">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap mr-50">
                            <h3> آدرس تحویل سفارش </h3>

                            <div class="row">
                                <p>
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                                </p>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info tax-select mb-20">
                                        <label> انتخاب آدرس تحویل سفارش <abbr class="required"
                                                title="required">*</abbr></label>

                                        <select class="email s-email s-wid" id="address-select">

                                            @foreach ($addresses as $address)
                                                <option value="{{ $address->id }}"> {{ $address->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 pt-30">
                                    <button class="collapse-address-create" type="submit"> ایجاد آدرس جدید </button>
                                </div>

                                <div class="col-lg-12">
                                    <div class="collapse-address-create-content"
                                        style="{{ count($errors->addressStore) > 0 ? 'display:block' : '' }}">

                                        <form action="{{ route('home.addresses.store') }}" method="post">
                                            @csrf
                                            <div class="row">

                                                <div class="tax-select col-lg-6 col-md-6">
                                                    <label>
                                                        عنوان
                                                    </label>
                                                    <input type="text" name="title" value="{{ old('title') }}">
                                                    @error('title', 'addressStore')
                                                        <div class="input-error-validation">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="tax-select col-lg-6 col-md-6">
                                                    <label>
                                                        شماره تماس
                                                    </label>
                                                    <input type="text" name="cellphone" value="{{ old('cellphone') }}">
                                                    @error('cellphone', 'addressStore')
                                                        <div class="input-error-validation">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="tax-select col-lg-6 col-md-6">
                                                    <label>
                                                        استان
                                                    </label>

                                                    <select class="email s-email s-wid" name="province_id"
                                                        id="province-select-create">
                                                        <option value="">انتخاب استان</option>
                                                        @foreach ($provinces as $province)
                                                            <option value="{{ $province->id }}"
                                                                {{ old('province_id') == $province->id ? 'selected' : '' }}>
                                                                {{ $province->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('province_id', 'addressStore')
                                                        <div class="input-error-validation">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="tax-select col-lg-6 col-md-6">
                                                    <label>
                                                        شهر
                                                    </label>
                                                    <select class="email s-email s-wid" name="city_id"
                                                        id="city-select-create">
                                                        <option value="">انتخاب شهر</option>
                                                    </select>
                                                    @error('city_id', 'addressStore')
                                                        <div class="input-error-validation">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="tax-select col-lg-6 col-md-6">
                                                    <label>
                                                        آدرس
                                                    </label>
                                                    <input type="text" name="address" value="{{ old('address') }}">
                                                    @error('address', 'addressStore')
                                                        <div class="input-error-validation">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="tax-select col-lg-6 col-md-6">
                                                    <label>
                                                        کد پستی
                                                    </label>
                                                    <input type="text" name="postal_code"
                                                        value="{{ old('postal_code') }}">
                                                    @error('postal_code', 'addressStore')
                                                        <div class="input-error-validation">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
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

                        </div>
                    </div>

                    <div class="col-lg-5">
                        {{-- درگاه پرداخت خودمون --}}
                        <form action="{{ route('home.payment') }}" method="post">

                            {{--  شتابت --}}
                            {{-- <form action="{{ route('shetabit-checkout.start') }}" method="post"> --}}
                            @csrf
                            <div class="your-order-area">
                                <h3> سفارش شما </h3>
                                <div class="your-order-wrap gray-bg-4">
                                    <div class="your-order-info-wrap">
                                        <div class="your-order-info">
                                            <ul>
                                                <li> محصول <span> جمع </span></li>
                                            </ul>
                                        </div>
                                        <div class="your-order-middle">
                                            <ul>
                                                @foreach (CartFacade::getContent() as $item)
                                                    <li class=" d-flex justify-content-between">
                                                        <div>
                                                            {{ $item->name }}
                                                            -
                                                            {{ $item->quantity }}
                                                            <p class=" mb-0" style=" font-size: 12px ; color: red">
                                                                {{ \App\Models\Attribute::find($item->attributes->attribute_id)->name }}
                                                                :
                                                                {{ $item->attributes->value }}
                                                            </p>
                                                        </div>

                                                        <span>
                                                            {{ number_format($item->price) }}
                                                            تومان

                                                            @if ($item->attributes->is_sale)
                                                                <p style=" font-size: 12px ; color:red">
                                                                    {{ $item->attributes->percent_sale }}%
                                                                    تخفیف
                                                                </p>
                                                            @endif
                                                        </span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="your-order-info order-subtotal">
                                            <ul>
                                                <li> مبلغ
                                                    <span>
                                                        {{ number_format(CartFacade::getTotal() + cartTotalSaleAmount()) }}
                                                        تومان
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        @if (cartTotalSaleAmount() > 0)
                                            <div class="your-order-info order-subtotal">
                                                <ul>
                                                    <li>
                                                        مبلغ تخفیف کالا ها :
                                                        <span style=" color: red;">
                                                            {{ number_format(cartTotalSaleAmount()) }}
                                                            تومان
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif

                                        @if (session()->has('coupon'))
                                            <div class="your-order-info order-subtotal">
                                                <ul>
                                                    <li>
                                                        مبلغ کد تخفیف :
                                                        <span style=" color: red;">
                                                            {{ number_format(session()->get('coupon.amount')) }}
                                                            تومان
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="your-order-info order-shipping">
                                            <ul>
                                                <li>
                                                    هزینه ارسال :
                                                    @if (cartTotalDeliveryAmount() == 0)
                                                        <span style="color: red">
                                                            رایگان
                                                        </span>
                                                    @else
                                                        <span>
                                                            {{ number_format(cartTotalDeliveryAmount()) }}
                                                            تومان
                                                        </span>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="your-order-info order-total">
                                            <ul>
                                                <li>جمع کل
                                                    <span>
                                                        {{ number_format(cartTotalAmount()) }}

                                                        تومان </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="payment-method">
                                        <div class="pay-top sin-payment">
                                            <input id="zarinpal" class="input-radio" type="radio" value="zarinpal"
                                                checked="checked" name="payment_method">
                                            <label for="zarinpal"> درگاه پرداخت زرین پال </label>
                                            <div class="payment-box payment_method_bacs">
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                                    از
                                                    طراحان گرافیک است.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="pay-top sin-payment">
                                            <input id="pay" class="input-radio" type="radio" value="pay"
                                                name="payment_method">
                                            <label for="pay">درگاه پرداخت پی</label>
                                            <div class="payment-box payment_method_bacs">
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                                    از
                                                    طراحان گرافیک است.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Place-order mt-40">
                                    <button type="submit">ثبت سفارش</button>
                                </div>
                            </div>

                            <input type=" hidden" name="address_id" id="address-input">
                            {{-- اگر شتابیت رفتی اینو انتخاب کن --}}
                            {{-- <input type="hidden" name="address_id" id="address-input"
                                value="{{ $addresses->first()->id ?? '' }}"> --}}
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
