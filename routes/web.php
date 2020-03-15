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
Route::get('/posts/postDetail/{postId}', 'PostsController@postDetail');
Route::get('/posts/usersearch/{str}','HomeController@search');
Route::post('/posts/usersearchresult','HomeController@getResult');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'MailsController@index');

Route::group(['middleware' => ['admin']], function(){

    Route::resource('/adminusers','AdminusersController');
    Route::get('/adminusers/search/{val}', 'AdminusersController@search')->name('adminuserssearch');
    Route::post('/adminusers/gotosearch', 'AdminusersController@goToSearch')->name('adminusersgotosearch');

    Route::resource('admin/posts','PostsController');
    Route::get('/posts/search/{val}', 'PostsController@search')->name('postssearch');
    Route::post('/posts/gotosearch', 'PostsController@goToSearch')->name('postsgotosearch');
});

Route::group(['middleware' => ['auth']], function(){

   Route::post('/posts/like/{userId}/{postId}','PostsController@like')->name('plike');
   Route::post('/comments/add/{userId}/{post_id}','CommentsController@store')->name('newcomment');
   Route::delete('/comment/destroy/{userId}/{commentId}','CommentsController@destroy')->name('deletecomment');
   Route::post('/comments/like/{userId}/{postId}','CommentsController@like')->name('clike');
   Route::get('/post/getusername/{usersId}','PostsController@getUser');
   Route::get('/profile/{userId}', 'ProfilesController@show')->name('profile');
   Route::get('/mail/send', 'MailsController@send');
   Route::group(['middleware' => ['owner']], function(){

       Route::post('/profile/edit/{userId}','ProfilesController@update')->name('editprofile');
       Route::delete('/profile/delphoto/{userId}','ProfilesController@delPhoto')->name('delphoto');

   });
});



