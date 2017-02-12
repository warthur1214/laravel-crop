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

    Route::any("/test", ['uses' => "IndexController@test"]);

    Route::get("/login", ['uses' => "LoginController@login"]);
    Route::post("/loginAjax", ['uses' => "LoginController@loginAjax"]);
    Route::get("/loginOut", ['uses' => "LoginController@loginOut"]);

    Route::get("/index", ['uses' => "IndexController@index"]);
    Route::get("/menu", ['uses' => "IndexController@menu"]);
    Route::get("/main", ['uses' => "IndexController@main"]);

    //系统管理模块
    Route::get("/account/accountList", ['uses' => "AccountController@accountList"]);
    Route::any("/account/accountListAjax", ['uses' => "AccountController@accountListAjax"]);
    Route::get("/account/addAccount", ['uses' => "AccountController@addAccount"]);

    //功能菜单模块
    Route::get("/module/moduleList", ['uses' => "ModuleController@moduleList"]);
    Route::post("/module/moduleListAjax", ['uses' => "ModuleController@moduleListAjax"]);
    Route::post("/module/getSonM/{id}", ['uses' => "ModuleController@getSonM"]);
    Route::post("/module/delModule/{id}", ['uses' => "ModuleController@deleteModuleById"]);
    Route::get("/module/editModule/{id}", ['uses' => "ModuleController@updateModuleById"]);
    Route::post("/module/editModuleAjax", ['uses' => "ModuleController@updateModuleAjax"]);
    Route::post("/module/editModuleSort", ['uses' => "ModuleController@editModuleSort"]);
});



