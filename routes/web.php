<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\toko_controller\Toko_controller;

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

Route::get('/', [HomeController::class, 'index']);


Route::get('/layout-toko', function () {
    return view('layouts/toko');
});
// auth
Route::get('/login', [AuthController::class, 'login']);
Route::get('/sign_up', [AuthController::class, 'sign_up']);
Route::post('/post_sign_up', [AuthController::class, 'post_sign_up']);
// end auth
// toko
Route::get('/toko', [Toko_controller::class, 'index']);
Route::get('/toko/informasi_dasar', [Toko_controller::class, 'informasi_dasar']);
// end toko

Route::get('/layout-admin', function () {
    return view('layouts/admin');
});