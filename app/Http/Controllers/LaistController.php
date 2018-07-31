<?php

namespace App\Http\Controllers;

use App\Laist;
use Illuminate\Http\Request;
use Auth;
class LaistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetListForUser($id)
    {
        //

         return Laist::where('user_id', $id)
             ->orderBy('updated_at', 'desc')
         ->paginate(6);
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
     * @param  \App\Laist  $laist
     * @return \Illuminate\Http\Response
     */
    public static function listcount($id)
    {
         return Laist::where('user_id', Auth::user()->id)
        ->count();
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laist  $laist
     * @return \Illuminate\Http\Response
     */
    public function edit(Laist $laist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laist  $laist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laist $laist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laist  $laist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laist $laist)
    {
        //
    }
      public static function DeleteAll($id){
        Post::where('user_id', $id)
                ->delete();
    }
}
