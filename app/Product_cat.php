<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_cat extends Model
{
    //
    protected $fillable = [
        'name', 'status_id', 'branching','slug'
    ];
    function status(){
        return $this->belongsTo('App\Status');
    }
}
