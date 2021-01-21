<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Admin_Manajemen_Pengguna_Controller;



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
Route::get('/beranda', [HomeController::class, 'index']);
Route::get('/pencarian', [HomeController::class, 'pencarian']);



Route::get('/layout-admin', function () {
    return view('layouts/admin');
});

Route::get('/layout-toko', function () {
    return view('layouts/toko');
});


Route::get('/admin/beranda', function () {
    return view('users/admin/beranda');
});

Route::get('/admin/manajemen/pengguna', [Admin_Manajemen_Pengguna_Controller::class, 'index']);