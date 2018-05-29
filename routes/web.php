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

//Landing page
Route::view('/', 'index');
Route::get('/home', 'MainController@homePage')->name('home');

//Auth
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//POST
Route::post('/post', 'PostController@createPost')->name('createPost');
Route::post('/post/edit/{id}', 'PostController@editPost')->name('editPost');
Route::delete('/post/delete/{id}', 'PostController@deletePost')->name('deletePost');

//PROFILE
Route::get('/profile', 'ProfileController@profilePage')->name('profilePage');

//BOOKMARK
Route::post('/bookmark', 'BookmarkController@createBookmark')->name('createBookmark');