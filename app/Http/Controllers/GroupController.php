<?php

namespace App\Http\Controllers;

use App\Group;
use App\Groupentries;
use Illuminate\Http\Request;
use Auth;
use redirect;
use Illuminate\Support\Facades\File;
 
use Intervention\Image\Facades\Image as Image;
 
 

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Group::withCount('posts')
                ->withCount('Groupentries')
                ->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $query, $sort='created_at', $type=['movies', 'tv']){
           
           if($query['type'])
            $type = [$query['type'] ];
          if(isset($query['sort']))
            $sort = $query['sort'];
$qr = $query['query'];
 
        return Group::whereIn('type', $type)

                    ->where('name', 'LIKE', "%{$qr}%")
                    ->orWhere('bio', 'LIKE', "%{$qr}%" )
                    ->orderBy($sort, 'desc')
                    ->withCount('Groupentries')
                    ->paginate(10);

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
        $rand = rand();
       
            $media = $request['picture'];
            $filename = $rand.'.jpg';
            //$location = public_path('posts'. DIRECTORY_SEPARATOR, $filename);
           // $media->storeAs($path, $filename);
            Image::make($media)->fit(200, 200)->save(public_path('groups/'.$filename));
 
        
        $qr = new Group;
        $qr->creater_id = Auth::user()->id;
        $qr->name = $request['name'];
        $qr->bio = $request['bio'];
        $qr->picture = $filename;
        $qr->type = $request['group_type'];
        $qr->save();

        return redirect('/group/'.$qr->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function GroupPage($id)
    {
        $subscribtion = 0;
        if(Auth::check()){
           $check = Groupentries::where([
                'user_id' => Auth::user()->id,
                'group_id' => $id
            ])
                ->first();
            if(   $check     )
         $subscribtion = 1;
        }

        $group = Group::whereId($id)
                 ->with('groupentries.user')  
                 ->with('posts') 
                 ->first();

        return view('group')->with([
            'group' => $group
            ,'subscribtion' => $subscribtion
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
