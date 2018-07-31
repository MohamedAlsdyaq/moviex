<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
	protected $fillable = ['user_id', 'show_id', 'rate', 'status', 'type'];
	 public function user(){
        return $this->belongsTo('App\User');
    }
    	 public function show(){
        return $this->belongsTo('App\Show');
    }
     	 public function history(){
        return $this->hasMany('App\History');
    }
 
    //
}
