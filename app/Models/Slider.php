<?php

namespace App\Models;
use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
 use MultiLanguage;
    protected $guarded= ['id'];
    protected $multi_lang = [
        'title','description'
    ];
    public function slider_images()
    {
      return  self::where('published', 1)->limit(get_setting('slider_limit'))->orderBy('order_is')->get();
    }
############################## Beginning  Relations ##############################
    public function user()
    {
        return $this->belongsTo(User::class);
    }
################################# End  Relations #################################

}
