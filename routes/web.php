<?php

use App\Http\Controllers\AdminController;
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
Route::group(['middleware' => 'checkadmin'], function () {

});

Route::group(['middleware' => 'checkuser'], function () {

});


Route::get('/admin', [PostController::class, 'index']);

Route::get('/category', [CategoryController::class, 'index']);
Route::post('/store', [CategoryController::class, 'store']);
Route::get('/category/{id}', [CategoryController::class, 'destroy']);

//user
Route::get('/user', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'city',])->name('provinsi.city');
Route::post('/users', [UserController::class, 'district'])->name('district');
// Route::post('/user/province', 'UserController@city')->name('provinsi.city');

Route::post('/user/submiting', [UserController::class, 'input']);


Route::get('/post', [PostController::class, 'index']);
Route::post('/post/store', [PostController::class, 'store']);
Route::get('/post/destroy/{id}', [PostController::class, 'destroy']);

Route::get('/lending', [LendingController::class, 'index']);
Route::get('/lending/show/{posts}', [LendingController::class, 'show']);

Route::get('/', [LendingController::class, 'index'])->name('home');

Auth::routes();
Route::get('admin/login', [AdminController::class, 'login']);
Route::post('admin/loging', [AdminController::class, 'loging']);
Route::get('admin/logout', [AdminController::class, 'logout']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
