@extends('layouts.home_no_menu')

@section('title')

@endsection

@section('header-scripts')
<style type="text/css">
	.banner {
		max-width: 480px;
		width: 100%;
		margin: 0px auto;
		padding: 4em 0em 4em 0em;

	}

	.class {
		
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
		box-shadow: rgba(152, 152, 152, 0.5) 0px 2px 8px 1px;
		border-radius: 1.5em;	
		margin-bottom: 1em;
	}

	.row-mall {
		background: white;
		margin-bottom: 1em;
		width: 100%;	
	}

	.kategori {
		padding: 0.8em 0em 1em 0em;
		display: flex; 
		position: relative; 
		top: -6em; 
		margin-bottom: -2em;
		z-index: 2;   
		overflow-y: visible; 
		margin: 0px; 			
		overflow-x: scroll;
		scrollbar-width: none; /* Firefox */
		-ms-overflow-style: none;  /* Internet Explorer 10+ */
	}


}
.kategori::-webkit-scrollbar { /* WebKit */
	width: 0;
	height: 0;
}



.product {
	overflow-y: visible; 
	overflow-x: auto; 		
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
	border-radius: 1.5em;         
	margin-bottom: 0.5em;  
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

.homepage {
	padding: 0;
}

.star-rating {
	color: #efff3b;
}

.star-no-rating {
	color: #c1c3be;
}

.kategori-tabs {
	display: flex; 
	justify-content: space-around;
	width: 90%;
}

.kategori-tabs > a {
	margin: 0em 0.6em 0em 0.6em;
	font-size: 1em;
}

.button-detail {
	display: flex;	
}

.button-detail > div{
	margin-right: 0.3em;
}

#bg {
	position: fixed; 
	max-width:480px;
	height: 200%;
	z-index: 0;
}
#bg img {
	position: absolute; 
	max-width:480px;
	z-index: -1;
	object-fit: cover;
	height: 50%;
}
</style>
@endsection

@section('content')
<div class="modal fade" id="modal-jadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
style="padding: 1.5em; padding: 0px;">
<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
	<div class="modal-content" style="border-radius: 1.2em; background: #9d0208; display: flex; justify-content: center; align-items: center;">
		<div class="modal-body">
			<div class="nama-toko" style="font-weight: 600; font-size: 1em; line-height: 1.1em; font-size: 1.2em; color: white;">Penilaian</div>
		</div>
		<hr style="border-top: 1px solid white; width: 100%;">
		<input type="text" name="nilai_rating" id="nilai_rating" value="" hidden>
		<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 2.5em; line-height: 1em;">
			<i class="far fa-star star-rating" id="rating_1" onclick="nilai_toko('1')"></i>
			<i class="far fa-star star-rating" id="rating_2" onclick="nilai_toko('2')"></i>
			<i class="far fa-star star-rating" id="rating_3" onclick="nilai_toko('3')"></i>
			<i class="far fa-star star-rating" id="rating_4" onclick="nilai_toko('4')"></i>
			<i class="far fa-star star-rating" id="rating_5" onclick="nilai_toko('5')"></i>
		</div>
		<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 80%; display: flex; flex-direction: column; color: white; font-size: 0.85em;">
			<button onclick="tambah_jadwal()" class="btn btn-primary" style="background: linear-gradient(41.88deg, #EC7405 35.3%, #FFAA00 88.34%);border: 1px solid #ff006e; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 100%; margin-bottom: 1em; margin-top: 1em; border: none;">Kirim
			</button>
		</div>
	</div>
</div>
</div>


<header class="style__Container-sc-3fiysr-0 header" style="background: transparent; padding-top: 0.3em;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh">
		<a href="<?=url('/')?>/{{Request::segment(1)}}/daftar-menu" style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; margin-left:1em;">
			<img src="<?=url('/')?>/public/img/icon_svg/back_circle_transparent.svg">
		</a>
		<a href="<?=url('/')?>/{{Request::segment(1)}}" style="height: 100%; width: 80%; display: flex; justify-content: center; align-items: center; font-size: 1.5em; font-weight: 600;">
			<span style="background: rgba(0, 0, 0, 0.2); padding: 0.2em 0.5em; color:#EAF4FF;">{{Request::segment(1)}}</span>
		</a>
		<a style="width: 15%; position: relative; right: 1em;">
			<img src="<?=url('/')?>/public/img/icon_svg/bag_circle_transparent.svg" hidden>
		</a>
	</div>
</header>



<main id="homepage" class="homepage" style="background:transparent;">
	@php $img = url('/')."/public/img/toko/$produk->toko_id/produk/$produk->foto_produk"; @endphp

	<div id="bg" style=" width: 100%;">
		<img src="<?=$img?>">
	</div>
	<div class="footer">
		<div class="container-mall footer-mall-menu" style="display: flex;background: #9d0208; flex-direction: column; justify-content: flex-start; align-items: flex-start; padding: 1em 2.5em 1em 2.5em;">
			<div class="button-detail">
				<div style="width: 2em; height: 2em; background: white; border-radius: 50%; color: #9d0208; text-align: center; font-size: 0.7em; padding-top: 0.3em;" onclick="kurangi_pesanan()"><i class="fa fa-minus"></i></div>
				<div style="width: 3em; height: 2em; background: white; border-radius: 2em; color: #9d0208; display: flex; justify-content: center; align-items: center; font-size: 0.7em; font-weight: 700;" id="jumlah_pesanan">1</div>
				<div style="width: 2.1em; height: 2em; background: white; border-radius: 50%; color: #9d0208; text-align: center; font-size: 0.7em; padding-top: 0.3em;" onclick="tambah_pesanan()"><i class="fa fa-plus"></i></div>
			</div>
			<div class="nama-barang" style="font-size: 1.5em; margin-top: 0.5em; margin-bottom: 0em;">{{$produk->nama}}</div>
			<div style="font-size: 1em; line-height: 1em; margin-bottom: 0.5em;">{{ucwords(strtolower($produk->kategori->nama))}}</div>

			<div style="padding: 0; margin: 0em 0px 0px 0px; font-size: 1em;">
				<i class="fas fa-star star-rating"></i>
				<i class="fas fa-star star-rating"></i>
				<i class="fas fa-star star-rating"></i>
				<i class="fas fa-star star-rating"></i>
				<i class="far fa-star star-rating"></i>
			</div>			

			<div class="deskripsi-and-rating" style="display: flex; justify-content: space-between; width: 100%;">
				<div style="font-size: 1em; font-weight: 400; margin-top: 0.5em;">Deskripsi</div>
			</div>
			<div style="font-size: 0.8em; text-align: left; margin-top: 0em; margin-bottom: 0.6em;">{{$produk->deskripsi}}</div>

			@php $hasil_diskon_string = ""; @endphp
			@if ($produk->jenis_harga == 'Statis')
			@if($produk->diskon != '0')
			<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
				<s>IDR. {{number_format($produk->harga)}}</s>
			</div>
			@php
			$hasil_diskon = ($produk->harga)-((($produk->diskon)/100)*($produk->harga));
			@endphp
			<div style="padding: 0; margin: 0.1em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($hasil_diskon)}}</div>
			@php $hasil_diskon_string = number_format($hasil_diskon); @endphp
			@else
			<div style="padding: 0; margin: 0.5em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($produk->harga)}}</div>
			@endif	

			@else
			<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
				Harga Mulai
			</div>
			<div style="padding: 0; margin: 0.1em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($produk->harga_terendah)}}</div>

			@endif



			@if (Auth::user())
			@if ($penjual == 'no')
			@if ($produk->jenis_harga == 'Statis')
			@if($produk->diskon != '0')
			<a href="https://api.whatsapp.com/send?phone={{$toko->no_hp}}&text=[Order Masuk Dari Kitapura Mall]%20Halo%20{{$toko->nama_toko}},%20Saya%20ingin%20memesan%20{{ucwords(strtolower($produk->nama))}}%20Rp.%20{{$hasil_diskon_string}}" style="background: linear-gradient(41.88deg, #4AAE20 35.3%, #5EE825 88.34%);border-radius: 35px; color: white; border-radius: 35px; padding: 0.8em; width: 100%; margin-top: 0.5em;" onclick="pesan_produk()">
				Pesan melalui Whatsapp&nbsp;&nbsp;<img src="<?=url('/')?>/public/img/icon_svg/whatsapp.svg">
			</a>
			@php $hasil_diskon_string = number_format($hasil_diskon); @endphp
			@else
			<a href="https://api.whatsapp.com/send?phone={{$toko->no_hp}}&text=[Order Masuk Dari Kitapura Mall]%20Halo%20{{$toko->nama_toko}},%20Saya%20ingin%20memesan%20{{ucwords(strtolower($produk->nama))}}%20Rp.%20{{$produk->harga}}" style="background: linear-gradient(41.88deg, #4AAE20 35.3%, #5EE825 88.34%);border-radius: 35px; border-radius: 35px;  color: white; padding: 0.8em; width: 100%; margin-top: 0.5em;" onclick="pesan_produk()">
				Pesan melalui Whatsapp&nbsp;&nbsp;<img src="<?=url('/')?>/public/img/icon_svg/whatsapp.svg">
				<img src="<?=url('/')?>/public/img/icon_svg/whatsapp_ori_circle.svg" style="position: absolute; bottom: -0.8em; right: -0.5em; width: 5em;" onclick="masukan_keranjang('{{$produk->toko_id}}', '{{$produk->id}}')">
			</a>
			@endif	
			@else
			<a href="https://api.whatsapp.com/send?phone={{$toko->no_hp}}&text=[Order Masuk Dari Kitapura Mall]%20Halo%20{{$toko->nama_toko}},%20Saya%20ingin%20memesan%20{{ucwords(strtolower($produk->nama))}}%20Rp.%20{{$produk->harga}}" style="background: linear-gradient(41.88deg, #4AAE20 35.3%, #5EE825 88.34%);border-radius: 35px; border-radius: 35px; color: white;  padding: 0.8em; width: 100%; margin-top: 0.5em;" onclick="pesan_produk()">
				Pesan melalui Whatsapp&nbsp;&nbsp;<img src="<?=url('/')?>/public/img/icon_svg/whatsapp.svg">
			</a>
			@endif

			@else
			<a href="https://api.whatsapp.com/send?phone={{$toko->no_hp}}&text=[Order Masuk Dari Kitapura Mall]%20Halo%20{{$toko->nama_toko}},%20Saya%20ingin%20memesan%20{{ucwords(strtolower($produk->nama))}}%20Rp.%20{{$produk->harga}}"style="background: linear-gradient(41.88deg, #4AAE20 35.3%, #5EE825 88.34%);border-radius: 35px; border-radius: 35px;  color: white; padding: 0.8em; width: 100%; margin-top: 0.5em;" onclick="pesan_produk()">
				Pesan melalui Whatsapp&nbsp;&nbsp;<img src="<?=url('/')?>/public/img/icon_svg/whatsapp.svg">
			</a>

			@endif
			@else
			<a href="https://api.whatsapp.com/send?phone={{$toko->no_hp}}&text=[Order Masuk Dari Kitapura Mall]%20Halo%20{{$toko->nama_toko}},%20Saya%20ingin%20memesan%20{{ucwords(strtolower($produk->nama))}}%20Rp.%20{{$produk->harga}}" style="background: linear-gradient(41.88deg, #4AAE20 35.3%, #5EE825 88.34%);border-radius: 35px; border-radius: 35px;  color: white; padding: 0.8em; width: 100%; margin-top: 0.5em;" onclick="pesan_produk()">
				Pesan melalui Whatsapp&nbsp;&nbsp;<img src="<?=url('/')?>/public/img/icon_svg/whatsapp.svg">
			</a>
			@endif

		</div>
	</div>

</main>

@endsection

@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript">
	function masukan_keranjang(toko_id, produk_id){

	}	

	function tambah_pesanan(){
		var jumlah_pesanan = $("#jumlah_pesanan").html();
		// alert(jumlah_pesanan)
		$("#jumlah_pesanan").html(parseInt(jumlah_pesanan)+1);
	}

	function kurangi_pesanan(){
		var jumlah_pesanan = $("#jumlah_pesanan").html();
		$("#jumlah_pesanan").html(parseInt(jumlah_pesanan)-1);		
	}

	function pesan_produk(){
		// alert('yed');
		$("#kirim_keranjang").click();
	}


	function nilai_toko(index){
		$("#nilai_rating").val(index);
		index = parseInt(index)+1;
		for (var i = 1; i <= index; i++){
			$("#rating_"+i).removeClass("far");
			$("#rating_"+i).addClass("fas");
		}
		for (var j = index; j <= 5; j++){
			$("#rating_"+j).removeClass("fas");
			$("#rating_"+j).addClass("far");
		}

	}

	function menilai(){
		$('#modal-jadwal').modal('show');
	}	
</script>
@endsection
