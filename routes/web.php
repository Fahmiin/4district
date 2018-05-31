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

//LANDING PAGE
Route::view('/', 'index');
Route::get('/home', 'MainController@homePage')->name('home');

//AUTH
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//POST
Route::post('/post', 'PostController@createPost')->name('createPost');
Route::post('/post/edit/{id}', 'PostController@editPost')->name('editPost');
Route::delete('/post/delete/{id}', 'PostController@deletePost')->name('deletePost');
Route::post('/like', 'PostController@createLike')->name('createLike');

//PROFILE
Route::view('/profile', 'profile')->name('profilePage');

//BOOKMARK
Route::get('/bookmarks', 'BookmarkController@bookmarksPage')->name('bookmarksPage');
Route::post('/bookmark', 'BookmarkController@createBookmark')->name('createBookmark');

//ASK
Route::get('/ask', 'AskController@showAsk')->name('ask');
Route::post('/question', 'AskController@createQuestion')->name('createQuestion');
Route::post('/question/edit/{id}', 'AskController@editQuestion')->name('editQuestion');
Route::delete('/question/delete/{id}', 'AskController@deleteQuestion')->name('deleteQuestion');
Route::post('/reply/{id}', 'AskController@createReply')->name('createReply');
Route::delete('/reply/delete/{id}', 'AskController@deleteReply')->name('deleteReply');

//ADMIN
Route::get('/admin', 'AdminController@showAdmin')->name('admin');
Route::get('/adminwrites', 'AdminPostController@showPosts')->name('adminPosts');
Route::post('/writes', 'AdminPostController@createPost')->name('adminWrites');
Route::post('/writes/edit/{id}', 'AdminPostController@editPost')->name('adminEdit');
Route::delete('/writes/delete/{id}', 'AdminPostController@deletePost')->name('adminDelete');