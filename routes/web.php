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
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/Nitra', [\App\Http\Controllers\HomeController::class,'resolve']);
Route::post('/Bratislava', [\App\Http\Controllers\HomeController::class,'resolve']);
Route::post('/Kosice', [\App\Http\Controllers\HomeController::class,'resolve']);


Route::middleware(['auth', 'is_admin'])->namespace('Admin')->prefix('admin')->group(function(){

    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class,'dashboard'])->name('admin_dashboard');

      Route::get('/rules', [\App\Http\Controllers\Admin\RulesController::class,'index'])->name('rules.index');
      Route::get('/rules/create', [\App\Http\Controllers\Admin\RulesController::class,'create'])->name('rules.create');
      Route::post('/rules', [\App\Http\Controllers\Admin\RulesController::class,'store'])->name('rules.store');
      Route::get('/rules/delete/{id}', [\App\Http\Controllers\Admin\RulesController::class, 'delete'])->name('rules.delete');

});


