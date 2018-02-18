<?php

// first page after login
Route::get('/','PostsController@welcome')->middleware('auth');
// post crud
Route::resource('/post','PostsController');

// Chatbox
Route::get('/messages','MessageController@index');
Route::post('/messages','MessageController@store');

// Auth
Auth::routes();
// email verification and redirect to profile  ++  profile picture
Route::get('/profile/{userid}', 'ProfileController@index')->name('profile');
Route::post('/profilepic', 'ProfileController@profilepic');

// Route::get('/email', 'ProfileController@email');
Route::get('/email_verify','Auth\RegisterController@emailverify');
Route::get('/verified/{token}','Auth\RegisterController@verified');

// Comment
Route::get('/comment/{post}','CommentController@index');
Route::post('/comment/{post}','CommentController@store');

// search 
Route::get('/searching/{search}','SearchController@searching');
Route::get('/search/{search}','SearchController@search');

// notifications
Route::get('/markread','NotificationController@markreadall');
Route::get('/markread/{notificationid}/{postid}','NotificationController@markread');

// likes
Route::get('post/{id}/islikedbyme', 'LikeController@isLikedByMe');
Route::post('post/like', 'LikeController@like');