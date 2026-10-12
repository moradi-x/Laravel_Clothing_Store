@extends('admin.layouts.admin')
@section('title')
    - edit user
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
                        <input class="form-control" name="cellphone" type="text" value="{{ $user->cellphone }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="role">نقش کاربر </label>
                        <select class="form-control" id="role" name="role">
                            <option></option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}"
                                    {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $role->display_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <p class=" mt-3">
                    <button class="btn btn-primary text-right p-1 " type="button" data-toggle="collapse"
                        data-target="#collapsepermissions" aria-expanded="false" aria-controls="collapsepermissions">
                        مجوز های دسترسی

                    </button>
                </p>
                <div class="collapse" id="collapsepermissions">
                    <div class="card card-body  ">
                        <div class="form-row">
                            @foreach ($permissions as $permission)
                                <div class="form-group form-check col-md-3">
                                    <input type="checkbox" class="form-check-input" id="permission_{{ $permission->id }}"
                                        name="{{ $permission->name }}" value="{{ $permission->name }}"
                                        {{ in_array($permission->id, $user->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    <label class="form-check-label mr-3" for="permission_{{ $permission->id }}">
                                        {{ $permission->display_name }} </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ویرایش</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
