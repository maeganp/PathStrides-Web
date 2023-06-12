<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function(){
    
});
Route::post('/employeeLogout',[AuthController::class,'logoutEmployee']);
Route::post('/auth/updateEmployeePass',[AuthController::class,'updateEmployeePass']);
// Route::post('/auth/login',[AuthController::class,'login']);
Route::post('/auth/loginEmployee',[AuthController::class,'loginEmployee']);
Route::get('/taskReport','App\Http\Controllers\TaskReportController@getTaskReport');
Route::get('/announcementDisplay/{id}','App\Http\Controllers\ImageController@announcementShow');
Route::get('/displayImage/{id}','App\Http\Controllers\ImageController@getTaskReportImage');
//Route::post('/auth/register',[AuthController::class,'register']);
Route::get('/employeeTask','App\Http\Controllers\TaskController@getEmployeeTask');
Route::get('/employeeUser','App\Http\Controllers\AdminController@getUser');
Route::get('/employeeAnnounce','App\Http\Controllers\AnnouncementController@getAnnouncement');
Route::get('/employeePointShop','App\Http\Controllers\RedeemShopController@getRedeemShop');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/claimed','App\Http\Controllers\RedeemShopController@getClaimed');
Route::post('/sold','App\Http\Controllers\RedeemShopController@getSold');

Route::get('/show/{id}', 'App\Http\Controllers\ImageController@show');
Route::post('/upload-image', 'App\Http\Controllers\ImageController@uploadImage');
Route::post('/upload-file', 'App\Http\Controllers\DepartmentController@uploadFile');