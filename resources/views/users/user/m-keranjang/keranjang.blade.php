@extends('layouts.home_no_menu')

@section('title')
@endsection

@section('header-scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">

<style type="text/css">
	.banner {
		max-width: 480px;
		width: 100%;
		margin: 0px auto;
		padding: 4em 0em 4em 0em;
	}

	.header {
		background: #ff006e;
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
		border-radius: 1.5em;
		border: 1px solid white;
		display: flex;
		justify-content: center;
		flex-direction: column;
		align-items: flex-start;
		background: white;
		padding-top: 0.3em;
		padding-bottom: 0.3em;
	}

	.div-input-mall .label-mall {
		color: #b3b6bc;
		padding: 0em 0em 0em 1.5em;
		font-size: 0.75em;
		position: relative;
		top: 0.5em;
	}

	.div-input-mall div {
		display: flex;
		justify-content: flex-start;
		flex-direction: row;
		width: 90%;
	}



	.div-input-mall-square {
		border-radius: 0.5em;
		border: 1px solid white;
		color: #1c2645;
		font-weight: 600;
	}

	.form-control-mall-square {
		border-radius: 1.5em !important;
		padding-left: 1.5em;	
	}



	.input-group-text-mall {
		border: none;
		display: flex;
		justify-content: center;
		border-bottom-left-radius: 1.5em;
		border-top-left-radius: 1.5em;
		padding-left: 0.2em;
	}

	.form-control-mall {
		height: 3em; 
		border-left: none;	
		padding-left: 1em;	
		color: #1c2645;
		font-weight: 600;
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

	input:focus {
		border: none;
	}

	.form-control {
		border: none;
	}


	.profile-picture {
		background: transparent;
		border-radius: 50%;
		display: flex;
		width: 100%;
		border: 2px dashed white;
	}


	.select2-container--default .select2-selection--multiple .select2-selection__choice {
		background-color: #007bff;
		border-color: #006fe6;
		color: #fff;
		padding: 0 10px;
		margin-top: .31rem;
	}

	.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
		color: rgba(255, 255, 255, .7);
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


	body {
		background: #eaf4ff;
	}

	.form-group label {
		color: #b3b6bc;
		font-weight: 600;
		margin-bottom: 0.4em;	
		font-size: 0.9em;	
	}

	input[type="text"]:disabled{background-color:white;}	

	.cr-slider-wrap {
		display: none;
	}

	.homepage {
		min-height: calc(50vh - 60px);
	}
</style>
@endsection

@section('content')
<?php
$pemilik = "";
$no_hp = "";
$latitude = "";
$longitude = "";
$alamat = "";
$buka = "";
$tutup = "";
$hari = "";
if (!empty($_GET['pemilik'])){
	$pemilik = $_GET['pemilik'];
}
if (!empty($_GET['no_hp'])){
	$no_hp = $_GET['no_hp'];
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

?>

<div class="modal fade" id="modal-sukses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
		<div class="modal-content" style="border-radius: 1.2em; background: #ff006e; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<div class="container">
					<div class="panel panel-info">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4 text-center">
									<div id="upload-demo">

									</div>
								</div>
								<div class="col-md-4" style="padding:5%;">
									<input type="file" id="image" hidden>
									<div class="btn btn-primary btn-block" id="unggah_foto" onclick="unggah_foto()">Unggah Foto</div>
									<div id="div_upload" hidden>
										<button class="btn btn-primary btn-block upload-image" style="margin-top:2%" >Upload Image</button>
										<button class="btn btn-secondary btn-block" onclick="unggah_foto()">Unggah Foto</button>
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

<header class="style__Container-sc-3fiysr-0 header" >
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: space-between;">
		<a href="<?=url('/')?>/akun" style="padding-left: 1em;">
			<img src="<?=url('/')?>/public/img/back_white.svg">
		</a>
		<a id="defaultheader_logo" title="Kitabisa" style="margin-left: 20px; height:33px;margin-right:20px" href="/">
			<img src="<?=url('/')?>/public/img/logo.svg">
			<img src="<?=url('/')?>/public/img/logo_text.svg">
		</a>
		<div data-toggle="modal" data-target="#modal-ganti-pass" style="cursor:pointer;padding-right: 1em;">
			<img src="<?=url('/')?>/public/img/back_white.svg" hidden>
		</div>
	</div>
</header>


<main id="homepage" class="homepage" style="padding: 0px; background: #eaf4ff !important;">
	<div class="card-mall" style="display: flex; justify-content: center; position: relative; flex-direction: column; align-items: center; background: #eaf4ff; margin-top: 5em;">	
		@for ($i = 0; $i < count($data_keranjang); $i++)
		<div class="toko card-mall" style="width: 90%;">
			<div class="nama-toko">{{$data_keranjang[$i]['nama_toko']}}</div>
			<div class="daftar-product">
				@foreach ($data_keranjang[$i]['product'] as $row)
				<div class="product">
					<div class="deskripsi-product"> 
						<div class="nama">{{$row->nama}}</div>
						<div class="harga">{{$row->harga}}</div>
					</div>
					<div class="foto-product">
						<img src="<?=url('/')?>/public/img/toko/{{$data_keranjang[$i]['id_toko']}}/produk/240x240/{{$row->foto_produk}}">
					</div>
				</div>
				@endforeach
			</div>
		</div>
		@endfor
	</div>


</main>


@if(Session::has('message'))
<div id="modal-pemberitahuan" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="width: 100%;">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body text-center font-weight-bold py-3">
				{{Session::get('message')}}
				<div class="row mt-2 p-2">
					<a href="<?=url('/')?>/akun" type="button" class="col-sm-12 btn waves-effect waves-light btn-outline-secondary">Tutup</a>

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
<script src="<?=url('/')?>/public/template/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>


<script type="text/javascript">

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	var status_ganti_foto = 0;

	@if(Session::has('message'))
	$('#modal-pemberitahuan').modal('show');
	@endif

	@if(Session::has('pass_message'))
	$('#modal-ganti-pass').modal('show');
	@endif


	function pilih_jenkel(id, jenkel){
		$("#jenis_kelamin").val(jenkel);
		if (id == 'option_pria'){
			$("#option_pria").css('color', '#1c2645');
			$("#option_wanita").css('color', '#b3b7c0');
		}
		else {
			$("#option_wanita").css('color', '#1c2645');
			$("#option_pria").css('color', '#b3b7c0');
		}
	}

	function input_focus(id){
		$("#div_"+id).css('border', '1px solid #d1d2d4');
	}

	function input_blur(id){
		$("#div_"+id).css('border', '1px solid white');		
	}





	var resize = $('#upload-demo').croppie({
		enableExif: true,
		enableOrientation: true,    
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
    width: 300,
    height: 300,
        type: 'circle' //square
    },
    boundary: {
    	width: 300,
    	height: 300
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
		$("#div_upload").prop('hidden', false);
		$("#unggah_foto").prop('hidden', true);
		$("#prev_image").remove();
		reader.readAsDataURL(this.files[0]);
	});


	$('.upload-image').on('click', function (ev) {
		resize.croppie('result', {
			circle: false,
			type: 'canvas',
			size: 'viewport'
		}).then(function (img) {
			$.ajax({

				url: "<?=url('/')?>/akun/pengaturan-profil/simpan-foto",
				type: "POST",
				data: {"image":img},
				success: function (data) {
					$('#pic_toko_privew').attr('src', img);
					$("#modal-sukses").modal('hide');

				}
			});

		});
		status_ganti_foto = 1;

	});
	
	$( "#form_input").submit(function( event ) {
		show_loader();
	});

</script>
@endsection
