<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    protected $guarded = ['deleted_at'];
    public function user()
    {
    	return $this->belongsTo('App\User');
    	# code...
    }
}
