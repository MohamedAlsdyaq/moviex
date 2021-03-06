<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Auth;
class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function LikePost($id)
    {
        //
      $user =  PostController::GetUserByPostId($id);
        if(Auth::guest())
            return 0;
        $like = new Like;
        $like->user_id = Auth::user()->id;
        $like->post_id = $id;
        $like->type = 'post';
        $like->save();

 NotificationController::store($user, $id);

        return 1;
    }

    public function LikeComment($id)
    {
        //
         $user =  PostController::GetUserByPostId($id);
        if(Auth::guest())
            return 0;
        $like = new Like;
        $like->user_id = Auth::user()->id;
        $like->post_id = $id;
        $like->type = 'comment';
        $like->save();
       NotificationController::store($user, $id);
        return 1;
    }

     public function LikeReaction($id)
    {
         $user =  PostController::GetUserByPostId($id);
        //
        if(Auth::guest())
            return 0;
        $like = new Like;
        $like->user_id = Auth::user()->id;
        $like->post_id = $id;
         $like->type = 'reaction';
        $like->save();
        NotificationController::store($user, $id);
       return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
