<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductsInController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ManagerController;




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
Route::get('/', [DashboardController::class, 'dashboard']);

 //dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::put('/dashboard/edit-owner/{id}', [App\Http\Controllers\DashboardController::class, 'EditOwner']);
Route::put('/dashboard/edit-manager/{id}', [App\Http\Controllers\DashboardController::class, 'EditManager']);


//In
Route::get('/in', [ProductsController::class, 'in']);
Route::post('/store-in', [ProductsController::class, 'StoreIn']);
Route::put('/editIn/{id}', [ProductsController::class, 'editIn']);
//sale
Route::get('/sale', [ProductsController::class, 'sale']);
Route::put('/addOut/{id}', [ProductsController::class, 'addOut']);

Route::put('/editOut/{id}', [ProductsController::class, 'editOut']);
//out
Route::get('/out', [ProductsController::class, 'out']);

Route::get('/masuk/barang', [ProductsController::class, 'cetak_in_pdf']);
Route::get('/keluar/barang', [ProductsController::class, 'cetak_out_pdf']);
Route::get('/report/barang', [ProductsController::class, 'cetak_report_pdf']);
Route::post('/report/periode/barang', [ProductsController::class, 'cetak_periode_pdf']);



Route::get('/excel/barang', [ProductsController::class, 'export_excel']);

//trash
Route::get('/trash', [ProductsController::class, 'trash']);
Route::put('/editTrash/{id}', [ProductsController::class, 'editTrash']);

Route::delete('/deleteIn/delete/{id}', [ProductsController::class, 'destroy']);



//rekap
Route::get('/reportProduct', [ProductsController::class, 'reportProduct']);
Route::get('/reportPenjualan', [ProductsController::class, 'reportPenjualan']);


//owner
Route::get('/owner', [OwnerController::class, 'index'])->name('owner.index');
Route::post('/store-owner', [OwnerController::class, 'store']);
Route::delete('/owner-destroy/{id}', [OwnerController::class, 'destroy']);

//manager
Route::get('/manager', [ManagerController::class, 'index'])->name('manager.index');
Route::post('/store-manager', [ManagerController::class, 'store']);
Route::delete('/manager-destroy/{id}', [ManagerController::class, 'destroy']);

Auth::routes();



