<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Illuminate\Support\months;

class Transaction extends Model
{

    use HasFactory;
    protected $table = "transactions";
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusAttribute($status)
    {
        switch ($status) {
            case '0':
                $status = 'نا موفق';
                break;
            case '1':
                $status = 'موفق';
                break;
        }

        return $status;
    }

    public function scopeGetDate($query, $month, $status)
    {

        $v = verta()->startMonth()->subMonth($month - 1);
        // $date = verta()->getGregorian($v->year(), $v->months(), $v->day());
        $date = $v->toCarbon()->format('Y-m-d');


        return $query->where(
            'created_at',
            '>',
            Carbon::create($date[0], $date[1], $date[2], 0, 0, 0)
        )
            ->where('status', $status)
            ->get();
    }





    // public function scopeGetDate($query, $month, $status)
    // {
    //     $start = verta()->startMonth();

    //     for ($i = 1; $i < $month; $i++) {
    //         $start->subMonth();
    //     }

    //     $start = verta()->startMonth();

    //     for ($i = 1; $i < $month; $i++) {
    //         $start = $start->copy()->subMonth();
    //     }

    //     $start = $start->toCarbon()->startOfDay();


    //    $end = verta()->startMonth()->toCarbon()->startOfDay();

    //     return $query
    //         ->where('created_at', '>=', $start)
    //         ->where('created_at', '<', $end)
    //         ->where('status', $status)
    //         ->get();
    // }
}
