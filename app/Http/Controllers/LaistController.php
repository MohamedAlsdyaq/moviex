<?php

namespace App\Http\Controllers;

use App\Laist;
use Illuminate\Http\Request;
use Auth;
use Intervention\Image\Facades\Image as Image;
class LaistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function index_page()
    {
        //
        return Laist::withCount('listentries')
                ->paginate(10);
    }
        public function search(Request $query, $sort='created_at', $type=['movies', 'tv']){
           
           if($query['type'])
            $type = [$query['type'] ];
          if(isset($query['sort']))
            $sort = $query['sort'];
$qr = $query['query'];
 
        return Laist::whereIn('type', $type)
                    ->where('type', 'public')
                    ->where('title', 'LIKE', "%{$qr}%")
                    ->orWhere('list_info', 'LIKE', "%{$qr}%" )
                    ->orderBy($sort, 'desc')
                    ->withCount('Listentries')
                    ->paginate(10);

    }
     public function store(Request $request)
    {
        //
        $rand = rand();
       
            $media = $request['picture'];
            $filename = $rand.'.jpg';
            //$location = public_path('posts'. DIRECTORY_SEPARATOR, $filename);
           // $media->storeAs($path, $filename);
            Image::make($media)->fit(200, 200)->save(public_path('lists/'.$filename));
 
        
        $qr = new Laist;
        $qr->user_id = Auth::user()->id;
        $qr->title = $request['name'];
        $qr->list_info = $request['bio'];
        $qr->list_picture = $filename;
        $qr->type = $request['list_type'];
        $qr->save();

        return redirect('/list/'.$qr->id);
    }

      public function GroupPage($id)
    {
        $subscribtion = 0;
        if(Auth::check()){
           $check = listentries::where([
                'user_id' => Auth::user()->id,
                'list_id' => $id
            ])
                ->first();
            if(   $check     )
         $subscribtion = 1;
        }

        $group = Laist::whereId($id)
                 ->with('listentries.user')  
                 ->with('posts') 
                 ->first();

        return view('list')->with([
            'list' => $group
            ,'subscribtion' => $subscribtion
        ]);
    }

    public static function GetListForUser($id)
    {
        //

         return Laist::where('user_id', $id)
             ->orderBy('updated_at', 'desc')
               ->withCount('listentries')
         ->paginate(20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       $data =  Laist::whereId($id)
           
                ->with('user')
                ->first();
 
                return View('list')->with([
                    'data' => $data
                    ]);
    }
       
        

    
    public static function listcount($id)
    {
         return Laist::where('user_id', Auth::user()->id)
        ->count();
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
