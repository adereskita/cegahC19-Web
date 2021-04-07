<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
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
Route::get('/admin', [PostController::class, 'index']);

Route::get('/category', [CategoryController::class, 'index']);
Route::post('/store', [CategoryController::class, 'store']);
Route::get('/category/{id}', [CategoryController::class, 'destroy']);

//user
Route::get('/user', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'city',])->name('provinsi.city');
Route::post('/users', [UserController::class, 'district'])->name('district');
// Route::post('/user/province', 'UserController@city')->name('provinsi.city');


Route::get('/post', [PostController::class, 'index']);
Route::post('/post/store', [PostController::class, 'store']);
Route::get('/post/destroy/{id}', [PostController::class, 'destroy']);

Route::get('/lending', [LendingController::class, 'index']);
Route::get('/lending/show/{posts}', [LendingController::class, 'show']);

Auth::routes();


Route::get('/', [LendingController::class, 'index'])->name('home');
