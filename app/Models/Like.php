<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    protected $guarded = ['id'];

############################## Beginning  Relations ##############################
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
################################# End  Relations #################################

}
