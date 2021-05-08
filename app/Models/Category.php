<?php

namespace App\Models;


use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use MultiLanguage;
    protected $table = 'categories';
    protected $guarded = ['id'];
    protected $appends = ['title'];
    protected $multi_lang = [
        'title'
    ];
    public function getTitleAttribute(){ return $this->title;}
//    public function getPremiumAdsNumAttribute(){
////        return $this->with(['ads',function($q){
////            $q->where('premium',1)->where('published',1)->where('archived',0)->where('sold',0);
////        }])->count();
//    }
//############################## Beginning  Relations ##############################
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
    public function premium_ads()
    {
        return $this->hasMany(PremiumAd::class);
    }

    public function customfields()
    {
        return $this->belongsToMany(CustomField::class);
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent', 'id');
    }

    public function parentCategory()
    {
        return $this->belongsTo(self::class, 'parent', 'id');
    }
    public function premiumPositionDays()
    {
        return $this->hasMany(PremiumPositionDay::class, 'category_deep', 'deep');//every period of days present to category
    }
    public function premiumPosition()
    {
        return $this->hasOne(PremiumPosition::class, 'category_deep', 'deep');
    }
################################# End  Relations #################################
    public function scopeRootCategories($query)
    {
//        return $query->with('children')->where('published', 1)->where('parent', NULL)->orWhere('parent', 0)->orderBy('order_is')->get();
        return $query->with('children')->where('published', 1)->Where('parent',1)->orderBy('order_is')->get();
    }

    public function scopeIsMenu($query)
    {
        return $query->where('published', 1)->where('is_menu', '1')->orderBy('order_is')->get();
    }

}