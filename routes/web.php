<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PengirimanController;
use App\Http\Controllers\Backend\LokasiController;
use App\Http\Controllers\Backend\BarangController;
use App\Http\Controllers\Backend\UserController;


use App\Http\Controllers\Auth\LoginController;

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

Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'actlogin'])->name('actionlogin');
Route::group(['middleware' => ['auth', 'role:kurir,admin']],function(){
    Route::get('/home', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/pengiriman',[PengirimanController::class,'index'])->name('pengiriman');
    Route::get('/pengiriman/create',[PengirimanController::class,'create'])->name('tambah');
    Route::post('pengiriman/store',[PengirimanController::class,'store'])->name('store.pengiriman');
    Route::get('/pengiriman/{id}/destroy',[PengirimanController::class,'destroy']);
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');

});
Route::group(['middleware' => ['auth','role:admin']],function (){
    // Route::get('/home', [DashboardController::class,'index'])->name('dashboard');

    //pengrirman
    // Route::get('/pengiriman',[PengirimanController::class,'index'])->name('pengiriman');
    // Route::get('/pengiriman/create',[PengirimanController::class,'create'])->name('tambah');
    // Route::post('pengiriman/store',[PengirimanController::class,'store'])->name('store.pengiriman');
    // Route::get('/pengiriman/{id}/destroy',[PengirimanController::class,'destroy']);

    //lokasi
    Route::get('/lokasi', [LokasiController::class,'index'])->name('lokasi');
    Route::get('lokasi/create',[LokasiController::class,'create'])->name('tambah.lokasi');
    Route::post('/lokasi/store',[LokasiController::class,'store'])->name('store.lokasi');
    Route::get('/lokasi/{id}/destroy',[LokasiController::class,'destroy']);

    //barang
    Route::get('/barang',[BarangController::class,'index'])->name('barang');
    Route::get('/barang/create',[BarangController::class,'create'])->name('tambah.barang');
    Route::post('/barang/store',[BarangController::class,'store'])->name('store.barang');
    Route::get('/barang/{id}/destroy',[BarangController::class,'destroy']);

    //user
    Route::get('/user',[UserController::class,'index'])->name('user');
    Route::get('/user/create',[UserController::class,'create'])->name('tambah.user');
    Route::post('/user/store',[UserController::class,'store'])->name('store.user');
    Route::get('/user/{id}/destroy',[UserController::class,'destroy']);

});
