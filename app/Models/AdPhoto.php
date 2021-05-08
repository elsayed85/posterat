<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdPhoto extends Model
{
    protected $table = 'ad_photos';
    protected $guarded = ['id'];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

}
