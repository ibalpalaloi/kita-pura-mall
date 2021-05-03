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
 		<div class="style__Wrapper-sc-3fiysr-2 hBSxmh">
 			<a href="<?=url('/')?>/akun" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; padding-bottom: 0.3em; padding-right: 0.7em;">
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
 		<form id="form_input" enctype="multipart/form-data" action="<?=url('/')?>/akun/jadi-mitra/premium/simpan" method="post">
 			{{csrf_field()}}
 			<div style="display: flex; justify-content: center;">
 				<div style="width: 90%; display: flex; flex-direction: column; align-items: center;">
 					<div class="mb-4" style="display: flex; justify-content: center; align-items: center; flex-direction: 	column;">
 						<img src="<?=url('/')?>/public/img/digital_download/bg-daftar.svg" style="">
 						<div style="color: white; background: linear-gradient(180deg, rgba(0, 0, 0, 0) 1.43%, #000000 54.28%); width: 100%; padding: 0em 0em 1em 0em; display: flex; justify-content: center; position: relative; top: -4em;">
 							<div style="width: 80%;">
 								<h3>Daftar</h3>
 								<div style="width: 80%; font-size: 0.9em; color: #ADADAD; line-height: 1.2em;">daftarkan band anda, dan permudah distribusi karya anda!</div>
 							</div>
 						</div>

 					</div>
 					<div class="input-group mb-3 st0 @if($errors->first('input_kategori')) is-invalid @endif" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em; height: 8.5em;">
 						<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em; margin-bottom: 0; padding-left: 0.2em;">Deskripsi Toko</div>
 						<div style="height: 5em; width: 100%; padding: 0;">
 							<textarea id="deskripsi" name="deskripsi" onblur="input_blur(this.id)" onfocus="input_focus(this.id)" style="width: 100%; height: 6em; border-radius: 0.5em; margin: 0em 0em 1em 0em;  background: #292929; color: #dddddd; border: none; font-size: 0.9em; padding: 0.3em 0.6em 0.5em 0.6em; text-align: justify;" rows="5" required placeholder="Masukan deskripsi singkat tentang toko">{{old('deskripsi')}}</textarea>
 						</div>
 					</div>


 					<div class="input-group mb-3 st0 @if($errors->first('no_hp')) is-invalid @endif"  id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
 						<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Nomor Handphone</div>
 						<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
 							<span class="input-group-text-mall" style="width: 3em; background: #202020;">
 								<img src="<?=url('/')?>/public/img/icon_svg/handphone_white.svg" style="width: 60%;">
 							</span>						
 							<input type="text" class="form-control-mall" id="no_hp" name="no_hp" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Nomor Handphone" aria-label="no_hp" aria-describedby="basic-addon1" style="width: 100%;" value="{{old('no_hp')}}">
 						</div>
 					</div>
 					<div class="input-group mb-3 st0 @if($errors->first('jadwal_hari')) is-invalid @endif" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
 						<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Jadwal Toko</div>
 						<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
 							<span class="input-group-text-mall" style="width: 3em; background: #202020;">
 								<img src="<?=url('/')?>/public/img/icon_svg/jadwal_white.svg" style="width: 50%;">
 							</span>
 							<div onclick="pilih_jadwal()" class="form-control form-control-mall" style="vertical-align: center;display: flex; align-items: center; justify-content: flex-start; cursor: pointer; border-top-left-radius: 0px; border-bottom-left-radius: 0px;" id="pilih_jadwal_buka_toko">Pilih Jadwal Toko</div>

 						</div>
 					</div>
 					<div hidden>
 						<input name="input_kategori" id="input_kategori" value="{{$kategori}}">
 						<input name="input_id_kategori" id="input_id_kategori" value="{{$id_kategori}}">
 						<input type="text" name="jadwal_hari" id="jadwal_hari" value="{{$hari}}">
 						<input type="text" name="jadwal_buka" id="jadwal_buka" value="{{$buka}}">
 						<input type="text" name="jadwal_tutup" id="jadwal_tutup" value="{{$tutup}}">
 					</div>
 					<div class="input-group mb-3 st0 @if($errors->first('alamat')) is-invalid @endif" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
 						<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Alamat</div>
 						<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
 							<span class="input-group-text-mall" style="width: 3em; background: #202020;">
 								<img src="<?=url('/')?>/public/img/icon_svg/marker_white.svg" style="width: 60%;">
 							</span>
 							<input type="text" class="form-control-mall" id="alamat" name="alamat" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Alamat" aria-label="alamat" aria-describedby="basic-addon1" style="width: 100%;" value="{{old('alamat')}}">
 						</div>
 					</div>

 					<div class="input-group mb-3 st0 @if($errors->first('kelurahan')) is-invalid @endif" id="div_kelurahan" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
 						<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Kabupaten / Kota</div>
 						<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
 							<span class="input-group-text-mall" style="width: 3em; background: #202020;">
 								<img src="<?=url('/')?>/public/img/icon_svg/kategori_white.svg" style="width: 40%;">
 							</span>
 							<select type="text" class="form-control-mall" id="kota" name="kota" style="height: 2.5em;" required>
 								<option value="" disabled selected>Pilih Kabupaten / Kota</option>
 								@foreach($kota as $row)
 								<option value="{{$row->id}}" @if (old('kota') == $row->id) selected @endif>{{$row->nama}}
 								</option>
 								@endforeach
 							</select>
 						</div>
 					</div>

 					<div class="input-group mb-3 st0 @if($errors->first('kelurahan')) is-invalid @endif" id="div_kelurahan" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
 						<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Kelurahan</div>
 						<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
 							<span class="input-group-text-mall" style="width: 3em; background: #202020;">
 								<img src="<?=url('/')?>/public/img/icon_svg/kategori_white.svg" style="width: 40%;">
 							</span>
 							<select type="text" class="form-control-mall" id="kelurahan" name="kelurahan" style="height: 2.5em;" required>
 								<option value="" disabled selected>Pilih Kelurahan</option>
 							</select>
 						</div>
 					</div>


 					<button onclick="show_loader()" type="submit" class="btn btn-primary" style="padding: 0px; background: transparent; border: none;">
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
<script>

	$('#kota').change(function(){
		// show_loader();
		$('#kelurahan').empty();
		$('#kelurahan').append($('<option>', {
			text: 'Memuat'
		}));
		$.ajax({
			url: "{{ route('get_kelurahan_from_kota') }}?id_kota="+$(this).val(),
			method: 'GET', 
			success: function(data){
				// hide_loader();
				$('#kelurahan').empty();
				$('#kelurahan').html(data.html);
			}
		})
	})

	$('#kecamatan').change(function(){
		$('#kelurahan').empty();
		$('#kelurahan').append($('<option>', {
			text: 'Memuat'
		}));
		$.ajax({
			url: "{{ route('get_kelurahan') }}?id_kecamatan="+$(this).val(),
			method: 'GET', 
			success: function(data){
				$('#kelurahan').empty();
				$('#kelurahan').html(data.html);
			}
		})
	})
</script>
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

	function tambah_jadwal_lain(){
		$("#tambah_jadwal_lain").prop('hidden', true);
		$("#input_jadwal").prop('hidden', false);
		$("#simpan_disabled_jadwal").prop("hidden", false);
		$("#simpan_enabled_jadwal").prop("hidden", true);
		$("#batal_jadwal").prop("hidden", false);

	}


	function tambah_kategori_lain(){
		$("#tambah_kategori_lain").prop('hidden', true);
		$("#div_kategori").prop('hidden', false);
		$("#simpan_disabled_kategori").prop("hidden", false);
		$("#simpan_enabled_kategori").prop('hidden', true);
		$("#batal_kategori").prop("hidden", false);

	}

	function batal_kategori() {
		$("#div_kategori").prop('hidden', true);
		$("#simpan_enabled_kategori").prop('hidden', false);
		$("#tambah_kategori_lain").prop('hidden', false);
		$("#simpan_disabled_kategori").prop("hidden", true);
		$("#batal_kategori").prop('hidden', true);
	}

	function batal_jadwal() {
		$("#input_jadwal").prop('hidden', true);
		$("#simpan_enabled_jadwal").prop('hidden', false);
		$("#tambah_jadwal_lain").prop('hidden', false);
		$("#simpan_disabled_jadwal").prop("hidden", true);
		$("#batal_jadwal").prop('hidden', true);
	}


	$("#kelurahan").select2();

	var i = 0;
	var jadwal_hari = [];
	var jadwal_buka = [];
	var jadwal_tutup = [];


	var value_kategori = [];
	var value_id_kategori = [];
	var i_kategori = 0;

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
		$(".div_upload").prop('hidden', true);
		$("#unggah_foto").prop('hidden', false);
		$('#modal-sukses').modal('show');
		// $("#foto_toko").click();
	}

	function tambah_foto_lokasi_toko(){
		$("#foto_lokasi_toko").click();
	}



	function tambah_jadwal() {
		var jadwal_awal = $("#jadwal_mulai").val();
		var jadwal_akhir = $("#jadwal_akhir").val();
		var simbol = jadwal_awal.substring(1, 0)+jadwal_akhir.substring(1, 0);
		if (jadwal_awal == jadwal_akhir){
			var hari = jadwal_awal;				
		}
		else {
			var hari = jadwal_awal+"-"+jadwal_akhir;

		}
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
			$("#tambah_jadwal_lain").prop("hidden", false);
			$("#input_jadwal").prop('hidden', true);
			$("#batal_jadwal").prop('hidden', true);

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
			$("#tambah_kategori_lain").prop("hidden", false);
			$("#div_kategori").prop('hidden', true);
			$("#batal_kategori").prop('hidden', true);
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

	<script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		function ubah_foto(){
			$(".div_upload").prop('hidden', true);
			$("#unggah_foto").prop('hidden', false);
			$('#modal-sukses').modal('show');
		}

		function unggah_foto(){
			$("#image").click();
		}


		function input_focus_username(id){
			// alert(id);
			$("#"+id).css('color', 'white');
			$("#"+id).css('text-decoration', 'none');			
		}

		var resize = $('#upload-demo').croppie({
			enableExif: true,
			enableOrientation: true,
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
    width: 240,
    height: 240,
        type: 'circle' //square
    },
    boundary: {
    	width: 240,
    	height:240
    }
});


		$('#image').on('change', function () { 
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


		var imageSize = {
			width: 400,
			height: 400,
			type: 'square'
		};

		var imageSize2 = {
			width: 200,
			height: 200,
			type: 'square'
		};		



		$('.upload-image').on('click', function (ev) {
			$("#modal-sukses").modal('hide');
			var rString = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
			resize.croppie('result', {
				circle: false,
				type: 'canvas',
				size: imageSize,
				quality: 1
			}).then(function (img) {
				$.ajax({

					url: "<?=url('/')?>/akun/jadi-mitra/premium/simpan-foto-register",
					type: "POST",
					data: {"image":img, "size":"400x400", "nama":rString},
					success: function (data) {
						$('#pic_toko_privew').attr('src', "<?=url('/')?>/public/img/temp_produk/400x400/"+data);
						$("#modal_loader").modal('hide');
						$("#nama_foto_temp").val(data);
						$("#div_pic_toko_privew").prop('hidden', false);
						$("#div_pic_toko").prop('hidden', true);

					}
				});

			});
			status_ganti_foto = 1;
			resize.croppie('result', {
				circle: false,
				type: 'canvas',
				size: imageSize2,
				quality: 1
			}).then(function (img) {
				$.ajax({
					url: "<?=url('/')?>/akun/jadi-mitra/premium/simpan-foto-register",
					type: "POST",
					data: {"image":img, "size":"200x200", "nama":rString},
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


		$("#form_input").submit(function(e) {

			var respon = false;
			var username = $("#username").val();
			for (i = 0; i < username.length; i++) {
				code = username.charCodeAt(i);
				if ((code > 47 && code < 58) || (code > 64 && code < 91) || (code > 96 && code < 123)) { 

				}
				else {
					// hide_loader();
					respon = true;
					// alert(respon);
					$("#modal-notif-error-toko").modal('show');
					$("#username").css('color', '#ED0D0D');
					$("#username").css('text-decoration', 'underline');
					$("#username").focus();
					break;
				}
			}

			if (respon == false){
				show_loader();
			}
			else {
				e.preventDefault();			

			}
		});
	</script>

	@endsection
