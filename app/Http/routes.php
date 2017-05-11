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
use Illuminate\Support\Facades\Route;

Route::any("/test", function () {
    dump(config("mail.host"));
    dump(config('app.url'));
});

Route::group(['middleware' => ['web']], function () {


    Route::get("/login", ['uses' => "LoginController@login"]);
    Route::post("/loginAjax", ['uses' => "LoginController@loginAjax"]);
    Route::get("/loginOut", ['uses' => "LoginController@loginOut"]);

    Route::get("/", ['uses' => "IndexController@index"]);
    Route::get("/index", ['uses' => "IndexController@index"]);
    Route::get("/menu", ['uses' => "IndexController@menu"]);
    Route::get("/main", ['uses' => "IndexController@main"]);

    //账号管理模块
    Route::get("/account/accountList", ['uses' => "AccountController@accountList"]);
    Route::post("/account/accountListAjax", ['uses' => "AccountController@accountListAjax"]);
    Route::get("/account/addAccount", ['uses' => "AccountController@addAccount"]);
    Route::post("/account/addAccountAjax", ['uses' => "AccountController@addAccountAjax"]);
    Route::get("/account/delAccount/{id}", ['uses' => "AccountController@deleteAccount"]);
    Route::get("/account/delAccount/{id}", ['uses' => "AccountController@deleteAccount"]);
    Route::post("/account/accountAvailable/{id}", ['uses' => "AccountController@accountAvailable"]);
    Route::get("/account/editAccount/{id}", ['uses' => "AccountController@editAccount"]);
    Route::get("/account/getAccountInfoById/{id}", ['uses' => "AccountController@getAccountInfoById"]);
    Route::post("/account/editAccountAjax", ['uses' => "AccountController@editAccountAjax"]);

    //功能菜单模块
    Route::get("/module/moduleList", ['uses' => "ModuleController@moduleList"]);
    Route::post("/module/moduleListAjax", ['uses' => "ModuleController@moduleListAjax"]);
    Route::post("/module/getSonM/{id}", ['uses' => "ModuleController@getSonM"]);
    Route::post("/module/delModule/{id}", ['uses' => "ModuleController@deleteModuleById"]);
    Route::get("/module/editModule/{id}", ['uses' => "ModuleController@updateModuleById"]);
    Route::post("/module/editModuleAjax", ['uses' => "ModuleController@updateModuleAjax"]);
    Route::post("/module/editModuleSort", ['uses' => "ModuleController@editModuleSort"]);
    Route::get("/module/addModule", ['uses' => "ModuleController@addModule"]);
    Route::post("/module/addModuleAjax", ['uses' => "ModuleController@addModuleAjax"]);

    //角色管理
    Route::get("/role/roleList", ['uses' => "RoleController@roleList"]);
    Route::post("/role/roleListAjax", ['uses' => "RoleController@roleListAjax"]);
    Route::get("/company/sonParentList", ['uses' => "CompanyController@sonParentList"]);

    //周期管理
    Route::get("/cycle/cycleList", ['uses' => "CycleController@cycleList"]);
    Route::post("/cycle/cycleListAjax", ['uses' => "CycleController@getCycleList"]);
    Route::get("/cycle/addCycle", ['uses' => "CycleController@addCycle"]);
    Route::post("/cycle/addCycleAjax", ['uses' => "CycleController@insertCycle"]);
    Route::get("/cycle/editCycle/{cycleId}", ['uses' => "CycleController@editCycle"]);
    Route::any("/cycle/editCycleAjax", ['uses' => "CycleController@updateCycleById"]);
    Route::post("/cycle/delCycle/{cycleId}", ['uses' => "CycleController@deleteCycleById"]);
    Route::post("/cycle/editCycleSort", ['uses' => "CycleController@updateCycleById"]);

    //品类管理
    Route::get("/variety/varietyList", ['uses' => "VarietyController@varietyList"]);
    Route::post("/variety/varietyListAjax", ['uses' => "VarietyController@getVarietyList"]);
    Route::get("/variety/addVariety", ['uses' => "VarietyController@addVariety"]);
    Route::post("/variety/addVarietyAjax", ['uses' => "VarietyController@insertVariety"]);
    Route::get("/variety/editVariety/{varietyId}", ['uses' => "VarietyController@editVariety"]);
    Route::post("/variety/editVarietyAjax", ['uses' => "VarietyController@updateVarietyById"]);
    Route::post("/variety/delVariety/{varietyId}", ['uses' => "VarietyController@deleteVarietyById"]);

    //批次管理
    Route::get("/batch/batchList", ['uses' => "BatchController@batchList"]);
    Route::post("/batch/batchListAjax", ['uses' => "BatchController@getBatchList"]);
    Route::get("/batch/addBatch", ['uses' => "BatchController@addBatch"]);
    Route::post("/batch/addBatchAjax", ['uses' => "BatchController@insertBatch"]);
    Route::get("/batch/editBatch/{batchId}", ['uses' => "BatchController@editBatch"]);
    Route::post("/batch/editBatchAjax", ['uses' => "BatchController@updateBatchById"]);
    Route::post("/batch/delBatch/{batchId}", ['uses' => "BatchController@deleteBatchById"]);

    //农产品管理
    Route::get("/crop/cropList", ['uses' => "CropController@cropList"]);
    Route::post("/crop/cropListAjax", ['uses' => "CropController@getCropList"]);
    Route::get("/crop/addCrop", ['uses' => "CropController@addCrop"]);
    Route::post("/crop/addCropAjax", ['uses' => "CropController@insertCrop"]);
    Route::get("/crop/editCrop/{cropId}", ['uses' => "CropController@editCrop"]);
    Route::post("/crop/editCropAjax", ['uses' => "CropController@updateCropById"]);
    Route::post("/crop/delCrop/{cropId}", ['uses' => "CropController@deleteCropById"]);
    Route::get("/crop/scanBinCode/{cropId}", ['uses' => "CropController@scanBinCode"]);
    Route::get("/crop/cropCycle/{crop_id?}", ['uses' => "CropController@cropCycle"]);
    Route::post("/crop/uploadCycleImg", ['uses' => "CropController@uploadCycleImg"]);
    Route::post("/crop/saveCycleProperty", ['uses' => "CropController@savePropertyInfo"]);

    //关于我们

});



