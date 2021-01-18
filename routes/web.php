<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\AuthController;
=======
use App\Http\Controllers\HomeController;

>>>>>>> master

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
<<<<<<< HEAD
// auth
Route::get('/login', [AuthController::class, 'login']);
Route::get('/sign_up', [AuthController::class, 'sign_up']);
Route::post('/post_sign_up', [AuthController::class, 'post_sign_up']);
// end auth
Route::get('/layout', function () {
=======

Route::get('/layout-admin', function () {
>>>>>>> master
    return view('layouts/admin');
});