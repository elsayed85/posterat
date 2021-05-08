<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdMessage extends Model
{
    protected $table = 'ad_messages';
    protected $guarded = ['id'];
    protected $dates = ['published_at'];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
    public function getSinceAttribute()
    {
        if (is_null($this->published_at)) return '';

        return $this->published_at->diffForHumans();
    }
}
