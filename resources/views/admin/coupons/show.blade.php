@extends('admin.layouts.admin')
@section('title')
    show coupon
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">
                    نمایش کوپن {{ $coupon->name }}
                </h5>
            </div>
            <hr>
            <div class="form-row">
                {{-- نام --}}
                <div class="form-group col-md-3">
                    <label>نام</label>
                    <input class="form-control" type="text" value="{{ $coupon->name }}" readonly>
                </div>

                {{-- کد تخفیف --}}
                <div class="form-group col-md-3">
                    <label>کد تخفیف</label>
                    <input class="form-control" type="text" value="{{ $coupon->code }}" readonly>
                </div>

                {{-- نوع تخفیف --}}
                <div class="form-group col-md-3">
                    <label>نوع تخفیف</label>
                    <input class="form-control" type="text" value="{{ $coupon->type }}" readonly>
                </div>

                {{-- مبلغ --}}
                <div class="form-group col-md-3">
                    <label>مبلغ تخفیف</label>
                    <input class="form-control" type="text" value="{{ $coupon->amount }}" readonly>
                </div>


                {{-- درصد --}}
                <div class="form-group col-md-3">
                    <label>درصد تخفیف</label>
                    <input class="form-control" type="text" value="{{ $coupon->percentage }}" readonly>
                </div>

                {{-- حداکثر مبلغ تخفیف --}}
                <div class="form-group col-md-3">
                    <label>حداکثر مبلغ تخفیف</label>
                    <input class="form-control" type="text" value="{{ $coupon->max_percentage_amount }}" readonly>
                </div>

                {{-- تاریخ انقضا --}}
                <div class="form-group col-md-3">
                    <label>تاریخ انقضا</label>
                    <input class="form-control" type="text" value="{{ verta($coupon->expired_at)->format('Y/m/d') }}"
                        readonly>
                </div>
            </div>
            <a href="{{ route('admin.coupons.index') }}" class="btn btn-dark mt-5 mr-3">
                بازگشت
            </a>
        </div>
    </div>
@endsection
