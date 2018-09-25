<?php

namespace App\Http\Controllers;

use App\Reaction;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class ReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Dedicated($id){

      return View('reaction')->with([
        'id' => $id
      ]);
}

public function reaction($id){
    return  Reaction::with('user')
            ->whereId($id)
            ->with('likes')
               ->with('show')
             ->orderBy('updated_at', 'desc')
              
          ->paginate(1); 

}
    public function GetReactionsForUser($id)
    {
        //
          return Reaction::where('user_id', $id)
            
            ->with('likes')
            ->with('show')
            ->with('comments')
             ->orderBy('updated_at', 'desc')
          ->paginate(6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $react = new Reaction;
        $react->user_id = Auth::user()->id;
        $react->show_id = $request['movie_id'];
        $react->reaction = $request['reaction'];
        $react->save();
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
     * @param  \App\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public static function reactioncount($id)
    {
        //

        return Reaction::where('user_id', Auth::user()->id)
        ->count();
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Reaction $reaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reaction $reaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reaction $reaction)
    {
        //
    }
      public static function DeleteAll($id){
        Post::where('user_id', $id)
                ->delete();
    }
}
