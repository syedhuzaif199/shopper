<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('is_used', 'used_at');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
