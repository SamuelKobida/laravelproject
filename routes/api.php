<?php

use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\RulesController;
use App\Http\Controllers\Api\ResolveController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
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
Route::get('/carriers/{id}', [DataController::class,'carriers']);
Route::get('/specificCarriers/{id}', [DataController::class,'specificCarriers']);
Route::get('/specificCarrierServices/{id}', [DataController::class,'specificCarrierServices']);
Route::get('/specificRules/{id}', [DataController::class,'specificRules']);
Route::get('/countrules', [DataController::class,'countRules']);
Route::get('/counteshops', [DataController::class,'countEshops']);
Route::get('/countcouriers', [DataController::class,'countCouriers']);

//MANAGIN RULES
Route::post('/rulestore', [RulesController::class,'store']);
Route::delete('/rules/delete/{id}', [RulesController::class, 'delete']);
Route::post('/rules/changeStatus/{id}', [RulesController::class,'changeStatus']);

//AUTHENTICATION
Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});
Route::post('register',  [RegisterController::class,'register']);
Route::post('login',  [LoginController::class,'login']);
Route::post('logout', [LoginController::class,'logout']);
