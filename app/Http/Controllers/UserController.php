<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
 use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
        public static function getId($name)
    {
        
        return User::where('name', $name)->first()->id ;
    }
    
    public static function GetUsersById($ids){
        return User::whereIn('id', $ids)
            ->get();
    }
    public function Settings(){
        $blocked = BlockController::BlockedList( );
        $blocked = User::whereIn('id', $blocked)->get();

         return view('settings')->with('blocks', $blocked);
    }
    public function index($id)
    {

    	/*$postcount = PostController::PostCount($id);
    	$librariescount = LibraryController::LibCount($id);
    	$groupscount = GroupentriesController::GroupCount($id);
    	$listcount = LaistController::listcount($id);
    	$followingcount = FollowController::followingcount($id);
    	$followercount = FollowController::followercount($id);
    	$reactioncount = ReactionController::reactioncount($id);*/
        $favs = FavoriteController::index($id);
    	$user = User::whereId($id)->first() ;
    	$links=\App\Link::where('user_id', $id)->get();		
    			


    	return View('user')->with([
    		'user' => $user,
    		 'favs' => $favs,
             'links' => $links
    		]);
    }
    public function destroy(){

            //    ItemController::DeleteAll(Auth::user()->id);

        PostController::DeleteAll(Auth::user()->id);

        ReactionController::DeleteAll(Auth::user()->id);

        LaistController::DeleteAll(Auth::user()->id);

        CommentController::DeleteAll(Auth::user()->id);

         User::findOrFail(Auth::user()->id)
            ->delete();
    }

     public function UpdatePicture(Request $request)
    {
        $now = new \DateTime();
        //
      if(!File::exists(public_path('users/'.Auth::user()->id) )) {
            File::makeDirectory(public_path('users/'.Auth::user()->id),0777,true);
            }

          if($request['image']){
            $path = '/users/'.Auth::user()->id;
          $filename = $now->getTimestamp().'.jpg';
       

            Image::make($request['image'])->fit(200, 200)->save(public_path($path. '/' . $filename));
 



            $user =  \App\User::find(Auth::user()->id);
            $user->picture = $path.'/'.$filename;
            $user->save();
     
        }

       
       
    }

    public function UpdateHeader(Request $request){
           $now = new \DateTime();
        //
      if(!File::exists(public_path('users/'.Auth::user()->id) )) {
            File::makeDirectory(public_path('users/'.Auth::user()->id),0777,true);
            }
           if($request['header']){
            $path = '/users/'.Auth::user()->id;
          $filename = $now->getTimestamp().'.jpg';
       

            Image::make($request['header'])->fit(600, 200)->save(public_path($path. '/' . $filename));
 



            $user =  \App\User::find(Auth::user()->id);
            $user->header = $path.'/'.$filename;
            $user->save();
     
        }
    }

 
     public function UpdateProfile(Request $request)
    {
        //

     $validator = Validator::make($request->all(), [
           'uname' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users',
        ]);

        if ($validator->fails()) {
            return $validator 
                        ->withErrors($validator)
                        ->withInput();
        }

    
          

         User::where('id', Auth::user()->id)->update([
            'email' => $request['email'],
            'name' =>$request['uname']   
        ]);
    }

      public function UpdateInfo(Request $request)
    {
        //       
         User::whereId( Auth::user()->id)->update([
            'location' => $request['location'],
              'bio' => $request['bio'],
            'birthday' =>$request['birthday']   
        ]);
    }

public function rules()
{
    return [
         'uname' => 'bail|string|max:255',
            'email' => 'bail|string|email|max:255|unique:users',
    ];
}
public function messages()
{
    return [
        'title.required' => 'A title is required',
        'body.required'  => 'A message is required',
    ];
}
public function CreateLink(Request $request)
{

    \App\Link::updateOrCreate([
'user_id' => Auth::user()->id, 'vendor' => $request['vendor']
],[
'user_id' => Auth::user()->id, 'vendor' => $request['vendor'], 'link' => $request['link']
]);
}

}
