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

 		/*play sound*/
 		.duration{
 			position: absolute;
 			bottom: 20%;
 			left: 50%;
 			transform: translateX(-50%);
 			display: flex;
 			align-items: center;
 			justify-content: center;
 			width: 100%;
 			height: 20px;
 			margin-top: 40px;
 		}
 		.duration p{
 			color: #fff;
 			font-size: 15px;
 			margin-left: 20px;
 		}

 		/* both range slider part */
 		input[type="range"] {
 			-webkit-appearance: none;
 			width: 100%;
 			outline: none;
 			height: 2px;
 			margin: 0 15px;
 		}
 		input[type="range"]::-webkit-slider-thumb{
 			-webkit-appearance: none;
 			height: 20px;
 			width: 20px;
 			background: #FF8A65;
 			border-radius: 50%;
 			cursor: pointer;
 		}
 		.right input[type=range]{
 			width: 60%;
 		}

 		#play > i {
 			margin-top: 0.7em;
 			font-size: 2em;
 		}

 		#play > .fa-play {
 			margin-left: 0.2em; 			
 		}

 		#play > .fa-pause {
 			margin-left: 0em; 			
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
 					<form enctype="multipart/form-data" action="<?=url('/')?>/digital-download/akun/atur-band/simpan-foto-band" method="post">
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
 			<a href="javascript:history.back()" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; padding-bottom: 0.3em; padding-right: 0.7em;">
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
 		<div style="position: absolute; margin: 0px; left: 0; background: linear-gradient(180deg, rgba(0, 0, 0, 0) 48.45%, #000000 100%);">
 			@if (!empty($album_single->foto_cover))
 			<img id="preview_cover" src="<?=url('/')?>/public/img/digital_download/album_single/{{$band->id}}/{{$album_single->id}}/600x483/{{$album_single->foto_cover}}" style="width: 100%; z-index: -1; position: relative; border-bottom: 1px solid #212529;">
 			@else
 			<img id="preview_cover" src="<?=url('/')?>/public/img/digital_download/atur_band/foto_sampul.png" style="width: 100%; z-index: -1; position: relative; border-bottom: 1px solid #212529;">
 			@endif

 		</div>

 		<div class="footer">
 			<div class="container-mall" style="display: flex; flex-direction: column; justify-content: center; align-items: center; position: relative;">
 				<div style='text-align: left; font-size: 0.75em; padding: 0.7em 0em 0.7em 0.5em; width: 100%; color: white; background-size: cover; position: absolute; bottom: 0em; padding: 0em 8%; bottom: 2em; margin-bottom: 12em;'>
 					<a href="{{url()->current()}}/ubah" style="position: absolute; bottom: 1em; z-index: 10000; width: 5em; height: 5em; background: linear-gradient(41.88deg, #4AAE20 35.3%, #5EE825 88.34%); box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 50%; right:8%; display: flex; justify-content:center;align-items: center;" onclick="playBeep()">
 						<img src="<?=url('/')?>/public/img/digital_download/icon_svg/setting.svg" style="width: 3.5em; height:3.5em;">
 					</a>
 					<div style="font-size: 1.5em;"><span id="present">1</span>/{{count($daftar_lagu)+1}}</div>
 					<div id="judul_lagu" style="font-weight: 650; font-size: 1.8rem; margin-bottom: 0.2em; line-height: 1em;"><?=substr(strip_tags($album_single->judul_lagu), 0, 15)?>@if (strlen($album_single->judul_lagu) > 15)..@endif</div>
 					<div style="font-size: 0.9rem; line-height: 1em; font-weight: 0;">{{ucfirst($album_single->status)}} {{$album_single->judul}}</div>
 					<div style="padding: 0; margin: 0.4em 0px 0px 0px; font-size: 0.6rem; line-height: 1em;">
 						9000 Downloads
 					</div>
 					<div style="padding: 0; margin: 0.15em 0px 0px 0em; font-size: 1.3rem; line-height: 1em; font-weight: 650;">IDR. {{number_format($album_single->harga, 0, '.', '.')}}</div>
 				</div>
 				<div style="width: 110%; position: relative; margin-bottom: 0em;">
 					<div class="duration" style="">
 						<input type="range" min="0" max="100" value="0" id="duration_slider" onchange="change_duration()">
 					</div>
 					<div style="display: flex; justify-content: center; align-items: center; margin-top: 32em; margin-bottom: 1.5em; bottom: 0px;">
 						<div>
 							<img id="pre" src="<?=url('/')?>/public/img/digital_download/icon_svg/backward.svg" onclick="previous_song()">
 						</div>
 						<div style="margin: 0em 1.2em; background: linear-gradient(90.64deg, #BD0000 39.57%, #FF0000 89.04%); width: 5em; height: 5em; border-radius: 50%;" onclick="justplay()" id="play"> 	
 							<i class="fa fa-play" aria-hidden="true"></i>					
 						</div>
 						<div> 							
 							<img src="<?=url('/')?>/public/img/digital_download/icon_svg/forward.svg" onclick="next_song()" id="next">
 						</div>

 					</div>

 				</div>

 			</div>
 		</div>

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


 	$(document).ready(function(){
 		$('#link_video').on('input', function(){
 			var link = $('#link_video').val();
 			$.ajax({
 				url: "{{route('get_video_link')}}",
 				method: "post",
 				data : {link:link, _token:'{{csrf_token()}}'},
 				success:function(result)
 				{
 					$('#tampil-video').empty();
 					$('#tampil-video').html('<iframe width="100%" height="200px" src="https://www.youtube.com/embed/'+result+'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius: 1em;"></iframe>');
 				}
 			})
 		})
 	});


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
 <script type="text/javascript">
	// <!-- lplay music -->
	let previous = document.querySelector("#pre");
	let play = document.querySelector("#play");
	let judul_lagu = document.querySelector("#judul_lagu");
	let next = document.querySelector('#next');
	let slider = document.querySelector('#duration_slider');
	let title = document.querySelector('#title');	
	let present = document.querySelector('#present');
	let timer;
	let autoplay = 0;

	let index_no = 0;
	let Playing_song = false;

	//create a audio Element
	let track = document.createElement('audio');

	//All songs list
	let All_song = [
	{
		name: "<?=substr(strip_tags($album_single->judul_lagu), 0, 15)?>@if (strlen($album_single->judul_lagu) > 15)..@endif",
		path: "<?=url('/')?>/public/preview_lagu/{{$band->id}}/{{$album_single->id}}/{{$album_single->file}}"
	},
	@foreach ($daftar_lagu as $row)
	{
		name: "<?=substr(strip_tags($row->judul), 0, 15)?>@if (strlen($row->judul) > 15)..@endif",
		path: "<?=url('/')?>/public/preview_lagu/{{$band->id}}/{{$album_single->id}}/{{$row->file}}"
		// img: "img/img1.jpg",
		// singer: "1"
	},
	@endforeach
	];

	function load_track(index_no){
		clearInterval(timer);
		reset_slider();

		track.src = All_song[index_no].path;
		judul_lagu.innerHTML = All_song[index_no].name;
		track.load();

		timer = setInterval(range_slider ,1000);
		present.innerHTML = index_no + 1;
	}

	load_track(index_no);
	// checking.. the song is playing or not
	function justplay(){
		if(Playing_song==false){
			playsong();

		}else{
			pausesong();
		}
	}

	// play song
	function playsong(){
		track.play();
		Playing_song = true;
		play.innerHTML = '<i class="fa fa-pause" aria-hidden="true"></i>';
	}

	//pause song
	function pausesong(){
		track.pause();
		Playing_song = false;
		play.innerHTML = '<i class="fa fa-play" aria-hidden="true"></i>';
	}

	// next song
	function next_song(){
		if(index_no < All_song.length - 1){
			index_no += 1;
			load_track(index_no);
			playsong();
		}else{
			index_no = 0;
			load_track(index_no);
			playsong();

		}
	}

	// previous song
	function previous_song(){
		if(index_no > 0){
			index_no -= 1;
			load_track(index_no);
			playsong();

		}else{
			index_no = All_song.length;
			load_track(index_no);
			playsong();
		}
	}	

	function range_slider(){
		let position = 0;

        // update slider position
        if(!isNaN(track.duration)){
        	position = track.currentTime * (100 / track.duration);
        	slider.value =  position;
        }


       // function will run when the song is over
       if(track.ended){
       	play.innerHTML = '<i class="fa fa-play" aria-hidden="true"></i>';
       	if(autoplay==1){
       		index_no += 1;
       		load_track(index_no);
       		playsong();
       	}
       }
   }


	// reset song slider
	function reset_slider(){
		slider.value = 0;
	}

	function change_duration(){
		slider_position = track.duration * (slider.value / 100);
		track.currentTime = slider_position;
	}

// autoplay function
function autoplay_switch(){
	if (autoplay==1){
		autoplay = 0;
		auto_play.style.background = "rgba(255,255,255,0.2)";
	}else{
		autoplay = 1;
		auto_play.style.background = "#FF8A65";
	}
}



</script>
@endsection
