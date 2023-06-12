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

Route::get('login', [AuthController::class, 'login'])->middleware('alreadyLoggedIn');
// Route::get('loginEmployee', [AuthController::class, 'loginEmployee'])->name('loginEmployee');
// Route::get('updateEmployeePass', [AuthController::class, 'updateEmployeePass'])->name('updateEmployeePass');
// Route::post('postlogin', [AuthController::class, 'login'])->name('login');

// guide para sa custom auth login nako sauna

// Route::get('login', [CustomAuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('registration', [AuthController::class, 'registration']);
Route::get('updatepass', [AuthController::class, 'updatepass'])->middleware('alreadyLoggedIn');
Route::post('register-admin',[AuthController::class,'registerUser'])->name('register-admin');
Route::post('update-user',[AuthController::class,'updateUser'])->name('update-user');
Route::post('login-user',[AuthController::class,'loginWeb'])->name('login-user');
Route::get('/home',[CustomAuthController::class,'home']);
Route::get('/logout',[CustomAuthController::class,'logout']);
Route::get('/adminlogin',[CustomAuthController::class,'logout']);

// Route::resource("/employee", EmployeeController::class);
// Route::resource("/manager", ManagerController::class);


Route::get('/admin', [AdminController::class, 'index'])->middleware('isLoggedIn');
Route::get('/admin/create', [AdminController::class, 'create'])->middleware('isLoggedIn');
Route::post('/admin', [AdminController::class, 'store'])->middleware('isLoggedIn');
// Route::get('/admin/{resource}', [AdminController::class, 'show']);
Route::resource("/admin", AdminController::class)->middleware('isLoggedIn');
Route::delete('/admin/{resource}', [AdminController::class, 'destroy'])->middleware('isLoggedIn');
Route::get('/admin/getAll', [AdminController::class, 'getAll'])->middleware('isLoggedIn');




Route::resource("/taskreport", TaskReportController::class)->middleware('isLoggedIn');

Route::get('/task/{taskid}/approve', [TaskController::class, 'approveTask'])->name('taskapprove');



Route::get('/department', [DepartmentController::class, 'index'])->middleware('isLoggedIn');
Route::get('/department/create', [DepartmentController::class, 'create'])->middleware('isLoggedIn');
Route::post('/department', [DepartmentController::class, 'store'])->middleware('isLoggedIn');
// Route::get('/department/{resource}', [DepartmentController::class, 'show']);
Route::resource("/department", DepartmentController::class)->middleware('isLoggedIn');
Route::delete('/department/{resource}', [DepartmentController::class, 'destroy'])->middleware('alreadyLoggedIn');
Route::get('/department/getAll', [DepartmentController::class, 'getAll'])->middleware('alreadyLoggedIn');



Route::get('/pointshop', [RedeemShopController::class, 'index'])->middleware('alreadyLoggedIn');
Route::get('/pointshop/create', [RedeemShopController::class, 'create'])->middleware('alreadyLoggedIn');
Route::post('/pointshop', [RedeemShopController::class, 'store'])->middleware('alreadyLoggedIn');
Route::resource("/pointshop", RedeemShopController::class)->middleware('isLoggedIn');
Route::delete('/pointshop/{resource}', [RedeemShopController::class, 'destroy'])->middleware('alreadyLoggedIn');
Route::get('/pointshop/getAll', [RedeemShopController::class, 'getAll'])->middleware('alreadyLoggedIn');



Route::get('/task', [TaskController::class, 'index']);
Route::get('/task/create', [TaskController::class, 'create']);
Route::post('/task', [TaskController::class, 'store']);
// Route::get('/task/{resource}', [TaskController::class, 'show']);
Route::resource("/task", TaskController::class)->middleware('isLoggedIn');
Route::delete('/task/{resource}', [TaskController::class, 'destroy']);
Route::get('/task/getAll', [TaskController::class, 'getAll']);


Route::get('/announcement', [AnnouncementController::class, 'index']);
Route::get('/announcement/create', [AnnouncementController::class, 'create']);
Route::post('/announcement', [AnnouncementController::class, 'store']);
Route::resource("/announcement", AnnouncementController::class)->middleware('isLoggedIn');
Route::delete('/announcement/{resource}', [AnnouncementController::class, 'destroy']);
Route::get('/announcement/getAll', [AnnouncementController::class, 'getAll']);


//rawrrrrrrrrrr


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/upload', [EmployeeController::class, 'uploadImage']);
Auth::routes();