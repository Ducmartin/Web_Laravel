<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_has_role extends Model
{
    function role(){
        return  $this->belongsTo('App\Role');
      }
}
