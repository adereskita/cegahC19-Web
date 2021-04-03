<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('admin.dashboard');
// });
Route::get('/', [PostController::class, 'index']);

Route::get('/category', [CategoryController::class, 'index']);
Route::post('/store', [CategoryController::class, 'store']);
Route::get('/category/{id}', [CategoryController::class, 'destroy']);

//user
Route::get('/user', [UserController::class, 'index']);


Route::get('/post', [PostController::class, 'index']);
Route::post('/post/store', [PostController::class, 'store']);
Route::get('/post/destroy/{id}', [PostController::class, 'destroy']);

Route::get('/lending', [LendingController::class, 'index']);
Route::get('/lending/show/{posts}', [LendingController::class, 'show']);
Route::get('/lending/login', [LendingController::class, 'login']);
