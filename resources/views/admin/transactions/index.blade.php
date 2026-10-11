@extends('admin.layouts.admin')

@section('title')
    index transaction
@endsection
@section('content')
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white ">
            <div class="  d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
                <h5 class="font-weight-bold mb-3 mb-0 mb-3 mb-md-0">
                    لیست تراکنش ها ( {{ $transactions->total() }} )
                </h5>

            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped  text-center ">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> نام کاربر </th>
                            <th> شماره سفارش </th>
                            <th> مبلغ </th>
                            <th> مبلغ </th>
                            <th> شناسه پرداخت </th>
                            <th> نام درگاه پرداخت </th>
                            <th> وضعیت </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $key => $transaction)
                            <tr>
                                <th>
                                    {{ $transactions->firstitem() + $key }}
                                </th>
                                <th>
                                    {{ $transaction->user->name == null ? 'کاربر' : $transaction->user->name }}
                                </th>
                                <th>
                                    {{ $transaction->order_id }}
                                </th>
                                <th>
                                    {{ number_format($transaction->amount) }}
                                </th>
                                <th>
                                    {{ $transaction->ref_id }}
                                </th>
                                <th>
                                    {{ $transaction->gateway_name }}
                                </th>
                                <th>
                                    {{ $transaction->status }}
                                </th>
                                <th>
                                    <a class="btn btn-sm btn-outline-success"
                                        href="{{ route('admin.transactions.show', ['transaction' => $transaction->id]) }}">نمایش</a>
                                    <a class="btn btn-sm btn-outline-info mr-3 "
                                        href="{{ route('admin.transactions.edit', ['transaction' => $transaction->id]) }}">ویرایش</a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-5 ">
                {{ $transactions->render() }}
            </div>
        </div>
    </div>
@endsection
