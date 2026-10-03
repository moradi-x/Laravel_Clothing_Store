@extends('admin.layouts.admin')
@section('title')
    - create coupons
@endsection
@section('content')
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white ">
            <div class=" mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">
                    ایجاد کوپن
                </h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{ route('admin.coupons.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control" id="name" name="name" type="text"
                            value="{{ old('name') }} ">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="code">کد </label>
                        <input class="form-control" id="code" name="code" type="text"
                            value="{{ old('code') }} ">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="type">نوع</label>
                        <select class="form-control" id="type" name="type">
                            <option value="amount">مبلغی</option>
                            <option value="percentage">درصدی</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="amount">مبلغ</label>
                        <input class="form-control" id="amount" name="amount" type="text"
                            value="{{ old('amount') }} ">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="percentage">درصد</label>
                        <input class="form-control" id="percentage" name="percentage" type="text"
                            value="{{ old('percentage') }} ">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="max_percentage_amount">حداکثر مبلغ برای نوع درصدی </label>
                        <input class="form-control" id="max_percentage_amount" name="max_percentage_amount" type="text"
                            value="{{ old('max_percentage_amount') }} ">
                    </div>

                    <div class="form-group col-md-3">

                        <label>تاریخ  انقضا</label>

                        <div class="input-group">
                            <div class="input-group-prepend order-2 ">
                                <span class="input-group-text"  id="expirDate" >
                                    <i class="fas fa-calendar"></i>
                                </span>
                            </div>

                            <input type="text" class="form-control" data-jdp id="expirInput"
                                name="expired_at" >
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                    <label for="description">توضیحات </label>
                    <textarea class="form-control" id="description" name="description" 
                    >{{ old('description') }}</textarea>
                </div>


                </div>
                <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                <a href="{{ route('admin.coupons.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
