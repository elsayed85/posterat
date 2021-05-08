<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';
    protected $guarded = ['id'];
    ############################## Beginning  Relations ##############################
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
