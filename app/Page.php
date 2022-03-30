<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Page extends Model
{
    use Notifiable;
  protected $fillable = [
        'title',  'status_id'
    ];
    function status(){
        return $this->belongsTo("App\Status");
    }
    function post(){
        return $this->belongsTo('App\Post');
    }
    //
}
