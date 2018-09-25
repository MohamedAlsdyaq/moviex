<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    //
    protected $guarded = [];
    public function posts(){
	  return $this->hasMany('App\Post', 'show_id');
	}
	    public function library(){
	  return $this->hasOne('App\Library');
	}
		    public function post(){
	  return $this->hasOne('App\Post', 'id');
	}
		    public function favorite(){
	  return $this->hasOne('App\Favorite');
	}
			    public function listentry(){
	  return $this->hasOne('App\Listentries');
	}
		    public function reaction(){
	  return $this->hasOne('App\Reaction');
	}
		    public function list(){
	  return $this->belongsTo('App\Laist', 'show_id');
	}
}
