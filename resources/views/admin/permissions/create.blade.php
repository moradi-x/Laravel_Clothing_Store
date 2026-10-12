@extends('admin.layouts.admin')
@section('title')
    - create permissions
@endsection
@section('content')
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white ">
            <div class=" mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">
                    ایجاد پرمیژن
                </h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{ route('admin.permissions.store') }}" method="POST">
                @csrf
                <div class="form-row">

                    <div class="form-group col-md-3">
                        <label for="display_name"> نام نمایشی</label>
                        <input class="form-control" id="name" name="display_name" type="text"
                            value="{{ old('display_name') }} ">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control" id="name" name="name" type="text"
                            value="{{ old('name') }} ">
                    </div>


                </div>
                <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
