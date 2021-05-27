 	@extends('layouts.home_digital_download')

 	@section('title')

 	@endsection

 	@section('header-scripts')
 	<meta name="csrf-token" content="{{ csrf_token() }}">
 	<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/plugins/lunar/css/lunar.css">
 	<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/plugins/select2/css/select2.css">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
 	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />

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

 		.select2-dropdown .select2-dropdown--below {
 			width: 100%;
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
 			flex-direction: column; 
 			align-items: center; 
 			margin: 0em 0em 0em 1em; 
 			width: 9em;		
 		}

 		.slider-toko img {
 			width: 9em;
 			object-fit: cover;
 		}

 		.slider-toko > div {
 			height: 6.3em;
 		} 		

 		.slider-band {
 			display: flex; 
 			justify-content: center; 
 			flex-direction: column; 
 			align-items: center; 
 			margin: 0em 1em 0em 0em; 
 			width: 15em;		
 		}

 		.slider-band img {
 			width: 15em;
 			object-fit: cover;
 		}

 		.slider-band > div {
 			height: 6.3em;
 		} 	

 		.swiper-container {
 			width: 100%;
 			height: 100%;
 		}

 		.swiper-slide {
 			text-align: center;
 			font-size: 18px;
 			background: #fff;

 			/* Center slide text vertically */
 			display: -webkit-box;
 			display: -ms-flexbox;
 			display: -webkit-flex;
 			display: flex;
 			-webkit-box-pack: center;
 			-ms-flex-pack: center;
 			-webkit-justify-content: center;
 			justify-content: center;
 			-webkit-box-align: center;
 			-ms-flex-align: center;
 			-webkit-align-items: center;
 			align-items: center;
 		}

 		.swiper-pagination-bullet {
 			background: #fefefe; 			
 		}

 		.swiper-pagination-bullet-active {
 			background: #FFFFFF; 			
 		}

 		.star-rating {
 			color: #BD0000;
 		}

 		.list_album .star-rating {
 			font-size: 0.75em;
 		}

 	</style>
 	@endsection
 	@section('content')
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

 	<div class="modal fade" id="modal-data-band" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
 		<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
 			<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white; border: #353535;">
 				<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
 					<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: -0.5em; z-index: 5;">
 					<img src="<?=url('/')?>/public/img/mitra/modal_simpan_toko_premium.svg" style="width: 95%; position: absolute; top: -10.5em;">
 					<form action="<?=url('/')?>/digital-download/akun/atur-band/simpan-data-band" method="post">
 						{{csrf_field()}}
 						<div style="display: flex; width: 100%; margin: 0em; cursor: pointer; border-radius: 1em; color: white; font-size: 0.8em; color: #dddddd; padding: 0.5em 1em; flex-direction: column;">
 							<div style="margin-top: 1em;">
 								<div>Nama Band</div>
 								<div style="padding: 1em; display: flex; background: #212020; border-radius: 0.5em; margin-top: 0.5em;">
 									<div>
 										<!-- <input type="text" name="id_band" id="id_band" hidden> -->
 										<input type="text" name="nama_band" id="nama_band" style="color: white; background: transparent; font-size: 1.2em;" placeholder="Masukan judul service">
 									</div>
 								</div>
 							</div>	
 							<div style="margin-top: 1em;">
 								<div>Genre</div>
 								<div style="padding: 0.5em; display: flex; background: #212020; border-radius: 0.5em; margin-top: 0.5em; width: 100%;">
 									<select name="genre" id="genre" style="color: white; background: transparent; font-size: 1.2em; width: 100%;">
 									</select>
 								</div>
 							</div>	
 							<div style="margin-top: 1em; padding-bottom: 0.5em;">
 								<div>Deskripsi</div>
 								<div style="padding: 1em; display: flex; background: #212020; border-radius: 0.5em; margin-top: 0.5em;">
 									<div style="width: 100%;">
 										<textarea id="deskripsi" name="deskripsi" style="color: white; background: transparent; font-size: 1.2em; line-height: 1.15em; border: none; width: 100%;" rows="8" placeholder="Masukan deskripsi band"></textarea> 
 									</div>
 								</div>
 							</div>
 							<input type="text" id="id_ubah_fasilitas" name="id" hidden >	
 							<button type="submit" class="btn btn-primary" style="padding: 0px; background: transparent; border: none;">
 								<img src="<?=url('/')?>/public/img/button/toko_premium/simpan.svg" style="width: 100%; margin: 0px;">
 							</button>									
 						</div>
 					</form>
 				</div>
 			</div>
 		</div>
 	</div>

 	<div class="modal fade" id="modal-foto-band" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
 		<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
 			<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white; border: #353535;">
 				<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
 					<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: -0.5em; z-index: 5;">
 					<img src="<?=url('/')?>/public/img/mitra/modal_simpan_toko_premium.svg" style="width: 95%; position: absolute; top: -10.5em;">
 					<form  enctype="multipart/form-data" action="<?=url('/')?>/digital-download/akun/atur-band/simpan-foto-band" method="post">
 						{{csrf_field()}}
 						<div style="display: flex; width: 100%; margin: 0em; cursor: pointer; border-radius: 1em; color: white; font-size: 0.8em; color: #dddddd; padding: 0.5em 1em; flex-direction: column;">
 							<div style="margin-top: 1em;">
 								<div>Nama Band</div>
 								<div style="padding: 0em; display: flex; background: #212020; border-radius: 0.5em; margin-top: 0.5em;">
 									<div style="width: 100%;">
 										<!-- <input type="text" name="id_band" id="id_band" hidden> -->
 										<input type="text" name="foto_band_keterangan" style="padding: 1em; width: 100%; color: white; background: transparent; font-size: 1.2em; border-radius: 0.5em;" placeholder="Masukan judul service" required>
 									</div>
 								</div>
 							</div>	
 							<div style="margin-top: 1em;">
 								<div>Foto</div>
 								<div style="padding: 1em; display: flex; background: #212020; border-radius: 0.5em; margin-top: 0.5em;">
 									<div>
 										<!-- <input type="text" name="id_band" id="id_band" hidden> -->
 										<input type="file" name="foto_band_file" id="foto_band_file" style="color: white; background: transparent; font-size: 1.2em;" placeholder="Masukan judul service" required>
 									</div>
 								</div>
 							</div> 							
 							<input type="text" id="id_ubah_fasilitas" name="id" hidden >	
 							<button type="submit" class="btn btn-primary" style="padding: 0px; background: transparent; border: none;">
 								<img src="<?=url('/')?>/public/img/button/toko_premium/simpan.svg" style="width: 100%; margin: 0px;">
 							</button>									
 						</div>
 					</form>
 				</div>
 			</div>
 		</div>
 	</div>


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

 	<div class="modal fade" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
 		<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
 			<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white; border: #353535;">
 				<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
 					<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: -0.5em; z-index: 5;">
 					<img src="<?=url('/')?>/public/img/mitra/modal_simpan_toko_premium.svg" style="width: 95%; position: absolute; top: -10.5em;">
 					<form  enctype="multipart/form-data" action="<?=url('/')?>/digital-download/akun/atur-band/simpan-foto-band" method="post">
 						{{csrf_field()}}
 						<div style="display: flex; width: 100%; margin: 0em; cursor: pointer; border-radius: 1em; color: white; font-size: 0.8em; color: #dddddd; padding: 0.5em 1em; flex-direction: column;">
 							<div style="margin-top: 1em;">
 								<div>Nama Band</div>
 								<div style="padding: 0em; display: flex; background: #212020; border-radius: 0.5em; margin-top: 0.5em;">
 									<div style="width: 100%;">
 										<input type="text" name="foto_band_keterangan" style="padding: 1em; width: 100%; color: white; background: transparent; font-size: 1.2em; border-radius: 0.5em;" placeholder="Masukan judul service" required>
 									</div>
 								</div>
 							</div>	
 							<div style="margin-top: 1em;">
 								<div>Foto</div>
 								<div style="padding: 0em; display: flex; background: #212020; border-radius: 0.5em; margin-top: 0.5em;">
 									<div style="width: 100%;">
 										<input type="text" name="link_video" id="link_video" style="padding: 1em; width: 100%; color: white; background: transparent; font-size: 1.2em; border-radius: 0.5em;" placeholder="Masukan judul service" required>
 									</div>
 								</div>
 							</div> 		
 							<div class="form-group" id="tampil-video" style="margin-top: 1em;"> 

 							</div>				
 							<input type="text" id="id_ubah_fasilitas" name="id" hidden >	
 							<button type="submit" class="btn btn-primary" style="padding: 0px; background: transparent; border: none;">
 								<img src="<?=url('/')?>/public/img/button/toko_premium/simpan.svg" style="width: 100%; margin: 0px;">
 							</button>									
 						</div>
 					</form>
 				</div>
 			</div>
 		</div>
 	</div>

 	<header class="style__Container-sc-3fiysr-0 header" style="background: linear-gradient(180.04deg, #000000 0.05%, rgba(0, 0, 0, 0) 85.9%); filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));)">
 		<div class="style__Wrapper-sc-3fiysr-2 hBSxmh">
 			<a href="javascript:history.back()" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; padding: 0.5em 0.7em 0.5em 1em;">
 				<img src="<?=url('/')?>/public/img/digital_download/button/back_circle.svg" style="">
 			</a>
 			<a id="defaultheader_logo" title="Kitabisa" style="height: 100%; width: 70%; display: flex; justify-content: center; align-items: center;">
 				<input type="text" name="search" id="search" class="form-control" style="margin: 0; background: #333333; color: white; border-radius: 1.5em;" placeholder="Cari band disini...">
 			</a>
 			<a style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center;">
 			</a>
 		</div>
 	</header>


 	<main id="homepage" class="homepage" style="padding: 0em; background: transparent; ">
 		<div style="position: absolute; margin: 0px; left: 0; background: linear-gradient(180deg, rgba(0, 0, 0, 0) 48.45%, #000000 100%);">
 			<img id="preview_cover" src="<?=url('/')?>/public/img/digital_download/album_single/{{$album_cover->id_band}}/{{$album_cover->id}}/600x483/{{$album_cover->foto_cover}}" style="width: 100%; z-index: -1; position: relative; border-bottom: 1px solid #212529;">
 		</div>
 		<div class="swiper-container" style="padding-bottom: 3.5em;">
 			<div class="swiper-wrapper">
 				@foreach ($lagu_cover as $row)
 				<div class="swiper-slide" style="background: transparent; display: flex; justify-content: center; flex-direction: column;">
 					<div style="display: flex; justify-content: center; width: 100%;">
 						<div style="width: 100%; display: flex; flex-direction: column; align-items: center;">
 							<div class="data-band" style="display: flex; justify-content: center; align-items: center; flex-direction:column; width: 100%;">
 								<div style="color: white;  width: 100%; display: flex; justify-content: center; position: relative; top: 26em; margin-bottom: 25em;">
 									<div style="color: white; background: linear-gradient(180deg, rgba(0, 0, 0, 0) 1.43%, #000000 54.28%); width: 100%; padding: 0em 0em 1em 0em; display: flex; justify-content: center; position: relative; top: -4em; margin-bottom: -5em;">
 										<div style="width: 85%;">
 											<h3 style="text-align: left;"><?=ucwords(strtolower(substr(strip_tags($row->judul_lagu), 0, 14)))?>@if(strlen($row->judul_lagu) > 15)...@endif</h3>
 											<div style="padding: 0; margin: 0.5em 0px 0.5em 0px; font-size: 0.8em; line-height: 1em; text-align: left; position: relative;">
 												<div>
 													<i class="fas fa-star star-rating"></i>
 													<i class="fas fa-star star-rating"></i>
 													<i class="fas fa-star star-rating"></i>
 													<i class="fas fa-star star-rating"></i>
 													<i class="far fa-star star-rating"></i>
 													<span style="font-size: 0.9em; margin-left: 0.5em;">50 Penilaian</span>
 												</div>
 												<div style="background: linear-gradient(41.88deg, #EC7405 35.3%, #FFAA00 88.34%);box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width: 3em; height: 3em; display: flex; justify-content: center; align-items: center; border-radius: 50%; position: absolute;right: 0em; bottom: 0.3em;"><img src="<?=url('/')?>/public/img/digital_download/icon_svg/store.svg" style="width: 55%;"></div>
 											</div>
 											<div style="width: 100%; font-size: 0.75em; color: #ADADAD; line-height: 1.2em; text-align: justify;">{{$album_cover->deskripsi}}</div>
 										</div>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 				@endforeach
 			</div>
 			<div class="swiper-pagination"></div>
 		</div>
 		<div style="width: 100%; display: flex; justify-content: center; margin-top: 0.5em; padding-bottom: 7.5em;">
 			<div style="display: flex;justify-content: space-between; flex-wrap: wrap; width: 85%;">
 				@foreach ($lagu as $row)
 				<a href="<?=url('/')?>/digital-download/akun/single/" class="single" style="position: relative; width: 47%; margin-bottom: 1em;">
 					<img src="<?=url('/')?>/public/img/digital_download/album_single/{{$row->id_band}}/{{$row->id_album_single}}/250x201/{{$row->foto_cover}}" style="width: 100%;">
 					<div style='text-align: left; font-size: 0.75em; padding: 0.7em 0em 0.7em 0.5em; width: 100%; color: white; background-size: cover; padding: 1em; position: absolute; bottom: 0em; background: linear-gradient(180deg, rgba(0, 0, 0, 0) 20.45%, #000000 60.58%);'> 
 						<div onclick='music_href("{{url()->current()}}/ubah-single/{{$row->id}}")' style="position: absolute; bottom: 1em; width: 2.8em; height: 2.8em; background: linear-gradient(41.88deg, #EC7405 35.3%, #FFAA00 88.34%);box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 50%; right: 0.5em; display: flex; justify-content:center;align-items: center;">
 							<img src="<?=url('/')?>/public/img/digital_download/icon_svg/store.svg" style="width: 1.6em; height: 1.6em;">
 						</div>
 						<div style="font-weight: 400;  line-height: 0.8em;font-size: 1.2em;"><?=substr(strip_tags($row->judul_lagu), 0, 15)?>@if (strlen($row->judul_lagu) > 15)..@endif</div>
 						<div class="list_album">
 							<i class="fas fa-star star-rating"></i>
 							<i class="fas fa-star star-rating"></i>
 							<i class="fas fa-star star-rating"></i>
 							<i class="fas fa-star star-rating"></i>
 							<i class="far fa-star star-rating"></i>
 						</div>
 						<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.65em; line-height: 1em;">
 							<i class="fa fa-download"></i>&nbsp;9000&nbsp;({{ucfirst($row->status)}})
 						</div>
 						<div style="padding: 0; margin: 0.5em 0px 0px 0em; font-size: 0.9em; line-height: 1em; font-weight: 500;">IDR. {{number_format($row->harga, 0, '.', '.')}}</div>
 					</div>
 				</a>
 				@endforeach
 			</div>	
 		</div>
 	</div>	
 	<div class="footer" style="z-index: 100;">
 		<div class="container-mall footer-mall-menu" style="display: flex; justify-content: space-around; background: #363636;">
 			@php
 			$menu_color = array('pencarian.svg', 'toko.svg', 'akun.svg');
 			$menu = array('pencarian.svg', 'toko_color.svg', 'akun.svg');
 			$nama_menu = array('Pencarian', 'Toko', 'Akun');
 			$link_menu = array('pencarian', 'toko','akun');
 			$link_now = Request::segment(1);
 			@endphp 
 			@for ($i = 1; $i < count($menu)-1; $i++)  
 			<div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0em 0.1em 0em 0.1em;">
 				<div style="height: 5em; width: 3em; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em; justify-content: center; background: transparent;">
 					<a style="@if ($link_menu[$i] == $link_now) background: #ff006e; @else background: transparent; border: 2px solid white; @endif width: 3em; height: 3em; border-radius: 1.5em; margin-bottom: 0.3em; display: flex;justify-content: center;" href="<?=url('/')?>/{{$link_menu[$i]}}" onclick="show_loader()">
 						@if ($link_menu[$i] == $link_now)
 						<img src="<?=url('/')?>/public/img/menu/{{$menu[$i]}}" style="width: 60%;">
 						@else
 						<img src="<?=url('/')?>/public/img/menu/{{$menu_color[$i]}}" style="width: 60%;">
 						@endif
 					</a>
 					<div style="text-align: center; font-size: 0.7em; color: white;">{{$nama_menu[$i]}}</div>
 				</div>
 			</div> 
 			@endfor
 			@for ($i = 0; $i < count($menu)-2; $i++)  
 			<div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0em 0.1em 0em 0.1em;">
 				<div style="height: 5em; width: 3em; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em; justify-content: center;">
 					<a style="@if ($link_menu[$i] == $link_now) background: #ff006e; @else background: transparent; border: 2px solid white; @endif width: 3em; height: 3em; border-radius: 1.5em; margin-bottom: 0.3em; display: flex;justify-content: center;" href="<?=url('/')?>/{{$link_menu[$i]}}" onclick="show_loader()">
 						@if ($link_menu[$i] == $link_now)
 						<img src="<?=url('/')?>/public/img/menu/{{$menu[$i]}}" style="width: 60%;">
 						@else
 						<img src="<?=url('/')?>/public/img/menu/{{$menu_color[$i]}}" style="width: 60%;">
 						@endif
 					</a>
 					<div style="text-align: center; font-size: 0.7em; color: white;">{{$nama_menu[$i]}}</div>
 				</div>
 			</div> 
 			@endfor

 			<div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0em 0.1em 0em 0.1em;">
 				<a href="https://lprmsulteng.com/mobile/mobil" style="height: 5em; width: 3em; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em; justify-content: center;"  onclick="show_loader()">
 					<div style="background: transparent; border: 2px solid white; width: 3em; height: 3em; border-radius: 1.5em; margin-bottom: 0.3em; display: flex;justify-content: center;">
 						<svg style="margin-top: 0.43em;" width="24" height="24" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
 							<path d="M17.2854 8.46016V16.0951C17.2854 16.3201 17.1961 16.5359 17.037 16.695C16.8779 16.8541 16.6621 16.9434 16.4371 16.9434H15.5888C15.3638 16.9434 15.148 16.8541 14.9889 16.695C14.8298 16.5359 14.7404 16.3201 14.7404 16.0951V15.2468H2.86383V16.0951C2.86383 16.3201 2.77446 16.5359 2.61536 16.695C2.45627 16.8541 2.2405 16.9434 2.01551 16.9434H1.16718C0.942186 16.9434 0.72641 16.8541 0.567317 16.695C0.408225 16.5359 0.318848 16.3201 0.318848 16.0951V8.46016L2.4227 3.55003C2.55362 3.24463 2.77133 2.98439 3.04882 2.80162C3.3263 2.61884 3.65135 2.52156 3.98363 2.52185H6.25715V0.825195H11.3471V2.52185H13.6215C13.9535 2.52189 14.2782 2.61932 14.5553 2.80208C14.8325 2.98484 15.0499 3.2449 15.1807 3.55003L17.2854 8.46016ZM2.16481 8.46016H15.4395L13.6215 4.21851H3.98363L2.16566 8.46016H2.16481ZM4.13633 12.7018C4.47381 12.7018 4.79748 12.5677 5.03612 12.3291C5.27476 12.0905 5.40882 11.7668 5.40882 11.4293C5.40882 11.0918 5.27476 10.7682 5.03612 10.5295C4.79748 10.2909 4.47381 10.1568 4.13633 10.1568C3.79884 10.1568 3.47518 10.2909 3.23654 10.5295C2.9979 10.7682 2.86383 11.0918 2.86383 11.4293C2.86383 11.7668 2.9979 12.0905 3.23654 12.3291C3.47518 12.5677 3.79884 12.7018 4.13633 12.7018ZM13.4679 12.7018C13.8054 12.7018 14.1291 12.5677 14.3677 12.3291C14.6064 12.0905 14.7404 11.7668 14.7404 11.4293C14.7404 11.0918 14.6064 10.7682 14.3677 10.5295C14.1291 10.2909 13.8054 10.1568 13.4679 10.1568C13.1305 10.1568 12.8068 10.2909 12.5682 10.5295C12.3295 10.7682 12.1955 11.0918 12.1955 11.4293C12.1955 11.7668 12.3295 12.0905 12.5682 12.3291C12.8068 12.5677 13.1305 12.7018 13.4679 12.7018Z" fill="white"/>
 						</svg>

 					</div>
 					<div style="text-align: center; font-size: 0.7em; color: white; white-space: nowrap;">RentCar</div>
 				</a>
 			</div>        
 			<div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0em 0.1em 0em 0.1em;">
 				<a href="<?=url('/')?>/digital-download" style="height: 5em; width: 3em; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em; justify-content: center;"  onclick="show_loader()">
 					<div style="background: white; border: 2px solid white; width: 3em; height: 3em; border-radius: 1.5em; margin-bottom: 0.3em; display: flex;justify-content: center;">
 						<img src="<?=url('/')?>/public/img/menu/digidown_pink.svg" style="width: 60%;">
 					</div>
 					<div style="text-align: center; font-size: 0.7em; color: white; white-space: nowrap;">DigitalDownload</div>
 				</a>
 			</div>        
 			@for ($i = 2; $i < count($menu); $i++)  
 			<div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0em 0.1em 0em 0.1em;">
 				<div style="height: 5em; width: 3em; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em; justify-content: center;">
 					<a style="@if ($link_menu[$i] == $link_now) background: #ff006e; @else background: transparent; border: 2px solid white; @endif width: 3em; height: 3em; border-radius: 1.5em; margin-bottom: 0.3em; display: flex;justify-content: center;" href="<?=url('/')?>/{{$link_menu[$i]}}"  onclick="show_loader()">
 						@if ($link_menu[$i] == $link_now)
 						<img src="<?=url('/')?>/public/img/menu/{{$menu[$i]}}" style="width: 60%;">
 						@else
 						<img src="<?=url('/')?>/public/img/menu/{{$menu_color[$i]}}" style="width: 60%;">
 						@endif
 					</a>
 					<div style="text-align: center; font-size: 0.7em; color: white;">{{$nama_menu[$i]}}</div>
 				</div>
 			</div> 
 			@endfor

 		</div>
 	</div>


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
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script type="text/javascript">
	$("#genre").select2();

	var swiper = new Swiper('.swiper-container', {
		pagination: {
			el: '.swiper-pagination',
		},
	});

	@if(Session::has('message'))
	$('#modal-pemberitahuan').modal('show')
	@endif

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});


	$("input[required], select[required]").attr("oninvalid",
		"this.setCustomValidity('Harap Dimasukkan')");
	$("input[required], select[required]").attr("oninput", "setCustomValidity('')");

	function pilih_foto_cover(){
		$(".div_upload").prop('hidden', true);
		$("#unggah_foto").prop('hidden', false);
		$('#modal-sukses').modal('show');
	}

	function tambah_video(){
		$("#modal-video").modal('show');
	}

	function music_href(link){
		location.href = link;
	}



	function unggah_foto(){
		$("#foto_cover").click();
	}

	function tambah_foto(){
		$("#modal-foto-band").modal('show');
	}

	var resize = $('#upload-demo').croppie({
		enableExif: true,
		enableOrientation: true,    
		viewport: {  
			width: 250,
			height: 250,
			type: 'square' 
		},
		boundary: {
			width: 250,
			height:250
		}
	});


	var cover_imageSize = {
		width: 600,
		height: 600,
		type: 'square'
	};

	var cover_imageSize2 = {
		width: 240,
		height: 240,
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

				url: "<?=url('/')?>/digital-download/akun/atur-band/simpan-foto-cover",
				type: "POST",
				data: {"image":img, "size":"600x600", "nama":rString},
				success: function (data) {

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
				url: "<?=url('/')?>/digital-download/akun/atur-band/simpan-foto-cover",
				type: "POST",
				data: {"image":img, "size":"240x240", "nama":rString},
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
