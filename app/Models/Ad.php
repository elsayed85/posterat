<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Ad extends Model
{
    protected $table = 'ads';
    protected $guarded = ['id'];
    protected $casts = [
        'details' => 'array',
    ];
    protected $dates = ['published_at'];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    public function getSinceAttribute()
    {
        if (is_null($this->published_at)) return '';

        return $this->published_at->diffForHumans();
    }
    public function getPriceAttribute()
    {
        if($this->attributes['cost_hide']){
         return trans('theme.ask seller');
        }
        return ($this->attributes['cost'].' '.trans('theme.currency'));
        //return ($this->attributes['cost_hide']==1)?:($this->attributes['cost'].' '.trans('theme.currency'));
    }
    public function getSubPhoneAttribute()
    {
        if (is_null($this->published_at)) return '';
        return Str::limit($this->attributes['phone'],5, $end='***');
    }
    public function getAllowContactAttribute()
    {
        if (!$this->disturb_hours) return true;

            $now = Carbon::now();
                $start = $this->disturb_hours_from;
                $end = $this->disturb_hours_to;
                $start = Carbon::createFromTimeString($start);
                $end = Carbon::createFromTimeString($end);
                if ($now->between($start, $end)) {
                return false;

            }
            return true;

    }

############################## Beginning  Relations ##############################
    public function photos()
    {
        return $this->hasMany(AdPhoto::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function bookmarks(){
        return $this->belongsToMany(User::class, 'bookmarks', 'user_id', 'ad_id')->withTimestamps();
    }


    public function is_bookmarked(){
        return auth()->user()?auth()->user()->bookmarks->contains($this->id):false;
    }
    public function premium_ad()
    {
        return $this->belongsTo(PremiumAd::class);
    }
//    public function is_bookmarked(User $user){
//        return $user->bookmarks->contains($this->id);
//    }
    public function adMessages()
    {
        return $this->hasMany(AdMessage::class);
    }
################################# End  Relations #################################
}


/*$details = $ad->details;

$details['color'] = 'blue';
$details['size'] = 500;
$details['model'] = 2010;

$ad->details = $details;

$ad->save();
$ad->update(['details->color' => 'red','details->num' => '800','details->example' => '*',]);
foreach ($ad->details as $detail=>$value){
    dump( $detail);     dump( $value);

}
dd($ad);

  */