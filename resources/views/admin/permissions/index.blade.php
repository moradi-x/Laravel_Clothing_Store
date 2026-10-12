@extends('admin.layouts.admin')

@section('title')
    - index permission
@endsection
@section('content')
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white ">
            <div class="  d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
                <h5 class="font-weight-bold mb-3 mb-0 mb-3 mb-md-0">
                    لیست پرمیزن ها ( {{ $permissions->total() }} )
                </h5>
                <div>
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.permissions.create') }}">
                        <i class="fa fa-plus"></i>
                        ایجاد پرمیژن
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped  text-center ">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> نام </th>
                            <th> نام نمایشی</th>
                            <th> عملیات </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $key => $permission)
                            <tr>
                                <th>
                                    {{ $permissions->firstitem() + $key }}
                                </th>
                                <th>
                                    {{ $permission->name }}
                                </th>
                                 <th>
                                    {{ $permission->display_name }}
                                </th>
                                <th>
                                    
                                    <a class="btn btn-sm btn-outline-info mr-3 "
                                        href="{{ route('admin.permissions.edit', ['permission' => $permission->id]) }}">ویرایش</a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-5 ">
                {{ $permissions->render() }}
            </div>
        </div>
    </div>
@endsection
