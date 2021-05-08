<?php

namespace App\Models;
use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use MultiLanguage;
    protected $table = 'pages';
    protected $guarded = ['id'];
    protected $appends = ['title','body'];

    protected $multi_lang = [
        'title','body'
    ];
############################## Beginning  Relations ##############################
    public function user()
    {
        return $this->belongsTo(User::class);
    }
################################# End  Relations #################################

}
