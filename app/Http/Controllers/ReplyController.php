<?php
namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;
use Auth;
use DB;
class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    
        $post = new reply;
        $post->user_id = Auth::user()->id;
        $post->comment_id = $request['comment'];
        $post->content = $request['reply'];
        $post->save();

 $tags = SearchController::SearchString($request['reply'], '@');
        if($tags)
        NotificationController::store($tags, $request['comment'], 'mention');
   if($request['type'] == 'comment')
     $user =  PostController::GetUserByPostId($request['comment']);
   if($request['type'] == 'reply')
     $user =  CommentController::GetUserByComId($request['comment']);      
  NotificationController::store($user, $request['comment'], 'reply');


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
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        //
    }
      public static function DeleteAll($id){
        Post::where('user_id', $id)
                ->delete();
    }
            public function delete_parent(Request $request){
 
$post =  Reply::find($request['id']);
$post->delete(); 
    }
}
