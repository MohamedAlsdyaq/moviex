<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Follow;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
 
  public function global(){
      return Post::with('user')
            ->with('likes')
            ->with('comments')
            ->with('postcontents')
             ->orderBy('updated_at', 'desc')
          ->paginate(3); 
  }
    public function following(){
      $ids =  Follow::where('user1', $id)
       // ->where('active', 1)
        ->pluck('user2');
      return Post::whereIn('user_id', $ids)
            ->with('user')
            ->with('likes')
            ->with('comments')
            ->with('postcontents')
             ->orderBy('updated_at', 'desc')
          ->paginate(3); 
  }
    public function movies(){
      return Post::with('user')
            ->with('likes')
            ->with('comments')
            ->with('postcontents')
             ->orderBy('updated_at', 'desc')
          ->paginate(3); 
  }
    public function tv(){
      return Post::with('user')
            ->with('likes')
            ->with('comments')
            ->with('postcontents')
             ->orderBy('updated_at', 'desc')
          ->paginate(3); 
  }
    public function report(Request $request)
    {
        //
    
        DB::table('reports')->insert(
      [
        'post_id' => $request['id'],
        'comment' => $request['comment'],
        'reason' => $request['reason'] 
        ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    
 

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->show_id = $request['movie_id'];
        $post->content = $request['post'];
        $post->spoiler = $request['spoiler'];
        $post->ep_id = $request['ep_id'];
        $post->save();
 if($request['imgs']){
if(count( $request['imgs'] ) != null );
        PostcontentController::create($request['imgs'], $post->id);
    }
  }

    public function GetPostsForShow($id){
        return Post::where('show_id', $id)
            ->with('user')
            ->with('likes')
            ->with('comments')
            ->with('postcontents')
             ->orderBy('updated_at', 'desc')
          ->paginate(3);
             
    }
     public function GetPostsForUser($id){
        $posts =   Post::where('user_id', $id)
            ->with('user')
            ->with('likes')
            ->with('show')
            ->with('comments')
            ->with('postcontents')
            ->with('user')
             ->orderBy('updated_at', 'desc')
         ->get();
  $library = LibraryController::GetUserEntries($id);
    
        $posts = $posts->merge($library)->sortBy('updated_at');
 
         return $posts;
    

    }
    public static function PostCount($id){
        return Post::where('user_id', Auth::user()->id)
        ->count();
    }

  public static function DeleteAll($id){
        Post::where('user_id', $id)
                ->delete();
    }
}
