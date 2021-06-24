@extends('layouts.home')

@section('title')
Explore |
@endsection

@section('header-scripts')
<style type="text/css">
	.pencarian-tabs > a {
		padding: 0.5em 1.5em 0.5em 1.5em;
		color: #ff006e;
		border-radius: 1.5em;
		margin: 0em 0.5em 0em 0.5em;
		font-size: 0.7em;
	}

	.active-mall {
		background: #ff006e;
		color: white !important;
	}


	.active-mall-kategori {
		background: #ff006e;
		color: white !important;
		border-radius: 1.5em;
	}

	#mapid {
		height: 100vh;
		z-index: 0;
	}

	.detail-product > img {
		object-fit: cover;
		width: 100%;
		height: 18em;	
		border-radius: 0.2em;
	}

	.star-rating {
		color: #ff006e;
	}

	.star-no-rating {
		color: #c4c4c4;
	}

	.nilai-product {
		margin-right: 0.8em;
	}

	.nilai-product > img{
		width: 2.2em;
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

	.div-input-mall-square {
		border-radius: 0.5em; border:1px solid white;	
		color: #1c2645;
		font-weight: 600;			
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

	.kategori-tabs {
		display: flex; 
		justify-content: center;
		width: 90%;
	}

	.slider {
		width: 100%;
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
		width: 9em;		
	}

	.slider-toko img {
		width: 9em;
		object-fit: cover;
		border-top-left-radius: 1em;
		border-top-right-radius: 1em;
	}

	.slider-toko > div {
		border-bottom-left-radius: 1em;
		border-bottom-right-radius: 1em;
	}  

	.swiper-container {
		width: 100%;
		height: 100%;
	}

	.swiper-slide {
		text-align: center;
		font-size: 18px;
		background: #fff;

		/* Center slide text vertically */
		display: -webkit-box;
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		-webkit-justify-content: center;
		justify-content: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		-webkit-align-items: center;
		align-items: center;
	}

</style>
@endsection

@section('content')
<div class="modal fade" id="modal-open-image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: 0em 0em 0em 0em; color: white; border: none; box-shadow: none;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/close_btn.svg" style="position: absolute; top: 2em; right: 2em;">
				<img id="modal-image" src="" style="width: 100%; border-radius: 1em;">
			</div>
		</div>
	</div>
</div>
<header class="style__Container-sc-3fiysr-0 header" style="background: #EAF4FF;">
	<div class="container-mall">
		<div class="pencarian-tabs" style="display: flex; justify-content: center; background: white; padding: 8px; border-radius: 1.5em; margin-top: 0.5em;">
			<a href="<?=url('/')?>/pencarian/maps" onclick="show_loader()">
				Maps
			</a>
			<a class="active-mall" href="<?=url('/')?>/pencarian/explore" onclick="show_loader()">
				Explore
			</a>
		</div>



		<div style="width: 100%; display: flex; justify-content: center; margin-bottom: 0.5em; margin-top: 0.5em;">
			<div class="slider">
				@php $i= 0; @endphp
				@php
				$kategori = array('Makanan','Minuman','Pakaian', 'Makanan','Minuman');
				$kategori_id = array('1', '2', '3', '1', '2');
				$fix_kategori_id = array();
				$fix_kategori = array();
				@endphp 
				<div onclick="fungsi_kategori('all', 'all')"  class="slider-toko" style="margin-left: 8%;">
					<div class="active-mall-kategori" id="id_kategori_all" style='text-align: left; font-size: 0.75em; padding: 0.3em 0.7em 0.3em 0.7em; width: 100%;  color: black; background-size: cover; position: relative;'> 
						<div style="font-weight: 500; white-space: nowrap;">Semua</div>
					</div>
				</div> 

				@for ($i = 0; $i < count($data_kategori); $i++)
				@php $fix_kategori_id = $data_kategori[$i]['id']; @endphp

				<div onclick="fungsi_kategori('{{$fix_kategori_id}}', '{{$i}}')"  class="slider-toko" style="@if ($i == count($data_kategori)-1) margin-right: 8%; @endif">
					<div id="id_kategori_{{$i}}" style='text-align: left; font-size: 0.75em; padding: 0.3em 0.7em 0.3em 0.7em; width: 100%;  color: black; background-size: cover; position: relative;'> 
						<div style="font-weight: 500; white-space: nowrap;">{{ucfirst(strtolower($data_kategori[$i]['kategori']))}}</div>
					</div>
				</div> 
				@endfor
			</div>
		</div>

	</div>
</header>


<!-- 
<header class="style__Container-sc-3fiysr-0 header" style="background: #eaf4ff;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: center; flex-direction: column; margin-top: 3em;">

		
	</div>
</header>
 -->


<main id="homepage" class="homepage" style="background: #eaf4ff;">
	<div class="card-pencarian" style="background: #eaf4ff;">
		<div class="nama-kategori" style="background: #eaf4ff; padding-top: 0.6em; margin-top: 4em; display: flex; flex-direction: column; flex-wrap: wrap; margin-bottom: 7em;">
			@include('home.data_pencarian')
			<br><br><br><br>
		</div>
		<div id="loading" class="spinner-border text-danger" role="status" style="display: none; margin-bottom: 8em;">
			<div role="status">
				<span class="sr-only">Loading...</span>
			</div>
			<br><br><br><br><br><br><br>
		</div>
		<div class="no_more text-center" style="display: none">
			No More ......
			<input type="text" id="no_more_check" hidden value="1">
		</div>
	</div>
</main>
@endsection

@section('footer-scripts')
<script type="text/javascript">
	function tampil_gambar(gambarnya) {
		$("#modal-image").attr('src', gambarnya);
		$("#modal-open-image").modal('show');
	}
</script>
<script>
	var page = 2;
	var status = 1;
	var reload = 1;
	var kategori = "all";

	function fungsi_kategori(id_kategori, index_kategori){
		kategori = id_kategori;
		page =1;
		$('.nama-kategori').empty();
		loadMoreData(page, kategori);
		ubah_class_kategori(index_kategori)

	}

	function ubah_class_kategori(index_kategori){
		$("#id_kategori_all").removeClass();
		$("#id_kategori_all").css('color', 'black');
		for(i=0; i<10; i++){
			$("#id_kategori_"+i).removeClass();
			$("#id_kategori_"+i).css('color', 'black');
		}
		$("#id_kategori_"+index_kategori).addClass("active-mall-kategori");

	}

	function loadMoreData(page, kategori){
		$.ajax({
			url: '?page=' + page + "&kategori="+kategori,
			type: 'get',
			beforeSend: function(){
				$("#loading").show();
			}
		})
		.done(function(data){
			if(data.html == ""){
				reload = 0;
			}
			$('#loading').hide();
			$('.nama-kategori').append(data.html);
			status = 1;
		})
		.fail(function(jqXHR, ajaxOptions, thrownError){
			// alert("server errror");
		}); 
	}

	$(window).scroll(function(){
		if($(window).scrollTop() + $(window).height() + 30 >= $(document).height()){
			var check = $("#no_more_check").val();
			if(status == 1){
				loadMoreData(page, kategori);
				status = 0;
				if(reload == 1){
					page++;
				}
				$("#loading").show();
			}

		}
	})

	function trigger(){
		var check = $("#no_more_check").val();
		if(status == 1){
			loadMoreData(page, kategori);
			status = 0;
			if(reload == 1){
				page++;
			}
			$("#loading").show();
		}
	}

	function minus_page(){
		page--;
	}
</script>

@endsection
