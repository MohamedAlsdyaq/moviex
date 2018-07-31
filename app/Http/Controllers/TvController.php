<?php

namespace App\Http\Controllers;

use App\Tv;
use Illuminate\Http\Request;
use Auth;
use App\Library;
use App\Show;
class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public static function add($request, $id)
    {
        //
         Show::updateOrCreate([
 
 'id' => $id
       ], [
      
       'show_name' => $request['movie_name'],
       'id' => $id,
       'show_pic' => $request['movie_pic'],
       'ep_count' => $request['ep_count'],
       
    ]);
    }
    public function index($id)
    {
        
        $rate = null;

        if(Auth::check())
    $rate = Library::where('user_id', Auth::user()->id)
            ->where('show_id', $id)
            ->first();

            return View('tv')->with([
                'rate' => $rate]);
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
     * @param  \App\Tv  $tv
     * @return \Illuminate\Http\Response
     */
    public function show(Tv $tv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tv  $tv
     * @return \Illuminate\Http\Response
     */
    public function edit(Tv $tv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tv  $tv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tv $tv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tv  $tv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tv $tv)
    {
        //
    }
}
