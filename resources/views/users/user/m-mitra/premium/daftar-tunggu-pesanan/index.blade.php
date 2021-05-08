@extends('layouts.home_premium')

@section('title')

@endsection

@section('header-scripts')
<?php
    // fungsi untuk konversi tanggal ke indonesia
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<style type="text/css">
	.banner {
		max-width: 480px;
		width: 100%;
		margin: 0px auto;
		padding: 4em 0em 4em 0em;
	}

	.header {
		background: #ffaa00;
		position: fixed;
		width: 100%;
		top: 0px;
		left: 0px;
		right: 0px;
		z-index: 11;				
	}

	.card-mall {
		background: white;
		border-radius: 1.5em;	
		margin-bottom: 1em;
	}

	.kategori {
		padding: 0.8em 0em 1em 0em;
		display: flex; 
		position: relative; 
		top: -3em; 
		margin-bottom: -2em;
		z-index: 1;   
		overflow-y: visible; 
		overflow-x: visible; 			

	}

	.nama-kategori {
		padding: 0.5em 0.5em 0.5em 0.5em;
		display: flex; 				
		justify-content: space-around;
	}

	.sosmed > img {
		margin: 0px 0.6em 0px 0.6em !important;
	}

	.footer {
		position: fixed;
		left: 0;
		bottom: 0;
		width: 100%;
		color: white;
		text-align: center;
		padding-bottom: 0px;
		background-color: transparent;
	}

	.footer-mall-menu {
		background: white;
		border-radius: 3em;         
		margin-bottom: 0.5em;  
	}

	.div-input-mall {
		border-radius: 1em; border:1px solid white;		
		display: flex; justify-content: center; flex-direction: column; align-items: flex-start;
		background: white;
		width: 100%;
		padding-top: 0.3em;
		padding-bottom: 0.3em;
	}

	.div-input-mall > span {
		color: #b3b6bc;
		padding: 0em 0em 0em 1.5em; 
		font-size: 0.75em;
		position: relative;
		top: 0.5em;
	}

	.div-input-mall div {
		display: flex; justify-content: center; flex-direction: row;
		width: 90%;
	}



	.div-input-mall-square {
		border-radius: 0.5em; border:1px solid white;	
		color: #1c2645;
		font-weight: 600;			
	}

	.form-control-mall-square {
		border-radius: 1.5em !important;
		padding-left: 1.5em;
	}


	.input-group-text-mall {
		border: none;
		display: flex;justify-content: center;
		border-bottom-left-radius: 1.5em; 
		border-top-left-radius: 1.5em; 
		padding-left: 1.2em;
	}


	.form-control-mall {
		height: 2.5em; 
		border-bottom-right-radius: 1.5em; 
		border-top-right-radius: 1.5em; 
		border:  none;	
		color: #1c2645;
		font-weight: 600;
		padding: 0em 0em 0em 0.6em;	

	}

	.form-control-mall-modal {
		border-radius: 1.5em !important;
		padding-left: 1.5em;	
	}

	input:focus {
		border: none;
	}

	.form-control {
		border: none;
	}


	.animate-bottom {
		animation: animatebottom 0.4s;
	}

	@keyframes animatebottom {
		from {
			bottom: -300px;
			opacity: 0;
		}

		to {
			bottom: 0;
			opacity: 1;
		}
	}

	.modal-dialog-bottom{
		margin: 0;
		display: flex;
		align-items: flex-end;
		height: 100%;

	}  




	.select2-container--default .select2-selection--multiple .select2-selection__choice {
		background-color: #007bff;
		border-color: #006fe6;
		color: #fff;
		padding: 0 10px;
		margin-top: .31rem;        
	}

	.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
		color: rgba(255,255,255,.7);
		float: right;
		margin-left: 5px;
		margin-right: -2px;
	}

	.select2-container--default .select2-selection--single .select2-selection__rendered {
		height: 25px !important;
	}

	.select2-container .select2-selection--single {
		height: auto !important;
	}   

	select {
		-webkit-appearance: none;
		-moz-appearance: none;
		text-indent: 1px;
		text-overflow: '';
		border: none;
		width: 100%;
		margin-left: 0.4em;
	}

	input {
		border: none;
	}

	.div-feature {
		display: flex; justify-content: center; flex-direction: column; align-items: center;
	}

	.feature {
		background: #d9e1eb; 
		width: 75%; 
		padding: 0.3em 0.3em 0.3em 1.2em; 
		border-radius: 1.5em;
		margin: 0.25em;
		font-size: 0.7em;
		text-align: left;
	}

	.feature-premium {
		background: #d9e1eb; 
		width: 75%; 
		padding: 0.3em 0.3em 0.3em 1.2em; 
		border-radius: 1.5em;
		margin: 0.25em;
		font-size: 0.7em;
	}

	.btn-menu-analitik {
		color: #a1a4a8; 
		margin: 0em 0.3em 0em 0.3em; 
		background: white; 
		padding: 0.3em 1.3em 0.3em 1.3em; 
		border-radius: 2em;		
	}

	.analitik-active {
		color: white;
		background: #ffaa00;
	}

	.card-menu-premium {
		background: white; 
		display: flex; 
		justify-content: center; 
		margin-top: .5em; 
		flex-direction: column; 
		align-items: center;		
		border-radius: 1.5em;
	}

	.modal .close {
		right: -1.3em !important;
	}

	.slider {
		display: flex; 
		overflow-y: visible; 
		margin: 0px; 			
		overflow-x: scroll;
		scrollbar-width: none; /* Firefox */
		-ms-overflow-style: none;  /* Internet Explorer 10+ */
	}
	.slider::-webkit-scrollbar { /* WebKit */
		width: 0;
		height: 0;
	}

	.slider-toko {
		display: flex; 
		justify-content: center; 
		align-items: center; 
		margin: 0em 0em 0em 0.5em; 
	}

	.slider-toko img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		border-radius: 0.5em;
	}


	.star-rating {
		color: #efff3b;
	}

	.star-no-rating {
		color: #c1c3be;
	}

	.button-detail {
		display: flex;	
	}

	.button-detail > div{
		margin-right: 0.3em;
	}

	.modal .fade:not(.in).bottom .modal-dialog {
		-webkit-transform: translate3d(0, 25%, 0);
		transform: translate3d(0, 25%, 0);
	}

	.homepage {
		min-height: calc(80vh - 60px); 

	}

	.togglebutton,.togglebutton .toggle,.togglebutton input,.togglebutton label{user-select:none}
	.togglebutton label{cursor:pointer}
	.form-group.is-focused .togglebutton label,.togglebutton label{color:rgba(0,0,0,.26)}
	.form-group.is-focused .togglebutton label:focus,.form-group.is-focused .togglebutton label:hover{
		color:rgba(0,0,0,.54)
	}
	fieldset[disabled] .form-group.is-focused .togglebutton label{color:rgba(0,0,0,.26)}
	.togglebutton label input[type=checkbox]{opacity:0;width:0;height:0}
	.togglebutton label .toggle{text-align:left;margin-left:5px}
	.togglebutton label .toggle,.togglebutton label input[type=checkbox][disabled]+.toggle{
		content:"";
		display:inline-block;
		width:55px;
		height:25px;
		background-color:rgba(80,80,80,.7);
		border-radius:15px;
		margin-right:0px;
		transition:background .8s ease;vertical-align:middle
	}
	.togglebutton label .toggle:after{
		content:"";
		display:inline-block;
		width:22px;
		height:22px;
		background-color:#fff;
		border-radius:20px;
		position:relative;
		box-shadow:0 1px 3px 1px rgba(0,0,0,.4);
		margin-left: 0.3em;
		top:1px;
		border:1px solid rgba(0,0,0,.54);
		transition:left .8s ease,background .8s ease,box-shadow .1s ease
	}
	.togglebutton label input[type=checkbox][disabled]+.toggle:after,.togglebutton label input[type=checkbox][disabled]:checked+.toggle:after{background-color:#bdbdbd}
	.togglebutton label input[type=checkbox]+.toggle:active:after,.togglebutton label input[type=checkbox][disabled]+.toggle:active:after{box-shadow:0 1px 3px 1px rgba(0,0,0,.4),0 0 0 15px rgba(0,0,0,.1)}
	.togglebutton label input[type=checkbox]:checked+.toggle:after{left:25px}
	.togglebutton label input[type=checkbox]:checked+.toggle{background-color:#8a6614}
	.togglebutton label input[type=checkbox]:checked+.toggle:after{border-color:#8a6614}
	.togglebutton label input[type=checkbox]:checked+.toggle:active:after{box-shadow:0 1px 3px 1px #8a6614,0 0 0 15px rgba(156,39,176,.1)}

	.kategori-tabs {
		display: flex; 
		justify-content: space-between; 
		width: 100%;
		margin-bottom: 0.2em;
	}

	.kategori-tabs > div {
		width: 33%;
		padding: 1.8em;
		font-size: 0.9em;
		display: flex; justify-content: center;
		flex-direction: column; align-items: center;
		background: #353535;
		color: white;
	}

</style>
@endsection



@section('content')
<?php
$pemilik = "";
$no_hp = "";
$kategori="";
$latitude = "";
$longitude = "";
$alamat = "";
$buka = "";
$tutup = "";
$hari = "";
$deskripsi = "";
if (!empty($_GET['pemilik'])){
	$pemilik = $_GET['pemilik'];
}
if (!empty($_GET['no_hp'])){
	$no_hp = $_GET['no_hp'];
}
if (!empty($_GET['kategori'])){
	$kategori = $_GET['kategori'];
}
if (!empty($_GET['x'])){
	$latitude = $_GET['x'];
}
if (!empty($_GET['y'])){
	$longitude = $_GET['y'];
}
if (!empty($_GET['alamat'])){
	$alamat = $_GET['alamat'];
}
if (!empty($_GET['buka'])){
	$buka= $_GET['buka'];
}
if (!empty($_GET['tutup'])){
	$tutup = $_GET['tutup'];
}
if (!empty($_GET['hari'])){
	$hari = $_GET['hari'];
}
if (!empty($_GET['deskripsi'])){
	$hari = $_GET['deskripsi'];
}
?>

<div class="modal fade" id="modal-ubah-pesanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white; border: #353535;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: -0.5em; z-index: 5;">
				<img src="<?=url('/')?>/public/img/mitra/modal_simpan_toko_premium.svg" style="width: 95%; position: absolute; top: -10.5em;">
				<form action="<?=url('/')?>/akun/mitra/premium/ubah-jumlah-pesanan" method="post">
					{{csrf_field()}}
					<div style="display: flex; width: 100%; margin: 0em; cursor: pointer; border-radius: 1em; color: white; font-size: 0.8em; color: #dddddd; padding: 0.5em 1em; flex-direction: column;">
						<div style="margin-top: 1em;">
							<div>Jumlah Pesanan</div>
							<div style="padding: 1em; display: flex; background: #212020; border-radius: 0.5em; margin-top: 0.5em;">
								<div><img src="<?=url('/')?>/public/img/icon_svg/judul.svg" style="width: 100%;"></div>
								<div>
									<input type="text" name="id" id="ubah_id" hidden>
									<input type="text" name="jumlah_pesanan" id="jumlah_pesanan" style="color: white; background: transparent; font-size: 1.15em; padding-left: 0.9em;" placeholder="Jumlah Pesanan">
								</div>
							</div>
						</div>	
						<button type="submit" class="btn btn-primary" style="padding: 0px; margin-top: 1em;background: transparent; border: none;">
							<img src="<?=url('/')?>/public/img/button/toko_premium/simpan.svg" style="width: 100%; margin: 0px;">
						</button>									
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-keranjang-black" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: 0em 0em 0em 0em; color: white; border: none; box-shadow: none;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: 30%; right: 1em;">
				<img src="<?=url('/')?>/public/img/modal_assets/modal_confirm_black.svg" style="width: 100%;">
				<div style="position: absolute; margin: 3% 1.5em 0em 1.5em; padding: 0em 1.5em 0em 1.5em; top: 55%;">
					<div style="font-size: 2em; font-weight: 600; text-align: center;">Yakin ?</div>
					<div style="font-size: 1em; text-align: center; width: 90%; font-weight: 0; color: white; margin-bottom: 1.2em;">Apakah kamu yakin menghapus data ini ?</div>
					<form style="display: flex; justify-content: center;" method="post" action="<?=url('/')?>/akun/mitra/premium/daftar-tunggu-pesanan/hapus-daftar">
						@csrf
						<input id="id_keranjang" name="id_keranjang" hidden>
						<button type="submit" class="btn" style="background: #525B5C; padding: 0.3em 2em; border-radius: 1.5em; font-size: 1.2em; margin-right: 0.5em; color: white;">Ya</button>
						<div data-dismiss="modal" style="background: #FFAA00; padding: 0.3em 1.5em; border-radius: 1.5em; font-size: 1.2em; margin-left: 0.5em;">Tidak</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-keranjang-black-berhasil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: 0em 0em 0em 0em; color: white; border: none; box-shadow: none;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: 30%; right: 1em;">
				<img src="<?=url('/')?>/public/img/modal_assets/modal_confirm_black.svg" style="width: 100%;">
				<div style="position: absolute; margin: 3% 1.5em 0em 1.5em; padding: 0em 1.5em 0em 1.5em; top: 55%;">
					<div style="font-size: 2em; font-weight: 600; text-align: center;">Yakin ?</div>
					<div style="font-size: 1em; text-align: center; width: 90%; font-weight: 0; color: white; margin-bottom: 1.2em;">Apakah data ini berhasil dikirim ?</div>
					<form style="display: flex; justify-content: center;" method="post" action="<?=url('/')?>/akun/mitra/premium/daftar-tunggu-pesanan/berhasil-kirim">
						@csrf
						<input id="id_keranjang_berhasil" name="id_keranjang" hidden>
						<button type="submit" class="btn" style="background: #525B5C; padding: 0.3em 2em; border-radius: 1.5em; font-size: 1.2em; margin-right: 0.5em; color: white;">Ya</button>
						<div data-dismiss="modal" style="background: #FFAA00; padding: 0.3em 1.5em; border-radius: 1.5em; font-size: 1.2em; margin-left: 0.5em;">Tidak</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-hapus-pesanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white; border: #353535;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: -0.5em; z-index: 5;">
				<img src="<?=url('/')?>/public/img/mitra/modal_simpan_toko_premium.svg" style="width: 95%; position: absolute; top: -10.5em;">
				<form action="<?=url('/')?>/akun/mitra/premium/hapus-pesanan" method="post">
					{{csrf_field()}}
					<div style="display: flex; width: 100%; margin: 0em; cursor: pointer; border-radius: 1em; color: white; font-size: 1.5em; color: #dddddd; padding: 0.5em 1em; flex-direction: column;">
						<div style="text-align: center; margin-top: 1em; line-height: 1.2em;">Apakah Anda Ingin Menghapus Pesanan?</div>
						<div style="display: flex; justify-content: center; margin-top: 0.5em;">
							<input type="text" name="id" id="hapus_id" hidden>

							<div class="btn btn-secondary" style="width: 30%; margin-right: 1em;" data-dismiss="modal">Tidak</div>
							<button class="btn btn-primary" style="width: 30%;">Ya</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@if(Session::get('message') == 'Pesanan Berhasil Dihapus')
<div class="modal fade" id="modal-notif-hapus-pesanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white; background-color: #353535;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: -4em;">
				<img src="<?=url('/')?>/public/img/mitra/modal_trash.svg" style="width: 120%; position: absolute; top: -8em;">
				<div style="font-size: 1.8em; font-weight: 600; margin-top: 1em;">Dihapus</div>
				<div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 0.5em;">pesanan berhasil dihapus</div>
			</div>
		</div>
	</div>
</div>
@endif
@if(Session::get('message') == 'Pesanan Berhasil Ditambahkan')
<div class="modal fade" id="modal-notif-tambah-pesanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white; background-color: #353535;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: -4em;">
				<img src="<?=url('/')?>/public/img/mitra/modal_sukses.svg" style="width: 120%; position: absolute; top: -11em;">
				<div style="font-size: 1.8em; font-weight: 600; margin-top: 1em;">Berhasil</div>
				<div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 0.5em;">pesanan berhasil ditambahkan</div>
			</div>
		</div>
	</div>
</div>
@endif


<header class="style__Container-sc-3fiysr-0 header" style="background: #353535; padding-top: 0.3em">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh">
		<a href="<?=url('/')?>/akun/mitra/premium" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; padding-bottom: 0.3em; padding-right: 0.7em;">
			<img src="<?=url('/')?>/public/img/back_white.svg">
		</a>
		<a id="defaultheader_logo" title="Kitabisa" style="height: 100%; width: 70%; display: flex; justify-content: center; align-items: center;">
			<img src="<?=url('/')?>/public/img/logo_premium.svg" style="height: 80%;">
		</a>
		<a style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; color: #353535;">
			a
		</a>
	</div>
</header>



<main id="homepage" class="homepage" style='background: transparent; padding: 5em 0px 0px 0px;'>
	<div>
		<div style="width: 100%; display: flex; justify-content: center; margin-bottom: 1em;">
			<div class="kategori-tabs" style="font-size: 0.85em; ">
				<div onclick="pindah_halaman('keranjang')" >
					<svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.9998 3.1665C21.5194 3.1665 23.9358 4.16739 25.7174 5.94899C27.499 7.73059 28.4998 10.1469 28.4998 12.6665V14.2498H34.8332V17.4165H32.9854L31.7868 31.7979C31.7539 32.1936 31.5735 32.5624 31.2814 32.8313C30.9893 33.1003 30.6069 33.2496 30.2098 33.2498H7.78984C7.39281 33.2496 7.01036 33.1003 6.71827 32.8313C6.42619 32.5624 6.24579 32.1936 6.21284 31.7979L5.01267 17.4165H3.1665V14.2498H9.49984V12.6665C9.49984 10.1469 10.5007 7.73059 12.2823 5.94899C14.0639 4.16739 16.4803 3.1665 18.9998 3.1665ZM29.8077 17.4165H8.19042L9.2465 30.0832H28.7516L29.8077 17.4165ZM20.5832 20.5832V26.9165H17.4165V20.5832H20.5832ZM14.2498 20.5832V26.9165H11.0832V20.5832H14.2498ZM26.9165 20.5832V26.9165H23.7498V20.5832H26.9165ZM18.9998 6.33317C17.375 6.33317 15.8122 6.95769 14.6349 8.07757C13.4575 9.19744 12.7557 10.727 12.6744 12.3498L12.6665 12.6665V14.2498H25.3332V12.6665C25.3332 11.0416 24.7087 9.47889 23.5888 8.30155C22.4689 7.12421 20.9394 6.42233 19.3165 6.34109L18.9998 6.33317Z" fill="white"/>
					</svg>

					<div>Keranjang</div>
				</div>
				<div onclick="pindah_halaman('terkonfirmasi')">
					<svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.1947 28.4998C14.0065 29.8208 13.348 31.0295 12.3402 31.9039C11.3323 32.7783 10.0428 33.2598 8.7085 33.2598C7.37419 33.2598 6.08469 32.7783 5.07684 31.9039C4.06899 31.0295 3.41047 29.8208 3.22225 28.4998H1.5835V9.49984C1.5835 9.07991 1.75031 8.67718 2.04724 8.38025C2.34418 8.08332 2.7469 7.9165 3.16683 7.9165H25.3335C25.7534 7.9165 26.1561 8.08332 26.4531 8.38025C26.75 8.67718 26.9168 9.07991 26.9168 9.49984V12.6665H31.6668L36.4168 19.0885V28.4998H33.1947C33.0065 29.8208 32.348 31.0295 31.3402 31.9039C30.3323 32.7783 29.0428 33.2598 27.7085 33.2598C26.3742 33.2598 25.0847 32.7783 24.0768 31.9039C23.069 31.0295 22.4105 29.8208 22.2222 28.4998H14.1947ZM23.7502 11.0832H4.75016V23.829C5.37489 23.1912 6.14445 22.7138 6.99335 22.4374C7.84226 22.161 8.74538 22.0938 9.62584 22.2415C10.5063 22.3892 11.3381 22.7475 12.0503 23.2858C12.7625 23.8241 13.3342 24.5264 13.7166 25.3332H22.7004C22.9664 24.7743 23.3227 24.266 23.7502 23.829V11.0832ZM26.9168 20.5832H33.2502V20.1319L30.0708 15.8332H26.9168V20.5832ZM27.7085 30.0832C28.3386 30.0832 28.9429 29.8329 29.3884 29.3873C29.834 28.9418 30.0843 28.3375 30.0843 27.7074C30.0843 27.0773 29.834 26.473 29.3884 26.0274C28.9429 25.5819 28.3386 25.3316 27.7085 25.3316C27.0784 25.3316 26.4741 25.5819 26.0286 26.0274C25.583 26.473 25.3327 27.0773 25.3327 27.7074C25.3327 28.3375 25.583 28.9418 26.0286 29.3873C26.4741 29.8329 27.0784 30.0832 27.7085 30.0832ZM11.0835 27.7082C11.0835 27.3963 11.0221 27.0874 10.9027 26.7993C10.7834 26.5111 10.6084 26.2493 10.3879 26.0288C10.1673 25.8083 9.90552 25.6333 9.61737 25.514C9.32922 25.3946 9.02039 25.3332 8.7085 25.3332C8.39661 25.3332 8.08777 25.3946 7.79962 25.514C7.51147 25.6333 7.24966 25.8083 7.02912 26.0288C6.80858 26.2493 6.63364 26.5111 6.51428 26.7993C6.39493 27.0874 6.3335 27.3963 6.3335 27.7082C6.3335 28.3381 6.58372 28.9422 7.02912 29.3875C7.47452 29.8329 8.07861 30.0832 8.7085 30.0832C9.33839 30.0832 9.94248 29.8329 10.3879 29.3875C10.8333 28.9422 11.0835 28.3381 11.0835 27.7082Z" fill="white"/>
					</svg>
					<div>Dalam Proses</div>
				</div>
				<div onclick="pindah_halaman('riwayat')">
					<svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M33.2498 7.91667C33.6698 7.91667 34.0725 8.08348 34.3694 8.38041C34.6664 8.67735 34.8332 9.08007 34.8332 9.5V31.6667C34.8332 32.0866 34.6664 32.4893 34.3694 32.7863C34.0725 33.0832 33.6698 33.25 33.2498 33.25H4.74984C4.32991 33.25 3.92718 33.0832 3.63025 32.7863C3.33332 32.4893 3.1665 32.0866 3.1665 31.6667V6.33333C3.1665 5.91341 3.33332 5.51068 3.63025 5.21375C3.92718 4.91681 4.32991 4.75 4.74984 4.75H16.4887L19.6553 7.91667H25.3332V11.0833H28.4998V7.91667H33.2498ZM28.4998 20.5833H25.3332V23.75H22.1665V28.5H28.4998V20.5833ZM25.3332 17.4167H22.1665V20.5833H25.3332V17.4167ZM28.4998 14.25H25.3332V17.4167H28.4998V14.25ZM25.3332 11.0833H22.1665V14.25H25.3332V11.0833Z" fill="white"/>
					</svg>
					<div>Riwayat</div>
				</div>
			</div>
		</div>
		<div style="padding: 0px 16px 1em;">
			{{-- <h3 style="color: white; font-size: 1.75rem; font-weight: 500;">List Pesanan</h3> --}}
			<div style=" display: flex; justify-content: space-between; align-items: center;">
				<!--<div style="font-size: 1em; line-height: 1.2em; color: #a1a4a8;">Daftar product yang di</div>-->
			</div>
		</div>
		<div style="padding: 0px 16px 1em;">
			<div id="data_list" style="display: flex; flex-direction: column; justify-content: center; color: white; align-items: center;">

				@include('users.user.m-mitra.premium.daftar-tunggu-pesanan.data_daftar_tunggu')

			</div>
		</div>
	</div>
</main>
@endsection

@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript">
	function load_halaman(page){
		$.ajax({
			url: "?page="+page,
			type: "get",
			success: function (data) {
				console.log(data);
				$('#data_list').empty();
				$('#data_list').html(data.html);
			}
		})
	}

	function konfirmasi_pesanan(keynota, status){
		$.ajax({
			url: "<?=url('/')?>/get/konfirmasi_pesanan/"+keynota+"/"+status,
			type: "get",
			success: function (data) {
				location.reload();
			}
		})
	}

	function tambah_foto_toko(id){
		$("#foto_maps_"+id).click();
		$("#foto_maps_"+id).change(function(){
			readURL(this, id);
		});
	}	

	function hapus_daftar_tunggu(keynota){
		$("#id_keranjang").val(keynota);
		$("#modal-keranjang-black").modal('show');
	}

	function berhasil_daftar_tunggu(keynota){
		$("#id_keranjang_berhasil").val(keynota);
		$("#modal-keranjang-black-berhasil").modal('show');
	}

	function readURL(input, id) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#pic_maps_'+id+'_privew').attr('src', e.target.result);
				$("#div_pic_maps_"+id+"_privew").prop('hidden', false);
				$("#div_pic_maps_"+id).prop('hidden', true);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}




	@if(Session::get('message') == 'Pesanan Berhasil Dihapus')
	$("#modal-notif-hapus-pesanan").modal('show');
	@endif

	@if(Session::get('message') == 'Pesanan Berhasil Ditambahkan')
	$("#modal-notif-tambah-pesanan").modal('show');
	@endif


	function input_focus(id){
		$("#div_"+id).css('border', '1px solid #d1d2d4');
	}

	function input_blur(id){
		$("#div_"+id).css('border', '1px solid white');		
	}		

	function ubah_pesanan(id, jumlah_pesanan){
		$("#ubah_id").val(id);
		$("#jumlah_pesanan").val(jumlah_pesanan);
		$("#modal-ubah-pesanan").modal('show');
	}

	function hapus_pesanan(id){
		$("#hapus_id").val(id);
		$("#modal-hapus-pesanan").modal('show');
	}

	function tambah_produk(){
		$('#modal-tambah').modal('show'); 
	}

	function edit_produk(id, gambar, nama, kategori, harga, stok, deskripsi){
		$("#edit_id_produk").val(id);
		$("#hapus_id_produk").val(id);
		$("#pic_edit_toko_privew").attr('src', "<?=url('/')?>/public/img/toko/"+gambar);
		$("#edit_nama_produk").val(nama);
		$("#edit_kategori").val(kategori);
		$("#edit_harga").val(harga);
		$("#edit_stok").val(stok);
		$("#edit_deskripsi").val(deskripsi);
		$("#modal-ubah").modal('show');
	}


</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script type="text/javascript">



	function lihat_chart(value){
		if (value == 'pekanan'){
			$("#menu_bulanan").removeClass("analitik-active");
			$("#menu_pekanan").addClass("analitik-active");
			$("#chart-pekanan").prop('hidden', false);
			$("#chart-bulanan").prop('hidden', true);
		}
		else {
			$("#menu_pekanan").removeClass("analitik-active");
			$("#menu_bulanan").addClass("analitik-active");
			$("#chart-pekanan").prop('hidden', true);
			$("#chart-bulanan").prop('hidden', false);
		}
	}


	function Whatsapp_pesan(no_hp, nama, index){
		show_loader();
		var apilink = 'http://';
		var phone = no_hp;
		var produk = "";
		var jumlah_pesanan = "";
		var nama_produk = "";
		var keynota = "";

		var message = '[Order Produk Kitapuramall]\n\nHaloo kak  '+nama+" apakah kakak ingin memesan \n"+product[index]+"dengan total harga IDR "+total_harga[index];

		var walink = 'https://wa.me/'+ phone +'?text=' + encodeURI(message);


		location.href=walink;

	}



</script>

@endsection
