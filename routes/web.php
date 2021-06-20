<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Lupa_Password_Controller;
use App\Http\Controllers\toko_controller\Toko_controller;
use App\Http\Controllers\toko_controller\Produk_controller;
// Admin
use App\Http\Controllers\Admin\Admin_Auth_Controller;
use App\Http\Controllers\Admin\Admin_Beranda_Controller;
use App\Http\Controllers\Admin\Admin_Manajemen_Pengguna_Controller;
use App\Http\Controllers\Admin\Admin_Manajemen_Kategori_Controller;
use App\Http\Controllers\Admin\Admin_Manajemen_Toko_Controller;
use App\Http\Controllers\Admin\Diagram_Controller;
// 
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
use App\Http\Controllers\Mitra\Mitra_Premium_Landingpage_Controller;
use App\Http\Controllers\Mitra\PesananController;
use App\Http\Controllers\Mitra\TransaksiController;
// DIGITAL DOWNLOAD
use App\Http\Controllers\DigitalDownload\DigitalDownloadController;
use App\Http\Controllers\DigitalDownload\DigitalRegisterController;
use App\Http\Controllers\DigitalDownload\DigitalAkunController;
use App\Http\Controllers\DigitalDownload\Akun\AturBandController;
use App\Http\Controllers\DigitalDownload\Akun\SingleController;
use App\Http\Controllers\DigitalDownload\Akun\AlbumController;

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

    Route::post('/masuk', [AuthController::class, 'post_login_v2']);
    Route::get('/redirectToGoogle', [AuthController::class, 'redirectToGoogle']);
    Route::get('/auth/google/callback', [AuthController::class, 'callbackGoogle']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::get('/register-api', [AuthController::class, 'register_api']);
    
    Route::post('/buat-akun/input_otp', [AuthController::class, 'input_otp']);
    Route::get('/input_otp/{email}/{no_hp}', [AuthController::class, 'view_input_otp']);
    Route::get('/input_password/{email}/{no_hp}', [AuthController::class, 'view_input_password']);
    Route::post('/buat-akun/post_otp', [AuthController::class, 'post_otp']);
    Route::post('/buat-akun/post_password', [AuthController::class, 'post_password']);
    Route::post('/buat-akun', [AuthController::class, 'buat_akun']);
    Route::post('/buat-akun/simpan-foto', [UserController::class, 'simpan_foto']);

    // lupa password
    Route::get('/lupa_password/cari_akun', [Lupa_Password_Controller::class, 'view_cari_akun']);
    Route::post('/lupa_password/post_no_hp', [Lupa_Password_Controller::class, 'post_no_hp']);
    Route::post('/lupa_password/kirim_kode', [Lupa_Password_Controller::class, 'post_kirim_kode']);
    Route::post('/lupa_password/post_kode', [Lupa_Password_Controller::class, 'post_kode_lupa_password']);
    Route::post('/lupa_password/post_new_password', [Lupa_Password_Controller::class, 'post_new_password']);
    Route::get('/lupa_password/input_kode/{id}', [Lupa_Password_Controller::class, 'view_input_kode']);

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

    Route::get('/admin', [Admin_Auth_Controller::class, 'login'])->name('login_admin');
    Route::post('/admin/masuk', [Admin_Auth_Controller::class, 'post_login']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/', [HomeController::class, 'index'])->name('home');

    // route
    Route::get('/home_mitra', [HomeController::class, 'home_mitra']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/pencarian', [HomeController::class, 'pencarian']);
    Route::get('/pencarian/explore/{id_product}', [HomeController::class, 'detail_produk']);
    Route::get('/pencarian/explore', [HomeController::class, 'pencarian']);
    Route::get('/pencarian/rekomendasi', [HomeController::class, 'pencarian']);
    Route::get('/pencarian/maps', [HomeController::class, 'maps']);
    Route::post('/pencarian/maps/get_jadwal', [HomeController::class, 'get_jadwal'])->name('get_jadwal');

    
});

Route::group(['middleware'=> 'auth'], function() {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/buat_akun_biodata', [AuthController::class, 'buat_akun_biodata']);
    Route::post('/register/post_biodata_awal', [AuthController::class, 'post_biodata_awal']);
    // Halaman Tunggu 
    Route::get('/home/halaman_tunggu', [HomeController::class, 'untuk_mitra']);

    Route::group(['middleware'=> 'home'], function() {


        // @home

        // @akun
        Route::get('/akun', [UserController::class, 'index']);
        Route::get('/akun/pengaturan-profil', [UserController::class, 'biodata']);
        Route::post('/akun/pengaturan-profil/simpan-foto', [UserController::class, 'simpan_foto']);
        Route::put('/akun/pengaturan-profil/simpan-biodata', [UserController::class, 'simpan_biodata']);
        Route::put('/akun/pengaturan-profil/ubah-password', [UserController::class, 'ubah_password']);


        // @mitra
        Route::get('/akun/mitra', [MitraController::class, 'mitra']);
        
        // @belum jadi mitra
        Route::get('/akun/jadi-mitra', [Mitra_Register_Controller::class, 'jadi_mitra']);
        Route::post('/akun/jadi-mitra/{jenis_mitra}/simpan-foto-register', [Mitra_Register_Controller::class, 'simpan_foto_register']);
        Route::get('/akun/jadi-mitra/{jenis_mitra}/tambah', [Mitra_Register_Controller::class, 'register']);
        Route::get('/akun/jadi-mitra/{jenis_mitra}', [Mitra_Register_Controller::class, 'register_redirect']);
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

        // Digital Download
        Route::get('digital-download', [DigitalDownloadController::class, 'index']);
        Route::get('digital-download/daftar', [DigitalDownloadController::class, 'register']);
        Route::post('digital-download/daftar/save', [DigitalRegisterController::class, 'simpan_band']);
        // Digital Download - akun
        Route::post("digital-download/akun/atur-band/hapus-temp-lagu", [AturBandController::class, 'hapus_temp_lagu']);
        Route::post("digital-download/akun/atur-band/simpan-lagu", [AturBandController::class, 'simpan_lagu']);
        Route::post("digital-download/akun/atur-band/simpan-foto-band", [AturBandController::class, 'simpan_foto_band']);
        Route::post("digital-download/akun/atur-band/simpan-data-band", [AturBandController::class, 'simpan_data_band']);
        Route::post("digital-download/akun/atur-band/simpan-foto-lagu", [AturBandController::class, 'simpan_foto_lagu']);
        Route::post("digital-download/akun/atur-band/simpan-foto-cover", [AturBandController::class, 'simpan_foto_cover']);
        Route::post("digital-download/akun/atur-band/tambah-album/simpan-album", [AturBandController::class, 'simpan_album']);
        // Single
        Route::post("digital-download/akun/single/{lagu}/update", [SingleController::class, 'update']);
        Route::get("digital-download/akun/single/{lagu}/ubah", [SingleController::class, 'ubah']);
        Route::get("digital-download/akun/single/{lagu}", [SingleController::class, 'play_single']);
        // Band
        Route::post("digital-download/akun/album/{lagu}/update", [AlbumController::class, 'update']);
        Route::get("digital-download/akun/album/{lagu}/ubah", [AlbumController::class, 'ubah']);
        Route::get("digital-download/akun/album/{lagu}", [AlbumController::class, 'play_album']);
        // Atur Band

        Route::get("digital-download/akun/atur-band/tambah-single", [AturBandController::class, 'tambah_single']);
        Route::get("digital-download/akun/atur-band/tambah-album", [AturBandController::class, 'tambah_album']);
        Route::get("digital-download/akun/atur-band/tambah-single-album", [AturBandController::class, 'tambah_single_album']);
        Route::get("digital-download/akun/atur-band", [AturBandController::class, 'index']);
        Route::get("digital-download/akun", [DigitalAkunController::class, 'index']);

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
            Route::get('/akun/mitra/premium/daftar-tunggu-pesanan', [Mitra_Premium_Controller::class, 'daftar_tunggu_pesanan']);
            Route::post('/akun/mitra/premium/daftar-tunggu-pesanan/hapus-daftar', [Mitra_Premium_Controller::class, 'hapus_daftar_tunggu_pesanan']);
            Route::post('/akun/mitra/premium/daftar-tunggu-pesanan/berhasil-kirim', [Mitra_Premium_Controller::class, 'konfirmasi_daftar_tunggu_pesanan']);

            Route::get('/akun/mitra/premium/ganti-landing-page', [Mitra_Premium_Controller::class, 'ganti_landing_page']);               
            Route::get('/akun/mitra/premium/post_template/{id}', [Mitra_Premium_Controller::class, 'post_template']);

            // @atur toko
            Route::post('/akun/mitra/premium/ubah-toko/simpan-foto', [Mitra_Premium_Controller::class, 'simpan_foto_toko']);    
            Route::get('/akun/mitra/premium/ubah-toko', [Mitra_Premium_Controller::class, 'atur_toko_premium']);               
            Route::get('/akun/mitra/premium/ubah-toko/kirim-lokasi', [Mitra_Premium_Controller::class, 'kirim_lokasi']);
            Route::get('/akun/mitra/premium/ubah-toko/atur-lokasi', [Mitra_Premium_Controller::class, 'atur_lokasi']);

            Route::put('/akun/mitra/premium/ubah-toko/atur-lokasi/simpan', [Mitra_Premium_Controller::class, 'simpan_lokasi']);

            // @tambah produk
            Route::get('/akun/mitra/premium/atur-produk', [Mitra_Premium_Produk_Controller::class, 'daftar_produk_premium']);
            Route::get('/akun/mitra/premium/atur-produk/tambah', [Mitra_Premium_Produk_Controller::class, 'tambah_produk_premium']);
            Route::post('/akun/mitra/premium/atur-produk/simpan-foto', [Mitra_Premium_Produk_Controller::class, 'simpan_foto_produk']);
            Route::post('/akun/mitra/premium/atur-produk/tambah/simpan', [Mitra_Premium_Produk_Controller::class, 'simpan_tambah_produk_premium']);
            Route::get('/akun/mitra/premium/atur-produk/{id}/ubah', [Mitra_Premium_Produk_Controller::class, 'produk_premium']);
            Route::put('/akun/mitra/premium/atur-produk/{id}/simpan', [Mitra_Premium_Produk_Controller::class, 'update_tambah_produk_premium']);
            Route::get('/akun/mitra/premium/atur-produk/{id}/hapus', [Mitra_Premium_Produk_Controller::class, 'hapus_tambah_produk_premium']);

            // @atur produk
            Route::get('/akun/mitra/premium/ubah-landing-page', [Mitra_Premium_Landingpage_Controller::class, 'atur_landing_page']);
            Route::post('/akun/mitra/premium/ubah-landing-page/simpan-foto-cover', [Mitra_Premium_Landingpage_Controller::class, 'simpan_foto_cover'])->name('simpan_foto_cover');            
            Route::post('/akun/mitra/premium/ubah-landing-page/simpan-foto-maps', [Mitra_Premium_Landingpage_Controller::class, 'simpan_foto_maps'])->name('simpan_foto_maps');
            Route::post('/akun/mitra/premium/ubah-landing-page/ubah-status', [Mitra_Premium_Landingpage_Controller::class, 'ubah_status_produk_premium'])->name('ubah_status_produk_premium');
            Route::post('/akun/mitra/premium/ubah-landing-page/hapus-foto-cover', [Mitra_Premium_Landingpage_Controller::class, 'hapus_foto_cover']);
            Route::post('/akun/mitra/premium/ubah-landing-page/hapus-foto-maps', [Mitra_Premium_Landingpage_Controller::class, 'hapus_foto_maps']);
            Route::post('/akun/mitra/premium/ubah-landing-page/hapus-video', [Mitra_Premium_Landingpage_Controller::class, 'hapus_video']);

            // atur landing page
            Route::post('/atur_landing_page/simpan_cover', [Mitra_Premium_Landingpage_Controller::class, 'simpan_cover'])->name('simpan_cover_landing_page');
            Route::post('/atur_landing_page/simpan_video', [Mitra_Premium_Landingpage_Controller::class, 'simpan_video'])->name('simpan_video_landing_page');
            Route::post('/atur_landing_page/post_fasilitas_toko', [Mitra_Premium_Landingpage_Controller::class, 'post_fasilitas_toko'])->name('post_fasilitas_toko');
            Route::post('/akun/mitra/premium/ubah-landing-page/post_fasilitas', [Mitra_Premium_Landingpage_Controller::class, 'post_fasilitas_baru']);
            Route::post('/akun/mitra/premium/ubah-landing-page/ubah_fasilitas', [Mitra_Premium_Landingpage_Controller::class, 'ubah_fasilitas']);
            Route::get('/akun/mitra/premium/ubah-landing-page/hapus_fasilitas/{id}', [Mitra_Premium_Landingpage_Controller::class, 'hapus_fasilitas']);

            // list pesananan
            Route::get('/akun/mitra/premium/list-pesanan', [PesananController::class, 'pesanan']);
            Route::get('/akun/mitra/premium/list-pesanan/list-produk', [PesananController::class, 'list_produk']);
            Route::post('/akun/mitra/premium/hapus-pesanan', [PesananController::class, 'hapus_pesanan']);
            Route::post('/akun/mitra/premium/ubah-jumlah-pesanan', [PesananController::class, 'ubah_jumlah_pesanan']);
            Route::post('/akun/mitra/premium/simpan-pesanan', [PesananController::class, 'post_pesanan']);
            Route::get('/akun/pengaturan_toko/hapus_pesanan/{id}', [PesananController::class, 'hapus_pesanan']);
            Route::get('/akun/riwayat_transaksi', [PesananController::class, 'riwayat_transaksi']);
            Route::get('/akun/riwayat_transaksi/bulan', [PesananController::class, 'riwayat_transaksi_bulan']);

            // list transaksi
            Route::post('/akun/mitra/premium/transaksi/pilih-rentan-tanggal-range', [TransaksiController::class, 'pilih_rentan_tanggal_range'])->name('pilih_rentan_tanggal_range');
            Route::post('/akun/mitra/premium/transaksi/pilih-rentan-tanggal', [TransaksiController::class, 'pilih_rentan_tanggal'])->name('pilih_rentan_tanggal');
            Route::post('/akun/mitra/premium/transaksi/simpan', [TransaksiController::class, 'simpan_transaksi']);
            Route::get('/akun/mitra/premium/transaksi/laporan-keuangan', [TransaksiController::class, 'laporan_keuangan']);
            Route::get('/akun/mitra/premium/transaksi/tambah-transaksi', [TransaksiController::class, 'tambah_transaksi']);
            Route::get('/akun/mitra/premium/transaksi', [TransaksiController::class, 'index']);

            // pesanan
            Route::get('/get/konfirmasi_pesanan/{keynota}/{status}', [PesananController::class,'ubah_status']);

        });



});


Route::group(['middleware'=> 'admin'], function() {

    Route::get('/admin/logout', [Admin_Auth_Controller::class, 'logout']);


    Route::get('/admin/beranda', [Admin_Beranda_Controller::class, 'index']);

    // diagram
    Route::get('/admin/manajemen/diagram_user', [Diagram_Controller::class,'user']);
    Route::post('/admin/manajemen/diagram_user_pilih', [Diagram_Controller::class,'diagram_user_pilih']);
    // end diagram
        // manajemen pengguna
    Route::get('/admin/manajemen/pengguna', [Admin_Manajemen_Pengguna_Controller::class, 'index']);
    Route::get('/admin/manajemen/pengguna_daftar_otp', [Admin_Manajemen_Pengguna_Controller::class, 'daftar_otp']);
    Route::get('/admin/manajemen/buat_toko/{id}', [Admin_Manajemen_Pengguna_Controller::class, 'buat_toko']);
    Route::post('/admin/manajemen/post_buat_toko/{id}', [Admin_Manajemen_Pengguna_Controller::class, 'post_buat_toko']);
    Route::get('/admin/manajemen/detail_pengguna/{id}', [Admin_Manajemen_Pengguna_Controller::class, 'detail_pengguna']);
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
    Route::get('/admin/manajemen/perubahan-toko', [Admin_Manajemen_Toko_Controller::class, 'perubahan_toko']);
    Route::post('/admin/manajemen/hapus_toko', [Admin_Manajemen_Toko_Controller::class, 'hapus_toko']);
    Route::get('/admin/manajemen/toko/{id}', [Admin_Manajemen_Toko_Controller::class, 'detail_toko']);
    Route::post('/admin/manajemen/toko/{id}/ganti-foto-logo', [Admin_Manajemen_Toko_Controller::class, 'ganti_foto_logo']);
    Route::post('/admin/manajemen/toko/{id}/post_password_baru', [Admin_Manajemen_Toko_Controller::class, 'post_password_baru']);
    Route::post('/admin/manajemen/toko/{id}/ubah_logo', [Admin_Manajemen_Toko_Controller::class, 'ubah_logo']);
    Route::post('/admin/manajemen/toko/{id}/post_ubah', [Admin_Manajemen_Toko_Controller::class, 'post_ubah_toko']);
    Route::post('/admin/manajemen/toko/{id}/post_ubah_alamat', [Admin_Manajemen_Toko_Controller::class, 'post_ubah_alamat_toko']);
    Route::get('/admin/manajemen/daftar_tunggu_toko', [Admin_Manajemen_Toko_Controller::class, 'daftar_tunggu_toko']);
    Route::get('/admin/manajemen/daftar_tunggu_toko/{id}', [Admin_Manajemen_Toko_Controller::class, 'daftar_tunggu_toko_detail']);
    Route::post('/admin/manajemen/daftar_tunggu_toko/post', [Admin_Manajemen_Toko_Controller::class, 'post_daftar_tunggu_toko'])->name('validasi_toko');

        // manajemen toko (produk dan landing page)
    Route::get('/admin/manajemen/toko/{id}/ubah_status_toko', [GetController::class, 'ubah_status_toko']);
    Route::get('/admin/manajemen/toko/landing_page_hapus_fasiltas_toko/{id}', [Admin_Manajemen_Toko_Controller::class, 'hapus_fasilitas_toko']);
    Route::post('/admin/manajemen/toko/landing_page_ubah_fasiltas_toko', [Admin_Manajemen_Toko_Controller::class, 'ubah_fasilitas_toko']);
    Route::post('/admin/manajemen/toko/{id_toko}/landing_page_tambah_fasiltas_toko', [GetController::class, 'post_fasilitas_baru']);
    Route::post('/admin/manajemen/toko/{id_toko}/landing_page_ubah_status_produk', [GetController::class, 'ubah_status_produk_premium']);
    Route::post('/admin/manajemen/toko/{id_toko}/landing_page_ganti_cover', [GetController::class, 'input_cover']);
    Route::post('/admin/manajemen/toko/{id_toko}/landing_page_ganti_foto_maps', [GetController::class, 'input_foto_maps']);
    Route::post('/admin/manajemen/toko/{id_toko}/landing_page_ganti_video', [GetController::class, 'input_video']);
    Route::get('/admin/manajemen/toko/{id_toko}/daftar_produk', [Admin_Manajemen_Toko_Controller::class, 'daftar_produk_toko']);
    Route::put('/admin/manajemen/toko/{id_toko}/daftar_produk/update-foto-ori', [Admin_Manajemen_Toko_Controller::class, 'update_foto_ori']);
    Route::post('/admin/manajemen/toko/{id_toko}/daftar_produk/ganti-foto-produk', [Admin_Manajemen_Toko_Controller::class, 'ganti_foto_produk']);
    Route::get('/admin/manajemen/toko/{id_toko}/landing_page', [Admin_Manajemen_Toko_Controller::class, 'landing_page']);
    Route::post('/admin/manajemen/toko/{id_toko}/post_ubah_produk', [Admin_Manajemen_Toko_Controller::class, 'post_ubah_produk']);
    Route::post('/admin/manajemen/toko/{id_toko}/post_validasi_perubahan', [Admin_Manajemen_Toko_Controller::class, 'post_validasi_perubahan']);

});

});

Route::get('/verifikasi/send_email', [MailController::class, 'send_email']);

Route::get('crop-image-before-upload-using-croppie', [MitraController::class, 'index']);
Route::post('crop-image-before-upload-using-croppie', [MitraController::class, 'uploadCropImage']);
// get
Route::post('/register/cek_email', [GetController::class, 'cek_email']);
Route::post('/register/cek_no_hp', [GetController::class, 'cek_no_hp']);
Route::post('/get_video_link', [GetController::class, 'get_video_link'])->name('get_video_link');
Route::post('/get/get_produk', [GetController::class, 'get_produk'])->name('get_produk');
Route::get('/get/get_kecamatan', [GetController::class, 'get_kecamatan'])->name('get_kecamatan');
Route::get('/get/get_kelurahan', [GetController::class, 'get_kelurahan'])->name('get_kelurahan');
Route::get('/get/get_kelurahan_from_kota', [GetController::class, 'get_kelurahan_from_kota'])->name('get_kelurahan_from_kota');
Route::post('/post/hapus_kategorinya_toko', [GetController::class, 'hapus_kategorinya_toko'])->name('hapus_kategorinya_toko');
Route::post('/post/simpan_kategorinya_toko', [GetController::class, 'simpan_kategorinya_toko'])->name('simpan_kategorinya_toko');


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



Route::get('/{username_mitra}/daftar-menu/{produk}' , [LandingPageController::class, 'detail_produk']);
Route::get('/{username_mitra}/daftar-menu', [LandingPageController::class, 'daftar_menu']);
Route::get('/{username_mitra}', [LandingPageController::class, 'landing_page_mitra']);

// keranjang
Route::post('/tambah_keranjang_belanja', [Keranjang_Belanja_Controller::class, 'tambah_keranjang_belanja'])->name('tambah_keranjang_belanja');
Route::post('/user/keranjang/hapus_keranjang', [Keranjang_Belanja_Controller::class, 'hapus_keranjang']);
Route::post('/user/keranjang/tambah_daftar_tunggu', [Keranjang_Belanja_Controller::class, 'tambah_daftar_tunggu']);
Route::post('/user/keranjang/ubah_jumlah', [Keranjang_Belanja_Controller::class, 'ubah_jumlah']);
Route::get('/user/keranjang/batalkan_pesanan/{kode_nota}', [Keranjang_Belanja_Controller::class, 'batalkan_pesanan']);
Route::get('/user/keranjang/{id_toko}', [Keranjang_Belanja_Controller::class, 'keranjang']);
Route::get('/user/keranjang', [Keranjang_Belanja_Controller::class, 'keranjang_user']);
Route::get('/user/keranjang/riwayat_pesanan/riwayat', [Keranjang_Belanja_Controller::class, 'riwayat_keranjang']);
Route::get('/user/keranjang/kirim_pesan/kirim_wa/{kode_nota}', [Keranjang_Belanja_Controller::class, 'kirim_pesanan']);

// Penilaian
Route::post('/user/post_penilaian', [PenilaianController::class, 'post_penilaian']);