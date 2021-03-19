@extends('layouts.home_premium')

@section('title')

@endsection

@section('header-scripts')
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
-->

<meta property="og:url"           content="https://www.m.kitapura.com/{{$toko->username}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="KitaPura Mall | {{$toko->username}}" />
<meta property="og:description"   content="KitaPura Mall" />
<meta property="og:image"         content="{{asset('public/img/icon.png')}" />


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
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
		border-bottom-left-radius: 1.5em; 
		border-top-left-radius: 1.5em; 
		padding-left: 1.2em;
	}


	.form-control-mall {
		height: 2.5em; 
		border-bottom-right-radius: 1.5em; 
		border-top-right-radius: 1.5em; 
		border-left: none;	
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
		border: 1px solid white;		
	}

	.analitik-active {
		color: white;
		background: #dd9d25;
		border: 1px solid #dd9d25;
	}

	.card-menu-premium {
		background: transparent; 
		display: flex; 
		justify-content: center; 
		margin-top: .5em; 
		flex-direction: column; 
		align-items: center;		
		border-radius: 1.5em;
	}

	.modal-dialog-bottom{
		margin: 0;
		display: flex;
		align-items: flex-end;
		height: 100%;

	}  

	.share_platform {
		background: #DD9D25;
		width: 3em;
		height: 3em;
		border-radius: 50%;
		display: flex; 
		justify-content: center;
		align-items: center;		
		margin: 0.5em 0.5em 0em 0.5em;
	}

</style>

@endsection

@section('content')

@if(Session::get('message') == 'Data Toko Berhasil Diperbarui')
<div class="modal fade" id="modal-berhasil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: 0em 0em 0em 0em; color: white; border: none; box-shadow: none;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: 30%; right: 1em;">
				<img src="<?=url('/')?>/public/img/modal_assets/modal_simpan_premium.svg" style="width: 100%;">
				<div style="position: absolute; margin: 3% 1.5em 0em 1.5em; padding: 0em 1.5em 0em 1.5em; top: 60%;">
					<div style="font-size: 2em; font-weight: 600; text-align: center;">Tersimpan</div>
					<div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 1.2em;">Perubahan toko telah <br>berhasil disimpan</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif

@if(Session::get('message') == 'Silahkan Masukan Produk')
<div class="modal fade" id="modal-masukan-produk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 3em 0em 3em; color: white; background: #FF006E;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -8em; right: -2em; z-index: 5;">
				<img src="<?=url('/')?>/public/img/mitra/modal_product.svg" style="width: 100%; position: absolute; top: -18.5em;">
				<div style="font-size: 1.8em; font-weight: 600; margin-top: 3em;">Produk Belum Ada</div>
				<div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 0.5em;">Silahkan Masukan Produk Terlebh Dahulu</div>
				<a href="<?=url('/')?>/akun/mitra/premium/daftar-produk" class="btn btn-primary" style="margin-bottom: 0.5em; font-size: 1.1em;margin-top: 0em; text-align: center; color: white;">Atur Produk
				</a>
			</div>
		</div>
	</div>
</div>
@endif

<div class="modal fade" id="modal-share-landing-page" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 2em 0em 2em; color: white;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0; width: 90%;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: -1em; z-index: 5;">
				<div style="font-size: 1.5em; font-weight: 600; margin-top: 0em;">Bagikan Website Kamu!</div>
				<div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 0.5em;">

					<div style="background: #1E1E1F; padding: 1em 1em; border-radius: 2em; position: relative; margin-top: 0.5em; margin-bottom: 0.5em;">
						<input type="text" id="link_toko_2" style="cursor: pointer; color: white;width: 100%; background: #1E1E1F; font-weight: 500;" value="kitapuramall.com/{{$toko->username}}" readonly>
					</div>
					<div class="share_div" style="display: flex; justify-content: center; margin-top: 0.5em;">
						<div id="salin-link-2" class="share_platform" data-toggle="tooltip" data-placement="bottom" title="Salin Link" style="cursor: pointer;" onclick="copy_text('2')">
							<img src="<?=url('/')?>/public/img/icon_svg/copy_white.svg">
							<input type="hidden" id="link_toko_2" value="kitapura.com/{{$toko->username}}" readonly>
						</div>
						<div onclick="link_fb()" class="share_platform" style="background: #3b5998;">
							<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.m.kitapura.com%2F{{$toko->username}}"><i class="fab fa-facebook-f text-white" style="font-size: 1.5em;"></i></a>
						</div>
						<div class="share_platform" onclick="WhatsappMessage()" style="background: #25d366; padding-bottom: 0.1em; padding-left: 0.1em;">
							<i class="fab fa-whatsapp" style="font-size: 2em;"></i>
						</div>

						<!-- <div class="share_platform" style="background: #1da1f2; padding-left: 0.1em;">
							<i class="fab fa-twitter" style="font-size: 1.8em;"></i>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="modal-atur-maps" class="modal fade" id="modal-trigger-location" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-bottom" role="document" style="padding: 0px; overflow-y: initial !important;">
		<div class="modal-content" style="border-radius: 1em; background: #eaf4ff; display: flex; justify-content: center; align-items: center; border-bottom-left-radius: 0em; border-bottom-right-radius: 0em;">
			<div class="modal-body" style="width: 100%;height: 80vh; overflow-y: auto;">
				@for ($i = 0; $i < 3; $i++)
				<div class="input-group mb-2 div-input-mall-square" id="div_foto_toko_{{$i}}" style="margin-top: 1em; background: white; border-radius: 1.2em;">
					<div style="text-align: center; width: 100%; margin-top: 1.2em; margin-bottom: 0.8em;">Foto Maps {{$i+1}} </div>
					<div style="display: flex; justify-content: center; width: 100%; border: 2px dashed #0066ff; margin: 0px 10% 2em 10%; height: 11.5em; cursor: pointer;" onclick='tambah_foto_toko("{{$i}}")' id="div_pic_toko_{{$i}}">
						<img src="<?=url('/')?>/public/img/icon_svg/plus_circle.svg" style="width: 2em;">
					</div>
					<div style="display: flex; justify-content: center; width: 100%; margin: 0px 10% 2em 10%; height: 11.5em;" id="div_pic_toko_privew_{{$i}}" hidden>
						<img id="pic_toko_privew_{{$i}}" src="<?=url('/')?>/public/img/img.jpg" style="width: 100%; object-fit: cover;height: 100%;">
						<img id="pic_toko_{{$i}}" src="<?=url('/')?>/public/img/icon_svg/plus_circle.svg" onclick='tambah_foto_toko("{{$i}}")' style="position: absolute; right: 1em; bottom: 1em;">

					</div>

					<input hidden type="file" name="foto_toko_{{$i}}" id="foto_toko_{{$i}}" required>
				</div>
				@endfor
			</div>
		</div>
	</div>
</div>


<header class="style__Container-sc-3fiysr-0 header" style="background:#353535; padding-top: 0.3em;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh">
		<a onclick="show_loader()" href="<?=url('/')?>/akun" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; padding-bottom: 0.3em; padding-right: 0.7em;">
			<img src="<?=url('/')?>/public/img/back_white.svg">
		</a>
		<a onclick="show_loader()" id="defaultheader_logo" title="Kitabisa" style="height: 100%; width: 70%; display: flex; justify-content: center; align-items: center;">
			<img src="<?=url('/')?>/public/img/logo_premium.svg" style="height: 80%;">
		</a>
		<a onclick="show_loader()" href="<?=url('/')?>/{{Auth()->user()->toko->username}}" style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center;">
			<img src="<?=url('/')?>/public/img/icon_svg/landing_page.svg" style="width: 100%;">
		</a>
	</div>
</header>


@php $url = url('/')."/public/img/home/bg-premium.svg"; @endphp
<main id="homepage" class="homepage" style='background: transparent; padding: 5em 0px 0px 0px;'>
	<div>
		<div style="padding: 0px 16px 1em;">
			<h3 style="color: white; font-size: 1.75rem; font-weight: 500;">Transaksi</h3>
			<div style=" display: flex; justify-content: space-between; align-items: center;">
				<div style="font-size: 1em; line-height: 1.2em; color: #a1a4a8;">Statistik</div>
				<div style="display: flex; font-size: 0.7em;color: #a1a4a8;">
					<div class="btn-menu-analitik analitik-active" id="menu_pekanan" onclick="lihat_chart('pekanan')">Mingguan</div>
					<div class="btn-menu-analitik" id="menu_bulanan" onclick="lihat_chart('bulanan')">Bulanan</div>
				</div>				
			</div>
		</div>
		<div class="grafis" style="">
			<canvas id="chart-pekanan"></canvas>
			<canvas id="chart-bulanan" hidden></canvas>
		</div>
		<div class="card-menu-premium" style="margin-top: 0em;padding-top: 0px;">
			<div style="margin-top: 0em; background: transparent; padding: 0.5em; display: flex; justify-content: center; border-radius: 1.5em; font-size: 0.75em;">
			</div>
			<div style="width: 100%;">
				<div class="statis" style="width: 100%; display: flex; justify-content: center; flex-direction: column; color: #a1a4a8;">
					<div style="display: flex; justify-content: space-around;" hidden>
						<div class="item-statis" style="display: flex; justify-content: center;">
							<div style="margin-left: 0.5em;">
								<hr style="border: 3px solid #dd9d25; border-radius: 1.5em; width: 1.5em; margin-bottom: 0em;">
								<div style="margin-top: 1px;font-size: 1.6em; font-weight: 700; margin-bottom: 0em; text-align: center; color: white;">1000</div>
								<div style="font-size: 0.7em; margin-top: 0em; line-height: 0.3em; margin-bottom: 1.2em; text-align: center; color: white;">Pengujung</div>
							</div>
						</div>
						<div class="item-statis" style="display: flex; justify-content: center;">
							<div style="margin-left: 0.5em;">
								<hr style="border: 3px solid #dd9d25; border-radius: 1.5em; width: 1.5em; margin-bottom: 0em;">
								<div style="font-size: 1.6em; color: white; font-weight: 700; margin-bottom: 0em; text-align: center;">1000</div>
								<div style="font-size: 0.7em; margin-top: 0em; line-height: 0.3em; margin-bottom: 1.2em; text-align: center; color: white;">Transaksi</div>
							</div>
						</div>

					</div>
				</div>
			</div>			
		</div>
		<div style="width: 100%; display: flex; justify-content: center;">
			<div style="width: 80%; background: #1E1E1F; padding: 1em 1.5em; border-radius: 2em; position: relative; margin-top: 0.5em; margin-bottom: 0.5em;" >
				<div id="salin-link-1" data-toggle="tooltip" data-placement="bottom" title="Salin Link" style="cursor: pointer;" onclick="copy_text('1')">
					<input type="text" id="link_toko_1" style="cursor: pointer; color: white;width: 100%; background: #1E1E1F; font-weight: 500;" value="kitapuramall.com/{{$toko->username}}" readonly>
				</div>
				<div style="cursor: pointer; width: 2.5em; height: 2.5em; background: #DD9D25; border-radius: 50%; display: flex; justify-content: center; position: absolute; right: 0.6em; bottom: 0.6em;" onclick="share_button()"><img src="<?=url('/')?>/public/img/icon_svg/share.svg" style="width: 60%;"></div>
			</div>
		</div>

		<div style="display: flex;justify-content:center;flex-direction: column; align-items: center; padding-bottom: 1.2em;">
			<a onclick="show_loader()" href="<?=url('/')?>/akun/mitra/premium/ubah-toko" style="padding-left: 0.4em;">
				<img src="<?=url('/')?>/public/img/button/toko_premium/atur_toko.svg" style="width: 100%;">
			</a>
			<a onclick="show_loader()" href="<?=url('/')?>/akun/mitra/premium/atur-produk" style="padding-left: 0.4em;">
				<img src="<?=url('/')?>/public/img/button/toko_premium/atur_produk.svg" style="width: 100%;">
			</a>
			<a onclick="show_loader()" href="<?=url('/')?>/akun/mitra/premium/ubah-landing-page" style="padding-left: 0.4em;">
				<img src="<?=url('/')?>/public/img/button/toko_premium/atur_landing_page.svg" style="width: 100%;">
			</a>
			<a onclick="show_loader()" href="<?=url('/')?>/akun/mitra/premium/ganti-landing-page" style="padding-left: 0.4em;">
				<img src="<?=url('/')?>/public/img/button/toko_premium/ganti_landing_page.svg" style="width: 100%;">
			</a>
			<a onclick="show_loader()" href="<?=url('/')?>/akun/mitra/premium/list-pesanan" style="padding-left: 0.4em;" hidden>
				<img src="<?=url('/')?>/public/img/button/toko_premium/list_pesanan.svg" style="width: 100%;">
			</a>
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

@endsection

@section('footer-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"></script>
<script type="text/javascript">


	@if(Session::has('message'))
	// $('#modal-pemberitahuan').modal('show');
	@endif

	@if(Session::get('message') == 'Data Toko Berhasil Diperbarui')
	$('#modal-berhasil').modal('show');
	@endif

	var label_bulanan = [];
	var jumlah_bulanan = [];
	var point_radius_bulanan = [0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0];
	var label_pekanan = []
	var jumlah_pekanan = [];
	var point_radius_pekanan = [0, 5, 5, 5, 5, 5, 5, 5, 0];
	<?php for ($i = 0; $i < count($data_bulanan_bulan); $i++){ ?>
		label_bulanan.push(["<?=$data_bulanan_bulan[$i]?>"]);
		jumlah_bulanan.push("<?=$data_bulanan_transaksi[$i]?>");
	<?php } ?>
	label_bulanan.push([""]);
	jumlah_bulanan.push(0);
	var maxJumlah_bulanan = Math.max.apply(Math, jumlah_bulanan)/2;
	var color_bulanan = ["#ffaa00", "#ffaa00", "#ffaa00", "#ffaa00","#ffaa00", "#ffaa00","#ffaa00", "#ffaa00","#ffaa00", "#ffaa00","#ffaa00", "#ffaa00"];


	var label_pekanan = []
	var jumlah_pekanan = [];
	var point_radius_pekanan = [0, 5, 5, 5, 5, 5, 5, 5, 0];
	<?php for ($i = 0; $i < count($data_pekanan_hari); $i++){ ?>
		label_pekanan.push(["<?=$data_pekanan_hari[$i]?>"]);
		jumlah_pekanan.push("<?=$data_pekanan_transaksi[$i]?>");
	<?php } ?>
	label_pekanan.push([""]);
	jumlah_pekanan.push(0);
	var maxJumlah_pekanan = Math.max.apply(Math, jumlah_pekanan)/2;
	var color_pekanan = ["#ffaa00", "#ffaa00", "#ffaa00", "#ffaa00","#ffaa00", "#ffaa00", "#ffaa00"];
	create_chart(label_bulanan, jumlah_bulanan, color_bulanan, "chart-bulanan", 10, point_radius_bulanan, 13);
	create_chart(label_pekanan, jumlah_pekanan, color_pekanan, "chart-pekanan", 10, point_radius_pekanan, 8);

	function atur_maps(){
		$("#modal-atur-maps").modal('show');
	}

	function share_button(){
		$("#modal-share-landing-page").modal('show')
	}

	function tambah_foto_toko(i){
		$("#foto_toko_"+i).click();
	}	

	$("#foto_toko_0").change(function(){
		readURL(this, "0");
	});
	$("#foto_toko_1").change(function(){
		readURL(this, "1");
	});
	$("#foto_toko_2", "2").change(function(){
		readURL(this);
	});	

	@if(Session::get('message') == 'Silahkan Masukan Produk')
	$("#modal-masukan-produk").modal('show');
	@endif


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


	function readURL(input, id) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#pic_toko_privew_'+id).attr('src', e.target.result);
				$("#div_pic_toko_privew_"+id).prop('hidden', false);
				$("#div_pic_toko_"+id).prop('hidden', true);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	function create_chart(label, jumlah, color, target, margin_top, point_radius, end_data){
		var chartData = {
			labels: label,
			datasets: [{
				data: jumlah,
				backgroundColor: color,
				strokeColor: color,   
			}]
		};

		var ctx = document.getElementById(target);
		var ctx_gradient = ctx.getContext("2d");
		var gradientFill = ctx_gradient.createLinearGradient(0, 50, 0, 150);
		gradientFill.addColorStop(1, "transparent");
		gradientFill.addColorStop(0, "#dc961c");

		var data = {
			labels: label,
			datasets: [{
				data: jumlah,
				fill: true,
				borderColor: "#ffaa00",
				pointBackgroundColor: "#1c1e1e",
				pointRadius: point_radius,
				pointBorderWidth: 2,
				backgroundColor: gradientFill,    			

			}]
		}

		Chart.defaults.global.defaultFontSize = "10";
		Chart.defaults.global.defaultFontColor = "white";
		var myChart = new Chart(ctx, {
			type: 'line',
			label: '90',
			data: data,
			options: {
				"hover": {
					"animationDuration": 4
				},
				"animation": {
					"duration": 1,
					"onComplete": function() {
						var chartInstance = this.chart,
						ctx = chartInstance.ctx;
						ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
						ctx.textAlign = 'center';
						ctx.textBaseline = 'bottom';
						this.data.datasets.forEach(function(dataset, i) {
							var meta = chartInstance.controller.getDatasetMeta(i);
							meta.data.forEach(function(bar, index) {
								if ((index != 0) && (index != end_data)){
									var data = dataset.data[index];
									ctx.fillStyle = "white";
									ctx.fillText(data, bar._model.x, bar._model.y - 5);
								}
							});
						});
					}
				},
				datasetFill: true,
				legend: {"display": false},
				tooltips: {"enabled": false},
				scales: {
					yAxes: [{
						display: false,
						gridLines: {display: true},
						ticks: {
							max: Math.max(...data.datasets[0].data) + margin_top,
							display: false,
							beginAtZero: true,
							padding: 25
						},
					}],
					xAxes: [{
						gridLines: {display: false},
						ticks: {beginAtZero: true}
					}]
				}
			}
		});
	}

</script>

<script>
	function copy_text(id) {
		var text = "Halo, Silahkan kunjungi toko saya di link berikut: "
    	var url = document.getElementById("link_toko_"+id).value;
		var copyurl = document.getElementById("link_toko_"+id);
		copyurl.value = text + "https://" + url;   
		// alert(copyurl.value);
		copyurl.select();
		copyurl.setSelectionRange(0, 99999); /* For mobile devices */
		document.execCommand("copy");
		document.getElementById("link_toko_"+id).value = url;

		$(document).ready(function(){
            $('#salin-link-'+id).attr('title', 'Link Berhasil Disalin !')
                  .tooltip('dispose')
                  .tooltip({ title: 'Link Berhasil Disalin'});
            $('#salin-link-'+id).tooltip('show');
		});

	}

	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});

	var isMobile = mobilecheck();

	function mobilecheck() {
		var check = false;
		(function (a) {
			if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i
				.test(a) ||
				/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i
				.test(a.substr(0, 4))) check = true;
		})(navigator.userAgent || navigator.vendor || window.opera);
		return check;
	}

	function WhatsappMessage() {

		var text = "Halo, Silahkan kunjungi toko saya di link berikut: "
    	var url = document.getElementById("link_toko_2").value;
		var copyurl = document.getElementById("link_toko_2");
		var url = text + "https://" + url;   
		var apilink = 'http://';
		var message = url;
		apilink += isMobile ? 'api' : 'web';
		apilink += '.whatsapp.com/send?text=' + encodeURI(message);

		window.open(apilink);
	}

	function link_fb() {
		var text = "Halo, Silahkan kunjungi toko saya di link berikut: "
    	var url = document.getElementById("link_toko_2").value;
		var copyurl = document.getElementById("link_toko_2");
		copyurl.value = text + "https://" + url;   
		// alert(copyurl.value);
		copyurl.select();
		copyurl.setSelectionRange(0, 99999); /* For mobile devices */
		document.execCommand("copy");
		document.getElementById("link_toko_2").value = url;
	}


</script>

@endsection
