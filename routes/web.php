<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'is_admin'])->namespace('Admin')->prefix('admin')->group(function(){

    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class,'dashboard'])->name('admin_dashboard');

    Route::get('/city_deliveries', [\App\Http\Controllers\Admin\CityDeliveriesController::class,'index'])->name('city_deliveries.index');
  /*  Route::get('/categories/create', [\App\Http\Controllers\Admin\CategoriesController::class,'create'])->name('categories.create');
    Route::post('/categories', [\App\Http\Controllers\Admin\CategoriesController::class,'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [\App\Http\Controllers\Admin\CategoriesController::class,'edit'])->name('categories.edit');
    Route::post('/categories/{id}', [\App\Http\Controllers\Admin\CategoriesController::class,'update'])->name('categories.update');
    Route::get('/categories/delete/{id}', [\App\Http\Controllers\Admin\CategoriesController::class, 'delete'])->name('categories.delete'); */
});

Auth::routes();
