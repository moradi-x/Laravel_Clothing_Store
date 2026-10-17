<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function index()
    // {

    //     $month = 6;

    //     // $successTransaction = Transaction::getDate($month, 1);

    //     $successTransaction = Transaction::where('status', 1)->get();


    //     $successTransactionChart =  $this->chart($successTransaction, $month);

    //     $unsuccessTransaction = Transaction::getDate($month, 0);
    //     $unsuccessTransactionChart =  $this->chart($unsuccessTransaction, $month);

    //     return view('admin.dashboard', [
    //         'successTransaction' => array_values($successTransactionChart),
    //         'labels' => array_keys($successTransactionChart)
    //     ]);
    // }

    public function index()
    {
        $month = 12;

        $start = verta()->startMonth()->subMonths($month - 1)->toCarbon();
        $end = verta()->startMonth()->addMonth()->toCarbon();

        $successTransaction = Transaction::query()
            ->where('status', 1)
            ->where('created_at', '>=', $start)
            ->where('created_at', '<', $end)
            ->get();

        $failedTransaction = Transaction::query()
            ->where('status', 0)
            ->where('created_at', '>=', $start)
            ->where('created_at', '<', $end)
            ->get();

        $successChart = $this->chart($successTransaction, $month);
        $failedChart = $this->chart($failedTransaction, $month);

        return view('admin.dashboard', [
            'labels' => array_keys($successChart),
            'successTransaction' => array_values($successChart),
            'unsuccessTransaction' => array_values($failedChart),
            'transactionCount' => [ $successTransaction->count() ,  $failedTransaction->count()] ,
        ]);
    }



    // public function chart($transaction, $month)
    // {
    //     $monthName = $transaction->map(function ($item) {
    //         return verta($item->created_at)->format('%B %y');
    //     });

    //     $amount = $transaction->map(function ($item) {
    //         return $item->amount;
    //     });

    //     $result = [];

    //     foreach ($monthName as $i => $v) {
    //         if (! isset($result[$v])) {
    //             $result[$v] = 0;
    //         };
    //         $result[$v] += $amount[$i];
    //     }

    //     $chart = [];

    //     // اگر ماهی وجود نداشت بیا بساز 
    //     if (count($result) != $month) {
    //         for ($i = 0; $i < $month; $i++) {
    //             $monthName = verta()->subMonth($i)->format('%B %y');
    //             $shamsiMonth[$monthName] =  0;
    //         }
    //         return  array_reverse(array_merge($shamsiMonth, $result));
    //     };
    //     return $result;
    // }


    public function chart($transactions, $month = 6)
    {
        $chart = [];

        // ایجاد شش ماه، از قدیمی به جدید
        for ($i = $month - 1; $i >= 0; $i--) {
            $date = verta()->startMonth();

            if ($i > 0) {
                $date = verta()->startMonth()->subMonths($i);
            }

            $label = $date->format('%B %y');
            $chart[$label] = 0;
        }

        // جمع مبلغ تراکنش‌های هر ماه
        foreach ($transactions as $transaction) {
            $label = verta($transaction->created_at)->format('%B %y');

            if (array_key_exists($label, $chart)) {
                $chart[$label] += (int) $transaction->amount;
            }
        }

        return $chart;
    }
}
