<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title', 'content','cat_id','status_id','img'
    ];
    function status(){
        return $this->belongsTo('App\Status');
    }
}
