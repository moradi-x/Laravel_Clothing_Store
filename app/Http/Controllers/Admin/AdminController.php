<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $month = 6;




        // $successTransaction = Transaction::getDate($month, 1);

        $successTransaction = Transaction::where('status', 1)->get();


        $successTransactionChart =  $this->chart($successTransaction, $month);

        $unsuccessTransaction = Transaction::getDate($month, 0);
        $unsuccessTransactionChart =  $this->chart($unsuccessTransaction, $month);



        dd([
            'labels' => array_keys($successTransactionChart),
            'chart_values' => array_values($successTransactionChart),
            'transactions' => $successTransaction->map(function ($item) {
                return [
                    'id' => $item->id,
                    'amount' => $item->amount,
                    'date' => verta($item->created_at)->format('Y-m-d'),
                    'status' => $item->getRawOriginal('status'),
                ];
            }),
        ]);


        return view('admin.dashboard', [
            'successTransaction' => array_values($successTransactionChart),
            'labels' => array_keys($successTransactionChart)
        ]);
    }

    public function chart($transaction, $month)
    {
        $monthName = $transaction->map(function ($item) {
            return verta($item->created_at)->format('%B %y');
        });

        $amount = $transaction->map(function ($item) {
            return $item->amount;
        });

        $result = [];

        foreach ($monthName as $i => $v) {
            if (! isset($result[$v])) {
                $result[$v] = 0;
            };
            $result[$v] += $amount[$i];
        }

        $chart = [];

        // اگر ماهی وجود نداشت بیا بساز 
        if (count($result) != $month) {
            for ($i = 0; $i < $month; $i++) {
                $monthName = verta()->subMonth($i)->format('%B %y');
                $shamsiMonth[$monthName] =  0;
            }
            return  array_reverse(array_merge($shamsiMonth, $result));
        };
        return $result;
    }
}
