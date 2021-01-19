<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\toko_controller\Registrasi_toko_controller;

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
// registrasi toko
Route::get('/registrasi_toko',[Registrasi_toko_controller::class, 'index']);
// end registrasi toko

Route::get('/layout-admin', function () {
    return view('layouts/admin');
});