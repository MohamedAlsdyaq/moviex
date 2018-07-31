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

Route::get('/', 'HomeController@index');

Route::get('/groups', function () {
    return view('groups');
});
Route::get('/list/1', function () {
    return view('list');
});
Route::get('/groups/{title}', function () {
    return view('group');
});

Route::get('/movie/{id}', 'MovieController@index');

Route::get('/tv/{id}', 'TvController@index');

Route::get('/show/posts/{id}', 'PostController@GetPostsForShow');

Route::get('/get/post/{id}', 'PostController@GetPostsForUser');

Route::get('/posts/get/global', 'PostController@global');
Route::get('/posts/get/tv', 'PostController@tv');
Route::get('/posts/get/movies', 'PostController@movies');
Route::get('/posts/get/following', 'PostController@following');

Route::get('/get/reaction/{id}', 'ReactionController@GetReactionsForUser');
Route::get('/get/library/{id}', 'LibraryController@GetLibraryMovies');
Route::get('/get/librarytv/{id}', 'LibraryController@GetLibraryTv');
Route::get('/get/list/{id}', 'LaistController@GetListForUser');
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




Route::get('/q',['uses' => 'SearchController@Search','as' => 'search']);Route::get('/q',['uses' => 'SearchController@Search','as' => 'search']);

Route::get('/profile/{id}', 'UserController@index');

Auth::routes();

Route::get('/block/{id}', 'FollowController@block');


Route::get('/block/{id}', 'FollowController@unblock');


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
Route::get('/like/review/{id}', 'LikeController@LikeReview');

Route::get('/like/post/{id}', 'LikeController@LikePost');

Route::get('/like/Reaction/{id}', 'LikeController@LikeReaction');

Route::get('/unlike/review/{id}', 'LikeController@UnlikeReview');

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
Route::post('/comment/create/{id}', 'CommentController@create');

Route::post('/post/create', 'PostController@create');

Route::post('/post/delete/{id}', 'PostController@create');


    /**
     * Manage Reactions 
     * 
     * @return 
     */

Route::post('/reaction/create', 'ReactionController@create');

Route::post('/reaction/delete/{id}', 'ReactionController@create');


Route::post('/follow', 'UserController@follow');

Route::post('/unfollow', 'UserController@unfollow');


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

Route::post('/report/post', 'PostController@report');

Route::post('/post/tv/{id}', 'PostController@PostTv');

Route::post('/entry/movie/lib/{id}', 'LibraryController@AddMovie');

Route::post('/entry/tv/lib/{id}', 'LibraryController@AddTv');

Route::post('/update/movie/lib', 'LibraryController@UpdateMovie');

Route::post('/update/tv/lib', 'LibraryController@UpdateTv');

Route::post('/delete/movie/lib', 'LibraryController@DeleteMovie');

Route::post('/delete/tv/lib', 'LibraryController@DeleteTv');

Route::get('/check_relationship/{id}', 'FollowController@check_our_relationship');


Route::post('/tv/update/quick', 'LibraryController@QuickUpdate');