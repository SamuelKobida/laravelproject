<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RulesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ResolveController;
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

Route::post('/resolve', [ResolveController::class,'resolve']);

Route::get('/rules', [RulesController::class,'index']);
Route::post('/rulestore', [RulesController::class,'store']);
Route::delete('/rules/delete/{id}', [RulesController::class, 'delete']);


//Auth::routes();

//Route::middleware(['auth', 'is_admin'])->namespace('Admin')->prefix('admin')->group(function(){


//});
