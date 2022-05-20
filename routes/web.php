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
        Route::resource('template', '\App\Http\Controllers\Admin\TemplateController');
     
        Route::get('logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout']);
    });
});
