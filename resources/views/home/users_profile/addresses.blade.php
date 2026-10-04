@extends('home.layouts.home')

@section('title')
    صفحه ادرس ها
@endsection

@section('script')
    <script>
        const provinceSelect = document.getElementById('province-select-create');
        const citySelect = document.getElementById('city-select-create');
        const oldCityId = "{{ old('city_id') }}";

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
    <div class="breadcrumb-area pt-35 pb-35 bg-gray" style="direction: rtl;">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="{{ route('home.index') }}">صفحه ای اصلی</a>
                    </li>
                    <li class="active"> ادرس ها </li>
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
                                    <div class="myaccount-content address-content">
                                        <h3> آدرس ها </h3>
                                        @foreach ($addresses as $address)
                                            <div>
                                                <address>
                                                    <p>
                                                        <strong>{{ auth()->user()->name == null ? 'کاربر گرامی ' : auth()->user()->name }}</strong>
                                                        <span class="mr-2"> عنوان آدرس :
                                                            <span>
                                                                {{ $address->title }}
                                                            </span>
                                                        </span>
                                                    </p>
                                                    <p>
                                                        {{ $address->address }}
                                                        <br>
                                                        <span> استان : {{ $address->province->name }} </span>
                                                        <br>
                                                        <span> شهر : {{ $address->city->name }} </span>
                                                    </p>
                                                    <p> کدپستی : {{ $address->postal_code }} </p>
                                                    <p> شماره موبایل : {{ $address->cellphone }} </p>
                                                </address>
                                                <a href="#collapse-address-{{ $address->id }}" data-toggle="collapse"
                                                    class="check-btn sqr-btn">
                                                    <i class="sli sli-pencil"></i>
                                                    ویرایش آدرس
                                                </a>

                                                <div id="collapse-address-{{ $address->id }}" class=" collapse "
                                                    style="
    {{ count($errors->addressUpdate) > 0 && $errors->addressUpdate->first('address_id') == $address->id
        ? 'display:block'
        : '' }}">

                                                    <form
                                                        action="{{ route('home.addresses.update', ['addresses' => $address->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">

                                                            <div class="tax-select col-lg-6 col-md-6">
                                                                <label>عنوان</label>
                                                                <input type="text" name="title"
                                                                    value="{{ $address->title }}">
                                                                @error('title', 'addressUpdate')
                                                                    <div class="input-error-validation">
                                                                        <strong>{{ $message }}</strong>
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="tax-select col-lg-6 col-md-6">
                                                                <label>شماره تماس</label>
                                                                <input type="text" name="cellphone"
                                                                    value="{{ $address->cellphone }}">
                                                                @error('cellphone', 'addressUpdate')
                                                                    <div class="input-error-validation">
                                                                        <strong>{{ $message }}</strong>
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="tax-select col-lg-6 col-md-6">
                                                                <label>استان</label>
                                                                <select class="email s-email s-wid province-select-edit"
                                                                    name="province_id"
                                                                    data-address-id="{{ $address->id }}">
                                                                    @foreach ($provinces as $province)
                                                                        <option value="{{ $province->id }}"
                                                                            {{ $address->province_id == $province->id ? 'selected' : '' }}>
                                                                            {{ $province->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="tax-select col-lg-6 col-md-6">
                                                                <label>شهر</label>
                                                                <select class="email s-email s-wid" name="city_id"
                                                                    id="city-select-edit-{{ $address->id }}"
                                                                    data-selected="{{ $address->city_id }}">
                                                                </select>
                                                            </div>

                                                            <div class="tax-select col-lg-6 col-md-6">
                                                                <label>آدرس</label>
                                                                <input type="text" name="address"
                                                                    value="{{ $address->address }}">
                                                                @error('address', 'addressUpdate')
                                                                    <div class="input-error-validation">
                                                                        <strong>{{ $message }}</strong>
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="tax-select col-lg-6 col-md-6">
                                                                <label>کد پستی</label>
                                                                <input type="text" name="postal_code"
                                                                    value="{{ $address->postal_code }}">
                                                                @error('postal_code', 'addressUpdate')
                                                                    <div class="input-error-validation">
                                                                        <strong>{{ $message }}</strong>
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-lg-12 col-md-12">
                                                                <button class="cart-btn-2" type="submit">ویرایش
                                                                    آدرس</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach


                                        <button class="collapse-address-create mt-3" type="submit">
                                            ایجاد آدرس جدید
                                        </button>
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
                                                        <input type="text" name="cellphone"
                                                            value="{{ old('cellphone') }}">
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
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div> <!-- My Account Page End -->
            </div>
        </div>
    </div>
    </div>
    <!-- my account wrapper end -->
@endsection
