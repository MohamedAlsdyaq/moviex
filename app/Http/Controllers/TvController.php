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
     public static function add(  $id)
    {
        //
  $token  = new \Tmdb\ApiToken('54f297aa644bf4f27044771fc75cbb64');
$client = new \Tmdb\Client($token);
 
 $movie = $client->getTvApi()->getTvshow( $id);

 
         Show::updateOrCreate([
 
 'id' => $id
       ], [
      
      'show_name' => preg_replace('/\"/', '\'',  $movie['name']),
       'id' => $id,
       'show_pic' => $movie['poster_path'],
       'show_header' => $movie['backdrop_path'],
       'show_date' => $movie['first_air_date'],
       'show_bio' => preg_replace('/\"/', '\'',  $movie['overview']),
       'show_rating' => $movie['vote_average'],
       'show_popularity' => $movie['popularity'],
         'show_type' => 'tv',
       'seasons' => $movie['number_of_seasons'],
       'ep_count' => $movie['number_of_episodes'],
       
    ]);
         return $movie['number_of_episodes'];
    }
    public function index($id)
    {
$token  = new \Tmdb\ApiToken('54f297aa644bf4f27044771fc75cbb64');
$client = new \Tmdb\Client($token);
$movie = $client->getTvApi()->getTvshow( $id);
    
if($movie['poster_path'] == null )     
abort(404);
        $rate = null;

        if(Auth::check())
    $rate = Library::where('user_id', Auth::user()->id)
            ->where('show_id', $id)
            ->first();

            return View('tv')->with([
                'rate' => $rate,
                'id'  => $id
            ]);
    }

    public function explore()
    {
    $token  = new \Tmdb\ApiToken('54f297aa644bf4f27044771fc75cbb64');
    $client = new \Tmdb\Client($token);
    $repository = new \Tmdb\Repository\MovieRepository($client);
        
$box_office = $client->getTvApi()->getAiringToday();
$popular = $client->getTvApi()->getPopular();
$top_rated = $client->getTvApi()->getTopRated();
$upcoming = $client->getTvApi()->getOnTheAir();

return View('exploretv')->with([
        'box_office' => $box_office, 
        'popular' => $popular,
        'top_rated' => $top_rated,
        'upcoming' => $upcoming
]);


    }

  public function highlights($title)
    {
    $token  = new \Tmdb\ApiToken('54f297aa644bf4f27044771fc75cbb64');
    $client = new \Tmdb\Client($token);
    $repository = new \Tmdb\Repository\MovieRepository($client);
        
switch ($title) {
    case 'airing_today':
     $case = 'getAiringToday';
        break;
    case 'popular':
        $case = 'getPopular';
        break;
    case 'top_rated':
       $case = 'getTopRated';
        break;
    case 'airing':
         $case = 'getOnTheAir';
        break;
 }
 
$results= $client->getTvApi()->$case();
 
return View('highlightTv')->with([
        'results' => $results
       
]);


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
