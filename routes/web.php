<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Name : Htet Shine
| Project : Bulletin Board
| Description : "This page contains users routes, post routes and csv routes toward controllers"
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(array('prefix'=>'user','namespace'=>'user','middleware'=>'auth'), function(){
    // Start Users
    Route::group(array('prefix'=>'user','namespace'=>'user','middleware'=>'auth'), function(){
       Route::get('/user-lists', 'UserController@index');
       Route::get('/create-user', 'UserController@create');
       Route::post('/create-user', 'UserController@store'); 
       Route::get('/update-user/{id}', 'UserController@edit');
       Route::post('/update-user/{id}', 'UserController@update');
       Route::get('/profile/{id}', 'UserController@show');
       Route::get('/change-password/{id}', 'UserController@changePassword');
       Route::post('/change-password/{id}', 'UserController@saveNewPassword');
       Route::get('/delete-user/{id}', 'UserController@destroy');
       Route::get('/search', 'UserController@index');
       Route::post('/search', 'UserController@search');
    });
    // End Users
    // Start Posts
    Route::group(array('prefix'=>'post','namespace'=>'post','middleware'=>'auth'), function(){
       Route::get('/post-lists', 'PostController@index');
       Route::get('/create-post', 'PostController@create');
       Route::post('/create-post', 'PostController@store');
       Route::post('/view-post/{id}', 'PostController@show');
       Route::get('/update-post/{id}', 'PostController@edit');
       Route::post('/update-post/{id}', 'PostController@update');
       Route::get('/delete-post/{id}', 'PostController@destroy');
       Route::post('/search', 'PostController@index');
       Route::post('/search', 'PostController@search');
    });
    // End Posts
    // Start Csv
    Route::group(array('prefix'=>'csv','namespace'=>'csv','middleware'=>'auth'), function(){
       Route::get('/upload-csv', 'CsvController@create');
       Route::post('/upload-csv', 'CsvController@store');
    });
    // End Csv  
});


