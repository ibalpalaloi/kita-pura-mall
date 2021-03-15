@extends('layouts.home_premium')

@section('title')

@endsection

@section('header-scripts')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
		flex-direction: column; 
		align-items: center; 
		margin: 0em 0em 0em 0.5em; 
		width: 47.5%;		
	}

	.slider-toko img {
		width: 100%;
		height: 7.5em;
		object-fit: cover;
		border-top-left-radius: 1em;
		border-top-right-radius: 1em;
	}

	.slider-toko > div {
		height: 6.3em;
		border-bottom-left-radius: 1em;
		border-bottom-right-radius: 1em;
	}

	.star-rating {
		color: #efff3b;
	}

	.star-no-rating {
		color: #c1c3be;
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

	.daftar-icon div {
		margin-right: 0.5em;
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



<header class="style__Container-sc-3fiysr-0 header" style="background:#353535;  padding-top: 0.3em">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh">
		<a href="<?=url('/')?>/akun/mitra/premium" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; padding-bottom: 0.3em; padding-right: 0.7em;">
			<img src="<?=url('/')?>/public/img/back_white.svg">
		</a>
		<a id="defaultheader_logo" title="Kitabisa" style="height: 100%; width: 70%; display: flex; justify-content: center; align-items: center;">
			<img src="<?=url('/')?>/public/img/logo_premium.svg" style="height: 80%;">
		</a>
		<a style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center;">
		</a>
	</div>
</header>

<div class="modal fade" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white; border: #353535;">
			<div class="modal-body" style="width: 100%; padding-bottom: 0px;">
				<form style="width: 100%; margin-bottom: 0px;">
					<input type="text" name="" id="nomor_div" hidden>
					<div class="form-group" style="width: 100%;">
						<label for="recipient-name" class="col-form-label">Link Video</label>
						<input type="text" class="form-control" id="link_video" placeholder="Masukkan Link video dari youtube">
					</div>
					<div class="form-group" id="tampil-video"> 

					</div>
				</form>
			</div>
			<div style="margin-bottom: 1.5em;">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button onclick="simpan_video()" type="button" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>


{{-- modal tambah icon --}}
<div class="modal fade" id="modal-fasilitas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white; border: #353535;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: -0.5em; z-index: 5;">
				<img src="<?=url('/')?>/public/img/mitra/modal_simpan_toko_premium.svg" style="width: 95%; position: absolute; top: -10.5em;">
				<form action="<?=url('/')?>/akun/mitra/premium/atur-produk/post_fasilitas" method="post">
					{{csrf_field()}}
					<div style="display: flex; width: 100%; margin: 0em; cursor: pointer; border-radius: 1em; color: white; font-size: 0.8em; color: #dddddd; padding: 0.5em 1em; flex-direction: column;">
						<div style="margin-top: 1em;">
							<div>Judul</div>
							<div style="padding: 1em; display: flex; background: #212020; border-radius: 0.5em; margin-top: 0.5em;">
								<div><img src="<?=url('/')?>/public/img/icon_svg/judul.svg" style="width: 100%;"></div>
								<div>
									<input type="text" name="judul" style="color: white; background: transparent; font-size: 1.15em; padding-left: 0.9em;" placeholder="Masukan judul service">
								</div>
							</div>
						</div>	
						<div style="margin-top: 1em; padding-bottom: 0.5em;">
							<div>Keterangan</div>
							<div style="padding: 1em; display: flex; background: #212020; border-radius: 0.5em; margin-top: 0.5em;">
								<textarea name="keterangan" style="color: white; background: transparent; font-size: 0.9em; line-height: 1.15em;border: none; width: 100%;" rows="8" placeholder="Masukan keterangan service"></textarea> 
							</div>
						</div>	
						<button type="submit" class="btn btn-primary" style="padding: 0px; background: transparent; border: none;">
							<img src="<?=url('/')?>/public/img/button/toko_premium/simpan.svg" style="width: 100%; margin: 0px;">
						</button>									
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal-ubah-fasilitas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white; border: #353535;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: -0.5em; z-index: 5;">
				<img src="<?=url('/')?>/public/img/mitra/modal_simpan_toko_premium.svg" style="width: 95%; position: absolute; top: -10.5em;">
				<form action="<?=url('/')?>/akun/mitra/premium/atur-produk/ubah_fasilitas" method="post">
					{{csrf_field()}}
					<div style="display: flex; width: 100%; margin: 0em; cursor: pointer; border-radius: 1em; color: white; font-size: 0.8em; color: #dddddd; padding: 0.5em 1em; flex-direction: column;">
						<div style="margin-top: 1em;">
							<div>Judul</div>
							<div style="padding: 1em; display: flex; background: #212020; border-radius: 0.5em; margin-top: 0.5em;">
								<div><img src="<?=url('/')?>/public/img/icon_svg/judul.svg" style="width: 100%;"></div>
								<div>
									<input id="judul_service" type="text" name="judul" style="color: white; background: transparent; font-size: 1.15em; padding-left: 0.9em;" placeholder="Masukan judul service">
								</div>
							</div>
						</div>	
						<div style="margin-top: 1em; padding-bottom: 0.5em;">
							<div>Keterangan</div>
							<div style="padding: 1em; display: flex; background: #212020; border-radius: 0.5em; margin-top: 0.5em;">
								<div style="width: 100%;">
									<textarea id="keterangan_fasilitas" name="keterangan" style="color: white; background: transparent; font-size: 0.9em; line-height: 1.15em; border: none; width: 100%;" rows="8" placeholder="Masukan keterangan service"></textarea> 
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

<!-- <form enctype="multipart/form-data" action="{{url()->current()}}/simpan" method="post" > -->

<main id="homepage" class="homepage" style='background: transparent; padding: 5em 0px 0px 0px;'>
	<div>
		<img src="<?=url('/')?>/public/img/mitra/background_premium.svg" style="object-fit: cover; position: absolute; top: -2em; z-index: -1;">
	</div>
	<div>
		<div style="padding: 0px 16px 1em;">
			<h3 style="color: white;">Atur Landing Page</h3>
			<h6 style="color: white; line-height: 1em; margin-top: 1em;">Atur Foto Cover</h6>
			<div class="mb-3" style=" display: flex; justify-content: space-between; align-items: center;">
				<div style="font-size: 0.8em; color: #dddddd; line-height: 1em;">Masukkan foto cover landing page anda</div>
			</div>
			<form id="upload_cover" enctype="multipart/form-data" method="post">
				{{ csrf_field() }}
				<div class="input-group mb-3 div-input-mall-square" id="div_video" style="margin-top: 1em; background:transparent; border: none; border-radius: 1.2em;">
					@if (!empty($toko->foto_cover))
					<div id="div_preview_cover" style="display: flex; justify-content: center; width: 100%; border: 2px dashed white; margin: 0em; height: 30em; cursor: pointer; border-radius: 1em;" id="div_pic_video_1">
						<img id="preview_cover" src="<?=url('/')?>/public/img/toko/{{$toko->id}}/cover/{{$toko->foto_cover}}" style="width: 100%; object-fit: cover;height: 29.7em; border-radius: 1em;">
						<div style="position: absolute;top: 40%;">
							<img id="pic_maps_1" src="<?=url('/')?>/public/img/icon_svg/plus_with_background.svg" onclick="pilih_foto_cover()" style=" width: 2.5em; margin-left: 40%; margin-bottom: 2em;">
						</div>
					</div>
					@else
					<div id="div_pilih_cover" style="display: flex; justify-content: center; width: 100%; border: 2px dashed white; margin: 0em; height: 30em; cursor: pointer; border-radius: 1em;" onclick="pilih_foto_cover()" id="div_pic_video_1">
						<img src="<?=url('/')?>/public/img/icon_svg/add_circle_white.svg" style="width: 3em; margin-top: 0.5em;">
					</div>
					<div id="div_preview_cover" hidden style="display: flex; justify-content: center; width: 100%; border: 2px dashed white; margin: 0em; height: 30em; cursor: pointer; border-radius: 1em;" id="div_pic_video_1">
						<img id="preview_cover" src="<?=url('/')?>/public/img/icon_svg/add_circle_white.svg" style="width: 100%; object-fit: cover;height: 29.7em; border-radius: 1em;">
					</div>
					@endif
					<input hidden type="file" name="foto_cover" id="foto_cover">
					<input type="submit" id="button_foto_cover" hidden>
				</div>
			</form>
			<h6 style="color: white; line-height: 1em; margin-top: 1em;">Atur Video</h6>
			<div class="mb-3" style=" display: flex; justify-content: space-between; align-items: center;">
				<div style="font-size: 0.8em; color: #dddddd; line-height: 1em;">atur toko anda dan dapatkan ribuan pelanggan</div>
			</div>

			<div class="input-group mb-3 div-input-mall-square" id="div_video" style="margin-top: 1em; background:transparent; border: none; border-radius: 1.2em;">
				<div style="display: flex; justify-content: center; width: 100%; border: 2px dashed white; margin: 0em; height: 14em; cursor: pointer; border-radius: 1em;" onclick="tambah_video('1')" id="div_pic_video_1">
					@if(!empty($video[1]))
					<iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$video[1]}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius: 1em;"></iframe>
					<div style="position: absolute; right: 10px; top: -1em; display: flex;">
						<div style="width: 2.5em;  background: #262627; display: flex; justify-content: center; border-radius: 50%;">
							<img src="<?=url('/')?>/public/img/icon_svg/pencil_circle_white.svg" style="width: 90%;">
						</div>
						<div style="width: 2.5em; background: #262627; display: flex; justify-content: center; border-radius: 50%;">
							<img src="<?=url('/')?>/public/img/icon_svg/trash_circle_red.svg" style="width: 90%;">
						</div>
					</div>
					@else
					<img src="<?=url('/')?>/public/img/icon_svg/add_circle_white.svg" style="width: 3em; margin-top: 0.5em;">
					@endif
				</div>
			</div>

			
			<h6 style="color: white; line-height: 1em; margin-top: 1em;">Atur Tampilan Maps</h6>
			<div class="mb-3" style=" display: flex; justify-content: space-between; align-items: center;">
				<div style="font-size: 0.8em; color: #dddddd; line-height: 1em;">atur toko anda dan dapatkan ribuan pelanggan</div>
			</div>
			<div class="input-group mb-3 div-input-mall-square" id="div_foto_toko" style="margin-top: 1em; border:none;">
				<form enctype="multipart/form-data" id="form_foto_maps_1" method="post">
					{{csrf_field()}}
					@if($foto_1)
					<div class="input-group mb-3 div-input-mall-square" id="div_foto_toko_1" style="margin-top: 1em; background:transparent; border: none; border-radius: 1.2em;">
						<div style="position: relative; display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_toko_privew_1">
							<img id="pic_toko_privew_1" src="<?=url('/')?>/public/img/toko/{{$foto_1->toko_id}}/maps/{{$foto_1->foto}}" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
							<div style="position: absolute;top: 40%;">
								<img id="pic_maps_1" src="<?=url('/')?>/public/img/icon_svg/plus_with_background.svg" onclick="tambah_foto_toko('1')" style=" width: 2.5em; margin-left: 40%; margin-bottom: 2em;">
								<div style="background: rgba(255, 255, 255, 0.85); padding: 0.2em 0.5em; color: #FF006E;">Foto Depan Tempat Usaha</div>
							</div>
						</div>
						<input type="hidden" name="id_foto_toko" id="id_foto_toko_1" value="{{$foto_1->id}}">
					</div>
					@else
					<div class="input-group mb-3 div-input-mall-square" id="div_foto_toko_1" style="margin-top: 1em; background:transparent; border: none; border-radius: 1.2em;">
						<div style="position: relative; display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_toko_privew_1">
							<img id="pic_toko_privew_1" src="<?=url('/')?>/public/img/register/maps/tampak_depan.jpg" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
							<div style="position: absolute;top: 40%;">
								<img id="pic_maps_1" src="<?=url('/')?>/public/img/icon_svg/plus_with_background.svg" onclick="tambah_foto_toko('1')" style=" width: 2.5em; margin-left: 40%; margin-bottom: 2em;">
								<div style="background: rgba(255, 255, 255, 0.85); padding: 0.2em 0.5em; color: #FF006E;">Foto Depan Tempat Usaha</div>
							</div>
						</div>
						<input type="hidden" name="id_foto_toko" id="id_foto_toko_1" value="null">
					</div>
					@endif
					<input hidden type="file" name="foto_toko_1" id="foto_toko_1">
					<input type="hidden" name="nomor_foto" value="1">
					<input type="submit" id="button_foto_maps_1" hidden>
				</form>
				<div style="display: flex; justify-content: space-between; width: 100%;">
					<form enctype="multipart/form-data" id="form_foto_maps_2" method="post" style="width: 40%;">
						{{csrf_field()}}
						@if($foto_2)
						<div class="input-group mb-3 div-input-mall-square" id="div_foto_toko_2" style="background:transparent; border: none; border-radius: 1.2em; width: 100%;">
							<div style="display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_toko_privew_2">
								<img id="pic_toko_privew_2" src="<?=url('/')?>/public/img/toko/{{$foto_2->toko_id}}/maps/{{$foto_2->foto}}" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
								<div style="position: absolute;top: 40%;">
									<img id="pic_toko_2" src="<?=url('/')?>/public/img/icon_svg/plus_with_background.svg" onclick="tambah_foto_toko('2')" style=" width: 2.5em; margin-left: 20%; margin-bottom: 2em;">
									<div style="background: rgba(255, 255, 255, 0.85); padding: 0.2em 0.5em; color: #FF006E;">Bebas</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="id_foto_toko" id="id_foto_toko_2" value="{{$foto_2->id}}">
						@else
						<div class="input-group mb-3 div-input-mall-square" id="div_foto_toko_2" style="background:transparent; border: none; border-radius: 1.2em; width: 100%;">
							<div style="display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_toko_privew_2">
								<img id="pic_toko_privew_2" src="<?=url('/')?>/public/img/register/maps/produk.png" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
								<div style="position: absolute;top: 40%;">
									<img id="pic_toko_2" src="<?=url('/')?>/public/img/icon_svg/plus_with_background.svg" onclick="tambah_foto_toko('2')" style=" width: 2.5em; margin-left: 20%; margin-bottom: 2em;">
									<div style="background: rgba(255, 255, 255, 0.85); padding: 0.2em 0.5em; color: #FF006E;">Bebas</div>
								</div>
							</div>
							<input type="hidden" name="id_foto_toko" id="id_foto_toko_2" value="null">
						</div>
						@endif
						<input hidden type="file" name="foto_toko_2" id="foto_toko_2">
						<input type="hidden" name="nomor_foto" value="2">
						<input type="submit" id="button_foto_maps_2" hidden>
					</form>
					<form enctype="multipart/form-data" id="form_foto_maps_3" method="post" style="width: 56%;">
						{{csrf_field()}}
						@if($foto_3)
						<div class="input-group mb-3 div-input-mall-square" id="div_foto_toko_3" style="background:transparent; border: none; border-radius: 1.2em; width: 100%;">
							<div style="display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_toko_privew_3">
								<img id="pic_toko_privew_3" src="<?=url('/')?>/public/img/toko/{{$foto_3->toko_id}}/maps/{{$foto_3->foto}}	" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
								<div style="position: absolute;top: 40%;">
									<img id="pic_toko_3" src="<?=url('/')?>/public/img/icon_svg/plus_with_background.svg" onclick="tambah_foto_toko('3')" style=" width: 2.5em; margin-left: 15%; margin-bottom: 2em;">
									<div style="background: rgba(255, 255, 255, 0.85); padding: 0.2em 0.5em; color: #FF006E;">Bebas</div>
								</div>
							</div>
							<input type="hidden" name="id_foto_toko" id="id_foto_toko_3" value="{{$foto_3->id}}">
						</div>
						@else
						<div class="input-group mb-3 div-input-mall-square" id="div_foto_toko_3" style="background:transparent; border: none; border-radius: 1.2em; width: 100%;">
							<div style="display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_toko_privew_3">
								<img id="pic_toko_privew_3" src="<?=url('/')?>/public/img/register/maps/bebas.png" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
								<div style="position: absolute;top: 40%;">
									<img id="pic_toko_3" src="<?=url('/')?>/public/img/icon_svg/plus_with_background.svg" onclick="tambah_foto_toko('3')" style=" width: 2.5em; margin-left: 15%; margin-bottom: 2em;">
									<div style="background: rgba(255, 255, 255, 0.85); padding: 0.2em 0.5em; color: #FF006E;">Bebas</div>
								</div>
							</div>
							<input type="hidden" name="id_foto_toko" id="id_foto_toko_3" value="null">
						</div>
						@endif
						<input hidden type="file" name="foto_toko_3" id="foto_toko_3">
						<input type="hidden" name="nomor_foto" value="3">
						<input type="submit" id="button_foto_maps_3" hidden>

					</div>
				</div>
				<h6 style="color: white; line-height: 1em; margin-top: 1em;">Atur Deskripsi</h6>
				<div class="mb-3" style=" display: flex; justify-content: space-between; align-items: center;">
					<div style="font-size: 0.8em; color: #dddddd; line-height: 1em;">atur toko anda dan dapatkan ribuan pelanggan</div>
				</div>
				@foreach ($fasilitas_toko as $fasilitas)
				<div class="input-group mb-3 div-input-mall-square st0" id="div_deskripsi" style="margin-top: 1em; background:transparent; border: none; border-radius: 1.2em;">

					<div style="display: flex; width: 100%; margin: 0em; cursor: pointer; border-radius: 1em; color: white; font-size: 0.8em; color: #dddddd; padding: 0.5em 1em; flex-direction: column;" class="st0">
						<div style="display: flex; position: absolute; right: 1em; top: -1em;">
							<div onclick="modal_ubah_fasilitas('{{$fasilitas->judul}}', '{{$fasilitas->keterangan}}', '{{$fasilitas->id}}')" style="width: 2.5em; background: #3D3D3D; border-radius: 50%; height: 2.5em; display: flex; justify-content: center; margin-right: 0.5em;"><img src="<?=url('/')?>/public/img/icon_svg/pencil.svg" style="width: 50%;"></div>
							<a href="<?=url('/')?>/akun/mitra/premium/atur-produk/hapus_fasilitas/{{$fasilitas->id}}" style="width: 2.5em; background: #3D3D3D; border-radius: 50%; height: 2.5em; display: flex; justify-content: center;"><img src="<?=url('/')?>/public/img/icon_svg/trash_white.svg" style="width: 50%;"></a>
						</div>	
						<div style="margin-top: 0.5em;">
							<div>Judul</div>
							<div style="padding: 1em; display: flex; background: #212020; border-radius: 0.5em; margin-top: 0.5em;">
								<div><img src="<?=url('/')?>/public/img/icon_svg/judul.svg" style="width: 100%;"></div>
								<div>
									<input value="{{$fasilitas->judul}}" type="text" name="judul" style="color: white; background: transparent; font-size: 1.15em; padding-left: 0.9em;" readonly>
								</div>
							</div>
						</div>	
						<div style="margin-top: 1em; padding-bottom: 0.5em;">
							<div>Keterangan</div>
							<div style="padding: 1em; display: flex; background: #212020; border-radius: 0.5em; margin-top: 0.5em;">
								<div style="width: 100%;">
									<textarea name="keterangan" style="color: white; background: transparent; font-size: 0.9em; line-height: 1.15em; border: none; width: 100%;" rows="8" placeholder="Masukan keterangan service" readonly>{{$fasilitas->keterangan}}</textarea> 
								</div>
							</div>
						</div>									
					</div>
				</div>
				@endforeach
				<div class="container-mall" style="display: flex; justify-content: space-around; padding: 0px;">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-fasilitas" style="padding: 0px; background: transparent; border: none;">
						<img src="<?=url('/')?>/public/img/button/toko_premium/tambah_deskripsi_gold.svg" style="width: 100%; margin: 0px;">
					</button>	
				</div>

				<h6 style="color: white; line-height: 1em; margin-top: 1em;">Atur Menu Favorit</h6>
				<div class="mb-3" style=" display: flex; justify-content: space-between; align-items: center;">
					<div style="font-size: 0.8em; color: #dddddd; line-height: 1.3em;">pilih 3 menu favorit untuk ditampilkan di halaman depan landing page</div>
				</div>
				<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="border-radius: 3em;">
					<div style="width: 100%; padding-right: 0.5em;">
						<span class="input-group-text-mall">
						</span>
						<input type="text" class="form-control-mall" id="cari_produk" name="cari_produk" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Cari produk" aria-label="Cari produk" aria-describedby="basic-addon1" value=""style="width: 100%; height: 3em; margin-right: 1em;">
						<div style="width: 3em; height: 3em; background: #926c15; border-radius: 50%; padding: 1.5em; display: flex; justify-content: center;align-items: center;">
							<img src="<?=url('/')?>/public/img/icon_svg/search_white.svg">
						</div>
					</div>
				</div>
				<div style="width: 100%; display: flex; flex-wrap: wrap; justify-content: space-between; padding-left: 0em; padding-bottom: 1em;">
					@php
						$index = 1;
						$menu_tampil = 0;
					@endphp
					@if ($produk->count() > 0)
					@foreach($produk as $row)
					<div class="slider-toko" style="margin-bottom: 0em; margin-left: 0px;">
						<?php $svg = "public/img/home/bg-slider-toko.svg"; ?>
						<img src="<?=url('/')?>/public/img/toko/{{$row->toko_id}}/produk/{{$row->foto_produk}}">
						<div style='text-align: left; font-size: 0.75em; padding: 0.6em 1em 0.7em 1em; width: 100%; color: white; background-size: cover; position: relative;' class="st0"> 
							<div style="position: absolute; top: -1.8em; z-index: 0; width: 3.5em; height: 3.5em; right: 0.8em; display: flex; justify-content: center; align-items: center;">
								<div class="togglebutton">
									<label>	
											<input id="menu_favorit_{{$index}}" onchange="menu_favorit('{{$row->id}}', '{{$index}}')" type="checkbox" @if($row->tampil == "Ya") checked @php $menu_tampil++ @endphp @endif>
											<span class="toggle"></span>
									</label>

								</div>
							</div>
							<div style="font-weight: 500; margin-top: 0em;"><?=substr(strip_tags($row->nama), 0, 15)?>@if (strlen($row->nama) > 15)..@endif</div>
							<div style="font-size: 0.7em; line-height: 1.2em; font-weight: 0;">{{$row->kategori->nama}}</div>
							@if($row->diskon == '0')
							<span style="padding: 0; margin: 0.1em 0px 0px 0px; font-size: 0.9em; line-height: 0.6em; font-weight: 500;">IDR. {{$row->harga}}</span>
							@else
							<span style="padding: 0; margin: 0.1em 0px 0px 0px; font-size: 0.6em; line-height: 0.7em; vertical-align: center;">
								<s>IDR. {{$row->harga}}</s>
							</span>
							@php
							$hasil_diskon = ($row->harga)-((($row->diskon)/100)*($row->harga));
							@endphp
							<span style="padding: 0; margin: 0.1em 0px 0px 0.5em; font-size: 0.9em; line-height: 0.6em; font-weight: 500;">IDR. {{$hasil_diskon}}</span>
							@endif
							<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.7em; line-height: 0.5em;">
								Stok : {{$row->stok}}
							</div>
						</div>
					</div> 
					@php
						$index++
					@endphp
					@endforeach
					@endif
					<input hidden type="text" id="jumlah_menu_favorit" value="{{$menu_tampil}}">
					<a href="<?=url('/')?>/akun/mitra/premium/tambah-produk" class="btn btn-primary" style="padding: 0px; background: transparent; border: none;">
						<img src="<?=url('/')?>/public/img/button/toko_premium/tambah_produk_gold.svg" style="width: 100%; margin: 0px;">
					</a>	
				</div>
			</div>
		</div>
		<div class="container-mall" style="display: flex; justify-content: space-around; padding: 0px;">
			<a href="<?=url('/')?>/{{$toko->username}}" class="btn btn-primary" style="padding: 0px; background: transparent; border: none;">
				<img src="<?=url('/')?>/public/img/button/toko_premium/landing_page.svg" style="width: 100%; margin: 0px;">
			</a>	
		</div>
	</main>
	<!-- </form>			 -->

	@endsection

	@section('footer-scripts')
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
	integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript">

	@if(Session::has('message'))	
	$('#modal-pemberitahuan').modal('show')
	@endif

	function menu_favorit(id, index){
		var checkBox = document.getElementById("menu_favorit_"+index);
		var jumlah_menu_favorit = $("#jumlah_menu_favorit").val();
		if(jumlah_menu_favorit < 3 && checkBox.checked == true){
			$.ajax({
				url: "{{route('ubah_status_produk_premium')}}",
				method: "post",
				data : {id:id, _token:'{{csrf_token()}}'},
				success:function(result)
				{
					document.getElementById("menu_favorit_"+index).checked = true;
					jumlah_menu_favorit++;
					$("#jumlah_menu_favorit").val(jumlah_menu_favorit);
				}
			})
		}
		else if(checkBox.checked == false){
			$.ajax({
				url: "{{route('ubah_status_produk_premium')}}",
				method: "post",
				data : {id:id, _token:'{{csrf_token()}}'},
				success:function(result)
				{
					document.getElementById("menu_favorit_"+index).checked = false;
					jumlah_menu_favorit--;
					$("#jumlah_menu_favorit").val(jumlah_menu_favorit);
				}
			})
		}
		else{
			document.getElementById("menu_favorit_"+index).checked = false;
			alert('maksimal menu 3');
			
		}
		
	}


	function tambah_foto_toko(id) {
		$("#foto_toko_"+id).click();
		$("#foto_toko_"+id).change(function () {
			readURL(this, id);
		});

	}



	function readURL(input, id) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#pic_toko_privew_'+id).attr('src', e.target.result);
				$("#div_pic_toko_privew_"+id).prop('hidden', false);
				$("#div_pic_toko_"+id).prop('hidden', true);
			}
			reader.readAsDataURL(input.files[0]);
			$("#button_foto_maps_"+id).click();
		}
	}

	function tambah_video(i){
		$('#tampil-video').empty();
		$('#link_video').val('');
		$('#modal-video').modal('show');
		$('#nomor_div').val(i);
	}



	function input_focus(id){
		$("#div_"+id).css('border', '1px solid #d1d2d4');
	}

	function input_blur(id){
		$("#div_"+id).css('border', '1px solid white');		
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

	function simpan_video(){
		var link = $('#link_video').val();
		var nomor_div = $('#nomor_div').val();
		$.ajax({
			url: "{{route('simpan_video_landing_page')}}",
			method: "post",
			data : {link:link, no:nomor_div, _token:'{{csrf_token()}}'},
			success:function(result)
			{
				$('#modal-video').modal("hide"); 
				$('#link_video').val('');
				$('#nomor_div').val('');
				var edit = "<?=url('/')?>/public/img/icon_svg/pencil_circle_white.svg";
				var hapus = "<?=url('/')?>/public/img/icon_svg/trash_circle_red.svg";
				$('#div_pic_video_'+nomor_div).html('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'+result+'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius: 1em;"></iframe>'+
					'<div style="position: absolute; right: 10px; top: -1em; display: flex;">'+
					'<div style="width: 2.5em;  background: #262627; display: flex; justify-content: center; border-radius: 50%;">'+
					'<img src="'+edit+'" style="width: 90%;">'+
					'</div>'+
					'<div style="width: 2.5em; background: #262627; display: flex; justify-content: center; border-radius: 50%;">'+
					'<img src="'+hapus+'" style="width: 90%;">'+
					'</div>'+
					'</div>');
			}
		})
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
	})

	var toko = {!! json_encode($fasilitas_toko) !!};
	var id_fasiltas_toko;
	var index;

	function tampilkan_fasiiltas(id){
		$('#judul_service').val(toko[id]['judul']);
		$('#keterangan_fasilitas').val(toko[id]['keterangan']);
		id_fasiltas_toko = toko[id]['id'];
		index = id;
	}

	function simpan_fasilitas_toko(){
		var judul = $('#judul_service').val();
		var keterangan = $('#keterangan_fasilitas').val();
		$.ajax({
			url: "{{route('post_fasilitas_toko')}}",
			method: "post",
			data: {id:id_fasiltas_toko, judul:judul, keterangan:keterangan, _token:'{{csrf_token()}}'},
			success:function(){
				alert('tersimpan');
				toko[index]['judul'] = judul;
				toko[index]['keterangan'] = keterangan;
			}
		})
	}

	function tambah_icon(){
		$('#modal-fasilitas').modal('show');
	}

	function tambah_icon_pilih(){
		$('#icon').click();
		$("#icon").change(function(){
			tampilkan_icon_baru(this);
		});
	}

	function tampilkan_icon_baru(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#icon_baru_preview').attr('src', e.target.result);
				$("#div_icon_baru_preview").prop('hidden', false);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	function modal_ubah_fasilitas(judul, keterangan, id){
		$('#modal-ubah-fasilitas').modal('show');
		$('#judul_service').val(judul);
		$('#keterangan_fasilitas').val(keterangan);
		$('#id_ubah_fasilitas').val(id);
	}

	function pilih_foto_cover(){
		$('#foto_cover').click();
		$("#foto_cover").change(function () {
			$('#button_foto_cover').click();
			console.log(this);
			tampilkan_cover(this);
		});
	}

	var src_cover;
	function tampilkan_cover(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#preview_cover').attr('src', e.target.result);
				src_cover = e.target.result;
				$("#div_preview_cover").prop('hidden', false);
				$("#div_pilih_cover").prop('hidden', true);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$(document).ready(function(){
		$('#upload_cover').on('submit', function(event){
			event.preventDefault();
			$.ajax({
				url:"{{ route('simpan_cover_landing_page') }}",
				method:"POST",
				data:new FormData(this),
				dataType:'JSON',
				contentType: false,
				cache: false,
				processData: false,
				success:function(data)
				{
					alert("data");
					$('#preview_cover').attr('src', src_cover);
				}
			});
		});
	});

	$(document).ready(function(){
		$('#form_foto_maps_1').on('submit', function(event){
			event.preventDefault();
			$.ajax({
				url:"{{ route('simpan_foto_maps') }}",
				method:"POST",
				data:new FormData(this),
				dataType:'JSON',
				contentType: false,
				cache: false,
				processData: false,
				success:function(data)
				{
					alert("data");
					$('#preview_cover').attr('src', src_cover);
				}
			});
		});
	});

	$(document).ready(function(){
		$('#form_foto_maps_2').on('submit', function(event){
			event.preventDefault();
			$.ajax({
				url:"{{ route('simpan_foto_maps') }}",
				method:"POST",
				data:new FormData(this),
				dataType:'JSON',
				contentType: false,
				cache: false,
				processData: false,
				success:function(data)
				{
					alert("data");
					$('#preview_cover').attr('src', src_cover);
				}
			});
		});
	});

	$(document).ready(function(){
		$('#form_foto_maps_3').on('submit', function(event){
			event.preventDefault();
			$.ajax({
				url:"{{ route('simpan_foto_maps') }}",
				method:"POST",
				data:new FormData(this),
				dataType:'JSON',
				contentType: false,
				cache: false,
				processData: false,
				success:function(data)
				{
					alert("data");
					$('#preview_cover').attr('src', src_cover);
				}
			});
		});
	});

	
</script>
@endsection
