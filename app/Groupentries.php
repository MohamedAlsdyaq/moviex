<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
class Groupentries extends Model
{
    //
     use SoftDeletes;
             public function Group(){
        return $this->belongsTo('App\Group');
    }
      public function user(){
        return $this->belongsTo('App\User');
    }

}
