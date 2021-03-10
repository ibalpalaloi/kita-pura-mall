<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\toko_controller\Toko_controller;
use App\Http\Controllers\toko_controller\Produk_controller;
use App\Http\Controllers\Admin\Admin_Manajemen_Pengguna_Controller;
use App\Http\Controllers\Admin\Admin_Manajemen_Kategori_Controller;
use App\Http\Controllers\Admin\Admin_Manajemen_Toko_Controller;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\Keranjang_Belanja_Controller;
use App\Http\Controllers\User\PenilaianController;

// MITRA
use App\Http\Controllers\Mitra\Atur_Landing_Page_Controller;
use App\Http\Controllers\Mitra\MitraController;
use App\Http\Controllers\Mitra\Mitra_Register_Controller;
use App\Http\Controllers\Mitra\Mitra_Free_Controller;
use App\Http\Controllers\Mitra\Mitra_Premium_Controller;
use App\Http\Controllers\Mitra\Mitra_Premium_Produk_Controller;
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
        Route::get('/home_mitra', [HomeController::class, 'home_mitra']);
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/pencarian', [HomeController::class, 'rekomendasi']);
        Route::get('/pencarian/explore', [HomeController::class, 'pencarian']);
        Route::get('/pencarian/rekomendasi', [HomeController::class, 'rekomendasi']);
        Route::get('/pencarian/maps', [HomeController::class, 'maps']);

        // @akun
        Route::get('/akun', [UserController::class, 'index']);
        Route::get('/akun/pengaturan-profil', [UserController::class, 'biodata']);
        Route::post('/akun/pengaturan-profil/simpan-foto', [UserController::class, 'simpan_foto']);
        Route::put('/akun/pengaturan-profil/simpan-biodata', [UserController::class, 'simpan_biodata']);

        // @mitra
        Route::get('/akun/mitra', [MitraController::class, 'mitra']);
        
        // @belum jadi mitra
        Route::get('/akun/jadi-mitra', [Mitra_Register_Controller::class, 'jadi_mitra']);
        Route::get('/akun/jadi-mitra/{jenis_mitra}', [Mitra_Register_Controller::class, 'register']);
        Route::post('/akun/jadi-mitra/{jenis_mitra}/simpan', [Mitra_Register_Controller::class, 'simpan_mitra']);
        Route::get('/akun/jadi-mitra/{jenis_mitra}/kirim-lokasi', [Mitra_Register_Controller::class, 'kirim_lokasi']);
        Route::get('/akun/jadi-mitra/{jenis_mitra}/pilih-lokasi', [Mitra_Register_Controller::class, 'pilih_lokasi']);
        Route::put('/akun/jadi-mitra/{jenis_mitra}/pilih-lokasi/simpan', [Mitra_Register_Controller::class, 'simpan_lokasi']);
        Route::get('/akun/jadi-mitra/{jenis_mitra}/pilih-lokasi/selesai', [Mitra_Register_Controller::class, 'selesai']);
        Route::get('/akun/jadi-mitra/{jenis_mitra}/upload-ktp', [Mitra_Register_Controller::class, 'upload_ktp']);
        Route::post('/akun/jadi-mitra/{jenis_mitra}/upload-ktp/simpan', [Mitra_Register_Controller::class, 'simpan_ktp']);
        // @verifikasi_nomor_hp
        Route::post('/ganti-nomor-hp', [AuthController::class, 'ganti_nomor_hp'])->name('ganti_nomor_hp');
        Route::post('/kirim-ulang-otp', [AuthController::class, 'kirim_ulang_otp'])->name('kirim_ulang_otp');
        Route::post('/set-null', [AuthController::class, 'set_null'])->name('set-null');
        Route::post('/notif-lengkap', [AuthController::class, 'notif_biodata_lengkap'])->name('notif_lengkap');
        Route::post('/notif_toko_lengkap', [AuthController::class, 'notif_toko_lengkap'])->name('notif_toko_lengkap');
        Route::group(['middleware'=> 'free'], function() {
            // @mitra free
            Route::get('/akun/mitra/free', [Mitra_Free_Controller::class, 'index_free']);
            Route::put('/akun/mitra/free/simpan', [Mitra_Free_Controller::class, 'simpan_data_free']);
            
            Route::get('/akun/mitra/free/kirim-lokasi', [Mitra_Free_Controller::class, 'kirim_lokasi']);
            Route::get('/akun/mitra/free/atur-lokasi', [Mitra_Free_Controller::class, 'atur_lokasi']);
            Route::put('/akun/mitra/free/atur-lokasi/simpan', [Mitra_Free_Controller::class, 'simpan_lokasi']);

            Route::get('/akun/mitra/free/upgrade-premium', [Mitra_Free_Controller::class, 'upgrade_premium']);
            Route::put('/akun/mitra/free/upgrade-premium/simpan', [Mitra_Free_Controller::class, 'simpan_upgrade_premium']);
            Route::get('/akun/mitra/free/upgrade-premium/batalkan-upgrade', [Mitra_Free_Controller::class, 'batalkan_upgrade']);
            Route::get('/akun/mitra/free/upgrade-premium/kirim-lokasi', [Mitra_Free_Controller::class, 'upgrade_kirim_lokasi']);
            Route::get('/akun/mitra/free/upgrade-premium/atur-lokasi', [Mitra_Free_Controller::class, 'upgrade_atur_lokasi']);

            Route::put('/akun/mitra/free/upgrade-premium/atur-lokasi/simpan', [Mitra_Free_Controller::class, 'upgrade_simpan_lokasi']);
            Route::get('/akun/mitra/free/upgrade-premium/upload-ktp', [Mitra_Free_Controller::class, 'upgrade_upload_ktp']);
            Route::post('/akun/mitra/free/upgrade-premium/upload-ktp/simpan', [Mitra_Free_Controller::class, 'upgrade_simpan_ktp']);

            
            

        });

        Route::group(['middleware'=> 'premium'], function() {
            // @mitra premium 
            Route::get('/akun/mitra/premium', [Mitra_Premium_Controller::class, 'index_premium']);
            Route::put('/akun/mitra/premium/simpan', [Mitra_Premium_Controller::class, 'simpan_data_premium']);
            Route::get('/akun/mitra/premium/upload-ktp', [Mitra_Premium_Controller::class, 'upload_ktp']);
            Route::post('/akun/mitra/premium/upload-ktp/simpan', [Mitra_Premium_Controller::class, 'simpan_ktp']);

            // @atur toko
            Route::get('/akun/mitra/premium/atur-toko', [Mitra_Premium_Controller::class, 'atur_toko_premium']);               
            Route::get('/akun/mitra/premium/atur-toko/kirim-lokasi', [Mitra_Premium_Controller::class, 'kirim_lokasi']);
            Route::get('/akun/mitra/premium/atur-toko/atur-lokasi', [Mitra_Premium_Controller::class, 'atur_lokasi']);

            Route::put('/akun/mitra/premium/atur-toko/atur-lokasi/simpan', [Mitra_Premium_Controller::class, 'simpan_lokasi']);

            // @tambah produk
            Route::get('/akun/mitra/premium/tambah-produk', [Mitra_Premium_Produk_Controller::class, 'daftar_produk_premium']);
            Route::get('/akun/mitra/premium/tambah-produk/tambah', [Mitra_Premium_Produk_Controller::class, 'tambah_produk_premium']);
            Route::post('/akun/mitra/premium/tambah-produk/tambah/simpan', [Mitra_Premium_Produk_Controller::class, 'simpan_tambah_produk_premium']);
            Route::get('/akun/mitra/premium/tambah-produk/{id}', [Mitra_Premium_Produk_Controller::class, 'produk_premium']);
            Route::put('/akun/mitra/premium/tambah-produk/{id}/simpan', [Mitra_Premium_Produk_Controller::class, 'update_tambah_produk_premium']);
            Route::get('/akun/mitra/premium/tambah-produk/{id}/hapus', [Mitra_Premium_Produk_Controller::class, 'hapus_tambah_produk_premium']);

            // @atur produk
            Route::get('/akun/mitra/premium/atur-produk', [Mitra_Premium_Produk_Controller::class, 'atur_produk_premium']);
            Route::put('/akun/mitra/premium/atur-produk/simpan', [Mitra_Premium_Produk_Controller::class, 'simpan_atur_produk_premium']);
            Route::post('/akun/mitra/premium/atur-produk/simpan-foto-maps', [Mitra_Premium_Produk_Controller::class, 'simpan_foto_maps'])->name('simpan_foto_maps');
            Route::get('/akun/mitra/premium/atur-produk/{id}/ubah-status', [Mitra_Premium_Produk_Controller::class, 'ubah_status_produk_premium']);

            // atur landing page
            Route::post('/atur_landing_page/simpan_video', [Atur_Landing_Page_Controller::class, 'simpan_video'])->name('simpan_video_landing_page');
            Route::post('/atur_landing_page/post_fasilitas_toko', [Atur_Landing_Page_Controller::class, 'post_fasilitas_toko'])->name('post_fasilitas_toko');
            Route::post('/akun/mitra/premium/atur-produk/post_fasilitas', [Atur_Landing_Page_Controller::class, 'post_fasilitas_baru']);
            Route::post('/akun/mitra/premium/atur-produk/ubah_fasilitas', [Atur_Landing_Page_Controller::class, 'ubah_fasilitas']);
            Route::get('/akun/mitra/premium/atur-produk/hapus_fasilitas/{id}', [Atur_Landing_Page_Controller::class, 'hapus_fasilitas']);

            // list pesananan
            Route::get('/akun/mitra/premium/list-pesanan', [PesananController::class, 'pesanan']);
            Route::get('/akun/mitra/premium/list-pesanan/list-produk', [PesananController::class, 'list_produk']);
            Route::post('/akun/mitra/premium/hapus-pesanan', [PesananController::class, 'hapus_pesanan']);
            Route::post('/akun/mitra/premium/ubah-jumlah-pesanan', [PesananController::class, 'ubah_jumlah_pesanan']);
            Route::post('/akun/mitra/premium/simpan-pesanan', [PesananController::class, 'post_pesanan']);
            Route::get('/akun/pengaturan_toko/hapus_pesanan/{id}', [PesananController::class, 'hapus_pesanan']);
            Route::get('/akun/riwayat_transaksi', [PesananController::class, 'riwayat_transaksi']);
            Route::get('/akun/riwayat_transaksi/bulan', [PesananController::class, 'riwayat_transaksi_bulan']);

            

        });

        

    });

});


Route::get('crop-image-before-upload-using-croppie', [MitraController::class, 'index']);
Route::post('crop-image-before-upload-using-croppie', [MitraController::class, 'uploadCropImage']);
// get
Route::post('/get_video_link', [GetController::class, 'get_video_link'])->name('get_video_link');

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
Route::post('/admin/manajemen/daftar_tunggu_toko/post', [Admin_Manajemen_Toko_Controller::class, 'post_daftar_tunggu_toko']);

Route::get('/{username_mitra}/daftar-menu/{produk}', [LandingPageController::class, 'detail_produk']);
Route::get('/{username_mitra}/daftar-menu', [LandingPageController::class, 'daftar_menu']);
Route::get('/{username_mitra}', [LandingPageController::class, 'landing_page_mitra']);

// keranjang
Route::post('/tambah_keranjang_belanja', [Keranjang_Belanja_Controller::class, 'tambah_keranjang_belanja'])->name('tambah_keranjang_belanja');
Route::get('/user/keranjang', [Keranjang_Belanja_Controller::class, 'keranjang']);

// Penilaian
Route::post('/user/post_penilaian', [PenilaianController::class, 'post_penilaian']);