<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RulesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/resolve', [\App\Http\Controllers\HomeController::class,'resolve']);



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'is_admin'])->namespace('Admin')->prefix('admin')->group(function(){

    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class,'dashboard'])->name('admin_dashboard');

    Route::get('/rules', [\App\Http\Controllers\Admin\RulesController::class,'index'])->name('rules.index');
    Route::get('/rules/create', [\App\Http\Controllers\Admin\RulesController::class,'create'])->name('rules.create');
    Route::post('/rules', [\App\Http\Controllers\Admin\RulesController::class,'store'])->name('rules.store');
    Route::get('/rules/delete/{id}', [\App\Http\Controllers\Admin\RulesController::class, 'delete'])->name('rules.delete');

});
