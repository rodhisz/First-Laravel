<?php

use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
Route::get('/detail/{slug}', [LandingController::class, 'detailProduct'])->name('product.detail');
Route::get('/category/{slug}', [LandingController::class, 'perCategory'])->name('landing.category');
Route::get('/allproduct', [LandingController::class, 'allproduct'])->name('allproduct');
Route::get('/searchproduct', [LandingController::class, 'searchProduct'])->name('search.product');

Auth::routes();

Route::resource('/profile', UserController::class)->middleware('auth')->except('create','store');
Route::get('/table', [App\Http\Controllers\UserController::class, 'table'])->name('table')->middleware('auth');

Route::resource('/product', ProductController::class)->middleware('auth')->except('show');
Route::get('/index', [App\Http\Controllers\ProductController::class, 'index'])->name('index');
Route::get('/search', [ProductController::class, 'search'])->name('search');


Route::get('/change', [App\Http\Controllers\ChangePasswordController::class, 'change'])->name('change')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index')->middleware('auth');

Route::post('/add-category', [App\Http\Controllers\CategoryController::class, 'addcategory'])->name('add.category')->middleware('auth');
Route::put('/update-category/{id}', [App\Http\Controllers\CategoryController::class, 'updateCategory'])->name('update.category')->middleware('auth');
Route::delete('/delete-category/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('delete.category')->middleware('auth');

Route::put('/update-pass', [App\Http\Controllers\ChangePasswordController::class, 'UpdatePass'])->name('update-pass')->middleware('auth');


