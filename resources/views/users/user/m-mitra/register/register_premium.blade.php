@extends('layouts.home_premium')

@section('title')

@endsection

@section('header-scripts')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/plugins/lunar/css/lunar.css">
<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/plugins/select2/css/select2.css">

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
		border-radius: 1.5em; border:1px solid white;		
		display: flex; justify-content: center; flex-direction: column; align-items: flex-start;
		background: white;
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
		border-bottom-left-radius: 0.5em; 
		border-top-left-radius: 0.5em; 
	}


	.form-control-mall {
		height: 2.5em; 
		border-bottom-right-radius: 0.5em; 
		border-top-right-radius: 0.5em; 
		border:  none;	
		background: #202020;
		color: white;
		font-weight: 600;
		padding: 0em 0em 0em 0.6em;	
		margin-left: 0px;
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

	.select2-selection--single {
		border: none !important;
		margin: 0.2em;
		padding: 0.3em;

	}
	.select2-selection__arrow {
		margin-top: 0.7em;
		display: none;
	}

	.animate-bottom {
		position: relative;
		animation: animatebottom 0.4s;
	}

	@keyframes animatebottom {
		from {
			bottom: -200px;
			opacity: 0;
		}

		to {
			bottom: 0;
			opacity: 1;
		}
	}

	.modal-content-jadwal{
		position:fixed;
		padding:0;
		margin:0;
		top:auto;
		right:auto;
		left:auto;
		bottom:0;
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
		color: white;
	}

	.select2-container .select2-selection--single {
		height: auto !important;
		background: #202020;	

	}  

	.select2 {
		background: #202020 !important;
		color: white;		
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


	.modal-content {
		position: fixed;
		padding: 0;
		margin: 0;
		top: auto;
		right: auto;
		left: auto;
		bottom: 0;
	}

	.list-kategori {
		display: flex; justify-content: flex-start; flex-wrap: wrap;
	}

	.list-kategori .badge {
		margin-right: 0.5em;
		margin-bottom: 0.5em;
		border-radius: 1.5em;
		background-color: #EBEBEB;
		color: #5C5C5C;
		height: auto;	
		padding: 0.3em 0.5em 0.3em 0.5em;

	}


</style>
@endsection

@section('content')

@php
$buka = "";
$tutup = "";
$hari = "";

@endphp
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
<div class="modal fade" id="modal-kategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
		<div class="modal-content" style="border-radius: 1.2em; background: #eaf4ff; display: flex; justify-content: center; align-items: center;">
			<div class="modal-body">
				<div>
					<div class="nama-toko"
					style="font-weight: 600; font-size: 1em; line-height: 1.1em; font-size: 1.2em; text-align: center;">Silahkan
					Masukan Kategori<br>Usaha Anda</div>
				</div>
			</div>
			<div id="kategori_fix" style="width: 100%; display: flex; justify-content: center; flex-direction: column; align-items: center;">
			</div>
			<div id="kategori_sample" style="width: 100%; display: flex; justify-content: center;" hidden>
				<div class="input-group mb-3 div-input-mall-square" id="kategorinya" style="width: 90%; background: white; border: 1px solid white;">
					<div style="width: 20%; display: flex; justify-content: center; margin-left: 3%;">
						<div style="width: 2.5em; height: 2.5em; background:#ff006e; margin: 0.5em; border-radius: 50%; vertical-align: middle; color: white; padding: 0;line-height: 2.3em; text-align: center;">
						simbolnya</div>
					</div>
					<div style="margin-left: 2%; width: 60%;">
						<div style="margin-top: 1em; font-weight: 700; text-align: left;">kategori_nya</div>
					</div>
					<div onclick='hapus_kategori("kategorinya")' style="width: 15%; cursor: pointer; display: flex; align-items: center; background: #ff006e; justify-content: center; border-top-right-radius: 0.5em; border-bottom-right-radius: 0.5em; color: white; font-weight:700; font-size: 1.2em;">
					X</div>
				</div>
			</div>
			<hr style="border-top: 1px solid #c8d2dd; width: 100%;">
			<div style="display: flex; justify-content: space-between; width: 90%;">
				<div class="input-group mb-3 div-input-mall" id="div_kategori" style="width: 80%;">
					<select type="text" class="form-control form-control-mall-modal" id="kategori" name="kategori" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" aria-label="kategori" aria-describedby="basic-addon1" style="width: 100%; text-align: center !important;">
						@foreach ($daftar_kategori as $row)
						<option value="{{$row->id}}">{{$row->kategori}}</option>
						@endforeach
					</select>
				</div>

				<div style="width: 14%; display: flex; justify-content: space-between;">
					<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 100%; background: #FF006E; display: flex; justify-content: center; color: white; align-items: center;"  onclick="tambah_kategori()">
						<i class="fa fa-plus"></i>
					</div>
				</div>
			</div>
			<button class="btn btn-secondary" id="simpan_disabled_kategori" onclick="simpan_disabled_kategori()" style="background: #6c757d;border: 1px solid #6c757d; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 90%; margin-bottom: 1em;"><img src="<?=url('/')?>/public/img/icon_svg/simpan_file.svg" style="width: 1em;">&nbsp;&nbsp;Simpan
			</button>
			<button data-dismiss="modal" id="simpan_enabled_kategori" class="btn btn-secondary" style="background: #80B918; border: 1px solid #80B918; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 90%; margin-bottom: 1em;" hidden><img src="<?=url('/')?>/public/img/icon_svg/simpan_file.svg" style="width: 1em;">&nbsp;&nbsp;Simpan
			</button>

		</div>
	</div>
</div>


<div class="modal fade" id="modal-jadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
		<div class="modal-content" style="border-radius: 1.2em; background: #eaf4ff; display: flex; justify-content: center; align-items: center;">
			<div class="modal-body">
				<div>
					<div class="nama-toko"
					style="font-weight: 600; font-size: 1em; line-height: 1.1em; font-size: 1.2em;">Silahkan Masukan
					Jadwal<br>Buka/Tutup Usaha Anda</div>
				</div>
			</div>
			<div id="jadwal_fix" style="width: 100%; display: flex; justify-content: center; flex-direction: column; align-items: center;">
			</div>
			<div id="jadwal_sample" style="width: 100%; display: flex; justify-content: center;" hidden>
				<div class="input-group mb-3 div-input-mall-square" id="harinya" style="width: 90%; background: white; border: 1px solid white;">
					<div style="width: 20%; display: flex; justify-content: center; margin-left: 3%;">
						<div
						style="width: 2.5em; height: 2.5em; background:#ffaa00; margin: 0.5em; border-radius: 50%; vertical-align: middle; color: white; padding: 0;line-height: 2.3em; text-align: center;">simbolnya</div>
					</div>
					<div style="margin-left: 2%; width: 60%;">
						<div style="margin-top: 0.5em; font-weight: 700; text-align: left;">harinya</div>
						<div style="font-size: 0.7em; text-align: left;">jamnya</div>
					</div>
					<div onclick='hapus_jadwal("harinya")' style="width: 15%; cursor: pointer; display: flex; align-items: center; background: #ffaa00; justify-content: center; border-top-right-radius: 0.5em; border-bottom-right-radius: 0.5em; color: white; font-weight:700; font-size: 1.2em;">
						X
					</div>
				</div>
			</div>
			<hr style="border-top: 1px solid #c8d2dd; width: 100%;">
			<div class="input-group mb-3 div-input-mall" id="div_jadwal" style="width: 90%;">
				<select type="text" class="form-control form-control-mall-modal" id="jadwal" name="jadwal" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" aria-label="jadwal" aria-describedby="basic-addon1" style="width: 100%; text-align: center !important;">
					<option value="" disabled selected>--- Silahkan Pilih Hari ---</option>
					<option value="SH">Setiap-Hari</option>
					<option value="SS">Senin-Sabtu</option>
					<option value="SJ">Senin-JUmat</option>
					<option value="S">Senin</option>
					<option value="S">Selasa</option>
					<option value="R">Rabu</option>
					<option value="K">Kamis</option>
					<option value="J">Jumat</option>
					<option value="S">Sabtu</option>
					<option value="M">Minggu</option>
				</select>
			</div>
			<div style="width: 90%; display: flex; justify-content: space-between;">
				<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 40%;">
					<small style="margin-left: 2em;">Waktu Buka</small>
					<input type="time" class="form-control form-control-mall-modal" id="waktu_buka" value="07:00" min="09:00"
					max="18:00" required style="width: 100%; height: auto !important;">
				</div>
				<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 40%;">
					<small style="margin-left: 2em;">Waktu Tutup</small>
					<input type="time" class="form-control form-control-mall-modal" id="waktu_tutup" value="16:00" min="09:00"
					max="18:00" required style="width: 100%; height: auto !important;">
				</div>
				<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 15%; background: #FF006E; display: flex; justify-content: center; color: white; align-items: center;"  onclick="tambah_jadwal()">
					<i class="fa fa-plus"></i>
				</div>
			</div>
			<button class="btn btn-secondary" id="simpan_disabled_jadwal" onclick="simpan_disabled_jadwal()" style="background: #6c757d;border: 1px solid #6c757d; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 90%; margin-bottom: 1em;"><img src="<?=url('/')?>/public/img/icon_svg/simpan_file.svg" style="width: 1em;">&nbsp;&nbsp;Simpan
			</button>
			<button data-dismiss="modal" id="simpan_enabled_jadwal" class="btn btn-secondary" style="background: #80B918; border: 1px solid #80B918; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 90%; margin-bottom: 1em;" hidden><img src="<?=url('/')?>/public/img/icon_svg/simpan_file.svg" style="width: 1em;">&nbsp;&nbsp;Simpan
			</button>
		</div>
	</div>
</div>


<header class="style__Container-sc-3fiysr-0 header" style="background:#353535; padding-top: 0.3em;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh">
		<a href="<?=url('/')?>/akun/jadi-mitra" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; padding-bottom: 0.3em; padding-right: 0.7em;">
			<img src="<?=url('/')?>/public/img/back_white.svg">
		</a>
		<a id="defaultheader_logo" title="Kitabisa" style="height: 100%; width: 70%; display: flex; justify-content: center; align-items: center;">
			<img src="<?=url('/')?>/public/img/logo_premium.svg" style="height: 80%;">
		</a>
		<a style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center;">
		</a>
	</div>
</header>


<main id="homepage" class="homepage" style="padding-top: 4em; background: transparent;">
	<form enctype="multipart/form-data" action="{{url()->current()}}/simpan" method="post">
		{{csrf_field()}}
		<div style="display: flex; justify-content: center;">
			<div style="width: 90%; margin-top: 1em; display: flex; flex-direction: column; align-items: center;">
				<div class="mb-4" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
					<div style="font-weight: 600; color: white; font-size: 1.8em; margin-bottom: 0.1em;">Atur Toko</div>
					@php $url = url('/')."/public/img/button/toko_premium/bg-photo-profile.svg"; @endphp
					<div style='background-image: url("<?=$url?>"); padding: 1.5em;'>
						<div id="div_pic_toko_privew" style="position: relative; padding: auto 0; display: flex; justify-content: center; align-items: center; border-radius: 50%; width: 9rem; height: 9rem; background: #1c1c1c;">
							<img id="pic_toko_privew" src="<?=url('/')?>/public/img/mitra/logo/premium.svg" style="width: 100%; border-radius: 50%; object-fit: cover;height: 100%;">
							<img id="pic_toko" src="<?=url('/')?>/public/img/icon_svg/add_circle_yellow.svg" onclick="tambah_foto_toko()" style="position: absolute; right: 0px; bottom: 0px;">
						</div>
					</div>
					<input type="file" name="foto_toko" id="foto_toko" hidden>
					<div style="display: flex; justify-content: center; flex-direction: column;">
						<input type="text" id="nama_toko" name="nama_toko" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Nama Toko" aria-label="Nama Toko" aria-describedby="basic-addon1" style="width: 100%; background: transparent; color: white; text-align: center; font-size: 1.5em; font-weight: 645;" required>
						<input type="text" id="nama_pemilik" name="nama_pemilik" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Nama Pemilik" aria-label="Nama Pemilik" aria-describedby="basic-addon1" style="width: 100%; background: transparent; color: white; text-align: center; font-size: 1em; font-weight: 645;" required>

					</div>
				</div>
				<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="height: 7.5em; justify-content: flex-start; background: #292929; border: none; border-radius: 0.5em;">
					<span style="margin-top: 0px; color: white; font-weight: 600;">Deskripsi</span>
					<div style="height: 5em; width: 100%;">
						<textarea id="deskripsi" name="deskripsi" onblur="input_blur(this.id)" onfocus="input_focus(this.id)" style="width: 100%; height: 6em; border-radius: 0px; margin: 1em 0.6em 1em 0.6em;  background: #292929; color: #dddddd; border: none; font-size: 0.7em; padding: 0.3em 1em 0.5em 1em; text-align: justify;" rows="5" required placeholder="Masukan deskripsi singkat tentang toko"></textarea>
					</div>
				</div>
				<div class="input-group mb-3 st0" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
					<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Kategori</div>
					<div style="width: 100%; background: #292929; border-radius: 0.5em;margin-top: 0.3em; display: flex; justify-content: space-between;">
						<div class="list-kategori" style="min-height: 5em; align-items: flex-start; padding: 0.5em 0.5em 0.5em 0.5em; width: 88%;">
						</div>
						<div style="width: 2em; height: 2em; font-size: 0.8em; background: #FFC331; color: #202020; border-radius: 50%; padding-top: 0.2em; padding-left: 0.5em; margin: 1em;" onclick="tambah_kategori_modal()">
							<i class="fa fa-plus"></i>
						</div>
					</div>
				</div>

				<div class="input-group mb-3 st0" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
					<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Nomor Handphone</div>
					<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
						<span class="input-group-text-mall" style="width: 3em; background: #202020;">
							<img src="<?=url('/')?>/public/img/icon_svg/handphone_white.svg" style="width: 60%;">
						</span>						
						<input type="text" class="form-control-mall" id="no_hp" name="no_hp" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Nomor Handphone" aria-label="no_hp" aria-describedby="basic-addon1" style="width: 100%;" >
					</div>
				</div>
				<div class="input-group mb-3 st0" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
					<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Jadwal Toko</div>
					<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
						<span class="input-group-text-mall" style="width: 3em; background: #202020;">
							<img src="<?=url('/')?>/public/img/icon_svg/jadwal_white.svg" style="width: 50%;">
						</span>
						<div onclick="pilih_jadwal()" class="form-control form-control-mall" style="vertical-align: center;display: flex; align-items: center; justify-content: flex-start; cursor: pointer; border-top-left-radius: 0px; border-bottom-left-radius: 0px;" id="pilih_jadwal_buka_toko">Pilih Jadwal Toko</div>

					</div>
				</div>
				<div hidden>
					<input name="input_kategori" id="input_kategori">
					<input name="input_id_kategori" id="input_id_kategori">
					<input type="text" name="jadwal_hari" id="jadwal_hari" value="{{$hari}}">
					<input type="text" name="jadwal_buka" id="jadwal_buka" value="{{$buka}}">
					<input type="text" name="jadwal_tutup" id="jadwal_tutup" value="{{$tutup}}">
				</div>
				<div class="input-group mb-3 st0" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
					<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Alamat</div>
					<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
						<span class="input-group-text-mall" style="width: 3em; background: #202020;">
							<img src="<?=url('/')?>/public/img/icon_svg/marker_white.svg" style="width: 60%;">
						</span>
						<input type="text" class="form-control-mall" id="alamat" name="alamat" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Alamat" aria-label="alamat" aria-describedby="basic-addon1" style="width: 100%;">
					</div>
				</div>

				<div class="input-group mb-3 st0" id="div_kelurahan" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
					<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Kelurahan</div>
					<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
						<span class="input-group-text-mall" style="width: 3em; background: #202020;">
							<img src="<?=url('/')?>/public/img/icon_svg/kategori_white.svg" style="width: 40%;">
						</span>
						<select type="text" class="form-control-mall" id="kelurahan" name="kelurahan" style="height: 2.5em;" required>
							<option value="" disabled selected>Pilih Kelurahan</option>
							@foreach($kelurahan as $row)
							<option value="{{$row->id}}">{{$row->kelurahan}}
							</option>
							@endforeach
						</select>
					</div>
				</div>

				<button type="submit" class="btn btn-primary" style="padding: 0px; background: transparent; border: none;">
					<img src="<?=url('/')?>/public/img/button/toko_premium/simpan.svg" style="width: 100%; margin: 0px;">
				</button>	
			</div>
		</div>
	</form>

	@if(Session::has('message'))
	<div id="modal-pemberitahuan" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
	aria-hidden="true" data-backdrop="static" data-keyboard="false" style="width: 100%;">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body text-center font-weight-bold py-3">
				{{Session::get('message')}}
				<div class="row mt-2 p-2">
					<button type="button" class="col-sm-12 btn waves-effect waves-light btn-outline-secondary"
					data-dismiss="modal">Tutup</button>

				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
@endif


</main>



@if ($errors->any())
<div id="modal-pemberitahuan" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
aria-hidden="true" data-backdrop="static" data-keyboard="false" style="width: 100%;">
<div class="modal-dialog modal-sm modal-dialog-centered">
	<div class="modal-content">
		<div class="modal-body text-center font-weight-bold py-3">
			@if($errors->first('foto_toko'))
			Harus memasukkan logo toko
			@else
			Semua form harus diisi
			@endif
			<div class="row mt-2 p-2">
				<button type="button" class="col-sm-12 btn waves-effect waves-light btn-outline-secondary"
				data-dismiss="modal">Tutup</button>

			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
</div>
@endif

@endsection

@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?=url('/')?>/public/plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript">
	@if(Session::has('message'))
	$('#modal-pemberitahuan').modal('show')
	@endif

	$("input[required], select[required]").attr("oninvalid",
		"this.setCustomValidity('Harap Dimasukkan')");
	$("input[required], select[required]").attr("oninput", "setCustomValidity('')");

	function tambah_kategori_modal(){
		$('#modal-kategori').modal('show');
	}

	$("#kelurahan").select2();

	var i = 0;
	var jadwal_hari = [];
	var jadwal_buka = [];
	var jadwal_tutup = [];

	var i_kategori = 0;
	var value_kategori = [];
	var value_id_kategori = [];

	function input_focus(id){
		$("#div_"+id).css('border', '1px solid #d1d2d4');
	}

	function input_blur(id){
		$("#div_"+id).css('border', '1px solid white');		
	}		


	function pilih_jadwal(){
		$("#modal-jadwal").modal('show');
	}

	function tambah_foto_toko(){
		$("#foto_toko").click();
	}

	function tambah_foto_lokasi_toko(){
		$("#foto_lokasi_toko").click();
	}


	function tambah_jadwal() {
		var simbol = $("#jadwal").val();
		var hari = $("#jadwal option:selected").text();
		if (simbol == null){
			alert("Silahkan Pilih Jadwal");
		}
		else {
			var waktu_tutup = $("#waktu_tutup").val();
			var waktu_buka = $("#waktu_buka").val();
			var jadwal_sample = $("#jadwal_sample").html();
			var fix_id = jadwal_sample.replaceAll(hari.replaceAll(" ", '_')).trim();
			var fix_harinya = fix_id.replaceAll("harinya", hari).trim();
			var fix_waktu = fix_harinya.replace("jamnya", waktu_buka + " - " + waktu_tutup).trim();
			var fix_simbol = fix_waktu.replace("simbolnya", simbol).trim();
			$("#jadwal_fix").append(fix_simbol);
			jadwal_hari.push(hari);
			jadwal_buka.push(waktu_buka);
			jadwal_tutup.push(waktu_tutup);
			check_select();
			i++;
			$("#simpan_disabled_jadwal").prop("hidden", true);
			$("#simpan_enabled_jadwal").prop("hidden", false);

		}

	}

	function tambah_kategori(){
		var id_kategori = $("#kategori").val();
		var kategorinya = $("#kategori option:selected").text();
		if (id_kategori == null){
			alert("Silahkan Pilih Kategori");
		}
		else {
			var kategori_sample = $("#kategori_sample").html();
			var fix_id = kategori_sample.replaceAll("kategorinya", id_kategori).trim();
			var fix_kategorinya = fix_id.replaceAll("kategori_nya", kategorinya).trim();
			var fix_simbol = fix_kategorinya.replace("simbolnya", kategorinya.substring(0,1)).trim();
			$("#kategori_fix").append(fix_simbol);

			value_kategori.push(kategorinya);
			value_id_kategori.push(id_kategori);
			$(".list-kategori").html('');
			for (var i = 0; i < value_kategori.length; i++){
				$(".list-kategori").append("<badge class='badge badge-secondary'>"+value_kategori[i]+"</badge>");
			}

			check_select_kategori();
			i_kategori++;
			$("#simpan_disabled_kategori").prop("hidden", true);
			$("#simpan_enabled_kategori").prop("hidden", false);
		}
	}

	function check_select(){
		var option_value = ["SH", "SS", "SJ", "S", "S", "R", "K", "J", "S", "M"];
		var option_text = ["Setiap-Hari", "Senin-Sabtu", "Senin-Jumat", "Senin", "Selasa", "Rabu", "Kamis","Jumat", "Sabtu", "Minggu"];
		var option = "<option disabled selected>--- Silahkan Pilih Hari ---</option>";
		for (var i = 0; i < option_text.length; i++){
			var indikator = false;
			for (var j = 0; j < jadwal_hari.length; j++){
				if (jadwal_hari[j] == option_text[i]){
					indikator = true;
				}
			}
			if (indikator == false){
				option += "<option value='"+option_value[i]+"' >"+option_text[i]+"</option>"; 				
			}
		}
		$("#jadwal").html(option);		
		var string_hari = jadwal_hari.toString();
		var string_buka = jadwal_buka.toString();
		var string_tutup = jadwal_tutup.toString();
		$("#jadwal_hari").val(string_hari.replaceAll(",", "~"));
		$("#jadwal_buka").val(string_buka.replaceAll(",", "~"));
		$("#jadwal_tutup").val(string_tutup.replaceAll(",", "~"));

		if ($("#jadwal_hari").val() == ''){
			$("#pilih_jadwal_buka_toko").html("Pilih Jadwal Buka Tutup Toko");
		}
		else {
			$("#pilih_jadwal_buka_toko").html("Telah memilih Jadwal");			
		}

	}

	function simpan_disabled_kategori(){
		alert("Tambahkan data terlebih dahulu");
	}

	function simpan_disabled_jadwal(){
		alert("Tambahkan data terlebih dahulu");        
	}


	function check_select_kategori() {
		var option_value = ["SH", "SS", "SJ", "S", "S", "R", "K", "J", "S", "M"];

		var option_text = [];
		var option_id = [];
		@foreach ($daftar_kategori as $row)
		option_id.push("<?=$row->id?>");
		option_text.push("<?=$row->kategori?>");
		@endforeach
		var option = "";
		for (var i = 0; i < option_text.length; i++) {
			var indikator = false;
			for (var j = 0; j < value_kategori.length; j++) {
				if (value_kategori[j] == option_text[i]) {
					indikator = true;
				}
			}
			if (indikator == false) {
				option += "<option value='" + option_id[i] + "' >" + option_text[i] + "</option>";
			}
		}
		$("#kategori").html(option);
		var string_kategori = value_kategori.toString();
		var string_id_kategori = value_id_kategori.toString();
		$("#input_kategori").val(string_kategori.replaceAll(",", "~"));
		$("#input_id_kategori").val(string_id_kategori.replaceAll(",", "~"));
	}


	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#pic_toko_privew').attr('src', e.target.result);
				$("#div_pic_toko_privew").prop('hidden', false);
				$("#div_pic_toko").prop('hidden', true);
				var gambarnya = $("#foto_toko").val();
				$("#gambar_toko").val(gambarnya);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#foto_toko").change(function(){
		readURL(this);
	});


	function readURLlokasi(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#pic_lokasi_toko_privew').attr('src', e.target.result);
				$("#div_pic_lokasi_toko_privew").prop('hidden', false);
				$("#div_pic_lokasi_toko").prop('hidden', true);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#foto_lokasi_toko").change(function(){
		readURLlokasi(this);
	});

	function ubah_nama_toko(){
		$("#div_nama_toko").prop('hidden', true);
		$("#nama_toko").prop('hidden', false);
	}

	function hapus_jadwal(hari){
		// alert(id);
		var temp;
		for (var i = 0; i < jadwal_hari.length; i++){
			if (jadwal_hari[i] == hari){
				jadwal_hari[i] = jadwal_hari[i+1];
				jadwal_buka[i] = jadwal_buka[i+1];
				jadwal_tutup[i] = jadwal_tutup[i+1];

			}
		}
		jadwal_hari.pop();
		jadwal_tutup.pop();
		jadwal_buka.pop();
		check_select();
		$("#"+hari.replaceAll(" ", "_")).remove();
	}

	function hapus_kategori(kategori) {
		kategori = kategori.replaceAll("_", " ");
		var temp;
		var find = false;
		for (var i = 0; i < value_kategori.length; i++) {
			if (find == true){
				value_id_kategori[i] = value_id_kategori[i + 1];
				value_kategori[i] = value_kategori[i + 1];
			}
			if (value_id_kategori[i] == kategori) {
				value_id_kategori[i] = value_id_kategori[i + 1];
				value_kategori[i] = value_kategori[i + 1];
				find = true;
			}
		}
		value_kategori.pop();
		value_id_kategori.pop();
		check_select_kategori();
		$("#" + kategori.replaceAll(" ", "_")).remove();
		$(".list-kategori").html('');
		if (value_kategori.length == 0){
			$("#simpan_disabled_kategori").prop("hidden", false);
			$("#simpan_enabled_kategori").prop("hidden", true);            
		}
		for (var i = 0; i < value_kategori.length; i++){
			$(".list-kategori").append("<badge class='badge badge-secondary'>"+value_kategori[i]+"</badge>");
		}


	}

</script>
@endsection
