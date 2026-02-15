<?php

namespace Shop\Catelog\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = [];

    protected $casts = [
        'date_start' => 'date',
        'date_end' => 'date',
    ];
}
