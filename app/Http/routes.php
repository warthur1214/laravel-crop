<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {
	Route::any("/test", ['uses'=>"IndexController@test"]);
	Route::get("/login", ['uses'=>"IndexController@login"]);
	Route::get("/loginAjax", ['uses'=>"IndexController@loginAjax"]);
	Route::get("/index", ['uses'=>"IndexController@index"]);
	Route::get("/menu", ['uses'=>"IndexController@menu"]);
	Route::get("/main", ['uses'=>"IndexController@main"]);

	//
});


