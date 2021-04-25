@extends('layouts.home_no_menu')

@section('title')
@endsection

@section('header-scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">

<style type="text/css">
	.banner {
		max-width: 480px;
		width: 100%;
		margin: 0px auto;
		padding: 4em 0em 4em 0em;
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
		border-radius: 1.5em;	
		margin-bottom: 1em;
	}

	.kategori {
		padding: 0.8em 0em 1em 0em;
		display: flex; 
		position: relative; 
		top: -3em; 
		margin-bottom: -2em;
		z-index: 1;   
		overflow-y: visible; 
		overflow-x: visible; 			

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

	.div-input-mall {
		border-radius: 1.5em;
		border: 1px solid white;
		display: flex;
		justify-content: center;
		flex-direction: column;
		align-items: flex-start;
		background: white;
		padding-top: 0.3em;
		padding-bottom: 0.3em;
	}

	.div-input-mall .label-mall {
		color: #b3b6bc;
		padding: 0em 0em 0em 1.5em;
		font-size: 0.75em;
		position: relative;
		top: 0.5em;
	}

	.div-input-mall div {
		display: flex;
		justify-content: flex-start;
		flex-direction: row;
		width: 90%;
	}



	.div-input-mall-square {
		border-radius: 0.5em;
		border: 1px solid white;
		color: #1c2645;
		font-weight: 600;
	}

	.form-control-mall-square {
		border-radius: 1.5em !important;
		padding-left: 1.5em;	
	}



	.input-group-text-mall {
		border: none;
		display: flex;
		justify-content: center;
		border-bottom-left-radius: 1.5em;
		border-top-left-radius: 1.5em;
		padding-left: 0.2em;
	}

	.form-control-mall {
		height: 3em; 
		border-left: none;	
		padding-left: 1em;	
		color: #1c2645;
		font-weight: 600;
	}

	.form-control-mall-modal {
		border-radius: 1.5em !important;
		padding-left: 1.5em;	
	}

	input:focus {
		border: none;
	}

	.form-control {
		border: none;
	}


	.animate-bottom {
		position: relative;
		animation: animatebottom 0.4s;
	}

	@keyframes animatebottom {
		from {
			bottom: -200px;
			opacity: 0;
		}

		to {
			bottom: 0;
			opacity: 1;
		}
	}

	input:focus {
		border: none;
	}

	.form-control {
		border: none;
	}


	.profile-picture {
		background: transparent;
		border-radius: 50%;
		display: flex;
		width: 100%;
		border: 2px dashed white;
	}


	.select2-container--default .select2-selection--multiple .select2-selection__choice {
		background-color: #007bff;
		border-color: #006fe6;
		color: #fff;
		padding: 0 10px;
		margin-top: .31rem;
	}

	.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
		color: rgba(255, 255, 255, .7);
		float: right;
		margin-left: 5px;
		margin-right: -2px;
	}

	.select2-container--default .select2-selection--single .select2-selection__rendered {
		height: 25px !important;
	}

	.select2-container .select2-selection--single {
		height: auto !important;
	}

	select {
		-webkit-appearance: none;
		-moz-appearance: none;
		text-indent: 1px;
		text-overflow: '';
		border: none;
		width: 100%;
		margin-left: 0.4em;
	}

	input {
		border: none;
	}


	body {
		background: #eaf4ff;
	}

	.form-group label {
		color: #b3b6bc;
		font-weight: 600;
		margin-bottom: 0.4em;	
		font-size: 0.9em;	
	}

	input[type="text"]:disabled{background-color:white;}	

	.cr-slider-wrap {
		display: none;
	}

	.homepage {
		min-height: calc(50vh - 60px);
	}

	input[type=checkbox] {
		transform: scale(1.4);
		margin-top: 0.8em;
		background: #FF0F6F;
	}	
</style>
<script type="text/javascript">
	const formatToCurrency = amount => {
		return "IDR " +amount.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
		// return "IDR. " + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
	};	
</script>
@endsection

@section('content')
<?php
$pemilik = "";
$no_hp = "";
$latitude = "";
$longitude = "";
$alamat = "";
$buka = "";
$tutup = "";
$hari = "";
if (!empty($_GET['pemilik'])){
	$pemilik = $_GET['pemilik'];
}
if (!empty($_GET['no_hp'])){
	$no_hp = $_GET['no_hp'];
}

if (!empty($_GET['x'])){
	$latitude = $_GET['x'];
}
if (!empty($_GET['y'])){
	$longitude = $_GET['y'];
}
if (!empty($_GET['alamat'])){
	$alamat = $_GET['alamat'];
}
if (!empty($_GET['buka'])){
	$buka= $_GET['buka'];
}
if (!empty($_GET['tutup'])){
	$tutup = $_GET['tutup'];
}
if (!empty($_GET['hari'])){
	$hari = $_GET['hari'];
}

?>

<div class="modal fade" id="modal-keranjang-black" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: 0em 0em 0em 0em; color: white; border: none; box-shadow: none;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: 30%; right: 1em;">
				<img src="<?=url('/')?>/public/img/modal_assets/modal_confirm_pink.svg" style="width: 100%;">
				<div style="position: absolute; margin: 3% 1.5em 0em 1.5em; padding: 0em 1.5em 0em 1.5em; top: 55%;">
					<div style="font-size: 2em; font-weight: 600; text-align: center;">Yakin ?</div>
					<div style="font-size: 1em; text-align: center; width: 90%; font-weight: 0; color: white; margin-bottom: 1.2em;">Apakah kamu yakin menghapus data ini ?</div>
					<form style="display: flex; justify-content: center;" method="post" action="<?=url('/')?>/user/keranjang/hapus_keranjang">
						@csrf
						<input id="id_keranjang" name="id_keranjang" hidden>
						<button type="submit" class="btn" style="background: #FF0088; padding: 0.3em 2em; border-radius: 1.5em; font-size: 1.2em; margin-right: 0.5em; color: white;">Ya</button>
						<div data-dismiss="modal" style="background: #FFAA00; padding: 0.3em 1.5em; border-radius: 1.5em; font-size: 1.2em; margin-left: 0.5em;">Tidak</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal-sukses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
		<div class="modal-content" style="border-radius: 1.2em; background: #ff006e; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<div class="container">
					<div class="panel panel-info">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4 text-center">
									<div id="upload-demo">

									</div>
								</div>
								<div class="col-md-4" style="padding:5%;">
									<input type="file" id="image" hidden>
									<div class="btn btn-primary btn-block" id="unggah_foto" onclick="unggah_foto()">Unggah Foto</div>
									<div id="div_upload" hidden>
										<button class="btn btn-primary btn-block upload-image" style="margin-top:2%" >Upload Image</button>
										<button class="btn btn-secondary btn-block" onclick="unggah_foto()">Unggah Foto</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<header class="style__Container-sc-3fiysr-0 header" style="background: white; padding-top: 0.3em;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" >
		<a class="svg_color" href="javascript:history.back()" style=" width: 10%; height: 100%; display: flex; justify-content: center; align-items: center; margin-right: ">
			<svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M1.09413 11.5312C0.524614 10.9617 0.524613 10.0383 1.09413 9.46882L9.84413 0.718824C10.4136 0.149308 11.337 0.149308 11.9065 0.718824C12.476 1.28834 12.476 2.2117 11.9065 2.78122L4.18772 10.5L11.9065 18.2188C12.476 18.7883 12.476 19.7117 11.9065 20.2812C11.337 20.8507 10.4136 20.8507 9.84413 20.2812L1.09413 11.5312Z" fill="#FF0F6F"/>
			</svg>
		</a>
		<a style="height: 100%; width: 80%; display: flex; justify-content: center; align-items: center; font-size: 1.5em; font-weight: 600; color:#FF0F6F;">
			Keranjang
		</a>
		<div style="width: 10%; color: white">.</div>
	</div>
</header>


<main id="homepage" class="homepage" style="padding: 0px; background: #eaf4ff !important;">
	<div style="display: flex; justify-content: center; position: relative; flex-direction: column; align-items: center; background: white; margin-top: 4.5em; background: #eaf4ff;">	
		<script type="text/javascript">
			var sub_keranjang_current = {};
			var sub_keranjang = {};
			var sub_total = [];
			var sub_total_current = [];
		</script>

		@for ($i = 0; $i < count($data_keranjang); $i++)
		<div class="toko" style="background: white; width: 100%; padding: 0% 5%; margin-bottom: 0.5em; padding-top: 1em;">
			<a class="nama-toko" href="<?=url('/')?>/<?=$data_keranjang[$i]['username']?>" style="margin: 1em 0em; font-size: 1.15em;font-weight: 600; color: #FF0F6F;">{{$data_keranjang[$i]['nama_toko']}}</a>
			<script type="text/javascript">
				sub_total["<?=$data_keranjang[$i]['id_toko']?>"] = 0;
				sub_keranjang["<?=$data_keranjang[$i]['id_toko']?>"] = "";

			</script>
			<div class="daftar-product" style="margin-top: 1em;">
				@foreach ($data_keranjang[$i]['product'] as $row)
				<div class="product" style="display: flex; justify-content: space-between; margin-bottom: 1em;">
					<div class="" style="width: 5%;">
						<input type="checkbox" name="" checked id="checkbox_{{$row->id}}" onclick='checkbox_check("<?=$row->id?>", "<?=$row->harga?>", "<?=$data_keranjang[$i]['id_toko']?>")'>
					</div>
					<div class="deskripsi-product" style="width: 47%;"> 
						<div class="nama" id="nama_{{$row->id}}" style="font-size: 1em; font-weight: 500;"><?=ucwords(strtolower(substr(strip_tags($row->nama), 0, 35)))?>@if (strlen($row->nama) > 35)..@endif</div>

						@php $hasil_diskon_string = ""; @endphp
						@if ($row->jenis_harga == 'Statis')
						@if($row->diskon != '0')
						<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
							<s>IDR. {{number_format($row->harga)}}</s>
						</div>
						@php
						$hasil_diskon = ($row->harga)-((($row->diskon)/100)*($row->harga));
						@endphp
						<div style="padding: 0; margin: 0.1em 0px 0px 0em; font-size: 1.1em; line-height: 1em; font-weight: 500;">IDR. {{number_format($hasil_diskon)}}</div>
						@php $hasil_diskon_string = number_format($hasil_diskon); @endphp
						@else
						<div class="harga">IDR. {{number_format($row->harga,0,',','.')}}</div>
						@endif	

						@else
						<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
							Harga Mulai
						</div>
						<div style="padding: 0; margin: 0.1em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($row->harga_terendah)}}</div>

						@endif

						<div class="button-detail" style="margin-top: 1em; display: flex;">
							<div id="kurang_{{$row->id}}" style="width: 2em; height: 2em;background: #FF0F6F; color: white;border-radius: 50%; text-align: center; font-size: 0.7em; padding-top: 0.3em; margin-right: 0.2em;" onclick='ubah_pesanan("<?=$row->id?>", "kurang", "<?=$row->harga?>", "<?=$data_keranjang[$i]['id_toko']?>", "<?=$row->diskon?>")'><i class="fa fa-minus"></i></div>
							<div style="width: 3em; height: 2em; background: #FF0F6F; color: white; border-radius: 2em; display: flex; justify-content: center; align-items: center; margin-right: 0.2em; font-size: 0.7em; font-weight: 700;" id="jumlah_pesanan_<?=$row->id?>">{{$row->jumlah}}</div>
							<div id="tambah_{{$row->id}}" style="width: 2.1em; height: 2em; background: #FF0F6F; color: white; border-radius: 50%;text-align: center; font-size: 0.7em; padding-top: 0.3em;" onclick='ubah_pesanan("<?=$row->id?>", "tambah", "<?=$row->harga?>", "<?=$data_keranjang[$i]['id_toko']?>", "<?=$row->diskon?>")'><i class="fa fa-plus"></i></div>
						</div>									
					</div>

					<a href="<?=url('/')?>/{{$data_keranjang[$i]['username']}}/daftar-menu/{{$row->product_id}}" class="foto-product" style="width: 30%;">
						<img src="<?=url('/')?>/public/img/toko/{{$data_keranjang[$i]['id_toko']}}/produk/240x240/{{$row->foto_produk}}" style="width: 100%; border-radius: 1em;">
					</a>
					<div class="" style="display: flex; justify-content: center; align-items: center; width: 8%;" onclick="hapus_keranjang('<?=$row->id?>')">
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15 4H20V6H18V19C18 19.2652 17.8946 19.5196 17.7071 19.7071C17.5196 19.8946 17.2652 20 17 20H3C2.73478 20 2.48043 19.8946 2.29289 19.7071C2.10536 19.5196 2 19.2652 2 19V6H0V4H5V1C5 0.734784 5.10536 0.48043 5.29289 0.292893C5.48043 0.105357 5.73478 0 6 0H14C14.2652 0 14.5196 0.105357 14.7071 0.292893C14.8946 0.48043 15 0.734784 15 1V4ZM16 6H4V18H16V6ZM7 9H9V15H7V9ZM11 9H13V15H11V9ZM7 2V4H13V2H7Z" fill="#FF0F6F"/>
						</svg>							
					</div>
				</div>

				<script type="text/javascript">
					@if ($row->jenis_harga == 'Statis')
					@if($row->diskon != '0')
					@php
					$hasil_diskon = ($row->harga)-((($row->diskon)/100)*($row->harga));
					$hasil_diskon_string = number_format($hasil_diskon);				
					@endphp
					sub_total["<?=$data_keranjang[$i]['id_toko']?>"] += <?=$hasil_diskon?>*<?=$row->jumlah?>;
					@else
					sub_total["<?=$data_keranjang[$i]['id_toko']?>"] += <?=$row->harga?>*<?=$row->jumlah?>;
					@endif	
					@endif
					sub_keranjang["<?=$data_keranjang[$i]['id_toko']?>"] += "<?=$row->id?>"+"~";
				</script>

				@endforeach

			</div>
		</div>
		<div style="width: 100%; display: flex; justify-content: center;">
			<div class="" onclick='WhatsappMessage("<?=$data_keranjang[$i]['no_hp']?>", "<?=$data_keranjang[$i]['nama_toko']?>", "<?=$data_keranjang[$i]['id_toko']?>", "no")' style="width: 90%; background: linear-gradient(41.88deg, #4AAE20 35.3%, #5EE825 88.34%); border-radius: 35px; padding: 0.5em; color: white; text-align: center; margin-bottom: 1em; position: relative;">
				<img src="<?=url('/')?>/public/img/icon_svg/whatsapp.svg" style="width: 1.2em; position: absolute; left: 3.8em;top: 0.6em;"><span id="sub_total_<?=$data_keranjang[$i]['id_toko']?>">Rp. 1.500.000</span>
			</div>
		</div>
		<script type="text/javascript">
			document.getElementById("sub_total_<?=$data_keranjang[$i]['id_toko']?>").innerHTML = formatToCurrency(sub_total["<?=$data_keranjang[$i]['id_toko']?>"]);
		</script>

		@endfor
	</div>


</main>


@if(Session::has('message'))
<div id="modal-pemberitahuan" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="width: 100%;">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body text-center font-weight-bold py-3">
				{{Session::get('message')}}
				<div class="row mt-2 p-2">
					<a href="<?=url('/')?>/akun" type="button" class="col-sm-12 btn waves-effect waves-light btn-outline-secondary">Tutup</a>

				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
@endif

@endsection

@section('footer-scripts')
<script src="<?=url('/')?>/public/template/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>


<script type="text/javascript">

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

		// const formatToCurrency = amount => {
		// 	return "IDR." + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "&,");
		// };

		var isMobile = mobilecheck();

		function checkbox_check(id, harga, id_product){
			var jumlah = parseInt($("#jumlah_pesanan_"+id).html())*parseInt(harga);
			if ($('#checkbox_'+id).is(':checked')) {
				sub_total[id_product] = sub_total[id_product]+jumlah;
			}
			else {
				sub_total[id_product] = sub_total[id_product]-jumlah;				
			}
			$("#sub_total_"+id_product).html(formatToCurrency(sub_total[id_product]));

		}


		function checkbox_check_current(id, harga, id_product){
			var jumlah = parseInt($("#jumlah_pesanan_"+id).html())*parseInt(harga);
			// alert(jumlah);
			if ($('#checkbox_'+id).is(':checked')) {
				sub_total_current[id_product] = sub_total_current[id_product]+jumlah;
			}
			else {
				sub_total_current[id_product] = sub_total_current[id_product]-jumlah;				
			}
			$("#sub_total_current_"+id_product).html(formatToCurrency(sub_total_current[id_product]));

		}

		function mobilecheck() {
			var check = false;
			(function (a) {
				if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i
					.test(a) ||
					/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| ||a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i
					.test(a.substr(0, 4))) check = true;
			})(navigator.userAgent || navigator.vendor || window.opera);
			return check;
		}


		function WhatsappMessage(no_hp, nama, id_product, current) {
			event.preventDefault();
			var apilink = 'http://';
			var phone = no_hp;
			var produk = "";
			var jumlah_pesanan = "";
			var nama_produk = "";
			var keynota = "";

			if (current == 'yes'){
				var result = sub_keranjang_current[id_product].split("~");
				var harga_sub_total = $("#sub_total_current_"+id_product).html();
				var harga_sub_total_wa = sub_total_current[id_product];

			}
			else {
				var result = sub_keranjang[id_product].split("~");
				var harga_sub_total = $("#sub_total_"+id_product).html();
				var harga_sub_total_wa = sub_total[id_product];
			}
			
			for (var i = 0; i < result.length-1; i++){
				if ($('#checkbox_'+result[i]).is(':checked')) {
					jumlah_pesanan = $("#jumlah_pesanan_"+result[i]).html();
					nama_produk = $("#nama_"+result[i]).html();
					produk += jumlah_pesanan+" "+nama_produk+"\n";
    				keynota += result[i]+jumlah_pesanan;

				}
			}
			produk += "dengan harga total "+harga_sub_total;
			
			keynota += id_product+harga_sub_total_wa;

			var message = '[Order Produk Kitapuramall]\n\nHaloo '+nama+" saya ingin pesan produk \n"+produk;

			var walink = 'https://wa.me/'+ phone +'?text=' + encodeURI(message);

			for (var i = 0; i < result.length-1; i++){
				if ($('#checkbox_'+result[i]).is(':checked')) {
					$.ajax({
						url: "<?=url('/')?>/user/keranjang/tambah_daftar_tunggu",
						type: "POST",
						data: {"id_product":result[i], "id_toko":id_product, 'keynota':keynota},
						success: function (data) {

						}
					});

				}
			}        
			location.href=walink;
		} 


		var status_ganti_foto = 0;

		@if(Session::has('message'))
		$('#modal-pemberitahuan').modal('show');
		@endif

		@if(Session::has('pass_message'))
		$('#modal-ganti-pass').modal('show');
		@endif


		function pilih_jenkel(id, jenkel){
			$("#jenis_kelamin").val(jenkel);
			if (id == 'option_pria'){
				$("#option_pria").css('color', '#1c2645');
				$("#option_wanita").css('color', '#b3b7c0');
			}
			else {
				$("#option_wanita").css('color', '#1c2645');
				$("#option_pria").css('color', '#b3b7c0');
			}
		}

		function input_focus(id){
			$("#div_"+id).css('border', '1px solid #d1d2d4');
		}

		function input_blur(id){
			$("#div_"+id).css('border', '1px solid white');		
		}

		function ubah_pesanan(id, operasi, harga, id_product, diskon){
			var harga_diskon = harga-harga*diskon/100;
			if ($('#checkbox_'+id).is(':checked')) {

				var jumlah_pesanan = $("#jumlah_pesanan_"+id).html();
				if ((operasi == 'kurang') && (jumlah_pesanan == 1)){

				}
				else {
					$.ajax({
						url: "<?=url('/')?>/user/keranjang/ubah_jumlah",
						type: "POST",
						data: {"jumlah_pesanan":jumlah_pesanan, "id":id, 'operasi':operasi},
						success: function (data) {
    				// alert(data);
    				var sub_total_value = sub_total[id_product];

    				$("#jumlah_pesanan_"+id).html(data);
    				if (operasi == 'kurang'){
    					sub_total_value = parseInt(sub_total_value)-parseInt(harga_diskon);
    					$("#sub_total_"+id_product).html(formatToCurrency(sub_total_value));
    				}
    				else {
    					sub_total_value = parseInt(sub_total_value)+parseInt(harga_diskon);
    					$("#sub_total_"+id_product).html(formatToCurrency(sub_total_value));
    				}
    				sub_total[id_product] = sub_total_value;

    			}
    		});
				}
			}
			else {
				alert('silahkan centang');
			}



		}

		function hapus_keranjang(id){
			$("#id_keranjang").val(id);
			$("#modal-keranjang-black").modal('show');
		}


		function ubah_pesanan_current(id, operasi, harga, id_product){
			if ($('#checkbox_'+id).is(':checked')) {

				var jumlah_pesanan = $("#jumlah_pesanan_"+id).html();
				if ((operasi == 'kurang') && (jumlah_pesanan == 1)){

				}
				else {
					$.ajax({
						url: "<?=url('/')?>/user/keranjang/ubah_jumlah",
						type: "POST",
						data: {"jumlah_pesanan":jumlah_pesanan, "id":id, 'operasi':operasi},
						success: function (data) {
    				// alert(data);
    				var sub_total_value = sub_total_current[id_product];
    				$("#jumlah_pesanan_"+id).html(data);
    				if (operasi == 'kurang'){
    					sub_total_value = parseInt(sub_total_value)-parseInt(harga);
    					$("#sub_total_current_"+id_product).html(formatToCurrency(sub_total_value));
    				}
    				else {
    					sub_total_value = parseInt(sub_total_value)+parseInt(harga);
    					$("#sub_total_current_"+id_product).html(formatToCurrency(sub_total_value));
    				}
    				sub_total_current[id_product] = sub_total_value;

    			}
    		});

				}
			}
			else {
				alert('silahkan centang');
			}



		}



		var resize = $('#upload-demo').croppie({
			enableExif: true,
			enableOrientation: true,    
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
    width: 300,
    height: 300,
        type: 'circle' //square
    },
    boundary: {
    	width: 300,
    	height: 300
    }
});


		$('#image').on('change', function () { 
			$(".cr-slider-wrap").css("display", "block");
			var reader = new FileReader();
			reader.onload = function (e) {
				resize.croppie('bind',{
					url: e.target.result
				}).then(function(){
					console.log('jQuery bind complete');
				});
			}
			$("#div_upload").prop('hidden', false);
			$("#unggah_foto").prop('hidden', true);
			$("#prev_image").remove();
			reader.readAsDataURL(this.files[0]);
		});


		$('.upload-image').on('click', function (ev) {
			resize.croppie('result', {
				circle: false,
				type: 'canvas',
				size: 'viewport'
			}).then(function (img) {
				$.ajax({

					url: "<?=url('/')?>/akun/pengaturan-profil/simpan-foto",
					type: "POST",
					data: {"image":img},
					success: function (data) {
						$('#pic_toko_privew').attr('src', img);
						$("#modal-sukses").modal('hide');

					}
				});

			});
			status_ganti_foto = 1;

		});

		$( "#form_input").submit(function( event ) {
			show_loader();
		});

	</script>


	@endsection
