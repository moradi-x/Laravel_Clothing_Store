@extends('admin.layouts.admin')
@section('title')
    edit coupon
@endsection
@section('content')
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">
                    ویرایش کد تخفیف
                    {{ $coupon->name }}
                </h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{ route('admin.coupons.update', ['coupon' => $coupon->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control" id="name" name="name" type="text" value="{{ $coupon->name }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="code">کد تخفیف</label>
                        <input class="form-control" id="code" name="code" type="text"
                            value="{{ $coupon->code }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="type">نوع تخفیف</label>
                        <select class="form-control" id="type" name="type">
                            <option value="amount" {{ $coupon->getRawOriginal('type') == 'amount' ? 'selected' : '' }}>
                                مبلغی
                            </option>
                            <option value="percentage"
                                {{ $coupon->getRawOriginal('type') == 'percentage' ? 'selected' : '' }}>
                                درصدی
                            </option>
                        </select>

                    </div>
                    <div class="form-group col-md-3">
                        <label for="amount">مبلغ تخفیف</label>
                        <input class="form-control" id="amount" name="amount" type="number"
                            value="{{ $coupon->amount }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="percentage">درصد تخفیف</label>
                        <input class="form-control" id="percentage" name="percentage" type="number"
                            value="{{ $coupon->percentage }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="max_percentage_amount">
                            حداکثر مبلغ تخفیف
                        </label>
                        <input class="form-control" id="max_percentage_amount" name="max_percentage_amount" type="number"
                            value="{{ $coupon->max_percentage_amount }}">
                    </div>
                    <div class="form-group col-md-3">

                        <label>تاریخ انقضا</label>

                        <div class="input-group">

                            <div class="input-group-prepend order-2">
                                <span class="input-group-text" id="expirDate">
                                    <i class="fas fa-calendar"></i>
                                </span>
                            </div>

                            <input type="text" class="form-control" data-jdp id="expirInput" name="expired_at"
                                value="{{ verta($coupon->expired_at)->format('Y/m/d H:i:s') }}">

                        </div>

                    </div>
                </div>
                <button class="btn btn-outline-primary mt-5" type="submit">
                    ویرایش
                </button>
                <a href="{{ route('admin.coupons.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>

            </form>
        </div>
    </div>
@endsection
