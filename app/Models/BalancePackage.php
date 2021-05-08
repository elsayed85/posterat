<?php

namespace App\Models;


use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class BalancePackage extends Model
{
    use MultiLanguage;
 protected $table = 'balance_packages';
// protected $fillable = ['title_ar','title_en','description','amount','price','active','user_id'];
    protected $guarded = ['id'];
    protected $appends = ['title','description'];
    protected $multi_lang = [
        'title','description'
    ];
    public function getTitleAttribute(){ return $this->title;}
    public function getDescriptionAttribute(){ return $this->description;}
 // public $timestamps = true;

    public function scopeActive($query)
    {
    return $query->where('active', 1);
    }

############################## Beginning  Relations ##############################
    public function user()
    {
        return $this->belongsTo(User::class);
    }
################################# End  Relations #################################
}
