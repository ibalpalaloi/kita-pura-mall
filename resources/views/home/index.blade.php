@extends('layouts.home')

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



	.homepage {
		padding: 0px;
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
		width: 8.5em;		
	}

	.slider-toko img {
		width: 8.5em;
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
</style>
@endsection

@section('content')
<header class="style__Container-sc-3fiysr-0 header" >
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: center;">
		<a id="defaultheader_logo" title="Kitabisa" style="margin-left: 20px; height:33px;margin-right:20px" href="/">
			<img src="<?=url('/')?>/public/img/logo.svg">
		</a>
		<div id="defaultheader_search" class="style__SearchInput-sc-3fiysr-3 sUjAJ">
			<span></span>
			<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="svg-inline--fa fa-search fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="color: #dedede;">
				<path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
			</svg>
		</div>
	</div>
</header>

<div class="wrapper" style="background: #ff006e; position: relative; z-index: -1; border-bottom-right-radius: 7%; border-bottom-left-radius: 7%;">
	<div class="banner" style="padding: 5em 0.5em 7em 0.5em;">
		<img src="<?=url('/')?>/public/img/banner/banner.jpg" style="width: 100%;">
	</div>
</div>

<main id="homepage" class="homepage" style="background: #eaf4ff;">
	<div class="card-mall kategori" style="margin: 0px 16px 1em;">
		@php
		$kategori = array('bayi.svg', 'elektronik.svg', 'fashion.svg', 'food.svg', 'industri.svg', 'kecantikan.svg', 'olahraga.svg', 'rumah_tangga.svg', 'bayi.svg', 'elektronik.svg', 'fashion.svg', 'food.svg', 'industri.svg', 'kecantikan.svg', 'olahraga.svg', 'rumah_tangga.svg');
		$nama_kategori = array('Perlengkapan Bayi', 'Rumah Tangga', 'Keperluan Pribadi', 'Makanan Minuman', 'Kantor Industri',  'Kecantikan', 'Olharaga', 'Jasa', 'Perlengkapan Bayi', 'Rumah Tangga', 'Keperluan Pribadi', 'Makanan Minuman', 'Kantor Industri',  'Kecantikan', 'Olharaga', 'Jasa');

		$setengah = count($kategori)/2;
		$k = 0;
		@endphp 
		@for ($i = 1; $i <= $setengah; $i++)  
		<div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0em 0em 0em 0.8em;">
			@for ($j = $k; $j < $i*2; $j++)
			<div style="height: 5em; width: 5em; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em;">
				<div style="background: #ff006e; width: 3em; height: 3em; border-radius: 0.5em; margin-bottom: 0.3em;">
					<img src="<?=url('/')?>/public/img/home/kategori/{{$kategori[$j]}}" style="width: 100%;">
				</div>
				<div style="text-align: center; font-size: 0.7em;">{{$nama_kategori[$j]}}</div>
			</div>
			@php $k++; @endphp
			@endfor
		</div> 
		@endfor
	</div>

	<div class="row-mall" style="padding: 0.7em 0em 1.2em 0em; margin-top: -6em;">
		<div style="margin-left: 1em;">
			<div style="font-size: 1.2em; font-weight: 1000;">Bosan?</div>
			<div style="font-size: 0.7em; margin-bottom: 0.9em; line-height: 1.3em; color: gray;">hilangkan rasa bosanmu segera! download <br>berbagai macam hiburan hanya di kitapuramall</div>
		</div>
		<div class="slider">
			@php
			$digital = array('kopi_kenangan.jpg', 'geprek_bensu.jpg', 'kopi_kenangan.jpg', 'geprek_bensu.jpg', 'kopi_kenangan.jpg', 'geprek_bensu.jpg');
			$nama_digital = array('Kopi Kenangan', 'Janji Jiwa', 'Richese Factory', 'Starbucks', 'KFC', 'Janji Jiwa');
			$kategori_toko = array('makanan/minuman', 'makanan/minuman', 'makanan/minuman', 'makanan/minuman', 'makanan/minuman', 'makanan/minuman');
			
			$jumlah_digital = count($digital)-1;
			@endphp 

			@for ($i = 0; $i < count($digital); $i++)  
			<div class="slider-toko" style="@if ($i == 0) margin-left: 1em;@endif">
				<?php $svg = "public/img/home/bg-slider-toko.svg"; ?>
				<img src="<?=url('/')?>/public/img/toko/{{$digital[$i]}}">
				<div style='text-align: left; font-size: 0.75em; padding: 0.7em 0em 0.7em 0.5em; width: 100%; background-image: url("<?=$svg?>"); color: white; background-size: cover; padding: 1em; position: relative;'> 
					<div style="position: absolute; top: -1.8em; z-index: 0; width: 3.5em; height: 3.5em; background: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(255,6,115,1) 0%, rgba(255,82,181,1) 100%); box-shadow: rgba(152, 152, 152, 0.5) 0px 2px 8px 1px; border-radius: 50%; right: 0.5em; display: flex; justify-content: center; align-items: center;">
						<img src="<?=url('/')?>/public/img/icon_svg/download.svg" style="width: 2em; height: 2em;">
					</div>
					<div style="font-weight: 500;"><?=substr(strip_tags($nama_digital[$i]), 0, 15)?>@if (strlen($nama_digital[$i]) > 15)..@endif</div>
					<div style="font-size: 0.7em; line-height: 1em; font-weight: 0;">{{$kategori_toko[$i]}}</div>
					<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.6em; line-height: 1em;">
						<i class="fas fa-star star-rating"></i>
						<i class="fas fa-star star-rating"></i>
						<i class="fas fa-star star-rating"></i>
						<i class="fas fa-star star-rating"></i>
						<i class="far fa-star star-rating"></i>
						&nbsp;<span>(100 Penilaian)</span><br>
					</div>

					<span style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.6em; line-height: 1em; vertical-align: center;">
						<s>IDR. 25.000</s>
					</span>
					<span style="padding: 0; margin: 0.5em 0px 0px 0.5em; font-size: 0.9em; line-height: 1em; font-weight: 500;">IDR. 5.000</span>
				</div>
			</div> 
			@if ($i == $jumlah_digital)
			<div style="padding: 1em; display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img src="<?=url('/')?>/public/img/icon_svg/vertikal_right.svg">
				<div style="color: gray; font-size: 0.7em; white-space: nowrap;">Lebih Banyak</div>
			</div>
			@endif
			@endfor
		</div>
	</div>
	<div class="row-mall" style="padding: 0.7em 0em 1.2em 0em;">
		<div style="margin-left: 1em;">
			<div style="font-size: 1.2em; font-weight: 1000;">Lapar? Haus?</div>
			<div style="font-size: 0.7em; margin-bottom: 0.9em; line-height: 1.3em; color: gray;">kitapuramall memiliki ratusan mitra yang siap menjadi<br>solusi saat anda lapar dan haus. temukan sekarang!</div>
		</div>
		<div class="slider">
			@php
			$digital = array('kopi_kenangan.jpg', 'geprek_bensu.jpg', 'kopi_kenangan.jpg', 'geprek_bensu.jpg', 'kopi_kenangan.jpg', 'geprek_bensu.jpg');
			$nama_digital = array('Kopi Kenangan', 'Janji Jiwa', 'Richese Factory', 'Starbucks', 'KFC', 'Janji Jiwa');
			$kategori_toko = array('makanan/minuman', 'makanan/minuman', 'makanan/minuman', 'makanan/minuman', 'makanan/minuman', 'makanan/minuman');
			@endphp 
			@for ($i = 0; $i < count($digital); $i++)  
			<div class="slider-toko" style="@if ($i == 0) margin-left: 1em;@endif">
				<?php $svg = "public/img/home/bg-slider-toko.svg"; ?>
				<img src="<?=url('/')?>/public/img/toko/{{$digital[$i]}}">
				<div style='text-align: left; font-size: 0.75em; padding: 0.7em 0em 0.7em 0.5em; width: 100%; background-image: url("<?=$svg?>"); color: white; background-size: cover; padding: 1em; position: relative;'> 
					<div style="position: absolute; top: -1.8em; z-index: 0; width: 3.5em; height: 3.5em; background: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(255,6,115,1) 0%, rgba(255,82,181,1) 100%); box-shadow: rgba(152, 152, 152, 0.5) 0px 2px 8px 1px; border-radius: 50%; right: 0.5em; display: flex; justify-content: center; align-items: center;">
						<img src="<?=url('/')?>/public/img/icon_svg/download.svg" style="width: 2em; height: 2em;">
					</div>
					<div style="font-weight: 500;"><?=substr(strip_tags($nama_digital[$i]), 0, 15)?>@if (strlen($nama_digital[$i]) > 15)..@endif</div>
					<div style="font-size: 0.7em; line-height: 1em; font-weight: 0;">{{$kategori_toko[$i]}}</div>
					<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.6em; line-height: 1em;">
						<i class="fas fa-star star-rating"></i>
						<i class="fas fa-star star-rating"></i>
						<i class="fas fa-star star-rating"></i>
						<i class="fas fa-star star-rating"></i>
						<i class="far fa-star star-rating"></i>
						&nbsp;<span>(100 Penilaian)</span><br>
					</div>

					<span style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.6em; line-height: 1em; vertical-align: center;">
						<s>IDR. 25.000</s>
					</span>
					<span style="padding: 0; margin: 0.5em 0px 0px 0.5em; font-size: 0.9em; line-height: 1em; font-weight: 500;">IDR. 5.000</span>
				</div>
			</div> 
			@if ($i == $jumlah_digital)
			<div style="padding: 1em; display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img src="<?=url('/')?>/public/img/icon_svg/vertikal_right.svg">
				<div style="color: gray; font-size: 0.7em; white-space: nowrap;">Lebih Banyak</div>
			</div>
			@endif
			@endfor
		</div>
	</div>
	<div class="row-mall" style="padding: 0.7em 0em 1.2em 0em; display: flex; justify-content: center; flex-direction: column; align-items: center;">
		<img src="<?=url('/')?>/public/img/home/stress.svg" style="width: 70%;">
		<div style="font-size: 1.5em; font-weight: 600;">Tambal Ban dimana???</div>
		<div style="font-size: 0.8em; text-align: center; color: gray;">ada hal Emergensi pusing mau tanya ke siapa??<br>manfaatkan fitur emergensi di kitapuramall</div>
		<a href="<?=url('/')?>/user/jadi-mitra/premium/register" class="btn btn-primary" style="background: #fb036b; margin-top: 0.5em;border: 1px solid  #fb036b; border-radius: 1.5em; padding: 0.5em 2.5em 0.5em 2.5em;"><img src="<?=url('/')?>/public/img/menu/emergency.svg">&nbsp;&nbsp;Emergensi
		</a>	
	</div>
	<div class="row-mall" style="padding: 0.7em 0em 1.2em 0em;">
		<div style="margin-left: 1em;">
			<div style="font-size: 1.2em; font-weight: 1000;">Lagi Sakit? Butuh Obat?</div>
			<div style="font-size: 0.7em; margin-bottom: 0.9em; line-height: 1.3em; color: gray;">kitapuramall memiliki ratusan mitra yang siap menjadi<br>solusi saat anda lapar dan haus. temukan sekarang!</div>
		</div>
		<div class="slider">
			@php
			$digital = array('kopi_kenangan.jpg', 'geprek_bensu.jpg', 'kopi_kenangan.jpg', 'geprek_bensu.jpg', 'kopi_kenangan.jpg', 'geprek_bensu.jpg');
			$nama_digital = array('Kopi Kenangan', 'Janji Jiwa', 'Richese Factory', 'Starbucks', 'KFC', 'Janji Jiwa');
			$kategori_toko = array('makanan/minuman', 'makanan/minuman', 'makanan/minuman', 'makanan/minuman', 'makanan/minuman', 'makanan/minuman');
			@endphp 
			@for ($i = 0; $i < count($digital); $i++)  
			<div class="slider-toko" style="@if ($i == 0) margin-left: 1em;@endif">
				<?php $svg = "public/img/home/bg-slider-toko.svg"; ?>
				<img src="<?=url('/')?>/public/img/toko/{{$digital[$i]}}">
				<div style='text-align: left; font-size: 0.75em; padding: 0.7em 0em 0.7em 0.5em; width: 100%; background-image: url("<?=$svg?>"); color: white; background-size: cover; padding: 1em; position: relative;'> 
					<div style="position: absolute; top: -1.8em; z-index: 0; width: 3.5em; height: 3.5em; background: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(255,6,115,1) 0%, rgba(255,82,181,1) 100%); box-shadow: rgba(152, 152, 152, 0.5) 0px 2px 8px 1px; border-radius: 50%; right: 0.5em; display: flex; justify-content: center; align-items: center;">
						<img src="<?=url('/')?>/public/img/icon_svg/download.svg" style="width: 2em; height: 2em;">
					</div>
					<div style="font-weight: 500;"><?=substr(strip_tags($nama_digital[$i]), 0, 15)?>@if (strlen($nama_digital[$i]) > 15)..@endif</div>
					<div style="font-size: 0.7em; line-height: 1em; font-weight: 0;">{{$kategori_toko[$i]}}</div>
					<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.6em; line-height: 1em;">
						<i class="fas fa-star star-rating"></i>
						<i class="fas fa-star star-rating"></i>
						<i class="fas fa-star star-rating"></i>
						<i class="fas fa-star star-rating"></i>
						<i class="far fa-star star-rating"></i>
						&nbsp;<span>(100 Penilaian)</span><br>
					</div>

					<span style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.6em; line-height: 1em; vertical-align: center;">
						<s>IDR. 25.000</s>
					</span>
					<span style="padding: 0; margin: 0.5em 0px 0px 0.5em; font-size: 0.9em; line-height: 1em; font-weight: 500;">IDR. 5.000</span>
				</div>
			</div> 
			@if ($i == $jumlah_digital)
			<div style="padding: 1em; display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img src="<?=url('/')?>/public/img/icon_svg/vertikal_right.svg">
				<div style="color: gray; font-size: 0.7em; white-space: nowrap;">Lebih Banyak</div>
			</div>
			@endif
			@endfor
		</div>
	</div>
	<div class="row-mall" style="padding: 0.7em 0em 1.2em 0em;">
		<div style="margin-left: 1em;">
			<div style="font-size: 1.2em; font-weight: 1000;">Kuliah? Butuh Tempat Tinggal?</div>
			<div style="font-size: 0.7em; margin-bottom: 0.9em; line-height: 1.3em; color: gray;">kitapuramall memiliki ratusan mitra yang siap menjadi<br>solusi saat anda lapar dan haus. temukan sekarang!</div>
		</div>
		<div class="slider">
			@php
			$digital = array('kopi_kenangan.jpg', 'geprek_bensu.jpg', 'kopi_kenangan.jpg', 'geprek_bensu.jpg', 'kopi_kenangan.jpg', 'geprek_bensu.jpg');
			$nama_digital = array('Kopi Kenangan', 'Janji Jiwa', 'Richese Factory', 'Starbucks', 'KFC', 'Janji Jiwa');
			$kategori_toko = array('makanan/minuman', 'makanan/minuman', 'makanan/minuman', 'makanan/minuman', 'makanan/minuman', 'makanan/minuman');
			@endphp 
			@for ($i = 0; $i < count($digital); $i++)  
			<div class="slider-toko" style="@if ($i == 0) margin-left: 1em;@endif">
				<?php $svg = "public/img/home/bg-slider-toko.svg"; ?>
				<img src="<?=url('/')?>/public/img/toko/{{$digital[$i]}}">
				<div style='text-align: left; font-size: 0.75em; padding: 0.7em 0em 0.7em 0.5em; width: 100%; background-image: url("<?=$svg?>"); color: white; background-size: cover; padding: 1em; position: relative;'> 
					<div style="position: absolute; top: -1.8em; z-index: 0; width: 3.5em; height: 3.5em; background: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(255,6,115,1) 0%, rgba(255,82,181,1) 100%); box-shadow: rgba(152, 152, 152, 0.5) 0px 2px 8px 1px; border-radius: 50%; right: 0.5em; display: flex; justify-content: center; align-items: center;">
						<img src="<?=url('/')?>/public/img/icon_svg/download.svg" style="width: 2em; height: 2em;">
					</div>
					<div style="font-weight: 500;"><?=substr(strip_tags($nama_digital[$i]), 0, 15)?>@if (strlen($nama_digital[$i]) > 15)..@endif</div>
					<div style="font-size: 0.7em; line-height: 1em; font-weight: 0;">{{$kategori_toko[$i]}}</div>
					<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.6em; line-height: 1em;">
						<i class="fas fa-star star-rating"></i>
						<i class="fas fa-star star-rating"></i>
						<i class="fas fa-star star-rating"></i>
						<i class="fas fa-star star-rating"></i>
						<i class="far fa-star star-rating"></i>
						&nbsp;<span>(100 Penilaian)</span><br>
					</div>

					<span style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.6em; line-height: 1em; vertical-align: center;">
						<s>IDR. 25.000</s>
					</span>
					<span style="padding: 0; margin: 0.5em 0px 0px 0.5em; font-size: 0.9em; line-height: 1em; font-weight: 500;">IDR. 5.000</span>
				</div>
			</div> 
			@if ($i == $jumlah_digital)
			<div style="padding: 1em; display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img src="<?=url('/')?>/public/img/icon_svg/vertikal_right.svg">
				<div style="color: gray; font-size: 0.7em; white-space: nowrap;">Lebih Banyak</div>
			</div>
			@endif
			@endfor
		</div>
	</div>
	<div class="row-mall" style="padding: 0.7em 0em 1.2em 0em; display: flex; justify-content: center; flex-direction: column; align-items: center;">
		<img src="<?=url('/')?>/public/img/home/stress2.svg" style="width: 70%;">
		<div style="font-size: 1.5em; font-weight: 600;">Pusing? Pengen Cuci Mata?</div>
		<div style="font-size: 0.8em; text-align: center; color: gray;">daripada nge-mall capek jalan. kitapuramall<br>sediakan fitur yang bisa mengatasi keinginan itu</div>
		<a href="<?=url('/')?>/user/jadi-mitra/premium/register" class="btn btn-primary" style="background: #fb036b; margin-top: 0.5em;border: 1px solid  #fb036b; border-radius: 1.5em; padding: 0.5em 2.5em 0.5em 2.5em;"><img src="<?=url('/')?>/public/img/icon_svg/search.svg">&nbsp;&nbsp;Coba disini
		</a>	
	</div>

</main>

<div class="wrapper" style="background: #1c2645; position: relative; z-index: -1">
	<div class="container-mall" style="padding-bottom: 7.5em;">
		<div style="padding-top: 2em; text-align: center; color: white;">
			<p style="font-weight: 700;">Alamat</p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Semper vitae proin fames vulputate integer nulla amet. Donec turpis.
		</div>
		<div style="padding-top: 2em; text-align: center; color: white;">
			<p style="font-weight: 700;">Connect with us on social media</p>
			<div class="sosmed">
				<img src="<?=url('/')?>/public/img/home/about/facebook.svg" style="width: 2.2em;">
				<img src="<?=url('/')?>/public/img/home/about/youtube.svg" style="width: 2.2em;">
				<img src="<?=url('/')?>/public/img/home/about/instagram.svg" style="width: 2.2em;">
				<img src="<?=url('/')?>/public/img/home/about/twitter.svg" style="width: 2.2em;">
			</div>
			<div><br>
				<a href="<?=url('/')?>" style="margin: 0em 0.3em 0em 0.3em;">About Us</a>
				<a href="<?=url('/')?>" style="margin: 0em 0.3em 0em 0.3em;">Privacy & Policy</a>
			</div>
			<div>
				Copyright&nbsp;&copy;&nbsp;<script>document.write(new Date().getFullYear());</script>&nbsp;CV. Kaili Nusantara Production
			</div>
		</div>
	</div>
</div>
@endsection

@section('footer-scripts')
@endsection
