@extends('layouts.home_no_menu')

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
		flex-direction: column; 
		align-items: center; 
		margin: 0em 0em 0em 0.5em; 
		width: 60%;		
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

	.qty .count {
    color: #000;
    display: inline-block;
    vertical-align: top;
    font-size: 16px;
    font-weight: 70;
    line-height: 30px;
    padding: 0 2px
    ;min-width: 35px;
    text-align: center;
	}
	.qty .plus {
		cursor: pointer;
		display: inline-block;
		vertical-align: top;
		color: white;
		width: 20px;
		height: 20px;
		font: 16px/1 Arial,sans-serif;
		text-align: center;
		border-radius: 50%;
		}
	.qty .minus {
		cursor: pointer;
		display: inline-block;
		vertical-align: top;
		color: white;
		width: 20px;
		height: 20px;
		font: 16px/1 Arial,sans-serif;
		text-align: center;
		border-radius: 50%;
		background-clip: padding-box;
	}
	.minus:hover{
		background-color: #717fe0 !important;
	}
	.plus:hover{
		background-color: #717fe0 !important;
	}
	/*Prevent text selection*/
	span{
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
	}
	input{  
		border: 0;
		width: 2%;
	}
	nput::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}
	input:disabled{
		background-color:white;
	}
</style>
@endsection	

@section('content')


<header class="style__Container-sc-3fiysr-0 header" style="background: white;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: space-between;">
		<a href="<?=url('/')?>/akun" style="padding-left: 1em;">
			<img src="<?=url('/')?>/public/img/back_black.svg">
		</a>
		<a id="defaultheader_logo" title="Kitabisa" style="margin-left: 20px; height:33px;margin-right:20px" href="/">
			<img src="<?=url('/')?>/public/img/logo_black.svg">
			<img src="<?=url('/')?>/public/img/logo_text_black.svg">
		</a>
		<div style="margin-right: 2.5em;">
			<img src="<?=url('/')?>/public/img/back.svg" hidden>
		</div>
	</div>
</header>

{{-- modal --}}
<div id="modal_pesan" class="modal fade" id="modal-trigger-location" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-bottom" role="document" style="padding: 0px; overflow-y: initial !important;">
		<div class="modal-content" style="border-radius: 1em; background: #eaf4ff; display: flex; justify-content: center; align-items: center; border-bottom-left-radius: 0em; border-bottom-right-radius: 0em; border: none;">
			<div class="modal-body" style="width: 100%;height: 80vh; overflow-y: auto;">
				<div class="input-group mb-3 div-input-mall-square" id="div_foto_toko" style="margin-top: 1em; background: white; border-radius: 1.2em;">
					<div style="display: flex; justify-content: center; width: 100%; margin: 0px 10% 2em 10%; height: 11.5em;" id="div_edit_pic_toko_privew">
						<img id="pic_edit_toko_privew" src="<?=url('/')?>/public/img/img.jpg" style="width: 100%; object-fit: cover;height: 100%;">
					</div>

					<input hidden type="file" name="edit_foto_toko" id="edit_foto_toko" required>
				</div>
				<form action="<?=url('/')?>/akun/post/pesanan" method="post">
					{{ csrf_field() }}
					<input type="text" name="jumlah_pesanan" id="hidden_nilai" hidden>
					<input type="text" name="id_produk" id="id_produk" hidden>
					<input type="text" name="harga" id="harga" hidden>
					<h4>Jumlah Pesanan</h4>
					<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: center;">
						<div id="defaultheader_search" class="style__SearchInput-sc-3fiysr-3 sUjAJ">
							pesanan
							<div style="float: right">
								<div class="qty">
									<span class="minus bg-dark">-</span>
									<input type="number" class="count" value="1">
									<span class="plus bg-dark">+</span>
								</div>
							</div>
						</div>
					</div>
	
					<h4>Ketersedian</h4>
					<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: center;">
						<div id="defaultheader_search" class="style__SearchInput-sc-3fiysr-3 sUjAJ">
							Stok
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="customSwitches">
								<label class="custom-control-label" for="customSwitches"></label>
							</div>
						</div>
					</div>
	
					<div style="display: flex; justify-content: space-around; background: transparent;">
						<button type="submit" class="btn btn-primary" style="background: #ffaa00;border: 1px solid #ffaa00; border-radius: 1.5em;  width: 40%; margin-bottom: 1em;">Simpan
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
{{-- end modal --}}

<main id="homepage" class="homepage" style="padding-top: 6em; background: #eaf4ff;">
<div style="display: flex; justify-content: center; flex-direction: column;">
    <h4>Input Pesanan Toko</h4>
    <div style="text-align: justify; font-size: 0.8em; line-height: 1.2em; color: #a1a4a8;">Dengan memasukkan pesananan memudahkan anda menidentifikasi total transaksi kamu perbulan/minggu/tahun</div>
    <div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: center;">
		<div id="defaultheader_search" class="style__SearchInput-sc-3fiysr-3 sUjAJ">
			<span></span>
			<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="svg-inline--fa fa-search fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="color: #dedede;">
				<path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
			</svg>
		</div>
	</div>
    
	<div style="width: 100%; display: flex; flex-wrap: wrap; justify-content: space-between; padding-left: 0em;">
		@foreach ($produk as $item)
		<div class="slider-toko" style="margin-bottom: 1em; margin-left: 0px;">
			<img src="<?=url('/')?>/public/img/product/{{$item->foto}}">
			<div style='text-align: left; font-size: 0.75em; padding: 0.6em 1em 0.7em 1em; width: 100%; background: #f3a301; color: white; background-size: cover; position: relative;'>
				<div style="position: absolute; top: -1.8em; z-index: 0; width: 3.5em; height: 3.5em; background: #ed9f01; box-shadow: rgba(0, 0, 0, 0.3) 0px 2px 4px 1px; border-radius: 50%; right: 0.5em; display: flex; justify-content: center; align-items: center;" onclick='modal_pesan("{{$item->foto}}", "{{$item->id}}", "{{$item->harga}}")'>
					<img src="<?=url('/')?>/public/img/icon_svg/transaksi.svg" style="width: 1.5em; height: 1.5em;">
				</div>
				<div style="font-weight: 500; margin-top: 0em;">{{$item->nama}}</div>
				<div style="font-size: 0.7em; line-height: 1.2em; font-weight: 0;">{{$item->jenis}}</div>


				<span style="padding: 0; margin: 0.1em 0px 0px 0px; font-size: 0.6em; line-height: 0.7em; vertical-align: center;">
					<s>IDR. {{$item->harga}}</s>
				</span>
				<span style="padding: 0; margin: 0.1em 0px 0px 0.5em; font-size: 0.9em; line-height: 0.6em; font-weight: 500;">IDR. {{$item->harga}}</span>
				<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.7em; line-height: 0.5em;">
					Stok : {{$item->stok}}
				</div>
			</div>
		</div> 
		@endforeach

		{{-- <div class="slider-toko" style="margin-bottom: 1em; margin-left: 0px;">
			<img src="<?=url('/')?>/public/img/product/TKO-1204012490124/product_1.png">
			<div style='text-align: left; font-size: 0.75em; padding: 0.6em 1em 0.7em 1em; width: 100%; background: #f3a301; color: white; background-size: cover; position: relative;'>
				<div style="position: absolute; top: -1.8em; z-index: 0; width: 3.5em; height: 3.5em; background: #ed9f01; box-shadow: rgba(0, 0, 0, 0.3) 0px 2px 4px 1px; border-radius: 50%; right: 0.5em; display: flex; justify-content: center; align-items: center;">
					<img src="<?=url('/')?>/public/img/icon_svg/transaksi.svg" style="width: 1.5em; height: 1.5em;">
				</div>
				<div style="font-weight: 500; margin-top: 0em;">Nama Produk</div>
				<div style="font-size: 0.7em; line-height: 1.2em; font-weight: 0;">Makanan</div>


				<span style="padding: 0; margin: 0.1em 0px 0px 0px; font-size: 0.6em; line-height: 0.7em; vertical-align: center;">
					<s>IDR. 25.000</s>
				</span>
				<span style="padding: 0; margin: 0.1em 0px 0px 0.5em; font-size: 0.9em; line-height: 0.6em; font-weight: 500;">IDR. 5.000</span>
				<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.7em; line-height: 0.5em;">
					Stok : 42
				</div>
			</div>
		</div>  --}}
	</div>

	<h4>Jumlah Pesanan</h4>
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: center;">
		<div id="defaultheader_search" class="style__SearchInput-sc-3fiysr-3 sUjAJ">
			pesanan
			<div style="float: right">
				<div class="qty">
					<span class="minus bg-dark">-</span>
					<input type="number" class="count" name="qty" value="1">
					<span class="plus bg-dark">+</span>
				</div>
			</div>
		</div>
	</div>

	<h4>Ketersedian</h4>
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: center;">
		<div id="defaultheader_search" class="style__SearchInput-sc-3fiysr-3 sUjAJ">
			Stok
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" id="customSwitches">
				<label class="custom-control-label" for="customSwitches"></label>
			  </div>
		</div>
	</div>

	<a href="<?=url('/')?>/akun/pengaturan_toko/pesanan" class="btn btn-success" style="color: white">Simpan</a>
</div>
</main>

@endsection

@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script>
	$(document).ready(function(){
		    $('.count').prop('disabled', true);
   			$(document).on('click','.plus',function(){
				$('.count').val(parseInt($('.count').val()) + 1 );
				var nilai = $('.count').val();
				$('#hidden_nilai').val(nilai);
				
    		});
        	$(document).on('click','.minus',function(){
    			$('.count').val(parseInt($('.count').val()) - 1 );
    				if ($('.count').val() == 0) {
						$('.count').val(1);
					}
					var nilai = $('.count').val();
					$('#hidden_nilai').val(nilai);
    	    	});
				
 		});
</script>
<script>
	function modal_pesan(gambar, id_produk, harga){
		$("#pic_edit_toko_privew").attr('src', "<?=url('/')?>/public/img/product/"+gambar);
		$('#id_produk').val(id_produk);
		$('#harga').val(harga);
		$('#hidden_nilai').val(1);
		$("#modal_pesan").modal('show');
	}
</script>
@endsection
