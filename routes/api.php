<?php

use App\Http\Controllers\Todo\TodoController;
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

// default name space for all routes is 'App\Http\Controllers\Api'
Route::post('todo',[TodoController::class,'store']);
Route::get('todo/index',[TodoController::class,'index']);
Route::get('todo/edit/{id}',[TodoController::class,'edit']);
Route::put('todo/update/{id}',[TodoController::class,'update']);
Route::delete('todo/delete/{id}',[TodoController::class,'destroy']);
Route::put('todo/status/{id}',[TodoController::class,'status']);