<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', 'AdminController@user')->name('user');
Route::get('/approveUser/{id}', 'AdminController@approveUser')->name('approveUser');
Route::get('/rejectUser/{id}', 'AdminController@rejectUser')->name('rejectUser');
Route::get('/editUser/{id}', 'AdminController@editUser')->name('editUser');
Route::get('/saveUserType/{id}', 'AdminController@saveUserType')->name('saveUserType');
Route::get('/filterUser', 'AdminController@filterUser')->name('filterUser');
Route::get('/profile', 'AdminController@profile')->name('profile');
Route::post('/updateProfile', 'AdminController@updateProfile')->name('updateProfile');

Route::get('/newThread','ThreadController@newThread')->name('newThread');
Route::get('/saveNewThread','ThreadController@saveNewThread')->name('saveNewThread');
Route::get('/adminViewThreads','ThreadController@adminViewThreads')->name('adminViewThreads');
Route::get('/adminViewThreadsRequest','ThreadController@adminViewThreadsRequest')->name('adminViewThreadsRequest');
Route::get('/adminViewBlockedThreads','ThreadController@adminViewBlockedThreads')->name('adminViewBlockedThreads');
Route::get('/timelineThreads','ThreadController@timelineThreads')->name('timelineThreads');
Route::get('/makeFavourite/{id}','ThreadController@makeFavourite')->name('makeFavourite');
Route::get('/makeBlock/{id}','ThreadController@makeBlock')->name('makeBlock');
Route::get('/approveThread/{id}','ThreadController@approveThread')->name('approveThread');
Route::get('/rejectThread/{id}','ThreadController@rejectThread')->name('rejectThread');
Route::get('/filterNewsFeedThreads','ThreadController@filterNewsFeedThreads')->name('filterNewsFeedThreads');

Route::get('/likeThread/{threadid}/{userid}','LikeController@likeThread')->name('likeThread');
Route::get('/viewLikedUser/{threadid}/{likedislike}','LikeController@viewLikedUser')->name('viewLikedUser');
Route::get('/dislikeThread/{threadid}/{userid}','LikeController@dislikeThread')->name('dislikeThread');

Route::get('/viewOrAddComment/{threadid}','CommentController@viewOrAddComment')->name('viewOrAddComment');
Route::get('/addComment/{threadid}','CommentController@addComment')->name('addComment');
Route::get('/removeComment/{id}/{threadid}','CommentController@removeComment')->name('removeComment');

