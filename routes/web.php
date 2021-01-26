<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\toko_controller\Toko_controller;
use App\Http\Controllers\toko_controller\Produk_controller;
use App\Http\Controllers\Admin\Admin_Manajemen_Pengguna_Controller;
use App\Http\Controllers\User\UserController;
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


Route::group(['middleware'=> 'guest'], function() {

    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/post_login', [AuthController::class, 'post_login']);
    Route::post('/post_password', [AuthController::class, 'post_password']);
    // Route::
    Route::post('/post_otp', [AuthController::class, 'post_otp']);

    Route::get('/login/password/{id}', [AuthController::class, 'password']);

    Route::get('/sign_up', [AuthController::class, 'sign_up']);
    Route::post('/post_sign_up', [AuthController::class, 'post_sign_up']);

    Route::get('/verifikasi-number', [HomeController::class, 'verifikasi_number']);
    Route::get('/input-password', [HomeController::class, 'input_password']);
    

});

Route::group(['middleware'=> 'auth'], function() {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware'=> 'home'], function() {

        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/user', [UserController::class, 'index']);
        Route::get('/explore', [HomeController::class, 'pencarian']);
        Route::get('/rekomendasi', [HomeController::class, 'rekomendasi']);

    });

});




// toko
Route::get('/toko', [Toko_controller::class, 'index']);
Route::get('/toko/informasi_toko', [Toko_controller::class, 'informasi_toko']);
Route::get('/toko/akun', [Toko_controller::class, 'akun']);
// ==== produk
Route::get('/toko/semua_produk', [Produk_controller::class, 'semua_produk']);
Route::get('/toko/tambah_produk', [Produk_controller::class, 'tambah_produk']);
Route::post('/toko/get_sub_kategori', [Produk_controller::class, 'get_sub_kategori'])->name('get_sub_kategori');
// ==== end produk
// end toko


Route::get('/admin/manajemen/pengguna', [Admin_Manajemen_Pengguna_Controller::class, 'index']);

