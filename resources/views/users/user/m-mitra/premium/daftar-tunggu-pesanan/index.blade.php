@extends('layouts.home_premium')

@section('title')

@endsection

@section('header-scripts')
<?php
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
		<a style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center;">
			<img src="<?=url('/')?>/public/img/icon_svg/riwayat_circle.svg">
		</a>
	</div>
</header>



<main id="homepage" class="homepage" style='background: transparent; padding: 5em 0px 0px 0px;'>
	<div>
		<div style="padding: 0px 16px 1em;">
			<h3 style="color: white; font-size: 1.75rem; font-weight: 500;">List Pesanan</h3>
			<div style=" display: flex; justify-content: space-between; align-items: center;">
				<!--<div style="font-size: 1em; line-height: 1.2em; color: #a1a4a8;">Daftar product yang di</div>-->
			</div>
		</div>
		<div style="padding: 0px 16px 1em;">
			<div style="display: flex; flex-direction: column; justify-content: center; color: white; align-items: center;">
				<?php 
				$i=0; 
				$tanggal = 0;
				?>
				@for ($i = 0; $i < count($data_keranjang); $i++)
				@if ($tanggal != $data_keranjang[$i]['tanggal'])
				@php $tanggal = $data_keranjang[$i]['tanggal']; @endphp
				<div style=" display: flex; justify-content: space-between; align-items: center;">
					<div style="font-size: 1em; line-height: 1.2em; color: #a1a4a8;">{{tgl_indo(date('Y-m-d', strtotime($data_keranjang[$i]['tanggal'])))}}</div>
				</div>
				@endif
				<div class="st0" style="width: 100%; border-radius: 0.5em; margin-bottom: 0.5em; position: relative;">
					<div style="margin: 1em;">{{$data_keranjang[$i]['nama']}}</div>
					@foreach ($data_keranjang[$i]['product'] as $row)
					<div class="product" style="display: flex; justify-content: space-between; margin-bottom: 1em;">
						<a  href="<?=url('/')?>/{{$toko->username}}/daftar-menu/{{$row->product_id}}" class="foto-product" style="width: 30%; padding-left: 1em;">
							<img src="<?=url('/')?>/public/img/toko/{{$toko->id}}/produk/240x240/{{$row->foto_produk}}" style="width: 100%; border-radius: 1em;">
						</a>
						<div class="deskripsi-product" style="width: 60%; padding-left: 1em;"> 
							<div class="nama" id="nama_{{$row->id}}" style="font-size: 1em; color: white; font-weight: 500;"><?=ucwords(strtolower(substr(strip_tags($row->nama), 0, 35)))?>@if (strlen($row->nama) > 35)..@endif</div>
							<div class="harga" style="color: white;">IDR. {{number_format($row->harga,0,',','.')}}</div>
							<div class="button-detail" style="margin-top: 1em; display: flex; align-items: center;">
								<span>Jumlah</span>&nbsp;
								<span style="width: 3em; height: 2em; background: white; border-radius: 2em; color: #292929; display: flex; justify-content: center; align-items: center; margin-right: 0.2em; font-size: 0.7em; font-weight: 700;" id="jumlah_pesanan_<?=$row->id?>">{{$row->jumlah}}</span>
							</div>									
						</div>
					</div>				
					@endforeach
					<?php $keynota = $data_keranjang[$i]['keynota']; ?>
					<div style="width: 10%;display: flex; justify-content: center; position: absolute; right: 0; top: 0; height: 100%; border-top-right-radius: 0.5em; border-bottom-right-radius: 0.5em;"  onclick='hapus_daftar_tunggu("<?=$keynota?>")' class="st0">
						<img src="<?=url('/')?>/public/img/icon_svg/trash_white.svg" style="width: 60%;">
					</div>

				</div>
				<div style="background:linear-gradient(41.88deg, #4AAE20 35.3%, #5EE825 88.34%); box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.82);border-radius: 11px; width: 100%; padding: 0.4em; text-align: center; margin-bottom: 0.5em;">Hubungi via Whatsapp</div>
				<div style="background: linear-gradient(41.88deg, #EC7405 35.3%, #FFAA00 88.34%); box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.82);border-radius: 11px; width: 100%; padding: 0.4em; text-align: center; margin-bottom: 1em;" onclick='berhasil_daftar_tunggu("<?=$keynota?>")'>Berhasil Dikirim?</div>

				@endfor
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


</script>

@endsection
