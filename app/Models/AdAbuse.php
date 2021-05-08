<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdAbuse extends Model
{
    protected $table='ad_abuses';
    protected $guarded = ['id'];
    protected $dates = ['published_at'];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function getSinceAttribute()
    {
        if (is_null($this->published_at)) return '';

        return $this->published_at->diffForHumans();
    }
}
