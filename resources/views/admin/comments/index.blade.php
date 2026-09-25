@extends('admin.layouts.admin')

@section('title')
    - index comment
@endsection
@section('content')
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white ">
            <div class="  d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
                <h5 class="font-weight-bold mb-3 mb-0 mb-3 mb-md-0">
                    لیست کامنت ها ( {{ $comments->total() }} )
                </h5>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped  text-center ">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> نام کاربر </th>
                            <th> نام محصول </th>
                            <th>متن کامنت</th>
                            <th> وضعیت </th>
                            <th> عملیات </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $key => $comment)
                            <tr>
                                <th>
                                    {{ $comments->firstitem() + $key }}
                                </th>
                                <th>
                                    {{-- <a href=""> --}}
                                    {{ $comment->user->name == null ? $comment->user->cellphone : $comment->user->name }}
                                    {{-- </a> --}}
                                </th>

                                <th>
                                    <a href="{{ route('admin.products.show', ['product' => $comment->product->id]) }}">
                                        {{ $comment->product->name }}
                                    </a>
                                </th>
                                <th>
                                    {{ $comment->text }}
                                </th>

                                <th class="{{ $comment->getRawOriginal('approved') ? 'text-success' : 'text-danger' }}">
                                    {{ $comment->approved }}
                                </th>

                                <th>
                                    <a class="btn btn-sm btn-outline-success mb-2 "
                                        href="{{ route('admin.comments.show', ['comment' => $comment->id]) }}">نمایش</a>
                                    <form action="{{ route('admin.comments.destroy', 
                                        ['comment' => $comment->id]) }}" method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" type="submit">حذف</button>
                                        </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-5 ">
                {{ $comments->render() }}
            </div>
        </div>
    </div>
@endsection
