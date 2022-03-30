<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
       'num_order','product_id','status_id','note','payment','customer_id'
    ];
    function customer(){
        return $this->belongsTo('App\Customer');
    }
    function product(){
        return $this->belongsTo('App\Product');
    }
    function status(){
        return $this->belongsTo('App\Status');
    }
}
