<?php

namespace App\Http\Controllers;

use App\Show;
use Illuminate\Http\Request;
use Auth;
use App\Library;
use Tmdb\Repository\MovieRepository;

class MovieController extends Controller
{

     private $movies;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(MovieRepository $movies )
    {
        $this->movies = $movies;
    }


    public function index($id)
    {
        $token  = new \Tmdb\ApiToken('54f297aa644bf4f27044771fc75cbb64');
$client = new \Tmdb\Client($token);
$repository = new \Tmdb\Repository\MovieRepository($client);
 $movie = $client->getMoviesApi()->getMovie($id);
    
if($movie['poster_path'] == null )     
abort(404);
        $rate = null;

        if(Auth::check())
    $rate = Library::where('user_id', Auth::user()->id)
            ->where('show_id', $id)
            ->first();

            return View('movie')->with(
                'rate', $rate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function add($request, $id)
    {
        //
                //
        $token  = new \Tmdb\ApiToken('54f297aa644bf4f27044771fc75cbb64');
$client = new \Tmdb\Client($token);
$repository = new \Tmdb\Repository\MovieRepository($client);
 $movie = $client->getMoviesApi()->getMovie($id);

         Show::updateOrCreate([
 
 'id' => $id
       ], [
      
    'show_name' => preg_replace('/\"/', '\'',  $movie['title'])  ,
       'id' => $id,
       'show_pic' => $movie['poster_path'],
       'show_header' => $movie['backdrop_path'],
       'show_date' => $movie['release_date'],
       'show_bio' => preg_replace('/\"/', '\'',  $movie['overview']),
       'show_type' => 'movie',
       'show_rating' => $movie['vote_average'],
       'show_popularity' => $movie['popularity'],
       
       
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function explore()
    {
    $token  = new \Tmdb\ApiToken('54f297aa644bf4f27044771fc75cbb64');
    $client = new \Tmdb\Client($token);
    $repository = new \Tmdb\Repository\MovieRepository($client);
        
$box_office = $client->getMoviesApi()->getNowPlaying();
$popular    = $client->getMoviesApi()->getPopular();
$top_rated  = $client->getMoviesApi()->getTopRated();
$upcoming   = $client->getMoviesApi()->getUpcoming();


return View('exploremovies')->with([
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
    case 'theaters':
     $case = 'getNowPlaying';
        break;
    case 'top':
        $case = 'getPopular';
        break;
    case 'upcoming':
       $case = 'getUpcoming';
        break;
    case 'trending':
         $case = 'getPopular';
        break;
 }
 
$results= $client->getMoviesApi()->$case();
 
return View('highlight')->with([
        'results' => $results
       
]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public static function GetShows( $ids, $sort='show_name')
    {
        //
        return Show::whereIn('id', $ids)
                    ->orderBy($sort, 'asc')
                    ->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
