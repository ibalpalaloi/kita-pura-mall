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
<header class="style__Container-sc-3fiysr-0 header" style="background: white; padding-top: 0.3em;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh">
		<a class="svg_color" href="<?=url('/')?>/{{Request::segment(1)}}" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; margin-right: ">
			<svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M1.09413 11.5312C0.524614 10.9617 0.524613 10.0383 1.09413 9.46882L9.84413 0.718824C10.4136 0.149308 11.337 0.149308 11.9065 0.718824C12.476 1.28834 12.476 2.2117 11.9065 2.78122L4.18772 10.5L11.9065 18.2188C12.476 18.7883 12.476 19.7117 11.9065 20.2812C11.337 20.8507 10.4136 20.8507 9.84413 20.2812L1.09413 11.5312Z" fill="{{$page->warna_header}}"/>
			</svg>
		</a>
		<a style="height: 100%; width: 80%; display: flex; justify-content: center; align-items: center; font-size: 1.5em; font-weight: 600;">
			@php echo "@".$toko->username @endphp
		</a>
		@if (Auth::user())
		@if(Auth()->user()->id == $toko->users_id)
		<a onclick="show_loader()" style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center;" href="<?=url('/')?>/akun/mitra/premium">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M0.48703 13.9017C0.277761 12.6425 0.277761 11.3575 0.48703 10.0983C1.7727 10.1287 2.9277 9.51268 3.37686 8.42885C3.82603 7.34385 3.44453 6.09085 2.51353 5.20535C3.25601 4.16618 4.16502 3.25678 5.20386 2.51385C6.09053 3.44485 7.34353 3.82635 8.42853 3.37718C9.51353 2.92801 10.1284 1.77185 10.0969 0.487346C11.3568 0.277818 12.6426 0.277818 13.9025 0.487346C13.871 1.77301 14.487 2.92801 15.5709 3.37718C16.6559 3.82635 17.9089 3.44485 18.7944 2.51385C19.8335 3.25633 20.7429 4.16534 21.4859 5.20418C20.5549 6.09085 20.1734 7.34385 20.6225 8.42885C21.0717 9.51385 22.2279 10.1287 23.5124 10.0972C23.7219 11.3571 23.7219 12.6429 23.5124 13.9028C22.2267 13.8713 21.0717 14.4873 20.6225 15.5712C20.1734 16.6562 20.5549 17.9092 21.4859 18.7947C20.7434 19.8338 19.8344 20.7432 18.7955 21.4862C17.9089 20.5552 16.6559 20.1737 15.5709 20.6228C14.4859 21.072 13.871 22.2282 13.9025 23.5127C12.6426 23.7222 11.3568 23.7222 10.0969 23.5127C10.1284 22.227 9.51236 21.072 8.42853 20.6228C7.34353 20.1737 6.09053 20.5552 5.20503 21.4862C4.16587 20.7437 3.25646 19.8347 2.51353 18.7958C3.44453 17.9092 3.82603 16.6562 3.37686 15.5712C2.9277 14.4862 1.77153 13.8713 0.48703 13.9028V13.9017ZM11.9997 15.5C12.928 15.5 13.8182 15.1313 14.4746 14.4749C15.1309 13.8185 15.4997 12.9283 15.4997 12C15.4997 11.0718 15.1309 10.1815 14.4746 9.52514C13.8182 8.86876 12.928 8.50001 11.9997 8.50001C11.0714 8.50001 10.1812 8.86876 9.52482 9.52514C8.86844 10.1815 8.4997 11.0718 8.4997 12C8.4997 12.9283 8.86844 13.8185 9.52482 14.4749C10.1812 15.1313 11.0714 15.5 11.9997 15.5Z" fill="{{$page->warna_header}}"/>
			</svg>
		</a>
		@else
		<a  onclick="cooming_soon()" style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; ">

			<svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M4.60073 8.74298V6.45727C4.60073 4.94174 5.20276 3.48829 6.2744 2.41666C7.34604 1.34502 8.79949 0.742981 10.315 0.742981C11.8305 0.742981 13.284 1.34502 14.3556 2.41666C15.4273 3.48829 16.0293 4.94174 16.0293 6.45727V8.74298H19.4579C19.761 8.74298 20.0517 8.86339 20.266 9.07772C20.4803 9.29204 20.6007 9.58273 20.6007 9.88584V23.6001C20.6007 23.9032 20.4803 24.1939 20.266 24.4082C20.0517 24.6226 19.761 24.743 19.4579 24.743H1.17215C0.869049 24.743 0.578359 24.6226 0.364032 24.4082C0.149705 24.1939 0.0292969 23.9032 0.0292969 23.6001V9.88584C0.0292969 9.58273 0.149705 9.29204 0.364032 9.07772C0.578359 8.86339 0.869049 8.74298 1.17215 8.74298H4.60073ZM4.60073 11.0287H2.31501V22.4573H18.315V11.0287H16.0293V13.3144H13.7436V11.0287H6.88644V13.3144H4.60073V11.0287ZM6.88644 8.74298H13.7436V6.45727C13.7436 5.54795 13.3824 4.67588 12.7394 4.0329C12.0964 3.38992 11.2243 3.0287 10.315 3.0287C9.4057 3.0287 8.53363 3.38992 7.89064 4.0329C7.24766 4.67588 6.88644 5.54795 6.88644 6.45727V8.74298Z" fill="{{$page->warna_header}}"/>
			</svg>

			<div style="width: 1.5em; height: 1.5em; background:#9d0208; position: absolute;border-radius: 50%; bottom: 7px; right: 7px; background: #FF0000; color: white; text-align: center;" id="jumlah_keranjang">0</div>
		</a>

		@endif
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
</script>

@endsection
