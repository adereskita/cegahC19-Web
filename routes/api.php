<?php

use App\Http\Controllers\PostApiController;
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

Route::get('/posts', [PostApiController::class, 'index']);
Route::get('/post/{id}', [PostApiController::class, 'show']);
Route::get('/post/destroy/{id}', [PostApiController::class, 'destroy']);
Route::post('/post/store', [PostApiController::class, 'store']);
Route::post('/post/update/{id}', [PostApiController::class, 'update']);
