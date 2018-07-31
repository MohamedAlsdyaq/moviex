<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Library as Library;
use Illuminate\Http\Request;
use Auth;
class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function LibCount($id)
    {
        return Library::where('user_id', Auth::user()->id)
        ->count();
    }

    public static function CurrentTv(){
        return Library::where(['user_id' => Auth::user()->id, 'type' =>1, 'status'=> 'watching'])->with('show')->get();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddMovie(Request $request, $id)
    {

         MovieController::add($request, $id);

      $id =  Library::updateOrCreate([
 'user_id' => Auth::user()->id,
 'show_id' => $request['movie_id']
       ], [
      
       'user_id' => Auth::user()->id,
       'show_id' => $request['movie_id'],
       'status' => $request['status'],
       'rate' => $request['score'],
       'type' => 0
       
    ]);
  HistoryController::add( $id->id, $request);
  
}

     public function AddTv(Request $request, $id)
    {
    $id = (int) $id;        
  TvController::add($request, $id);

   $lib_id =    Library::updateOrCreate([
     'show_id' => $id,
 'user_id' => Auth::user()->id,

       ], [
      
       'user_id' => Auth::user()->id,
       'show_id' => $id,
       'status' => $request['status'],
       'rate' => $request['score'],
       'type' => 1
       
    ]);

  HistoryController::add( $lib_id->id, $request);
  return  $id ;   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function UpdateMovie(Request $request)
    {
        
     $entry =   Library::find($request['id']);

     $entry->status = $request['status'];
     $entry->started_at = $request['started_at'];
     $entry->finished_at = $request['finished_at'];
     $entry->rewatch_count = $request['rewatch'];
     
     $entry->note = $request['note'];

     $entry->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function UpdateTv(Request $request)
    {
     $entry =   Library::find($request['id']);

     $entry->status = $request['status'];
     $entry->started_at = $request['started_at'];
     $entry->finished_at = $request['finished_at'];
     $entry->rewatch_count = $request['rewatch'];
     $entry->ep_count = $request['progress'];
     $entry->note = $request['note'];

     $entry->save();

    }

        public function DeleteTv(Request $request)
    {
        $entry = Library::find($request['id']);
        if($entry['user_id'] == Auth::user()->id){

             Library::findOrFail($request['id'])
            ->delete();
        }
    }


        public function DeleteMovie(Request $request)
    {
        $entry = Library::find($request['id']);
        if($entry['user_id'] == Auth::user()->id){

             Library::findOrFail($request['id'])
            ->delete();
        }
    }
 
    public function CheckSpoiler($id)
    {
        if(Auth::guest())
            return 0;

        return Library::where('user_id', Auth::user()->id)
                ->where('show_id', $id)
                ->first()->ep_count;
    }

    public function GetLibraryMovies($id){
        return Library::where(['type' =>  0,'user_id' =>  $id])
        ->orderBy('updated_at', 'desc')
          ->with('show')
        ->paginate(20);
    }
        public function GetLibraryTv(Request $request, $id, $sort='created_at', $status=['watching', 'dropped', 'completed']){
           
           if($request['status'])
            $status = [$request['status'] ];
          if(isset($request['sort']))
            $sort = $request['sort'];
 
        return Library::where(['type' =>  1,'user_id' => $id])
         ->with('show')
         ->whereIn('status', $status)
        ->orderBy($sort, 'desc')

        ->paginate(1);
    }
            public static function GetUserEntries($id){
    return Library::where('user_id', $id)
         ->with('show')
         ->with('history')
        ->orderBy('updated_at', 'desc')
        ->get();
    }
 public function QuickUpdate(Request $request){

         Library::whereId($request['id'])
            ->increment('ep_count');
        $data = Library::find($request['id'])->first();
         //    HistoryController::add( $request['id'], $data, 'ep_seen');
 }
}
