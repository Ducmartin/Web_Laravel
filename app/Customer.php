<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'username', 'fullname', 'email', 'address','password','phone_number'
    ];
}
