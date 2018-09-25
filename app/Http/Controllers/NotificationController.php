<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Auth;
class NotificationController extends Controller
{
    public function get()
    {
        //
        
      return  $notis = Notification::where('user_id', Auth::user()->id)->with('post.user')
            ->with('user')
      
        ->orderBy('created_at', 'desc')
        ->get();
       
         
   
    }
      
        public function index()
    {
        //
        
         $notis = Notification::where('user_id', Auth::user()->id)
    -> with('post.user')
            ->with('user')
      
        ->orderBy('created_at', 'desc')
        ->get();
       
         
       return View('notification')->with([
        'notifications' => $notis

       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store($user_id, $post_id, $type = 'Like')
    {
          if(is_string($user_id[0]))
        $user_id = UserController::getId($user_id[0]);

        $notification = new Notification;
        $notification->post_id = $post_id;
        $notification->liker_id = Auth::user()->id;
        $notification->user_id = $user_id;
        $notification->type    = $type;
        $notification->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        return Notification::where('user_id', Auth::user()->id)
        ->where('saw', 0)
        ->count();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit( $notification)
    {
        //
    }

    /**
     * Update the specified resource in db.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
        Notification::where('saw', 0)
        ->where('user_id', Auth::user()->id)
        ->update(['saw' => 1]);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy( $notification)
    {
        //
    }
}
