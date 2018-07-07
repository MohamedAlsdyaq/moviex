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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/groups', function () {
    return view('groups');
});
Route::get('/list/1', function () {
    return view('list');
});
Route::get('/groups/{title}', function () {
    return view('group');
});

Route::get('/movie/{id}', function () {
    return view('movie');
});

Route::get('/tv/{id}', function () {
    return view('tv');
});

Route::get('/user/{id}', function () {
    return view('user');
});

Route::get('/setting/account', function () {
    return view('settings');
});

Route::get('/series/{id}/ep/{ep}', function () {
    return view('movie');
});

Route::get('/search', function () {
    return view('advanced');
});




Route::get('/q',['uses' => 'SearchController@Search','as' => 'search']);Route::get('/q',['uses' => 'SearchController@Search','as' => 'search']);

Route::get('/profile/{id}', 'ProfileController@index');

Auth::routes();

    /**
     * Manage Posts 
     * 
     * @return 
     */
Route::get('/deactive/{pass}','UserController@destroy');

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

Route::get('/home', 'HomeController@index')->name('home');
