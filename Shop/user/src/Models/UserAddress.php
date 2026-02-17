<?php

namespace Shop\User\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $guarded = [];

    public function addresses() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
