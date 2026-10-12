@extends('admin.layouts.admin')
@section('title')
    create roles
@endsection
@section('content')
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white ">
            <div class=" mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">
                    ایجاد نقش
                </h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div class="form-row">

                    <div class="form-group col-md-3">
                        <label for="display_name"> نام نمایشی</label>
                        <input disabled class="form-control" id="name" name="display_name" type="text"
                            value="{{ $role->display_name }} ">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input disabled class="form-control" id="name" name="name" type="text"
                            value="{{ $role->name }}">
                    </div>
                </div>

                <p class=" mt-3">
                    <button class="btn btn-primary text-right p-1 " type="button" data-toggle="collapse"
                        data-target="#collapsepermissions" aria-expanded="false" aria-controls="collapsepermissions">
                        مجوز های دسترسی

                    </button>
                </p>
                <div class="collapse show " id="collapsepermissions">
                    <div class="card card-body  ">
                        <div class="form-row">
                            @foreach ($role->permissions as $permission)
                                <div class=" col-md-3">
                                    <span>
                                        {{ $permission->display_name }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <a href="{{ route('admin.roles.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
