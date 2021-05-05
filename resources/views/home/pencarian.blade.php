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

<header class="style__Container-sc-3fiysr-0 header" style="background: #eaf4ff;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: center; flex-direction: column; height: 55px;">
		<div class="pencarian-tabs" style="display: flex; justify-content: center; background: white; padding: 8px; border-radius: 1.5em;">
			<a href="<?=url('/')?>/pencarian/maps" onclick="show_loader()">
				Maps
			</a>
			<a class="active-mall" href="<?=url('/')?>/pencarian/explore" onclick="show_loader()">
				Explore
			</a>
		</div>

		
	</div>
</header>


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

	function loadMoreData(page){
		$.ajax({
			url: '?page=' + page,
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
			console.log(page);
		})
		.fail(function(jqXHR, ajaxOptions, thrownError){
			// alert("server errror");
		}); 
	}

	$(window).scroll(function(){
		if($(window).scrollTop() + $(window).height() + 30 >= $(document).height()){
			var check = $("#no_more_check").val();
			if(status == 1){
				loadMoreData(page);
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
			loadMoreData(page);
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
