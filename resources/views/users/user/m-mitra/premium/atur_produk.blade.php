@extends('layouts.home_premium')

@section('title')

@endsection

@section('header-scripts')
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
		padding-top: 0.5em;
		width: 100%;
		color: white;
		text-align: center;
		padding-bottom: 0px;
		background-color: #353535;
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
		object-fit: cover;
		border-top-left-radius: 1em;
		border-top-right-radius: 1em;
	}

	.slider-toko > div {
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
		min-height: calc(20vh - 60px);
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



<main id="homepage" class="homepage" style='background: transparent; padding: 5em 0px 2em 0px;'>
	<div>
		<img src="<?=url('/')?>/public/img/mitra/background_premium.svg" style="object-fit: cover; position: fixed; top: -2em; z-index: -5; right: 0px;">
		<div>
			<div style="padding: 0px 16px 1em;">
				<h3 style="color: white;">Daftar Produk</h3>
				<div class="mb-3" style=" display: flex; justify-content: space-between; align-items: center;">
					<div style="font-size: 0.8em; line-height: 1.2em; color: #a1a4a8;">atur toko anda dan dapatkan ribuan pelanggan</div>
				</div>
				<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="border-radius: 3em;">
					<div style="width: 100%; padding-right: 0.5em;">
						<span class="input-group-text-mall">
						</span>
						<input type="text" class="form-control-mall" id="cari_produk" name="cari_produk" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Cari produk" aria-label="Cari produk" aria-describedby="basic-addon1" value=""style="width: 100%; height: 3em; margin-right: 1em;" required>
						<div style="width: 3em; height: 3em; background: #926c15; border-radius: 50%; padding: 1.5em; display: flex; justify-content: center;align-items: center;">
							<img src="<?=url('/')?>/public/img/icon_svg/search_white.svg">
						</div>
					</div>
				</div>

			</div>
		</div>
		<div style="width: 100%; display: flex; flex-wrap: wrap; justify-content: space-between; padding-left: 0em; padding: 0px 16px 4em;">
			@if ($produk->count() > 0)
			@foreach($produk as $row)
			<div class="slider-toko" style="margin-bottom: 1em; margin-left: 0px;">
				<?php $svg = "public/img/home/bg-slider-toko.svg"; ?>
				<img src="<?=url('/')?>/public/img/toko/{{$row->toko_id}}/produk/240x200/{{$row->foto_produk}}">
				<div style='text-align: left; font-size: 0.75em; padding: 0.6em 1em 0.7em 1em; width: 100%; color: white; background-size: cover; position: relative;' class="st0"> 
					<a href="{{url()->current()}}/{{$row->id}}/ubah" style="position: absolute; top: -1.8em; z-index: 0; width: 3.5em; height: 3.5em; background: #926c15; box-shadow: rgba(0, 0, 0, 0.3) 0px 2px 4px 1px; border-radius: 50%; right: 0.5em; display: flex; justify-content: center; align-items: center;">
						<img src="<?=url('/')?>/public/img/icon_svg/pencil.svg" style="width: 1.5em; height: 1.5em;">
					</a>
					<div style="font-weight: 500; margin-top: 0em;"><?=substr(strip_tags($row->nama), 0, 15)?>@if (strlen($row->nama) > 15)..@endif</div>
					<div style="font-size: 0.7em; line-height: 1.2em; font-weight: 0;">{{$row->kategori->nama}}</div>
					@if ($row->jenis_harga == 'Statis')
						@if($row->diskon == '0')
						<span style="padding: 0; margin: 0.1em 0px 0px 0px; font-size: 0.9em; line-height: 0.6em; font-weight: 500;">IDR. {{number_format($row->harga,0,',','.')}}</span>
						@else
						<span style="padding: 0; margin: 0.1em 0px 0px 0px; font-size: 0.6em; line-height: 0.7em; vertical-align: center;">
							<s>IDR. {{number_format($row->harga,0,',','.')}}</s>
						</span>
						@php
						$hasil_diskon = ($row->harga)-((($row->diskon)/100)*($row->harga));
						@endphp

						<span style="padding: 0; margin: 0.1em 0px 0px 0.5em; font-size: 0.9em; line-height: 0.6em; font-weight: 500;">IDR. {{number_format($hasil_diskon,0,',','.')}}</span>
						@endif
					@else
						<span style="padding: 0; margin: 0.1em 0px 0px 0px; font-size: 0.9em; line-height: 0.6em; font-weight: 500;">Harga Mulai IDR. {{number_format($row->harga_terendah,0,',','.')}}</span>

					@endif

					<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.7em; line-height: 0.5em;">
						Stok : {{$row->stok}}
					</div>
				</div>
			</div> 
			@endforeach
			@else
			@endif
		</div>

	</div>
	<div class="footer">
		<a onclick="show_loader()" href="<?=url('/')?>/akun/mitra/premium/atur-produk/tambah" class="container-mall" style="display: flex; justify-content: space-around; padding: 0px;">
			<img src="<?=url('/')?>/public/img/button/toko_premium/tambah_produk.svg" style="width: 100%;">
		</a>
	</div>


	@if(Session::has('message'))
	<div id="modal-pemberitahuan" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="width: 100%;">
		<div class="modal-dialog modal-sm modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body text-center font-weight-bold py-3">
					{{Session::get('message')}}
					<div class="row mt-2 p-2">
						<button type="button" class="col-sm-12 btn waves-effect waves-light btn-outline-secondary"
						data-dismiss="modal">Tutup</button>

					</div>
				</div>
			</div>
		</div>
	</div>
	@endif
</main>
@endsection

@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript">

	@if(Session::has('message'))	
	$('#modal-pemberitahuan').modal('show')
	@endif

	function tambah_foto_toko(){
		$("#foto_toko").click();
	}	

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#pic_toko_privew').attr('src', e.target.result);
				$("#div_pic_toko_privew").prop('hidden', false);
				$("#div_pic_toko").prop('hidden', true);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}


	function save_foto(){
		
	}


	$("#foto_toko").change(function(){
		readURL(this);
	});

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


</script>
@endsection
