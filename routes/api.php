<?php

use App\Http\Controllers\PostApiController;
use App\Http\Controllers\UserApiController;
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
Route::get('/post', [PostApiController::class, 'show']);
Route::get('/post/destroy/{id}', [PostApiController::class, 'destroy']);
Route::post('/post/store', [PostApiController::class, 'store']);
Route::post('/post/update/{id}', [PostApiController::class, 'update']);

Route::get('/province', [PostApiController::class, 'provinces']);
Route::get('/city', [PostApiController::class, 'cities']);

Route::get('/users', [UserApiController::class, 'users']);
Route::get('/covids', [UserApiController::class, 'covData']);

Route::get('/input/covid', [UserApiController::class, 'inputCovData']);
Route::get('/user/covid', [UserApiController::class, 'getCovDataUser']);

Route::post('/post/step', [UserApiController::class, 'insertStep']);
// Route::get('/get/step', [UserApiController::class, 'getStep']);
Route::get('/get/step', [UserApiController::class, 'getStepDate']);


// Route::post('/login', [PostApiController::class, 'login_user']);

Route::group([
    'prefix' => 'auth'
], function(){
    Route::post('/login', [UserApiController::class, 'login']);
    Route::post('/signup', [UserApiController::class, 'signup']);

    Route::group([
        'middleware' => 'auth:api'
    ], function(){
        Route::get('/logout', [UserApiController::class, 'logout']);
        Route::get('/user', [UserApiController::class, 'user']);

    });
});

