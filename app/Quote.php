<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    //
      public function tv(){
        return $this->hasOne('App\Tv');
    }
          public function movie(){
        return $this->hasOne('App\movie');
    }
}
