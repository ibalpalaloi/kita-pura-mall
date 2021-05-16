 	@extends('layouts.home_digital_download')

 	@section('title')

 	@endsection

 	@section('header-scripts')
 	<meta name="csrf-token" content="{{ csrf_token() }}">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
 	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/plugins/lunar/css/lunar.css">
 	<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/plugins/select2/css/select2.css">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">

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
 			border-radius: 0.5em;
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

 		.is-invalid {
 			border: 1px solid red !important;
 		}

 		.is-invalid-text {
 			color: red !important;
 		}

 		.select2-container--default .select2-selection--single .select2-selection__rendered {
 			color: #B3B6BC;
 		} 		

 		.select2-container {
 			border-radius: 0.5em;
 		}

 		.div-musik {
 			color: white; 
 			padding: 0.5em 1em 1em 1em; 
 			border-radius: 0.5em; 
 			background: #161616; 
 			display: flex; 
 			flex-direction: column; 			
 		}

 		.div-musik-title {
 			margin-top: 0px; 
 			color: #B3B6BC; 
 			font-weight: 600; 
 			font-size: 0.75em; 
 			padding: 0.3em 0em 0.7em 0em; 			
 		}

 		.loader-container{
 			width: 100%;
 			height: 100vh;
 			position: fixed;
 			display: flex;
 			align-items: center;
 			justify-content: center;
 		} 		
 	</style>
 	@endsection

 	@section('content')

 	@php
 	$buka = old('jadwal_buka');
 	$tutup = old('jadwal_tutup');
 	$hari = old('jadwal_hari');
 	$kategori = old('input_kategori');
 	$id_kategori = old('input_id_kategori');

 	@endphp
 	@section('content')
 	<div class="modal fade" id="modal-notif-error-toko" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
 		<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
 			<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: 0em 0em 0em 0em; color: white; border: none; box-shadow: none;">
 				<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
 					<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: 30%; right: 1em;">
 					<img src="<?=url('/')?>/public/img/modal_assets/modal_error_input.svg" style="width: 100%;">
 					<div style="position: absolute; margin: 0em 1.5em 0em 1.5em; padding: 0em 1.5em 0em 1.5em; top: 60%;">
 						<div style="font-size: 2em; font-weight: 600; text-align: center;">Gagal</div>
 						<div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 1.2em;">username hanya boleh menggunakan huruf, angka, garis bawah dan titik.</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>


 	<div class="modal fade" id="modal-error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
 		<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
 			<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: 0em 0em 0em 0em; color: white; border: none; box-shadow: none;">
 				<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
 					<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: 30%; right: 1em;">
 					<img src="<?=url('/')?>/public/img/modal_assets/modal_simpan_premium.svg" style="width: 100%;">
 					<div style="position: absolute; margin: 3% 1.5em 0em 1.5em; padding: 0em 1.5em 0em 1.5em; top: 60%;">
 						<div style="font-size: 2em; font-weight: 600; text-align: center;" id="judul_modal">Tersimpan</div>
 						<div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 1.2em;" id="pesan_modal">Perubahan toko telah <br>berhasil disimpan</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>

 	<div class="modal fade" id="modal-sukses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
 		<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
 			<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 5em 1em 0em 1em; background-color: #353535;">
 				<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
 					<div class="container">
 						<div class="panel panel-info">
 							<div class="panel-body">
 								<div class="row" style="display: flex; flex-direction: column;">
 									<div>
 										<div id="upload-demo">

 										</div>
 									</div>
 									<div>
 										<div class="btn btn-primary btn-block" id="unggah_foto" onclick="unggah_foto()" style="margin-top: 5%;">Unggah Foto</div>
 									</div>
 									<div class="div_upload">
 										<div class="btn btn-primary btn-block upload-image" style="margin-top:2%" >Upload Image</div>
 										<div class="btn btn-secondary btn-block" onclick="unggah_foto()">Unggah Foto
 										</div>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>

 	<div class="modal fade" id="modal_loader" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
 		<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
 			<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white; border: #353535;">
 				<div class="loader-container">
 					<div class="spinner-border text-danger" role="status">
 						<span class="sr-only">Loading...</span>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>



 	<header class="style__Container-sc-3fiysr-0 header" style="background: linear-gradient(180.04deg, #000000 0.05%, rgba(0, 0, 0, 0) 85.9%); filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));)">
 		<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="margin-top: 0.5em;">
 			<a href="<?=url('/')?>/digital-download/akun/atur-band" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; padding-bottom: 0.3em; padding-right: 0.7em;">
 				<img src="<?=url('/')?>/public/img/back_white.svg">
 			</a>
 			<a id="defaultheader_logo" title="Kitabisa" style="height: 100%; width: 70%; display: flex; justify-content: center; align-items: center;">
 				<img src="<?=url('/')?>/public/img/logo_premium.svg" style="height: 80%;">
 			</a>
 			<a style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center;">
 			</a>
 		</div>
 	</header>


 	<main id="homepage" class="homepage" style="padding-top: 0em; background: transparent;">
 		<form id="form_input" enctype="multipart/form-data" action="<?=url('/')?>/digital-download/akun/atur-band/tambah-album/simpan-album" method="post">
 			{{csrf_field()}}
 			<div style="display: flex; justify-content: center;">
 				<div style="width: 95%; display: flex; flex-direction: column; align-items: center;">
 					<div style="margin-top: 6em; margin-bottom: 1.5em;">
 						<div style="color: white; text-align: center; margin-bottom: 0.5em;">Masukan foto cover album</div>
 						<div style="position: relative;">
 							<img id="preview_cover" src="<?=url('/')?>/public/img/digital_download/atur_band/foto_lagu.png" style="width: 100%;">
 							<img src="<?=url('/')?>/public/img/digital_download/icon_svg/ganti_foto.svg" onclick="pilih_foto_cover()" style="width: 3em; position: absolute; top: 45%; left: 45%;">

 							<input hidden type="file" name="foto_cover" id="foto_cover">
 						</div>
 					</div>
 					<input type="text" name="status" value="album" hidden>
 					<div class="input-group mb-3 @if($errors->first('no_hp')) is-invalid @endif"  id="div_kategori" style="color: white; padding: 0.5em 1em 1em 1em; border-radius: 0.5em; background: #161616;">
 						<div style="margin-top: 0px; color: #B3B6BC; font-weight: 600; font-size: 0.75em; padding: 0.3em 0em 0.7em 0em;">Judul Album</div>
 						<input type="text" class="form-control-mall" id="judul_album" name="judul" placeholder="Judul Album" aria-describedby="basic-addon1" style="width: 100%; padding-left: 1em;" value="{{old('judul')}}" required>
 					</div>
 					<div class="input-group mb-3 @if($errors->first('no_hp')) is-invalid @endif"  id="div_kategori" style="color: white; padding: 0.5em 1em 1em 1em; border-radius: 0.5em; background: #161616;">
 						<div style="margin-top: 0px; color: #B3B6BC; font-weight: 600; font-size: 0.75em; padding: 0.3em 0em 0.7em 0em;">Harga</div>
 						<input type="text" name="judul_foto" id="judul_foto" hidden>
 						<input type="text" class="form-control-mall" id="harga_album" name="harga" placeholder="Harga Album" aria-describedby="basic-addon1" style="width: 100%; padding-left: 1em;" value="{{old('harga_lagu')}}" required>
 					</div>
 					<hr style="border-top: 1px solid #B3B6BC; width: 100%;">
 					<div id="lagu_fix" style="width: 100%;">

 					</div>
 					<div id="lagu_temp" hidden>
 						<div class="input-group div-musik mb-3" id="div_lagu_temp">
 							<div id="div-musik-title-temp">Judul Lagu ke-nomor_lagu</div>
 							<div style="display: flex; justify-content: space-between;">
 								<div style="width: 18%; display: flex; justify-content: center; align-content: center;" class="form-control-mall">
 									<input type="file" name="file_lagu_temp" onchange="change_lagu('temp')" id="file_lagu_temp" hidden>
 									<img id="upload_image_temp" onclick="upload_lagu('temp', 'tambah')" src="<?=url('/')?>/public/img/digital_download/icon_svg/upload_icon.svg" style="width: 50%; margin-right: 0.5em;">
 									<div id="spinner_image_temp" class="spinner-border" role="status" style="margin-top: 0.2em; margin-right: 0.5em;" hidden>
 										<span class="sr-only">Loading...</span>
 									</div>
 									<i id="done_image_temp" class="fa fa-check" style="font-size: 1.5em; margin-top: 0.3em; margin-right: 0.4em;" hidden></i>


 								</div>
 								<div style="width: 80%;">
 									<input type="text" class="form-control-mall" id="judul_lagu_temp" name="judul_lagu_temp" placeholder="Judul Lagu" style="width: 100%; padding-left: 1em;" value="{{old('judul_lagu_temp')}}">
 									<input type="text" class="form-control-mall" name="nama_file_temp" id="nama_file_temp" hidden>
 									<small id="upload_kembali_temp" onclick="upload_lagu('temp', 'ubah')" hidden>Salah upload file? upload kembali</small>
 								</div>

 							</div>
 							<img src="<?=url('/')?>/public/img/digital_download/icon_svg/icon_hapus_new.svg" style="width: 2em; position: absolute; right: 0.2em; top: 0.2em;" onclick="hapus_lagu(temp, nomor_lagu)">
 						</div>
 					</div> 					
 					<input type="input" name="daftar_id" id="daftar_id" hidden>	
 					<div class="btn" onclick="tambah_lagu()" id="div_kategori" style="padding: 0.8em 1em 0.8em 1em; border-radius: 0.5em; background: #161616; color: white; text-align: center; font-size: 1.3em; font-weight: 500; width: 100%; margin-bottom: 1.5em;">
 						<img src="<?=url('/')?>/public/img/icon_svg/save_white.svg" style="position: absolute; left: 1.4em; top: 1.2em;">
 						Tambah Lagu
 					</div>
 					<button class="btn" type="submit" id="div_kategori" style="padding: 0.8em 1em 0.8em 1em; border-radius: 0.5em; background: #161616; color: white; text-align: center; font-size: 1.3em; font-weight: 500; width: 100%; margin-bottom: 1.5em;">
 						<img src="<?=url('/')?>/public/img/icon_svg/save_white.svg" style="position: absolute; left: 1.4em; top: 1.2em;">
 						Simpan Album
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

<script type="text/javascript">
	$("#genre").select2();


	@if(Session::has('message'))
	$('#modal-pemberitahuan').modal('show')
	@endif

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	// show_loader();

	var id_div = 1;
	var nomor_lagu = 1;
	var jumlah_lagu = 0;
	var status_upload = "";

	$( "form" ).submit(function( event ) {
		var daftar_id = $("#daftar_id").val();
		var result = daftar_id.split(",");
		var banyak_data = result.length-1;
		if (banyak_data == 0){
			$("#judul_modal").html("Gagal");
			$("#pesan_modal").html("Silahkan tambahkan lagu terlebih dahulu");
			$('#modal-error').modal('show');

		}
		else if (banyak_data != jumlah_lagu){
			$("#judul_modal").html("Gagal");
			$("#pesan_modal").html("Silahkan upload lagu terlebih dahulu");
			$('#modal-error').modal('show');

		}
		else if (banyak_data == jumlah_lagu){
			return true;
		}
		event.preventDefault();
	});

	function upload_lagu(temp, status){
		$("#file_lagu_"+temp).prop("value", "");
		$("#file_lagu_"+temp).click();
		status_upload = status;
		if (status == 'tambah'){
			jumlah_lagu = jumlah_lagu+1;			
		}
	}


	$("#harga_album").on("keydown", function(e) {
		var keycode = (event.which) ? event.which : event.keyCode;
		if (e.shiftKey == true || e.ctrlKey == true) return false;
		if ([8, 110, 39, 37, 46].indexOf(keycode) >= 0 || (keycode == 190 && this.value.indexOf('.') === -1) || (keycode == 110 && this.value.indexOf('.') === -1) || (keycode >= 48 && keycode <= 57) || (keycode >= 96 && keycode <= 105)) { 
			var parts = this.value.split('.');
			if (parts.length > 1 && parts[1].length >= 2 && ((keycode >= 48 && keycode <= 57) || (keycode >= 96 && keycode <= 105)) ) {
				return false;
			} 
			else {
				if (keycode == 110) {
					this.value += ".";
					return false;
				}
				return true;
			}
		} 
		else {
			return false;
		}
	}).on("keyup", function() {
		var parts = this.value.split('.');
		parts[0] = parts[0].replace(/,/g, '').replace(/^0+/g, '');
		if (parts[0] == "") parts[0] = "0";
		var calculated = parts[0].replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
		if (parts.length >= 2) calculated += "." + parts[1].substring(0, 2);
		this.value = calculated;
		if (this.value == "NaN" || this.value == "") this.value = 0;
	});

	function change_lagu(temp){
		$("#upload_image_"+temp).prop('hidden', true);
		$("#spinner_image_"+temp).prop('hidden', false);
		$("#done_image_"+temp).prop('hidden', true);

		var file_data = $('#file_lagu_'+temp).prop('files')[0];   
		var nama_file = $("#nama_file_"+temp).val();
		var form_data = new FormData();                  
		form_data.append('file', file_data);
		form_data.append('nama_file', nama_file);
		form_data.append('temp', temp);
		form_data.append('status_upload', status_upload);
		$.ajax({
			url: "<?=url('/')?>/digital-download/akun/atur-band/simpan-lagu",
			dataType: 'JSON',  
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,                       
			method: 'post',
			success: function(data){
				$("#spinner_image_"+temp).prop('hidden', true);
				$("#done_image_"+temp).prop('hidden', false);
				$('#nama_file_'+temp).val(data.nama_file);
				$("#upload_kembali_"+temp).prop('hidden', false);
			}
		});
	}



	function tambah_lagu(){
		var template = $("#lagu_temp").html().trim();
		var fix_template1 = template.replaceAll("temp", id_div).trim();
		var fix_template = fix_template1.replaceAll("nomor_lagu", nomor_lagu).trim();
		$("#lagu_fix").append(fix_template);
		var daftar_id = $("#daftar_id").val();
		$("#daftar_id").val(daftar_id+id_div+",");
		id_div = id_div+1;
		nomor_lagu = nomor_lagu+1;
	}

	function hapus_lagu(temp, temp_nomor_lagu){
		var nama_file = $('#nama_file_'+temp).val();
		// alert(nama_file);
		$.ajax({
			url: "<?=url('/')?>/digital-download/akun/atur-band/hapus-temp-lagu",
			data: {nama_file:nama_file},
			method: 'post',
			success: function(data){
				// alert(data);
				$("#div_lagu_"+temp).remove();
				var daftar_id = $("#daftar_id").val();
				var result = daftar_id.split(",");
				var status_find = false;
				for (var i = 0; i < result.length; i++){
					if (result[i] == temp){
						status_find = true;				
					}
					if (status_find == true){
						$("#div-musik-title-"+result[i]).html("Judul Lagu ke-"+i);	
					}
				}
				$("#daftar_id").val(daftar_id.replaceAll(temp+",", ""));
				nomor_lagu = nomor_lagu-1;
				jumlah_lagu = jumlah_lagu-1;
			}
		});
	}

	$("input[required], select[required]").attr("oninvalid",
		"this.setCustomValidity('Harap Dimasukkan')");
	$("input[required], select[required]").attr("oninput", "setCustomValidity('')");

	function pilih_foto_cover(){
		$(".div_upload").prop('hidden', true);
		$("#unggah_foto").prop('hidden', false);
		$('#modal-sukses').modal('show');
	}


	function unggah_foto(){
		$("#foto_cover").click();
	}

	var resize = $('#upload-demo').croppie({
		enableExif: true,
		enableOrientation: true,    
		viewport: {  
			width: 250,
			height: 311,
			type: 'square' 
		},
		boundary: {
			width: 250,
			height:311
		}
	});


	$('#foto_cover').on('change', function () { 
		$(".cr-slider-wrap").css("display", "block");
		var reader = new FileReader();
		reader.onload = function (e) {
			resize.croppie('bind',{
				url: e.target.result
			}).then(function(){
				console.log('jQuery bind complete');
			});
		}
		$(".div_upload").prop('hidden', false);
		$("#unggah_foto").prop('hidden', true);
		$("#prev_image").remove();
		reader.readAsDataURL(this.files[0]);
	});


	var cover_imageSize = {
		width: 483,
		height: 600,
		type: 'square'
	};

	var cover_imageSize2 = {
		width: 201,
		height: 250,
		type: 'square'
	};

	$('.upload-image').on('click', function (ev) {
		$("#modal-sukses").modal("hide");
		show_loader();
		var rString = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
		resize.croppie('result', {
			circle: false,
			type: 'canvas',
			size: cover_imageSize,
			quality: 1
		}).then(function (img) {
			$.ajax({

				url: "<?=url('/')?>/digital-download/akun/atur-band/simpan-foto-lagu",
				type: "POST",
				data: {"image":img, "size":"600x483", "nama":rString},
				success: function (data) {
					$("#judul_foto").val(rString+".png");
					$('#preview_cover').attr('src', "<?=url('/')?>/public/"+data);
					setTimeout(hide_loader, 1000);

				}
			});

		});
		resize.croppie('result', {
			circle: false,
			type: 'canvas',
			size: cover_imageSize2,
			quality: 1
		}).then(function (img) {
			$.ajax({
				url: "<?=url('/')?>/digital-download/akun/atur-band/simpan-foto-lagu",
				type: "POST",
				data: {"image":img, "size":"250x201", "nama":rString},
				success: function (data) {

				}
			});
		});

	});

	function randomString(length, chars) {
		var d = new Date();
		var milliseconds  = Date.parse(d);
		var result = '';
		for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
			return milliseconds+result;
	}




</script>

@endsection
