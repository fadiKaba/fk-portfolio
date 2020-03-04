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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['admin']], function(){

    Route::resource('/adminusers','AdminusersController');
    Route::get('/adminusers/search/{val}', 'AdminusersController@search')->name('adminuserssearch');
    Route::post('/adminusers/gotosearch', 'AdminusersController@goToSearch')->name('adminusersgotosearch');

    Route::resource('admin/posts','PostsController');
    Route::get('/posts/search/{val}', 'PostsController@search')->name('postssearch');
    Route::post('/posts/gotosearch', 'PostsController@goToSearch')->name('postsgotosearch');
});

Route::group(['middleware' => ['auth']], function(){

   Route::post('/posts/like/{userId}/{postId}','PostsController@like')->name('like');

});



