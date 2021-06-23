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
	/*height: 2em;*/
	border-bottom-left-radius: 1em;
	border-bottom-right-radius: 1em;
}

.star-rating {
	color: #efff3b;
}

.star-no-rating {
	color: #c1c3be;
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
	border-radius: 1.5em;		
	display: flex; justify-content: center; flex-direction: column; align-items: flex-start;
	padding-top: 0.3em;
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
	width: 100%;
}



.div-input-mall-square {
	border-radius: 0.5em; border:1px solid white;	
	color: #1c2645;
	font-weight: 600;			
}

.footer {
	background: #eaf4ff;
}

.overlay {
      position: absolute;
      top: 0;
      left: 0;
      clear: float;
      width: 100%;
      height: 100%;
background: linear-gradient(180deg, rgba(0, 0, 0, 0) 66.15%, #000000 100%);
      color: #ffffff;	
      border-radius: 1em;
}

</style>
@endsection

@section('content')
<header class="style__Container-sc-3fiysr-0 header" style="background: #EAF4FF;">
	<div class="container-mall">
		<h1 style="color: #FF006E; font-weight: 600; margin-top: 0.6em; margin-bottom: 0px; line-height: 0.8em;">Toko</h1>
		<h7 style="color: #B3B6BC; margin-top: 0px;">Temukan toko anda</h7>
		<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="margin-bottom: 0.5em; ">

			<div style="width: 100%; margin-bottom: 0px;">
				<div class="div-input-mall-square" style="background: white; display: flex; align-items: center; margin-right: 0.5em;"> 
					<span class="input-group-text-mall" style="margin-left: 0.8em; ">
							<img src="<?=url('/')?>/public/img/icon_svg/search_grey.svg">
					</span>
					<input type="text" class="form-control-mall" id="cari_toko" name="cari_produk" placeholder="Cari Toko" aria-label="Cari produk" aria-describedby="basic-addon1" value="" style="width: 100%; height: 3em; margin-right: 1em; background: white; color: grey !important;" required>
				</div>
				{{-- <div style="width: 3.4em; height: 3em; background: #FF006E; border-radius: 0.5em; display: flex; justify-content: center;align-items: center;">
					<img src="<?=url('/')?>/public/img/icon_svg/filter_white.svg" style="width: 50%;">
				</div> --}}
			</div>
		</div>
		<div style="width: 100%; display: flex; justify-content: center; margin-bottom: 0em;">
			<div class="slider">
				@php $i= 0; @endphp
				@php
				$kategori = array('Makanan','Minuman','Pakaian', 'Makanan','Minuman');
				$kategori_id = array('1', '2', '3', '1', '2');
				$fix_kategori_id = array();
				$fix_kategori = array();
				@endphp 

				<div onclick="fungsi_kategori('all')" class="slider-toko" style="margin-left: 2%">
					<div style='text-align: left; font-size: 0.75em; padding: 0em 0em 1.2em 0.5em; width: 100%;  color: white; background-size: cover; position: relative;'> 
						<div style="font-weight: 500; color: black;">Semua</div>

					</div>
				</div> 

				@for ($i = 0; $i < count($kategori); $i++)
				@php $fix_kategori_id = $kategori_id[$i]; @endphp

				<div onclick="fungsi_kategori('{{$fix_kategori_id}}')"  class="slider-toko" style="@if ($i == count($kategori)-1) margin-right: 8%; @endif">
					<div style='text-align: left; font-size: 0.75em; padding: 0em 0em 1.2em 0.5em; width: 100%;  color: white; background-size: cover; position: relative;'> 
						<div style="font-weight: 500; color: black; white-space: nowrap;">{{ucfirst(strtolower($kategori[$i]))}}</div>

					</div>
				</div> 
				@endfor

			</div>
		</div>

	</div>
</header>

<main id="homepage" class="homepage" style="background: #eaf4ff;">
	<div class="row-mall" style="padding: 0em 0em 5.5em 0em; margin-top: 12em; background: #eaf4ff;">
		<div id="post-data" style="padding: 0em 0.5em; margin-bottom: 4em; display: flex; justify-content: space-between; flex-wrap: wrap;">
			@include('toko.toko_data')
		</div>
	</div>
</main>

@endsection

@section('footer-scripts')
<script>
	var status = 1;
	var page = 2;
	var ulang = 0;
	var jumlah_data =20;
	function loadMoreData(page, cari, nilai){
		$.ajax({
			url: '?page=' + page + '&cari=' + cari,
			type: 'get',
			beforeSend: function(){
			}
		})
		.done(function(data){
			status = nilai;
			jumlah_data = data.jumlah_data;
			if(data.html == ""){
				status = 0;
				if(cari == 'all'){
					loadMoreData(1, cari, 0)
				}
			}
			if(ulang == 1){
				ulang = 0;
				$('#post-data').empty();
			}
			
			$('#post-data').append(data.html);
			
		})
		.fail(function(jqXHR, ajaxOptions, thrownError){
			alert("server errror");
		}); 
	}
	
	

	$(window).scroll(function(){
		if($(window).scrollTop() + $(window).height() >= $(document).height()){
			var cari = $('#cari_toko').val();
			if(cari == ''){
				cari = 'all';
			}
			if(status == 1){
				page++;
			}
			else{
				page = 2;
			}
			loadMoreData(page, cari, 1);
		}
	})

	$(document).ready(function(){
		var cari = $('#cari_toko').val();
		page = 1;
		loadMoreData(page, cari, 1);
	})

	$(document).ready(function(){
		$('#cari_toko').on('input', function(){
			var cari = $('#cari_toko').val();
			page = 1;
			ulang = 1;
			if(cari == ''){
				cari = 'all';
			}
			loadMoreData(page, cari, 1);
		});
	})
</script>
@endsection
