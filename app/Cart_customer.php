<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart_customer extends Model
{
    protected $fillable=[
        'customer_id','product_id','qty'
    ];
}
