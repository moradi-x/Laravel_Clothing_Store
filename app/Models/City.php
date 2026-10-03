<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    // City.php
public $timestamps = false;
protected $guarded = [];

public function province()
{
    return $this->belongsTo(Province::class);
}
}
