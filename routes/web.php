<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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

Route::get('/mail', [HomeController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin routes
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::match(['GET', 'POST'], '/', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin');
    Route::group(['middleware' => ['admin']], function() {
        Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('category', '\App\Http\Controllers\Admin\CategoryController');
        Route::get('template/getContent/{id}', [\App\Http\Controllers\Admin\TemplateController::class,'getContent']);
        Route::resource('template', '\App\Http\Controllers\Admin\TemplateController');
        Route::resource('emails', '\App\Http\Controllers\Admin\EmailController');
        Route::resource('users', '\App\Http\Controllers\Admin\UserController'); 
        Route::resource('leads', '\App\Http\Controllers\Admin\LeadsController'); 
        Route::resource('leadscategory', '\App\Http\Controllers\Admin\LeadCategoryController');
        Route::resource('groups', '\App\Http\Controllers\Admin\GroupController');
        Route::resource('emailscheduler', '\App\Http\Controllers\Admin\EmailSchedulerController');
        Route::resource('roles', '\App\Http\Controllers\Admin\RoleController');
        Route::resource('permissions', '\App\Http\Controllers\Admin\PermissionsController');
        Route::get('logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout']);
    });
});
