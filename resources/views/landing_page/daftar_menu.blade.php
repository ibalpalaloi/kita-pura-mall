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
	border-radius: 3em;         
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

.kategori-tabs {
	display: flex; 
	justify-content: center;
	width: 90%;
}

.kategori-tabs > a {
	margin: 0em 0.5em 0em 0.5em;
	font-size: 1em;
	border-radius: 0.3em;
	color: #ADADAD;
}

.active-kategori {
	background: {{$page->warna_header}};
	color: white !important;
}

.form-control-mall {
	height: 2.5em; 
	border-bottom-right-radius: 0.5em; 
	border-top-right-radius: 0.5em; 
	border:  none;	
	background: #202020;
	font-weight: 600;
	padding: 0em 0em 0em 0.6em;	
	margin-left: 0px;
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

.svg_color{
	fill: #efff3b;
}
</style>
@endsection

@section('content')
<div class="modal fade" id="modal-cooming-soon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: 0em 0em 0em 0em; color: white; border: none; box-shadow: none;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: 30%; right: 1em;">
				<img src="<?=url('/')?>/public/img/modal_assets/modal_cooming_soon.svg" style="width: 100%;">
				<div style="position: absolute; margin: 2.5em 1.5em 0em 1.5em; padding: 0em 1.5em 0em 1.5em; top: 60%;">
					<div style="font-size: 2em; font-weight: 600; text-align: center;">Sabar Yaa...</div>
					<div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 1.2em;">Untuk Sekarang Fitur ini masih belum bisa ditampilkan</div>
				</div>
			</div>
		</div>
	</div>
</div>

<header class="style__Container-sc-3fiysr-0 header" style="background: white; padding-top: 0.3em;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh">
		<a class="svg_color" href="<?=url('/')?>/{{Request::segment(1)}}" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; margin-right: ">
			<svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M1.09413 11.5312C0.524614 10.9617 0.524613 10.0383 1.09413 9.46882L9.84413 0.718824C10.4136 0.149308 11.337 0.149308 11.9065 0.718824C12.476 1.28834 12.476 2.2117 11.9065 2.78122L4.18772 10.5L11.9065 18.2188C12.476 18.7883 12.476 19.7117 11.9065 20.2812C11.337 20.8507 10.4136 20.8507 9.84413 20.2812L1.09413 11.5312Z" fill="{{$page->warna_header}}"/>
				</svg>
			</a>
			<a style="height: 100%; width: 80%; display: flex; justify-content: center; align-items: center; font-size: 1.5em; font-weight: 600; color: {{$page->warna_header}}">
				@php echo $toko->username @endphp
			</a>


			@if (Auth::user())
			@php $penjual = ""; @endphp

			@if(Auth()->user()->id == $toko->users_id)
			@php $penjual = 'yes'; @endphp

			<a onclick="show_loader()" style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center;" href="<?=url('/')?>/akun/mitra/premium">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0.48703 13.9017C0.277761 12.6425 0.277761 11.3575 0.48703 10.0983C1.7727 10.1287 2.9277 9.51268 3.37686 8.42885C3.82603 7.34385 3.44453 6.09085 2.51353 5.20535C3.25601 4.16618 4.16502 3.25678 5.20386 2.51385C6.09053 3.44485 7.34353 3.82635 8.42853 3.37718C9.51353 2.92801 10.1284 1.77185 10.0969 0.487346C11.3568 0.277818 12.6426 0.277818 13.9025 0.487346C13.871 1.77301 14.487 2.92801 15.5709 3.37718C16.6559 3.82635 17.9089 3.44485 18.7944 2.51385C19.8335 3.25633 20.7429 4.16534 21.4859 5.20418C20.5549 6.09085 20.1734 7.34385 20.6225 8.42885C21.0717 9.51385 22.2279 10.1287 23.5124 10.0972C23.7219 11.3571 23.7219 12.6429 23.5124 13.9028C22.2267 13.8713 21.0717 14.4873 20.6225 15.5712C20.1734 16.6562 20.5549 17.9092 21.4859 18.7947C20.7434 19.8338 19.8344 20.7432 18.7955 21.4862C17.9089 20.5552 16.6559 20.1737 15.5709 20.6228C14.4859 21.072 13.871 22.2282 13.9025 23.5127C12.6426 23.7222 11.3568 23.7222 10.0969 23.5127C10.1284 22.227 9.51236 21.072 8.42853 20.6228C7.34353 20.1737 6.09053 20.5552 5.20503 21.4862C4.16587 20.7437 3.25646 19.8347 2.51353 18.7958C3.44453 17.9092 3.82603 16.6562 3.37686 15.5712C2.9277 14.4862 1.77153 13.8713 0.48703 13.9028V13.9017ZM11.9997 15.5C12.928 15.5 13.8182 15.1313 14.4746 14.4749C15.1309 13.8185 15.4997 12.9283 15.4997 12C15.4997 11.0718 15.1309 10.1815 14.4746 9.52514C13.8182 8.86876 12.928 8.50001 11.9997 8.50001C11.0714 8.50001 10.1812 8.86876 9.52482 9.52514C8.86844 10.1815 8.4997 11.0718 8.4997 12C8.4997 12.9283 8.86844 13.8185 9.52482 14.4749C10.1812 15.1313 11.0714 15.5 11.9997 15.5Z" fill="{{$page->warna_header}}"/>
					</svg>
				</a>
				@else
				@php $penjual = 'no'; @endphp

				<a  href="https://api.whatsapp.com/
				send?phone={{$toko->no_hp}}&text=Halo%20{{$toko->nama_toko}},%20Saya%20Ingin%20Memesan%20product%20yang%20ada%20di%20kitapuraa%20mall" style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center;">
				<svg width="26" height="26" viewBox="0 0 180 180" fill="none" xmlns="http://www.w3.org/2000/svg" hidden>
					<path d="M0.0361204 180L12.2041 135.288C4.18636 121.544 -0.0260157 105.912 0.00012089 90C0.00012089 40.293 40.2931 0 90.0001 0C139.707 0 180 40.293 180 90C180 139.707 139.707 180 90.0001 180C74.0951 180.026 58.47 175.817 44.7301 167.805L0.0361204 180ZM57.5191 47.772C56.3569 47.8442 55.2212 48.1503 54.1801 48.672C53.2038 49.2249 52.3126 49.916 51.5341 50.724C50.4541 51.741 49.8421 52.623 49.1851 53.478C45.8588 57.807 44.0696 63.1208 44.1001 68.58C44.1181 72.99 45.2701 77.283 47.0701 81.297C50.7511 89.415 56.8081 98.01 64.8091 105.975C66.7351 107.892 68.6161 109.818 70.6411 111.609C80.5716 120.352 92.4054 126.657 105.201 130.023L110.322 130.806C111.987 130.896 113.652 130.77 115.326 130.689C117.947 130.554 120.507 129.844 122.823 128.61C124.317 127.818 125.019 127.422 126.27 126.63C126.27 126.63 126.657 126.378 127.395 125.82C128.61 124.92 129.357 124.281 130.365 123.228C131.112 122.454 131.76 121.545 132.255 120.51C132.957 119.043 133.659 116.244 133.947 113.913C134.163 112.131 134.1 111.159 134.073 110.556C134.037 109.593 133.236 108.594 132.363 108.171L127.125 105.822C127.125 105.822 119.295 102.411 114.516 100.233C114.012 100.013 113.472 99.8883 112.923 99.864C112.307 99.8008 111.685 99.87 111.098 100.067C110.512 100.264 109.974 100.585 109.521 101.007V100.989C109.476 100.989 108.873 101.502 102.366 109.386C101.993 109.888 101.478 110.267 100.888 110.476C100.298 110.684 99.66 110.712 99.0541 110.556C98.4677 110.399 97.8932 110.201 97.3351 109.962C96.2191 109.494 95.8321 109.314 95.0671 108.981L95.0221 108.963C89.8733 106.715 85.1061 103.679 80.8921 99.963C79.7581 98.973 78.7051 97.893 77.6251 96.849C74.0843 93.4581 70.9985 89.6221 68.4451 85.437L67.9141 84.582C67.5327 84.0075 67.2244 83.3877 66.9961 82.737C66.6541 81.414 67.5451 80.352 67.5451 80.352C67.5451 80.352 69.7321 77.958 70.7491 76.662C71.5959 75.5849 72.386 74.4644 73.1161 73.305C74.1781 71.595 74.5111 69.84 73.9531 68.481C71.4331 62.325 68.8231 56.196 66.1411 50.112C65.6101 48.906 64.0351 48.042 62.6041 47.871C62.1181 47.817 61.6321 47.763 61.1461 47.727C59.9375 47.667 58.7263 47.679 57.5191 47.763V47.772Z" fill="{{$page->warna_header}}"/>
					</svg>


					<div style="width: 1.5em; height: 1.5em; background:#9d0208; position: absolute;border-radius: 50%; bottom: 7px; right: 7px; background: #FF0000; color: white; text-align: center;" id="jumlah_keranjang" hidden>0</div>
				</a>

				@endif
				@else
				<a  href="https://api.whatsapp.com/
				send?phone={{$toko->no_hp}}&text=Halo%20{{$toko->nama_toko}},%20Saya%20Ingin%20Memesan%20product%20yang%20ada%20di%20kitapuraa%20mall" style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center;">
				</a>				

				@endif

			</div>
		</header>



		<main id="homepage" class="homepage" style="background:white;">

			<div class="row-mall" style="padding: 5em 0em 1.2em 0em;">
				<h2 style="color: {{$page->warna_header}}; font-weight: 600; margin-bottom: 0px; margin-top: 1em;">Produk Kami</h2>
				<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="border-radius: 3em;">
					<div style="width: 100%;">

						<div class="div-input-mall-square" style="background: #eaf4ff; display: flex; align-items: center; margin-right: 0.5em;"> 
							<span class="input-group-text-mall" style="margin-left: 0.8em;">
								<img src="<?=url('/')?>/public/img/icon_svg/search_grey.svg">
							</span>
							<input type="text" class="form-control-mall" id="cari_produk" name="cari_produk" placeholder="Cari produk" aria-label="Cari produk" aria-describedby="basic-addon1" value=""style="width: 100%; height: 3em; margin-right: 1em; background: #EAF4FF; color: grey !important;" required>
						</div>
						<div style="width: 3.4em; height: 3em; background: {{$page->warna_header}}; border-radius: 0.5em; display: flex; justify-content: center;align-items: center;">
							<img src="<?=url('/')?>/public/img/icon_svg/filter_white.svg" style="width: 50%;">
						</div>
					</div>
				</div>
				<div style="width: 100%; display: flex; justify-content: center; margin-bottom: 1em;">
					<div class="kategori-tabs" style="margin-top: 5px; font-size: 0.85em;">
						<a class="" style="background: #EAF4FF; padding: 0.3em 0.7em;">General</a>
						<a class="" style="background: #EAF4FF; padding: 0.3em 0.7em;">terbaru</a>
						<a class="active-kategori" style="padding: 0.3em 0.7em;">paling dicari</a>
					</div>
				</div>
				<div id="daftar_menu" style="width: 100%; display: flex; flex-wrap: wrap; justify-content: space-between; padding-left: 0em;">
					@include('landing_page.data_daftar_menu')
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

			var produk;
			var id_toko = {!! json_encode($toko->id) !!}

			function get_produk(produk){
				$.ajax({
					url:"{{ route('get_produk') }}",
					method: "post",
					data : {id_toko:id_toko, produk:produk, _token:'{{csrf_token()}}'},
				})
				.done(function(data){
					$('#daftar_menu').empty();
					$('#daftar_menu').append(data.html);
				})
			}

			$(document).ready(function(){
				$('#cari_produk').on('input', function(){
					var produk = $('#cari_produk').val();
					get_produk(produk);
				});
			})

			function cooming_soon(){
				$("#modal-cooming-soon").modal('show');		
			}
		</script>

		@endsection
