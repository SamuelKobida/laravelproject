<?php

use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\RulesController;
use App\Http\Controllers\Api\ResolveController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

//POSTMAN
Route::post('/resolve', [ResolveController::class,'resolve']);

//GETTING DATA FROM LARAVEL
Route::get('/subjects', [DataController::class,'subjects']);
Route::get('/predicates', [DataController::class,'predicates']);
Route::get('/eshops', [DataController::class,'eshops']);
Route::get('/carrier_services', [DataController::class,'carrier_services']);
Route::get('/rules', [DataController::class,'getRules']);

//MANAGIN RULES
Route::post('/rulestore', [RulesController::class,'store']);
Route::delete('/rules/delete/{id}', [RulesController::class, 'delete']);
Route::post('/rules/changeStatus/{id}', [RulesController::class,'changeStatus']);

//Auth::routes();

//Route::middleware(['auth', 'is_admin'])->namespace('Admin')->prefix('admin')->group(function(){


//});
