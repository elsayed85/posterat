<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = 'bookmarks';
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
