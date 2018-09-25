<?php

namespace App\Http\Controllers;

use App\Listentries;
use Illuminate\Http\Request;
use Auth;
class ListentriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function shows(Request $request, $id)
    {
       $ids =  Listentries::where('laist_id', $id)
              
                ->pluck('show_id');
               
      return  MovieController::GetShows($ids, $request['sort']);   
    }

    public function add(Request $request)
    {
        if(!is_null($request['movie_id'])){
            $movies_id = $request['movie_id'];
            MovieController::add(' ',$movies_id);
        }
        if(!is_null($request['tv'])){
            $movies_id = $request['tv'];
            TvController::add(' ',$movies_id);
        }
    Listentries::updateOrCreate([
 'laist_id' => $request['list_id'],
 'show_id' => $$movies_id
       ], [
      
       'user_id' => Auth::user()->id,
       'laist_id' => $request['list_id'],
       'show_id' => $movies_id      
    ]);
 

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetMyLists()
    {
        //
         return listentries::where('user_id', Auth::user()->id)

                    ->pluck('laist_id')->toJson();
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
     * @param  \App\Listentries  $listentries
     * @return \Illuminate\Http\Response
     */
    public function show(Listentries $listentries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Listentries  $listentries
     * @return \Illuminate\Http\Response
     */
    public function edit(Listentries $listentries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Listentries  $listentries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listentries $listentries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Listentries  $listentries
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listentries $listentries)
    {
        //
    }
}
