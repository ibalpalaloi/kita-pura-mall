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
</style>
@endsection

@section('content')
<header class="style__Container-sc-3fiysr-0 header" style="background: #eaf4ff;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: center; flex-direction: column; height: 55px;">
		<div class="pencarian-tabs" style="display: flex; justify-content: center; background: white; padding: 8px; border-radius: 1.5em;">
			<a href="<?=url('/')?>/pencarian/maps">
				Maps
			</a>
			<a class="active-mall" href="<?=url('/')?>/pencarian/explore">
				Explore
			</a>
		</div>
	</div>
</header>


<main id="homepage" class="homepage" style="background: #eaf4ff;">
	<div class="card-pencarian" style="background: #eaf4ff;">
		<div class="nama-kategori" style="background: #eaf4ff; padding-top: 0.6em; margin-top: 4em; display: flex; flex-direction: column; flex-wrap: wrap;">
			@include('home.data_pencarian')
			<br><br><br><br>
		</div>
		<div id="loading" class="spinner-border text-primary" role="status">
			<div class="spinner-border text-danger" role="status">
				<span class="sr-only">Loading...</span>
			  </div>
			  <br><br><br><br><br><br><br>
		</div>
		<div class="no_more text-center" style="display: none">
			No More ......
			<input type="text" id="no_more_check" hidden value="1">
			<br><br><br><br><br>
		</div>
	</div>
</main>
@endsection

@section('footer-scripts')
<script type="text/javascript">
	function tampil_gambar(gambarnya) {
		alert(gambarnya);
		// body...
	}
</script>
<script>
	var page = 1;
	// $(document).ready(function(){
	// 	page = 1;
	// 	loadMoreData(page);
	// })

	function loadMoreData(page){
		$.ajax({
			url: '?page=' + page,
			type: 'get',
			beforeSend: function(){
				$("#loading").show();
			}
		})
		.done(function(data){
			$('#loading').hide();
				$('.nama-kategori').append(data.html);
		})
		.fail(function(jqXHR, ajaxOptions, thrownError){
			alert("server errror");
		}); 
	}

	$(window).scroll(function(){
		if($(window).scrollTop() + $(window).height() >= $(document).height()){
			var check = $("#no_more_check").val();
			if(check == 1){
				page++;
				loadMoreData(page);
				$("#loading").show();
			}
		}
	})
</script>

@endsection
