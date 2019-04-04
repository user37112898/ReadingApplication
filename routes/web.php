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
    if(Auth::user()){
        return redirect('posts');
    }else{
        return view('auth.login');
    }
});
Route::get('/app', function () {
    return view('layouts.app');
});

Route::get('/contactus', function () {
    return view('posts.contactus');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users','UsersController');
Route::resource('posts','PostsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
