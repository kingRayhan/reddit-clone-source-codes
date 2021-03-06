<?php

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::get('test', function (){
   return "ddd";
})->middleware('auth:api');


/**
 * Authentication routes
 */
Route::group(['prefix' => "auth"], function (){
    Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('user', [\App\Http\Controllers\AuthController::class, 'me'])->middleware('auth:api');
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth:api');
});


Route::apiResource('threads',\App\Http\Controllers\ThreadController::class);
Route::post('threads/link', [\App\Http\Controllers\ThreadController::class, 'submitLink']);
Route::post('threads/text', [\App\Http\Controllers\ThreadController::class, 'submitText']);
Route::put('threads/link/{thread}', [\App\Http\Controllers\ThreadController::class, 'updateLink']);
Route::put('threads/text/{thread}', [\App\Http\Controllers\ThreadController::class, 'updateText']);



//Route::get('threads', [\App\Http\Controllers\ThreadController::class, 'index']);
//Route::get('threads/{thread:slug}', [\App\Http\Controllers\ThreadController::class, 'show']);