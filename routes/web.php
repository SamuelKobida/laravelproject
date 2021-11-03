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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'is_admin'])->namespace('Admin')->prefix('admin')->group(function(){

    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class,'dashboard'])->name('admin_dashboard');

    /* Route::get('/city_deliveries', [\App\Http\Controllers\Admin\CityDeliveriesController::class,'index'])->name('city_deliveries.index');
     Route::get('/city_deliveries/create', [\App\Http\Controllers\Admin\CityDeliveriesController::class,'create'])->name('city_deliveries.create');
      Route::post('/city_deliveries', [\App\Http\Controllers\Admin\CityDeliveriesController::class,'store'])->name('city_deliveries.store');
      Route::get('/categories/edit/{id}', [\App\Http\Controllers\Admin\CategoriesController::class,'edit'])->name('categories.edit');
      Route::post('/categories/{id}', [\App\Http\Controllers\Admin\CategoriesController::class,'update'])->name('categories.update');
      Route::get('/categories/delete/{id}', [\App\Http\Controllers\Admin\CategoriesController::class, 'delete'])->name('categories.delete'); */
});

Auth::routes();
