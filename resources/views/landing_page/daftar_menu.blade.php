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
	width: 100%;
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
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" >
		<a class="svg_color" href="javascript:history.back()" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; margin-right: ">
			<svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M1.09413 11.5312C0.524614 10.9617 0.524613 10.0383 1.09413 9.46882L9.84413 0.718824C10.4136 0.149308 11.337 0.149308 11.9065 0.718824C12.476 1.28834 12.476 2.2117 11.9065 2.78122L4.18772 10.5L11.9065 18.2188C12.476 18.7883 12.476 19.7117 11.9065 20.2812C11.337 20.8507 10.4136 20.8507 9.84413 20.2812L1.09413 11.5312Z" fill="{{$page->warna_header}}"/>
				</svg>
			</a>
			<a style="height: 100%; width: 80%; display: flex; justify-content: center; align-items: center; font-size: 1.5em; font-weight: 600; color: {{$page->warna_header}}">
				@php echo $toko->username @endphp
			</a>
			@if (Auth::user())
			@if(Auth()->user()->id == $toko->users_id)
			<a onclick="show_loader()" style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center;" href="<?=url('/')?>/akun/mitra/premium">

				<svg width="25" height="30" viewBox="0 0 25 30" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M5.91667 10.3333V7.49996C5.91667 5.62134 6.66294 3.81967 7.99133 2.49129C9.31971 1.1629 11.1214 0.416626 13 0.416626C14.8786 0.416626 16.6803 1.1629 18.0087 2.49129C19.3371 3.81967 20.0833 5.62134 20.0833 7.49996V10.3333H24.3333C24.7091 10.3333 25.0694 10.4825 25.3351 10.7482C25.6007 11.0139 25.75 11.3742 25.75 11.75V28.75C25.75 29.1257 25.6007 29.486 25.3351 29.7517C25.0694 30.0174 24.7091 30.1666 24.3333 30.1666H1.66667C1.29094 30.1666 0.930608 30.0174 0.664932 29.7517C0.399255 29.486 0.25 29.1257 0.25 28.75V11.75C0.25 11.3742 0.399255 11.0139 0.664932 10.7482C0.930608 10.4825 1.29094 10.3333 1.66667 10.3333H5.91667ZM5.91667 13.1666H3.08333V27.3333H22.9167V13.1666H20.0833V16H17.25V13.1666H8.75V16H5.91667V13.1666ZM8.75 10.3333H17.25V7.49996C17.25 6.37279 16.8022 5.29178 16.0052 4.49476C15.2082 3.69773 14.1272 3.24996 13 3.24996C11.8728 3.24996 10.7918 3.69773 9.99479 4.49476C9.19777 5.29178 8.75 6.37279 8.75 7.49996V10.3333Z" fill="{{$page->warna_header}}"/>
					</svg>
				</a>
				@else
				<a  href="<?=url('/')?>/user/keranjang/{{Request::segment(1)}}" style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; position: relative;">

					<svg width="25" height="30" viewBox="0 0 25 30" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5.91667 10.3333V7.49996C5.91667 5.62134 6.66294 3.81967 7.99133 2.49129C9.31971 1.1629 11.1214 0.416626 13 0.416626C14.8786 0.416626 16.6803 1.1629 18.0087 2.49129C19.3371 3.81967 20.0833 5.62134 20.0833 7.49996V10.3333H24.3333C24.7091 10.3333 25.0694 10.4825 25.3351 10.7482C25.6007 11.0139 25.75 11.3742 25.75 11.75V28.75C25.75 29.1257 25.6007 29.486 25.3351 29.7517C25.0694 30.0174 24.7091 30.1666 24.3333 30.1666H1.66667C1.29094 30.1666 0.930608 30.0174 0.664932 29.7517C0.399255 29.486 0.25 29.1257 0.25 28.75V11.75C0.25 11.3742 0.399255 11.0139 0.664932 10.7482C0.930608 10.4825 1.29094 10.3333 1.66667 10.3333H5.91667ZM5.91667 13.1666H3.08333V27.3333H22.9167V13.1666H20.0833V16H17.25V13.1666H8.75V16H5.91667V13.1666ZM8.75 10.3333H17.25V7.49996C17.25 6.37279 16.8022 5.29178 16.0052 4.49476C15.2082 3.69773 14.1272 3.24996 13 3.24996C11.8728 3.24996 10.7918 3.69773 9.99479 4.49476C9.19777 5.29178 8.75 6.37279 8.75 7.49996V10.3333Z" fill="{{$page->warna_header}}"/>
						</svg>



						<div style="width: 1.5em; height: 1.5em; background:#9d0208; position: absolute;border-radius: 50%; bottom: 0.3em; right: 1em; background: #FF0000; color: white; text-align: center;" id="jumlah_keranjang">{{$keranjang}}</div>
					</a>

					@endif
					@else
					<a  style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; position: relative;">

						<svg width="25" height="30" viewBox="0 0 25 30" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M5.91667 10.3333V7.49996C5.91667 5.62134 6.66294 3.81967 7.99133 2.49129C9.31971 1.1629 11.1214 0.416626 13 0.416626C14.8786 0.416626 16.6803 1.1629 18.0087 2.49129C19.3371 3.81967 20.0833 5.62134 20.0833 7.49996V10.3333H24.3333C24.7091 10.3333 25.0694 10.4825 25.3351 10.7482C25.6007 11.0139 25.75 11.3742 25.75 11.75V28.75C25.75 29.1257 25.6007 29.486 25.3351 29.7517C25.0694 30.0174 24.7091 30.1666 24.3333 30.1666H1.66667C1.29094 30.1666 0.930608 30.0174 0.664932 29.7517C0.399255 29.486 0.25 29.1257 0.25 28.75V11.75C0.25 11.3742 0.399255 11.0139 0.664932 10.7482C0.930608 10.4825 1.29094 10.3333 1.66667 10.3333H5.91667ZM5.91667 13.1666H3.08333V27.3333H22.9167V13.1666H20.0833V16H17.25V13.1666H8.75V16H5.91667V13.1666ZM8.75 10.3333H17.25V7.49996C17.25 6.37279 16.8022 5.29178 16.0052 4.49476C15.2082 3.69773 14.1272 3.24996 13 3.24996C11.8728 3.24996 10.7918 3.69773 9.99479 4.49476C9.19777 5.29178 8.75 6.37279 8.75 7.49996V10.3333Z" fill="#fff"/>
						</svg>
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
							{{-- <div style="width: 3.4em; height: 3em; background: {{$page->warna_header}}; border-radius: 0.5em; display: flex; justify-content: center;align-items: center;">
								<img src="<?=url('/')?>/public/img/icon_svg/filter_white.svg" style="width: 50%;">
							</div> --}}
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
				function masukan_keranjang(toko_id, produk_id){
					$.ajax({
						url : "{{ route('tambah_keranjang_belanja') }}",
						method : 'post',
						data : {toko_id:toko_id, produk_id:produk_id, _token:'{{csrf_token()}}'},
						success:function(data)
						{
							var jumlah_keranjang = $("#jumlah_keranjang").html();
							jumlah_keranjang = parseInt(jumlah_keranjang)+1;
							$("#jumlah_keranjang").html(jumlah_keranjang);
						}
					});

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

				function go_link(link){
					show_loader();
					location.href=link;
				}
			</script>

			@endsection
