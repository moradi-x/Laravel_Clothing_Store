<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    // Province.php
public $timestamps = false;
protected $guarded = [];

public function cities()
{
    return $this->hasMany(City::class);
}
}
