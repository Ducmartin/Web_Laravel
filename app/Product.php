<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'price', 'desc', 'detail','cat_id','status_id'
    ];
    function cat(){
        return $this->belongsTo('App\Product_cat');
    }
    function status(){
        return $this->belongsTo('App\Status');
    }
   

}
