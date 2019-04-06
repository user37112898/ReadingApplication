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
Route::get('/dashboard','PostsController@dash');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users','UsersController');
Route::resource('posts','PostsController');
Route::resource('currentpage','CurrentPageController');
Auth::routes();

Route::post('comments/{post_id}', ['uses' => 'CommentController@store', 'as' => 'comments.store']);

Route::get('/home', 'HomeController@index')->name('home');

Route::patch('/posts/{post}/inc', 'CurrentPageController@inc');
Route::put('/posts/{post}/dec', 'CurrentPageController@dec');

Route::patch('/postsallpost', 'PostsController@index');
Route::patch('/postsenglish', 'PostsController@english');
Route::patch('/postshindi', 'PostsController@hindi');
Route::patch('/postsgujarati', 'PostsController@gujarati');

Route::patch('/postsalltags', 'PostsController@index');
Route::patch('/poststechnology', 'PostsController@technology');
Route::patch('/postsbusiness', 'PostsController@business');
Route::patch('/postscompany', 'PostsController@company');
Route::patch('/postsinnovation', 'PostsController@innovation');

// Route::get('/currentpagecontroller/{post_id}', 'CurrentPageController@inc');


// Route::put('currentpage/{post_id}', ['uses' => 'CurrentPageController@inc', 'as' => 'currentpage.inc']);

// Route::patch('currentpage/{post_id}', ['uses' => 'CurrentPageController@dec', 'as' => 'currentpage.dec']);

Route::post('cps/{postid}',['uses'=>'CurrentPageController@store','as' => 'cps.store']);
Route::post('cps/{postid}',['uses'=>'CurrentPageController@update','as' => 'cps.update']);

//Add Question Route
Route::get('/create/{post}/questions', 'QuestionsController@index');

Route::post('/posts/{post}/question', 'QuestionsController@store');

//Add options route
Route::get('/question/{id}', 'QuestionsController@indexOptions');

Route::post('/question/{question}/option', 'QuestionsController@storeOptions');

Route::patch('/options/{option}', 'QuestionsController@update');

Route::get('exam/{post}', 'ExamsController@index');
Route::post('exam/{post}', 'ExamsController@store');

Route::post('cps/{postid}',['uses'=>'CurrentPageController@store','as' => 'cps.store']);
Route::post('cps/{postid}',['uses'=>'CurrentPageController@update','as' => 'cps.update']);
