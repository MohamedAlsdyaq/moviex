<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/explore/movies', 'MovieController@explore');

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/explore/movies/{title}', 'MovieController@highlights');

Route::get('/explore/tv', 'TvController@explore');

Route::get('/explore/tv/{title}', 'TvController@highlights');

Route::get('/', 'HomeController@index');

Route::get('/testtmdb', 'TvController@add');
Route::get('/lists/search', 'LaistController@search');
Route::get('/list/join/{id}', 'ListentriesController@join');
Route::get('/list/leave/{id}', 'ListentriesController@leave');

Route::post('/list/entry/add', 'ListentriesController@add');

Route::get('/list', function () {
    return view('lists');
});
Route::post('/lists/create/store', 'LaistController@store');
Route::get('/lists/get/ids', 'ListentriesController@GetMyLists');

Route::get('/group', function () {
    return view('groups');
});
Route::get('/lists/create', function () {
    return view('create_list');
});
Route::get('/lists/index', 'LaistController@index_page');
Route::get('/groups/index', 'GroupController@index');
Route::get('/groups/get', 'GroupentriesController@UserGroups');
Route::get('/group/join/{id}', 'GroupentriesController@join');
Route::get('/group/leave/{id}', 'GroupentriesController@leave');
Route::get('/group/check/{id}', 'GroupentriesController@check');
Route::get('/groups/search', 'GroupController@search');
 Route::get('/get/follower/ids', 'FollowController@GetFollowingIds');
Route::get('/group/retrive_posts/{id}', 'PostController@GroupPosts');

Route::get('/group/users/{id}', 'GroupentriesController@GroupUsers');

Route::get('/groups/create', function () {
    return view('create_group');
});
Route::post('/groups/create/store', 'GroupController@store');

Route::get('/groups/get/ids', 'GroupentriesController@GetMyGroups');

Route::get('/list/{id}', 'LaistController@index');

Route::get('/group/{id}', 'GroupController@GroupPage');

Route::get('/movie/{id}', 'MovieController@index');

Route::get('/tv/{id}', 'TvController@index');

Route::get('/show/posts/{id}', 'PostController@GetPostsForShow');

Route::get('/comment/get/{id}', 'CommentController@getCommentsforPost');

Route::get('/get/post/{id}', 'PostController@GetPostsForUser');

Route::get('/posts/get/global', 'PostController@globals');

Route::get('/posts/get/tv', 'PostController@tv');

Route::get('/posts/get/movies', 'PostController@movies');

Route::get('/posts/get/following', 'PostController@following');

Route::get('/get/reaction/{id}', 'ReactionController@GetReactionsForUser');

Route::get('/get/library/{id}', 'LibraryController@GetLibraryMovies');

Route::get('/get/librarytv/{id}', 'LibraryController@GetLibraryTv');

Route::get('/get/list/{id}', 'LaistController@GetListForUser');

Route::get('/get/list/entries/{id}', 'ListentriesController@shows');

Route::get('/get/following/{id}', 'FollowController@GetFollowing');

Route::get('/get/follower/{id}', 'FollowController@GetFollower');

Route::get('/get/following/{id}', 'FollowController@GetFollowing');

Route::get('/get/group/{id}', 'GroupController@GetGroupsForUser');

Route::get('/spoiler/check/{id}', 'LibraryController@CheckSpoiler');

Route::get('/user/{id}', 'UserController@index');

Route::get('/series/{id}/ep/{ep}', function () {
    return view('movie');
});

Route::get('/search/movies', function () {
    return view('advanced');
});

Route::get('/search/tv', function () {
    return view('advanced_tv');
});

Route::get('/q',['uses' => 'SearchController@Search','as' => 'search']);

Route::get('/q',['uses' => 'SearchController@Search','as' => 'search']);

Route::get('/profile/{id}', 'UserController@index');
Route::get('/profile/{id}/{title}', 'UserController@index');

Route::get('/dumy/{id}', 'FavoriteController@index');

Auth::routes();

Route::get('/block/{id}', 'FollowController@block');

Route::get('/unblock/{id}', 'FollowController@unblock');


    /**
     * Manage Posts 
 * 
     * @return 
     */
Route::get('/deactive/account','UserController@destroy');

Route::get('/settings/account/deactive', function(){
	return View('modules.delete');
});


    /**
     * Manage Liking and disliking of al types 
     * 
     * @return \Illuminate\Http\LikeController
     */
Route::get('/like/comment/{id}', 'LikeController@LikeComment');

Route::get('/like/post/{id}', 'LikeController@LikePost');

Route::get('/like/reaction/{id}', 'LikeController@LikeReaction');


Route::get('/unlike/comment/{id}', 'LikeController@UnlikeComment');

Route::get('/unlike/post/{id}', 'LikeController@UnlikePost');

Route::get('/unlike/Reaction/{id}', 'LikeController@UnlikeReaction');

// Set Notification flag to false 
Route::get('/notifications/saw', 'NotificationController@update');
Route::get('/notifications/count', 'NotificationController@show');


    /**
     * Manage Posts 
     * 
     * @return 
     */
Route::post('/comment/create/', 'CommentController@create');
Route::post('/reply/create/', 'ReplyController@create');

Route::post('/post/create', 'PostController@create');

Route::post('/post/delete/{id}', 'PostController@create');


    /**
     * Manage Reactions 
     * 
     * @return 
     */

Route::post('/reaction/create', 'ReactionController@create');

Route::post('/reaction/delete/{id}', 'ReactionController@create');


Route::get('/follow/{id}', 'FollowController@follow');

Route::get('/unfollow/{id}', 'FollowController@unfollow');


Auth::routes();

Route::get('/setting/account','UserController@Settings');

 
Route::post('/profile/update_picturer','UserController@UpdatePicture');

Route::post('/profile/UpdateHeader','UserController@UpdateHeader');


Route::post('/profile/update', 'UserController@UpdateProfile');

Route::post('/profile/update_info', 'UserController@UpdateInfo');

Route::post('/profile/change_pass', 'UserController@UpdatePass');

Route::post('/profile/add_link', 'UserController@CreateLink');

Route::post('/profile/privacy', 'UserController@UpdatePrivacy');

Route::get('/favorites/delete/{id}','FavoriteController@delete');

 

Route::post('/post/movie/{id}', 'PostController@PostMovie');

Route::get('/post/{id}', 'PostController@Dedicated');

Route::get('/post/get/{id}', 'PostController@post');

Route::get('/reaction/{id}', 'ReactionController@Dedicated');

Route::get('/reaction/get/{id}', 'ReactionController@reaction');

Route::post('/report/post', 'PostController@report');

Route::post('/report/cpmment', 'CommentController@report');

Route::post('/report/reply', 'ReplyController@report');

Route::post('/delete/post', 'PostController@delete_parent');

Route::post('/delete/comment', 'CommentController@delete_parent');

Route::post('/delete/reply', 'ReplyController@delete_parent');

Route::post('/post/tv/{id}', 'PostController@PostTv');

Route::post('/entry/movie/lib/{id}', 'LibraryController@AddMovie');

Route::post('/entry/tv/lib/{id}', 'LibraryController@AddTv');

Route::post('/update/movie/lib', 'LibraryController@UpdateMovie');

Route::post('/update/tv/lib', 'LibraryController@UpdateTv');

Route::post('/delete/movie/lib', 'LibraryController@DeleteMovie');

Route::post('/delete/tv/lib', 'LibraryController@DeleteTv');

Route::get('/check_relationship/{id}', 'FollowController@check_our_relationship');


Route::post('/tv/update/quick', 'LibraryController@QuickUpdate');

Route::get('/notifications', 'NotificationController@index');

Route::get('/notifications/get', 'NotificationController@get');
Route::get('/notifications/count', 'NotificationController@show');
Route::get('/notifications/saw', 'NotificationController@update');
