<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Payment\Facade\Payment ;

class TestPaymentController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Shetabit Payment Test Route is working.',
            'driver' => config('payment.default'),
            'sandbox' => config('payment.drivers.zarinpal.mode'),
            'merchant_configured' => !empty(
                config('payment.drivers.zarinpal.merchantId')
            ),
            'start_url' => route('test-payment.start'),
        ]);
    }

    public function start()
    {
        $amount = 1000;

        // نگهداری مبلغ برای مرحله بررسی پرداخت
        session(['test_payment_amount' => $amount]);

        $invoice = (new Invoice)->amount($amount);

        return Payment::via('zarinpal')
            ->callbackUrl(route('test-payment.verify'))
            ->purchase($invoice, function ($driver, $transactionId) {
                session([
                    'test_payment_transaction_id' => $transactionId,
                ]);
            })
            ->pay()
            ->render();
    }

    public function verify(Request $request)
    {
        if ($request->input('Status') !== 'OK') {
            return response()->json([
                'success' => false,
                'message' => 'پرداخت انجام نشد یا لغو شد.',
            ]);
        }

        $amount = session('test_payment_amount');
        $transactionId = session('test_payment_transaction_id');

        if (!$amount || !$transactionId) {
            return response()->json([
                'success' => false,
                'message' => 'اطلاعات پرداخت آزمایشی در دسترس نیست.',
            ], 400);
        }

        try {
            $receipt = Payment::via('zarinpal')
                ->amount($amount)
                ->transactionId($transactionId)
                ->verify();

            session()->forget([
                'test_payment_amount',
                'test_payment_transaction_id',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'پرداخت آزمایشی با موفقیت تأیید شد.',
                'reference_id' => $receipt->getReferenceId(),
            ]);
        } catch (InvalidPaymentException $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ], 422);
        }
    }
}
