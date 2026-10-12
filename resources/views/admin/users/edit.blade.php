@extends('admin.layouts.admin')
@section('title')
    - edit  user 
@endsection
@section('content')
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white ">
            <div class=" mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">
                    ویرایش کاربر {{ $user->name }}
                </h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control" name="name" type="text" value="{{ $user->name }}">
                    </div>

                     <div class="form-group col-md-3">
                        <label for="name">شماره تلفن </label>
                        <input class="form-control"  name="cellphone" type="text" value="{{ $user->cellphone }}">
                    </div>


                </div>
                <button class="btn btn-outline-primary mt-5" type="submit">ویرایش</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
