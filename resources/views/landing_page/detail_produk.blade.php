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
	width: 200%; 
	height: 200%;
	z-index: -1;
}
#bg img {
	position: absolute; 
	z-index: -1;
	object-fit: cover;
	height: 50%;
}
</style>
@endsection

@section('content')
<header class="style__Container-sc-3fiysr-0 header" style="background: transparent; padding-top: 0.3em;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh">
		<a href="<?=url('/')?>/{{Request::segment(1)}}/daftar-menu" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; margin-right: ">
			<img src="<?=url('/')?>/public/img/icon_svg/back_red.svg" style="width: 28%;">
		</a>
		<a style="height: 100%; width: 80%; display: flex; justify-content: center; align-items: center;">
			<img src="<?=url('/')?>/public/img/toko/logo/warung_mantap.png" style="width: 20%;">
		</a>
		<a style="width: 15%; position: relative; right: 1em;">
			<img src="<?=url('/')?>/public/img/icon_svg/bag_transparent.svg" style="width: 90%;">
			<div style="width: 1.5em; height: 1.5em; background:#9d0208; position: absolute;border-radius: 50%; bottom: 0px; right: 0; background: #FF0000; color: white; text-align: center;" id="jumlah_keranjang">0</div>
		</a>
	</div>
</header>



<main id="homepage" class="homepage" style="background:transparent;">

	@php $img = url('/')."/public/img/product/TKO-1204012490124/product_5.jpg"; @endphp

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
			<div class="nama-barang" style="font-size: 1.3em; margin-top: 0.5em; margin-bottom: 0.2em;">Ayam Bakar</div>
			<div class="deskripsi-and-rating" style="display: flex; justify-content: space-between; width: 100%;">
				<div style="font-size: 0.9em; font-weight: 600;">Deskripsi</div>
				<div style="padding: 0; margin: 0em 0px 0px 0px; font-size: 0.8em;">
					<i class="fas fa-star star-rating"></i>
					<i class="fas fa-star star-rating"></i>
					<i class="fas fa-star star-rating"></i>
					<i class="fas fa-star star-rating"></i>
					<i class="far fa-star star-rating"></i>
					&nbsp;(100 Penilaian)
				</div>
			</div>
			<div style="font-size: 0.7em; text-align: left; margin-top: 1em;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra felis elit sollicitudin tortor. Id egestas curabitur enim non sed aliquam feugiat. Arcu praesent ullamcorper sapien eu enim dolor. Amet, ut porta adipiscing amet est cras phasellus odio. Tempor vel velit sagittis, sed justo. Maecenas erat enim, blandit lobortis. Metus pellentesque mauris mauris, morbi. Faucibus risus.</div>
			@php $url = url('/')."/public/img/button/landing_page/gradient_orange.svg"; @endphp
			<div style="background: linear-gradient(41.88deg, #EC7405 35.3%, #FFAA00 88.34%);border-radius: 35px; padding: 0.8em; width: 100%; margin-top: 0.5em;" onclick="masukan_keranjang()">
				Tambahkan ke keranjang<img src="<?=url('/')?>/public/img/button/landing_page/keranjang_icon.svg">
			</div>

		</div>
	</div>
</main>

@endsection

@section('footer-scripts')
<script type="text/javascript">
	function masukan_keranjang(){
		var jumlah_keranjang = $("#jumlah_keranjang").html();
		jumlah_keranjang = parseInt(jumlah_keranjang)+1;
		$("#jumlah_keranjang").html(jumlah_keranjang);
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
</script>
@endsection
