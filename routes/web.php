<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;
 use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RedeemShopController;
use App\Http\Controllers\TaskReportController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/map', [AuthController::class, 'map'])->name('map');

// Route::get('employee/all',[EmployeeController::class,'showAll'])->name('employee.all');  
// Route::post('employee/create',[EmployeeController::class,'store'])->name('employees.save');
// Route::get('employee/create',[EmployeeController::class,'create'])->name('employees.save');
Route::get('/', [AuthController::class, 'landing'])->name('welcome'); //homepage
Route::get('dashboard', [AuthController::class, 'dashboard']);
// Route::get('login', [CustomAuthController::class, 'index'])->name('login');


// Route::get('login', [CustomAuthController::class, 'index'])->name('login');

Route::get('login', [AuthController::class, 'login']);
// Route::get('loginEmployee', [AuthController::class, 'loginEmployee'])->name('loginEmployee');
// Route::get('updateEmployeePass', [AuthController::class, 'updateEmployeePass'])->name('updateEmployeePass');
// Route::post('postlogin', [AuthController::class, 'login'])->name('login');

// guide para sa custom auth login nako sauna

// Route::get('login', [CustomAuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('registration', [AuthController::class, 'registration']);
Route::get('updatepass', [AuthController::class, 'updatepass']);
Route::post('register-admin',[AuthController::class,'registerUser'])->name('register-admin');
Route::post('update-user',[AuthController::class,'updateUser'])->name('update-user');
Route::post('login-user',[AuthController::class,'loginWeb'])->name('login-user');
Route::get('/home',[CustomAuthController::class,'home']);
Route::get('/logout',[CustomAuthController::class,'logout']);
Route::get('/adminlogin',[CustomAuthController::class,'logout']);

Route::resource("/employee", EmployeeController::class);
Route::resource("/manager", ManagerController::class);
Route::resource("/admin", AdminController::class);
Route::resource("/taskreport", TaskReportController::class);
Route::resource("/department", DepartmentController::class);
Route::resource("/pointshop", RedeemShopController::class);
Route::resource("/task", TaskController::class);
Route::resource("/announcement", AnnouncementController::class);


//rawrrrrrrrrrr


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/upload', [EmployeeController::class, 'uploadImage']);
Auth::routes();