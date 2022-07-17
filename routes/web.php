<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductsInController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;



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
 //dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::post('/dashboard/tambah', [ProfileController::class, 'store']);
Route::put('/dashboard/edit/{id}', [App\Http\Controllers\ProfileController::class, 'EditProfile']);

//In
Route::get('/in', [ProductsInController::class, 'in']);
Route::post('/store-in', [ProductsInController::class, 'StoreIn']);
Route::put('/editIn/{id}', [ProductsInController::class, 'editIn']);

//rekap
Route::get('/all', [ProductsInController::class, 'rekap']);

Auth::routes();



