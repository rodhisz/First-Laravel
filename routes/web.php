<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Landing\LandingController;
use Illuminate\Support\Facades\Auth;
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

//Landing
Route::get('/', [App\Http\Controllers\landing\LandingController::class, 'index'])->name('landing');

Auth::routes();



Route::resource('/profile', UserController::class)->middleware('auth');
Route::resource('/product', ProductController::class)->middleware('auth');

Route::get('/change', [App\Http\Controllers\ChangePasswordController::class, 'change'])->name('change')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/table', [App\Http\Controllers\UserController::class, 'table'])->name('table')->middleware('auth');
Route::get('/index', [App\Http\Controllers\ProdukController::class, 'index'])->name('index');
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/detail/{slug}', [LandingController::class, 'detailProduct'])->name('product.detail');


Route::put('/update-pass', [App\Http\Controllers\ChangePasswordController::class, 'updatePass'])->name('update-pass')->middleware('auth');


