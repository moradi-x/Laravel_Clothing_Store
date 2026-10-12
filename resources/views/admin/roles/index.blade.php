@extends('admin.layouts.admin')

@section('title')
    - index role
@endsection
@section('content')
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white ">
            <div class="  d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
                <h5 class="font-weight-bold mb-3 mb-0 mb-3 mb-md-0">
                    لیست نقش ها ( {{ $roles->total() }} )
                </h5>
                <div>
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.roles.create') }}">
                        <i class="fa fa-plus"></i>
                        ایجاد نقش
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped  text-center ">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> نام نمایشی</th>
                            <th> نام </th>
                            <th> عملیات </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <th>
                                    {{ $roles->firstitem() + $key }}
                                </th>
                                <th>
                                   {{ $role->display_name }}
                               </th>
                                <th>
                                    {{ $role->name }}
                                </th>
                                <th>
                                    <a class="btn btn-sm btn-outline-success"
                                        href="{{ route('admin.roles.show', ['role' => $role->id]) }}">نمایش</a>
                                    <a class="btn btn-sm btn-outline-info mr-3 "
                                        href="{{ route('admin.roles.edit', ['role' => $role->id]) }}">ویرایش</a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-5 ">
                {{ $roles->render() }}
            </div>
        </div>
    </div>
@endsection
