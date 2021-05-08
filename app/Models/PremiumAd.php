<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PremiumAd extends Model
{
    protected $table = 'premium_ads';
    protected $guarded = ['id'];
    protected $casts = [
        'response' => 'array'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
