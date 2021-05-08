<?php

namespace App\Models;


use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    use MultiLanguage;
    protected $table = 'custom_fields';
    protected $guarded = ['id'];
    public static $inputOptions=['checkbox','select','textarea','text'];
    protected $casts = [
        'input_options' => 'array',
    ];

    protected $appends = ['input_title'];
    protected $multi_lang = [
        'input_title'
    ];
    public function getTitleAttribute(){ return $this->input_title;}
    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
public function getInputOptionsStrAttribute()
{
return is_array($this->input_options)?implode(',',$this->input_options):(string) $this->input_options??'';
}


############################## Beginning  Relations ##############################
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()//Category
    {
        return $this->belongsToMany(Category::class);
    }

    public function getInputOptionsViewAttribute()
    {
        return array_filter(explode(',',$this->input_options));
    }

################################# End  Relations #################################

}
