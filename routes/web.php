<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\toko_controller\Toko_controller;
use App\Http\Controllers\toko_controller\Produk_controller;
use App\Http\Controllers\Admin\Admin_Manajemen_Pengguna_Controller;
use App\Http\Controllers\Admin\Admin_Manajemen_Kategori_Controller;
use App\Http\Controllers\Admin\Admin_Manajemen_Toko_Controller;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Mitra\MitraController;
use App\Http\Controllers\Mitra\PesananController;
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
    Route::post('/masuk', [AuthController::class, 'post_login']);

    // @Jika Belum Memiliki Akun
    Route::get('/verifikasi-otp/{id}', [AuthController::class, 'verifikasi_otp']);
    Route::get('/verifikasi-otp/{id}/kirim-ulang', [AuthController::class, 'refresh_otp']);
    Route::post('/post-otp', [AuthController::class, 'post_otp']);

    // @Daftar Akun
    Route::get('/daftar/{id}', [AuthController::class, 'sign_up']);
    Route::post('/post-sign-up', [AuthController::class, 'post_sign_up']);

    // @Jika Sudah Memiliki Akun
    Route::get('/masuk/{id}', [AuthController::class, 'password']);
    Route::post('/post-password', [AuthController::class, 'post_password']);    

});

Route::group(['middleware'=> 'auth'], function() {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware'=> 'home'], function() {

        // @home
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/pencarian', [HomeController::class, 'rekomendasi']);
        Route::get('/pencarian/explore', [HomeController::class, 'pencarian']);
        Route::get('/pencarian/rekomendasi', [HomeController::class, 'rekomendasi']);
        Route::get('/pencarian/maps', [HomeController::class, 'maps']);

        // @akun
        Route::get('/akun', [UserController::class, 'index']);
        Route::get('/akun/pengaturan-profil', [UserController::class, 'biodata']);
        Route::put('/akun/pengaturan-profil/simpan-biodata', [UserController::class, 'simpan_biodata']);

        // @mitra
        Route::get('/akun/mitra', [MitraController::class, 'mitra']);
        // @belum jadi mitra
        Route::get('/akun/jadi-mitra', [MitraController::class, 'jadi_mitra']);
        Route::get('/akun/jadi-mitra/{jenis_mitra}', [MitraController::class, 'register']);
        Route::get('/akun/jadi-mitra/{jenis_mitra}/pilih-lokasi', [MitraController::class, 'pilih_lokasi']);
        Route::post('/akun/jadi-mitra/{jenis_mitra}/simpan', [MitraController::class, 'simpan_mitra']);


        Route::group(['middleware'=> 'free'], function() {

            // @mitra free
            Route::get('/akun/mitra/free', [MitraController::class, 'index_free']);
            Route::put('/akun/mitra/free/simpan', [MitraController::class, 'simpan_data_free']);
            Route::get('/akun/mitra/free/upgrade-premium', [MitraController::class, 'upgrade_premium']);
            Route::put('/akun/mitra/free/upgrade-premium/simpan', [MitraController::class, 'simpan_upgrade_premium']);

        });

        Route::group(['middleware'=> 'premium'], function() {

                // @mitra premium 
            Route::get('/akun/mitra/premium', [MitraController::class, 'index_premium']);
            Route::put('/akun/mitra/premium/simpan', [MitraController::class, 'simpan_data_premium']);
            Route::get('/akun/mitra/premium/atur-toko', [MitraController::class, 'atur_toko_premium']);
            Route::get('/akun/mitra/premium/tambah-produk', [MitraController::class, 'daftar_produk_premium']);
            Route::get('/akun/mitra/premium/tambah-produk/add', [MitraController::class, 'tambah_produk_premium']);
            Route::get('/akun/mitra/premium/atur-produk', [MitraController::class, 'atur_produk_premium']);
            Route::post('/akun/mitra/premium/atur-produk/simpan', [MitraController::class, 'simpan_atur_produk_premium']);
            Route::put('/akun/mitra/premium/atur-produk/update', [MitraController::class, 'update_atur_produk_premium']);
            Route::put('/akun/mitra/premium/atur-produk/hapus', [MitraController::class, 'hapus_atur_produk_premium']);





        });



        Route::get('/user/jadi-mitra/{jenis_mitra}/register_nik', [MitraController::class, 'register_nik']);
        Route::get('/user/jadi-mitra/{jenis_mitra}/upload_foto', [MitraController::class, 'upload_foto']);

        // Route::get('/user/jadi-mitra/{jenis_mitra}', [UserController::class, 'jenis_mitra']);
        // Route::get('/user/jadi-mitra/{jenis_mitra}/register', [MitraController::class, 'register']);
        // Route::get('/user/jadi-mitra/{jenis_mitra}/register/pilih-lokasi', [MitraController::class, 'pilih_lokasi']);

        // list pesanan
        Route::get('/akun/pengaturan_toko/pesanan', [PesananController::class, 'pesanan']);
        Route::get('/akun/pengaturan_toko/hapus_pesanan/{id}', [PesananController::class, 'hapus_pesanan']);
        Route::get('/akun/list_produk', [PesananController::class, 'list_produk']);
        Route::post('/akun/post/pesanan', [PesananController::class, 'post_pesanan']);
        Route::get('/akun/riwayat_transaksi', [PesananController::class, 'riwayat_transaksi']);
        Route::get('/akun/riwayat_transaksi/bulan', [PesananController::class, 'riwayat_transaksi_bulan']);
        

    });

});




// toko
Route::get('/toko', [Toko_controller::class, 'index']);
Route::get('/toko/informasi_toko', [Toko_controller::class, 'informasi_toko']);
Route::get('/toko/akun', [Toko_controller::class, 'akun']);
// ==== produk
Route::get('/toko/semua_produk', [Produk_controller::class, 'semua_produk']);
Route::get('/toko/tambah_produk', [Produk_controller::class, 'tambah_produk']);
Route::post('/toko/get_sub_kategori', [Produk_controller::class, 'get_sub_kategori'])->name('get_sub_kategori_');
// ==== end produk
// end toko

// manajemen pengguna
Route::get('/admin/manajemen/pengguna', [Admin_Manajemen_Pengguna_Controller::class, 'index']);
Route::post('/admin/ubah_password/pengguna', [Admin_Manajemen_Pengguna_Controller::class, 'ubah_password']);
Route::get('/admin/delete/pengguna/{id}', [Admin_Manajemen_Pengguna_Controller::class, 'hapus_pengguna']);

// manajemen kategori toko
Route::get('/admin/manajemen/kategori_toko', [Admin_Manajemen_Kategori_Controller::class, 'kategori_toko']);
Route::get('/admin/delete/kategori_toko/{id}', [Admin_Manajemen_Kategori_Controller::class, 'hapus_kategori_toko']);
Route::post('/admin/tambah/kategori_toko', [Admin_Manajemen_Kategori_Controller::class, 'tambah_kategori_toko']);
Route::post('/admin/ubah/kategori_toko', [Admin_Manajemen_Kategori_Controller::class, 'ubah_kategori_toko']);

// manajemen kategori produk
Route::get('/admin/manajemen/kategori_produk', [Admin_Manajemen_Kategori_Controller::class, 'kategori_produk']);
Route::post('/admin/manajemen/get_sub_kategori', [Admin_Manajemen_Kategori_Controller::class, 'get_sub_kategori'])->name('get_sub_kategori');
Route::post('/admin/ubah/kategori_produk', [Admin_Manajemen_Kategori_Controller::class, 'ubah_kategori_produk']);
Route::get('/admin/delete/kategori_produk/{id}', [Admin_Manajemen_Kategori_Controller::class, 'hapus_kategori_produk']);
Route::post('/admin/ubah/sub_kategori_produk', [Admin_Manajemen_Kategori_Controller::class, 'ubah_sub_kategori_produk']);
Route::get('/admin/delete/sub_kategori_produk/{id}', [Admin_Manajemen_Kategori_Controller::class, 'hapus_sub_kategori_produk']);
Route::post('/admin/tambah/kategori_produk', [Admin_Manajemen_Kategori_Controller::class, 'tambah_kategori_produk']);
Route::post('/admin/tambah/sub_kategori_produk', [Admin_Manajemen_Kategori_Controller::class, 'tambah_sub_kategori_produk']);

// manajemen toko
Route::get('/admin/manajemen/toko', [Admin_Manajemen_Toko_Controller::class, 'index']);
Route::get('/admin/manajemen/daftar_tunggu_toko', [Admin_Manajemen_Toko_Controller::class, 'daftar_tunggu_toko']);
Route::get('/admin/manajemen/daftar_tunggu_toko/{id}', [Admin_Manajemen_Toko_Controller::class, 'daftar_tunggu_toko_detail']);