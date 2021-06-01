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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



// Route::post('register', [App\Http\Controllers\Api\PassportAuthController::class, 'register']);
Route::post('login', [App\Http\Controllers\Api\PassportAuthController::class, 'login']);

 
// Route::middleware('auth:api')->group(function () {
// 	Route::get('posts', [App\Http\Controllers\Api\PostController::class, 'index']);
// 	Route::get('post/{id}', [App\Http\Controllers\Api\PostController::class, 'show']);
// 	Route::post('post/store', [App\Http\Controllers\Api\PostController::class, 'store']);
// 	Route::post('post/update/{id}', [App\Http\Controllers\Api\PostController::class, 'update']);
// 	Route::put('post/delete/{id}', [App\Http\Controllers\Api\PostController::class, 'destroy']);
// });
