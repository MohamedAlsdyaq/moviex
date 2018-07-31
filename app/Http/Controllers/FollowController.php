<?php

namespace App\Http\Controllers;

use App\Follow;
use Illuminate\Http\Request;
use Auth;
class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check_our_relationship($id)
    {
        //
        return Follow::select('active')->
        where(['user1' => Auth::user()->id, 'user2' => $id])
                ->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function follow()
    {
        //
          Follow::updateOrCreate([
 'user1' => Auth::user()->id,
 'user2' => $id
       ], [
      
       'user1' => Auth::user()->id,
       'user2' => $id,
       'active' => 0      
    ]);
    }
        public function unfollow()
    {
        //
          Follow::updateOrCreate([
 'user1' => Auth::user()->id,
 'user2' => $id
       ], [
      
       'user1' => Auth::user()->id,
       'user2' => $id,
       'active' => 1       
    ]);
    }

    public function block($id)
    {
        //
         Follow::updateOrCreate([
 'me' => Auth::user()->id,
 'user' => $id
       ], [
      
       'me' => Auth::user()->id,
       'user' => $id,
       'active' => 2       
    ]);

    }

        public function unblock($id)
    {
        //
        Follow::where( ['user1' => Auth::user()->id, 'user2' => $id])
            ->delete();

    }
    public function GetFollower($id){
       $ids =   Follow::where('user1', $id)
       // ->where('active', 1)
        ->pluck('user2');
       return UserController::GetUsersById($ids);
    }
        public function GetFollowing($id){
       $ids =   Follow::where('user2', $id)
       // ->where('active', 1)
        ->pluck('user1');
       return UserController::GetUsersById($ids);
    }
             public static function followingcount($id)
    {
        return Follow::where('user1', Auth::user()->id)
        ->count();
    }
                 public static function followercount($id)
    {
        return Follow::where('user2', Auth::user()->id)
        ->count();
    }
                 public static function following ($id)
    {
        return Follow::where('user1', Auth::user()->id)
        ->get();
    }
                 public static function follower ($id)
    {
        return Follow::where('user2', Auth::user()->id)
        ->get();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Follow $follow)
    {
        //
    }
}
