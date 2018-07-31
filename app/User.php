<?php

namespace App;
use Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

  
        public function follower()
    {
        return $this->hasMany('App\Follow', 'user1');
        # code...
    }
            public function followeing()
    {
        return $this->hasMany('App\Follow', 'user2');
        # code...
    }
       
    public function groups(){
        return $this->hasMany('App\Groups');
    }

       public function posts(){
        return $this->hasMany('App\Post');
    }
        public function comments(){
        return $this->hasMany('App\Comment');
    }

     public function review(){
        return $this->hasMany('App\Review');
    }
        public function Notification(){
        return $this->hasMany('App\Notification');
    }
    public function reactions(){
        return $this->hasMany('App\Reaction');
    }
       
}
