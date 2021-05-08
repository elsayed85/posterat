<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use MultiLanguage;
    protected $table = 'cities';
    protected $fillable = ['name_ar','name_en','coordinate','published','published'];

    protected $multi_lang = [
        'name',
    ];
    public function ads()
    {
        return $this->belongsTo(Ad::class);
    }
}
