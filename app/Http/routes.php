<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('pages', 'PageController');
    Route::resource('categories', 'CategoryController');
    Route::resource('fields', 'FieldController');
    Route::resource('menus', 'MenuController');
    Route::resource('links', 'LinkController');

    //personales
	Route::post('pages/duplicate', ['as' => 'admin.pages.duplicate', 'uses' => 'PageController@duplicate']);
});

Route::group(['middleware' => 'auth'], function () {

    Route::resource('events', 'EventController');
    Route::resource('posts', 'PostController');
    Route::resource('comments', 'CommentController');
    Route::resource('users', 'UserController');
    Route::resource('chats', 'ChatController');
    
	Route::get('/', 'WebController@index');
	//mis rutas
	Route::get('c/{category}/{slug}', 'WebController@page')->where('category', '[a-z,0-9-]+')->where('slug', '[a-z,0-9-]+');
	Route::get('c/{slug}', 'WebController@category')->where('slug', '[a-z,0-9-]+');
	Route::match(['get', 'post'], 'contact', 'WebController@contact');
    Route::get('events/{id}/vote/{rank}', ['as' => 'event.vote', 'uses' => 'EventController@vote']);
    Route::get('posts/{id}/vote', ['as' => 'post.vote', 'uses' => 'PostController@vote']);
    Route::get('posts/{id}/rotate/{direction}', ['as' => 'post.rotate', 'uses' => 'PostController@rotate']);
    //Route::match(['get', 'post'], 'next', 'EventController@next');
    Route::get('next/{now}', 'EventController@next');
    Route::get('map', 'WebController@map');
    Route::get('lastchats/{user_id}/{last}', 'ChatController@lastchats');

    Route::get('photos/{filename}', function ($filename)
    {
        $path = storage_path() . '/app/' . $filename;

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    });
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');


