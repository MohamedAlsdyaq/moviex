<?php
namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Auth;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public static function GetUserByComId($id){

  return Comment::select('user_id')->whereId($id)->first()->user_id;


 }
 public function report(Request $request)
    {
        //
    
        DB::table('reports')->insert(
      [
        'post_id' => $request['id'],
        'comment' => $request['comment'],
        'type'    => $request['type'],
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
    
        $post = new comment;
        $post->user_id = Auth::user()->id;
        $post->post_id = $request['post'];
        $post->content = $request['comment'];
        $post->save();

 $tags = SearchController::SearchString($request['comment'], '@');
        if($tags)
        NotificationController::store($tags, $request['post'], 'mention');
   
     $user =  PostController::GetUserByPostId($request['post']);      
  NotificationController::store($user, $request['post'], 'comment');


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
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function getCommentsforPost($p_id)
    {
        return Comment::where('post_id', $p_id)
                ->with('replies')
                 ->with('likes')
                ->with('user')     
             ->orderBy('updated_at', 'desc')
             ->get();
           
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
      public static function DeleteAll($id){
        Post::where('user_id', $id)
                ->delete();
    }
        public function delete_parent(Request $request){
 
$post =  Comment::find($request['id']);
$post->delete(); 
    }
 

}
