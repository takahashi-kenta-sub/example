<?php

use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Auth::routes();

// Route::get('/', [homePageController::class, 'homePageController']);
// Route::get('/', App\Http\Controllers\homePageController::class,);
Route::get('/', [App\Http\Controllers\homePageController::class, 'index'])->name('index');
Route::post('/update', [App\Http\Controllers\homePageController::class, 'update'])->name('update');
Route::get('/jquery', [App\Http\Controllers\homePageController::class, 'jquery'])->name('jquery');
Route::get('/vue', [App\Http\Controllers\homePageController::class, 'vue'])->name('vue');
Route::get('/memos', [App\Http\Controllers\homePageController::class, 'memos'])->name('memos');
Route::get('/download', [App\Http\Controllers\homePageController::class, 'download'])->name('download');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
