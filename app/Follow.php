<?php

namespace App;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Follow extends Model
{
    //
      use SoftDeletes, CascadeSoftDeletes;
       protected $cascadeDeletes = ['wall' ];

    protected $guarded = ['deleted_at'];
    public function following()
    {
        return $this->belongsTo('App\User', 'user1');
        # code...
    }
        public function follower()
    {
        return $this->belongsTo('App\User', 'user2');
        # code...
    }
    
    public function wall(){
    	return $this->hasOne('App\Wall')->where('type', 'follow')->with('user');
    }
}
