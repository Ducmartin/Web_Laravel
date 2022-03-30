<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thumbnail_product extends Model
{
    protected $fillable = [
        'thumbnail', 'product_id'
    ];
    function product_id(){
        return $this->belongsTo('App\Product');
    }
    //
}
