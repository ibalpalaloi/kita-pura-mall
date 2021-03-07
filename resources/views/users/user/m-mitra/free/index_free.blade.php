@extends('layouts.home_no_menu')

@section('title')

@endsection

@section('header-scripts')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/plugins/select2/css/select2.css">

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

	.modal-content {
		position: fixed;
		padding: 0;
		margin: 0;
		top: auto;
		right: auto;
		left: auto;
		bottom: 0;
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

	.form-control-mall-square {
		border-radius: 1.5em !important;
		padding-left: 1.5em;
	}


	.input-group-text-mall {
		border: none;
		display: flex;justify-content: center;
		border-bottom-left-radius: 1.5em; 
		border-top-left-radius: 1.5em; 
		padding-left: 1.2em;
	}


	.form-control-mall {
		height: 2.5em; 
		border-bottom-right-radius: 1.5em; 
		border-top-right-radius: 1.5em; 
		border-left: none;	
		color: #1c2645;
		font-weight: 600;
		padding: 0em 0em 0em 0.6em;	

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



	.select2-container--default .select2-selection--multiple .select2-selection__choice {
		background-color: #007bff;
		border-color: #006fe6;
		color: #fff;
		padding: 0 10px;
		margin-top: .31rem;        
	}

	.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
		color: rgba(255,255,255,.7);
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

	.div-feature {
		display: flex; justify-content: center; flex-direction: column; align-items: center;
	}

	.feature {
		background: #d9e1eb; 
		width: 75%; 
		padding: 0.3em 0.3em 0.3em 1.2em; 
		border-radius: 1.5em;
		margin: 0.25em;
		font-size: 0.7em;
		text-align: left;
	}

	.feature-premium {
		background: #d9e1eb; 
		width: 75%; 
		padding: 0.3em 0.3em 0.3em 1.2em; 
		border-radius: 1.5em;
		margin: 0.25em;
		font-size: 0.7em;
	}

	.modal-dialog-bottom{
		margin: 0;
		display: flex;
		align-items: flex-end;
		height: 100%;

	}  

	.div-input-mall .label-mall {
		color: #b3b6bc;
		padding: 0em 0em 0em 1.5em;
		font-size: 0.75em;
		position: relative;
		top: 0.3em;
	}	

	.list-kategori {
		display: flex; justify-content: flex-start; flex-wrap: wrap;
	}

	.list-kategori .badge {
		margin-right: 0.5em;
		border-radius: 0.8em;
	}


	.select2-selection--single {
		border: none !important;
		margin: 0.2em;
		padding: 0.3em;
	}
	.select2-selection__arrow {
		margin-top: 0.7em;
		display: none;
	}

</style>
@endsection


@section('content')
<?php
$buka = "";
$tutup = "";
$hari = "";
$input_kategori = "";
$input_id_kategori = "";
$status_ugrade = "";


?>
<div class="modal fade" id="modal-upgrade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; box-shadow: none; border: none;">
			<div style="width: 80%;">
				<div style="background: white; margin-top: 4.5em; border-radius: 1.5em; position: relative;">
					<div style="display: flex; justify-content: center; width: 100%; position: absolute; top: -3.5em;">
						<img src="<?=url('/')?>/public/img/mitra/premium_user_img.png" style="width: 100%; ">
					</div>
					<img src="<?=url('/')?>/public/img/mitra/premium_user_bg.png" style="width: 100%;">
					<div class="div-feature" style=" background: white; width: 100%; padding-top: 2.5em; padding-bottom: 2em; border-bottom-right-radius: 1.5em; border-bottom-left-radius: 1.5em;">
						<div class="feature">
							<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Lokasi
						</div>
						<div class="feature">
							<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Jadwal Buka Tutup
						</div>
						<div class="feature">
							<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Deskripsi
						</div>
						<div class="feature">
							<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Landing Page
						</div>
						<div class="feature">
							<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Preorder
						</div>
						<a href="{{url()->current()}}/upgrade-premium" class="btn btn-primary" style="background: #e18f00; font-size: 0.7em; margin-top: 0.5em;border: 1px solid #e18f00; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em;">Upgrade Premium Sekarang
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-kategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
		<div class="modal-content" style="border-radius: 1.2em; background: #eaf4ff; display: flex; justify-content: center; align-items: center;">
			<div class="modal-body">
				<div>
					<div class="nama-toko"
					style="font-weight: 600; font-size: 1em; line-height: 1.1em; font-size: 1.2em; text-align: center;">Silahkan
					Masukan Kategori<br>Usaha Anda</div>
				</div>
			</div>
			<div id="kategori_fix" style="width: 100%; display: flex; justify-content: center; flex-direction: column; align-items: center;">
				@foreach($kategorinya_toko as $row)
				@if($loop->first)
				@php
				$input_id_kategori .= $row->kategori_toko_id;
				@endphp
				@else
				@php
				$input_id_kategori .= '~'.$row->kategori_toko_id;
				@endphp
				@endif
				@endforeach

				<?php
				$kategori_val = array();
				$kategori_id_val = array();
				$i = 0;
				$loop_id_val = explode("~", $input_id_kategori);
				$loop_val = array();
				$k = 0;
				foreach ($daftar_kategori as $row){
					$kategori_val[$i] = $row->kategori;
					$kategori_id_val[$i] = $row->id;
					for ($j = 0; $j < count($loop_id_val); $j++){
						if ($loop_id_val[$j] == $row->id){
							$k++;
						}
					}
					$i++;
				}
				for ($i = 0; $i < count($loop_id_val); $i++){
					?>
					@if ($loop_id_val[0] != "")
					<div class="input-group mb-3 div-input-mall-square" id="{{str_replace(' ', '_', $loop_id_val[$i])}}" style="width: 90%; background: white; border: 1px solid white;">
						<div style="width: 20%; display: flex; justify-content: center; margin-left: 3%;">
							<div style="width: 2.5em; height: 2.5em; background:#ff006e; margin: 0.5em; border-radius: 50%; vertical-align: middle; color: white; padding: 0;line-height: 2.3em; text-align: center;">
								@for ($j = 0; $j < count($kategori_id_val); $j++) 
								@if ($kategori_id_val[$j]==$loop_id_val[$i])
								{{$kategori_id_val[$j]}}
								@endif 
								@endfor 
							</div> 
						</div> 
						<div style="margin-left: 2%; width: 60%;">
							<div style="margin-top: 0.5em; font-weight: 700; text-align: left;">
								{{$kategori_val[$i]}}
								<?php $loop_val[$i] = $kategori_val[$j]; ?>
							</div>
						</div>
						<div onclick='hapus_kategori("{{$loop_id_val[$i]}}")' style="width: 15%; cursor: pointer; display: flex; align-items: center; background: #ff006e; justify-content: center; border-top-right-radius: 0.5em; border-bottom-right-radius: 0.5em; color: white; font-weight:700; font-size: 1.2em;">
							X
						</div>
					</div>
					@endif
					<?php
				}
				?>
			</div>
			<div id="kategori_sample" style="width: 100%; display: flex; justify-content: center;" hidden>
				<div class="input-group mb-3 div-input-mall-square" id="kategorinya" style="width: 90%; background: white; border: 1px solid white;">
					<div style="width: 20%; display: flex; justify-content: center; margin-left: 3%;">
						<div style="width: 2.5em; height: 2.5em; background:#ff006e; margin: 0.5em; border-radius: 50%; vertical-align: middle; color: white; padding: 0;line-height: 2.3em; text-align: center;">
						simbolnya</div>
					</div>
					<div style="margin-left: 2%; width: 60%;">
						<div style="margin-top: 1em; font-weight: 700; text-align: left;">kategori_nya</div>
					</div>
					<div onclick='hapus_kategori("kategorinya")' style="width: 15%; cursor: pointer; display: flex; align-items: center; background: #ff006e; justify-content: center; border-top-right-radius: 0.5em; border-bottom-right-radius: 0.5em; color: white; font-weight:700; font-size: 1.2em;">
					X</div>
				</div>
			</div>
			<hr style="border-top: 1px solid #c8d2dd; width: 100%;">
			<div style="display: flex; justify-content: space-between; width: 90%;">
				<div class="input-group mb-3 div-input-mall" id="div_kategori" style="width: 80%;">
					<select type="text" class="form-control form-control-mall-modal" id="kategori" name="kategori" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" aria-label="kategori" aria-describedby="basic-addon1" style="width: 100%; text-align: center !important;">
						@if($daftar_kategori)
						@for ($i = 0; $i < count($kategori_id_val); $i++)
						@php $indikator = false; @endphp
						@for ($j = 0; $j < count($loop_id_val); $j++)
						@if ($loop_id_val[$j] == $kategori_id_val[$i]) 
						@php $indikator = true; @endphp
						@endif
						@endfor
						@if ($indikator == false)
						<option value="{{$kategori_id_val[$i]}}">{{$kategori_val[$i]}}</option>
						@endif
						@endfor

						@endif
					</select>
				</div>

				<div style="width: 14%; display: flex; justify-content: space-between;">
					<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 100%; background: #FF006E; display: flex; justify-content: center; color: white; align-items: center;"  onclick="tambah_kategori()">
						<i class="fa fa-plus"></i>
					</div>
				</div>
			</div>
			<?php 
			$div_disabled = "";
			$div_enabled = "";
			if ($jadwal){
				$div_disabled = "hidden";            	
			}
			else {
				$div_enabled = "hidden";
			}
			?>
			<button class="btn btn-secondary" id="simpan_disabled_kategori" onclick="simpan_disabled_kategori()" style="background: #6c757d;border: 1px solid #6c757d; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 90%; margin-bottom: 1em;" {{$div_disabled}}><img src="<?=url('/')?>/public/img/icon_svg/simpan_file.svg" style="width: 1em;">&nbsp;&nbsp;Simpan
			</button>
			<button data-dismiss="modal" id="simpan_enabled_kategori" class="btn btn-secondary" style="background: #80B918; border: 1px solid #80B918; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 90%; margin-bottom: 1em;" {{$div_enabled}}><img src="<?=url('/')?>/public/img/icon_svg/simpan_file.svg" style="width: 1em;">&nbsp;&nbsp;Simpan
			</button>

		</div>
	</div>
</div>

<div class="modal fade" id="modal-jadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-bottom" role="document" style="padding: 0px;">
		<div class="modal-content modal-content-jadwal" style="border-top-right-radius:1.2em; border-top-left-radius: 1.2em; background: #eaf4ff; display: flex; justify-content: center; align-items: center;">
			<div class="modal-body">
				<div>
					<div class="nama-toko"
					style="font-weight: 600; font-size: 1em; line-height: 1.1em; font-size: 1.2em;">Silahkan
					Masukan
					Jadwal<br>Buka/Tutup Usaha Anda</div>
				</div>
			</div>
			<div id="jadwal_fix" style="width: 100%; display: flex; justify-content: center; flex-direction: column; align-items: center;">
				@foreach($jadwal as $row)
				@if($loop->first)
				@php
				$hari .= $row->hari;
				$buka .= $row->jam_buka;
				$tutup .= $row->jam_tutup;
				@endphp
				@else
				@php
				$hari .= '~'.$row->hari;
				$buka .= '~'.$row->jam_buka;
				$tutup .= '~'.$row->jam_tutup;
				@endphp
				@endif
				@endforeach

				@php
				$var_value = array("SH", "SS", "SJ", "S", "S", "R", "K", "J", "S", "M");
				$var_text = array("Setiap-Hari", "Senin-Sabtu", "Senin-Jumat", "Senin", "Selasa", "Rabu",
				"Kamis","Jumat", "Sabtu", "Minggu");
				@endphp
				<?php 
				$loop_hari = explode("~", $hari);
				$loop_buka = explode("~", $buka);
				$loop_tutup = explode("~", $tutup);
				for ($i = 0; $i < count($loop_hari); $i++){
					?>
					@if ($loop_hari[0] != "")
					<div class="input-group mb-3 div-input-mall-square" id="{{str_replace(' ', '_', $loop_hari[$i])}}" style="width: 90%; background: white; border: 1px solid white;">
						<div style="width: 20%; display: flex; justify-content: center; margin-left: 3%;">
							<div style="width: 2.5em; height: 2.5em; background:#ff006e; margin: 0.5em; border-radius: 50%; vertical-align: middle; color: white; padding: 0;line-height: 2.3em; text-align: center;">
								@for ($j = 0; $j < count($var_text); $j++) 
								@if ($var_text[$j]==$loop_hari[$i])
								{{$var_value[$j]}} 
								@endif 
								@endfor 
							</div> 
						</div> 
						<div style="margin-left: 2%; width: 60%;">
							<div style="margin-top: 0.5em; font-weight: 700; text-align: left;">
								{{$loop_hari[$i]}}
							</div>
							<div style="font-size: 0.7em; text-align: left;">{{$loop_buka[$i]}} - {{$loop_tutup[$i]}}</div>
						</div>
						<div onclick='hapus_jadwal("{{$loop_hari[$i]}}")' style="width: 15%; cursor: pointer; display: flex; align-items: center; background: #ff006e; justify-content: center; border-top-right-radius: 0.5em; border-bottom-right-radius: 0.5em; color: white; font-weight:700; font-size: 1.2em;">
							X
						</div>
					</div>
					@endif
					<?php
				}
				?>
			</div>
			<div id="jadwal_sample" style="width: 100%; display: flex; justify-content: center;" hidden>
				<div class="input-group mb-3 div-input-mall-square" id="harinya" style="width: 90%; background: white; border: 1px solid white;">
					<div style="width: 20%; display: flex; justify-content: center; margin-left: 3%;">
						<div style="width: 2.5em; height: 2.5em; background:#ff006e; margin: 0.5em; border-radius: 50%; vertical-align: middle; color: white; padding: 0;line-height: 2.3em; text-align: center;">simbolnya</div>
					</div>
					<div style="margin-left: 2%; width: 60%;">
						<div style="margin-top: 0.5em; font-weight: 700; text-align: left;">harinya</div>
						<div style="font-size: 0.7em; text-align: left;">jamnya</div>
					</div>
					<div onclick='hapus_jadwal("harinya")' style="width: 15%; cursor: pointer; display: flex; align-items: center; background: #ff006e; justify-content: center; border-top-right-radius: 0.5em; border-bottom-right-radius: 0.5em; color: white; font-weight:700; font-size: 1.2em;">X</div>
				</div>
			</div>
			<hr style="border-top: 1px solid #c8d2dd; width: 100%;">
			<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 90%;">
				<select type="text" class="form-control form-control-mall-modal" id="jadwal" name="jadwal" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" aria-label="jadwal" aria-describedby="basic-addon1" style="width: 100%; text-align: center !important;">
					<option value="" disabled selected>--- Silahkan Pilih Hari ---</option>
					@if(@jadwal)
					@for ($i = 0; $i < count($var_text); $i++)
					@php $indikator = false; @endphp
					@for ($j = 0; $j < count($loop_hari); $j++)
					@if ($loop_hari[$j] == $var_text[$i]) 
					@php $indikator = true; @endphp
					@endif
					@endfor
					@if ($indikator == false)
					<option value="{{$var_value[$i]}}">{{$var_text[$i]}}</option>
					@endif
					@endfor

					@endif

				</select>			
			</div>
			<div style="width: 90%; display: flex; justify-content: space-between;">
				<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 40%;">
					<small style="margin-left: 2em;">Waktu Buka</small>
					<input type="time" class="form-control form-control-mall-modal" id="waktu_buka" value="07:00" min="09:00"
					max="18:00" required style="width: 100%; height: auto !important;">
				</div>
				<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 40%;">
					<small style="margin-left: 2em;">Waktu Tutup</small>
					<input type="time" class="form-control form-control-mall-modal" id="waktu_tutup" value="16:00" min="09:00"
					max="18:00" required style="width: 100%; height: auto !important;">
				</div>
				<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 15%; background: #FF006E; display: flex; justify-content: center; color: white; align-items: center;"  onclick="tambah_jadwal()">
					<i class="fa fa-plus"></i>
				</div>
			</div>
			<?php 
			$div_disabled = "";
			$div_enabled = "";
			if ($jadwal){
				$div_disabled = "hidden";            	
			}
			else {
				$div_enabled = "hidden";
			}
			?>
			<button class="btn btn-secondary" id="simpan_disabled_jadwal" onclick="simpan_disabled_jadwal()" style="background: #6c757d;border: 1px solid #6c757d; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 90%; margin-bottom: 1em;" {{$div_disabled}}><img src="<?=url('/')?>/public/img/icon_svg/simpan_file.svg" style="width: 1em;" >&nbsp;&nbsp;Simpan
			</button>
			<button data-dismiss="modal" id="simpan_enabled_jadwal" class="btn btn-secondary" style="background: #80B918; border: 1px solid #80B918; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 90%; margin-bottom: 1em;"  {{$div_enabled}}><img src="<?=url('/')?>/public/img/icon_svg/simpan_file.svg" style="width: 1em;">&nbsp;&nbsp;Simpan
			</button>
		</div>
	</div>
</div>


<header class="style__Container-sc-3fiysr-0 header">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: space-between;">
		<a href="<?=url('/')?>/akun" style="padding-left: 1em;">
			<img src="<?=url('/')?>/public/img/back_white.svg">
		</a>
		<a id="defaultheader_logo" title="Kitabisa" style="margin-left: 20px; height:33px;margin-right:20px" href="/">
			<img src="<?=url('/')?>/public/img/logo.svg">
			<img src="<?=url('/')?>/public/img/logo_text.svg">
		</a>
		<div style="margin-right: 2.5em;">
			<img src="<?=url('/')?>/public/img/back.svg" hidden>
		</div>
	</div>
</header>

<div class="wrapper" style="background: #ff006e; position: relative; z-index: -1; padding-top: 8em;">
	<div class="banner">
	</div>
</div>

<main id="homepage" class="homepage" style="padding: 0px;background: #eaf4ff;">
	<div class="card-mall kategori" style="display: flex; justify-content: center; position: relative; flex-direction: column; align-items: center; background: #eaf4ff;">
		<img src="<?=url('/')?>/public/img/mitra/mitra_free.png" width="75%"  style="top: -11em; position: relative; overflow-x: visible; z-index: 3 !important;">


		<div style="text-align: center;font-size: 1em; font-weight: 500; line-height: 1.2em; margin-top: -11em; margin-bottom: -1em;color: white; background: #ff006e; padding: 1em 2em 1em 2em; border-radius: 2em; display: flex; justify-content: center; align-items: center; width: 90%;" onclick="upgrade_mitra()">
			<img src="<?=url('/')?>/public/img/icon_svg/crown.svg" style="width: 1.5em;">&nbsp;&nbsp;&nbsp;<span>Tingkatkan dengan premium</span>
		</div>



		<form enctype="multipart/form-data" action="{{url()->current()}}/simpan" method="post" style="width: 90%; margin-top: 2em;  display: flex; flex-direction: column; align-items: center;">
			{{csrf_field()}}
			{{method_field('PUT')}}
			<div class="input-group mb-3 div-input-mall" id="div_nama_toko">
				<div style="display: flex; align-items: center;justify-content: flex-start;">
					<span class="label-mall">Nama Toko</span>&nbsp;&nbsp;
					<span>
						<div class="label-mall" style="background:#ff006e; color: white; padding: 0.1em 1.5em 0.3em 1em; border-radius: 1.5em; line-height: 1.2em;">wajib</div>
					</span>
				</div>
				<div>
					<span class="input-group-text-mall">
						<img src="<?=url('/')?>/public/img/icon_svg/toko.svg" style="width: 100%;">
					</span>
					<input type="text" class="form-control-mall" id="nama_toko" name="nama_toko" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Masukan nama toko" aria-label="Nama Pemilik" aria-describedby="basic-addon1" value="{{$toko->nama_toko}}" style="width: 100%;" required>
				</div>
			</div>
			<div class="input-group mb-3 div-input-mall" id="div_kategori">
				<div style="display: flex; align-items: center;justify-content: flex-start;">
					<span class="label-mall">Kategori</span>&nbsp;&nbsp;
					<span >
						<div class="label-mall" style="background:#ff006e; color: white; padding: 0.1em 1.5em 0.3em 1em; border-radius: 1.5em; line-height: 1.2em;">wajib</div>
					</span>
				</div>
				<div style="width: 96%;">
					<div class="list-kategori" style="display: flex; justify-content: flex-start; padding: 0.5em 1em 1em 1em;">
						@for ($i = 0; $i < count($loop_val); $i++)
						<badge class='badge badge-secondary'>{{$loop_val[$i]}}</badge>
						@endfor
					</div>
					<div style="width: 2em; height: 2em; font-size: 0.8em; background: #ff006e; color: white; border-radius: 50%; padding-top: 0.5em;" onclick="tambah_kategori_modal()">
						<i class="fa fa-plus"></i>
					</div>
				</div>
			</div>
			<div class="input-group mb-3 div-input-mall" id="div_no_hp">
				<span>Nomor Handphone Toko</span>
				<div>
					<span class="input-group-text-mall">
						<img src="<?=url('/')?>/public/img/icon_svg/handphone.svg" style="width: 100%;">
					</span>
					<input type="text" class="form-control-mall" id="no_hp" name="no_hp" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Masukan nomor hp toko" aria-label="Nomor Handphone Toko" aria-describedby="basic-addon1" value="{{$toko->no_hp}}"style="width: 100%;" required>
				</div>
			</div>
			<div class="input-group mb-3 div-input-mall" id="div_jadwal">
				<span>Jadwal Buka Tutup Toko</span>
				<div>
					<span class="input-group-text-mall">
						<img src="<?=url('/')?>/public/img/icon_svg/calender.svg" style="width: 100%;">
					</span>
					<div onclick="pilih_jadwal()" class="form-control form-control-mall" style="vertical-align: center;display: flex; align-items: center; justify-content: flex-start; cursor: pointer; margin-left: 0.4em; " id="pilih_jadwal_buka_toko">Pilih Jadwal Toko</div>
				</div>
			</div>
			<div hidden >
				<input name="input_kategori" id="input_kategori">
				<input name="input_id_kategori" id="input_id_kategori" value="{{$input_id_kategori}}">					
				<input type="hidden" name="jadwal_hari" id="jadwal_hari" value="{{$hari}}">
				<input type="hidden" name="jadwal_buka" id="jadwal_buka" value="{{$buka}}">
				<input type="hidden" name="jadwal_tutup" id="jadwal_tutup" value="{{$tutup}}">
			</div>
			<div class="input-group mb-3 div-input-mall" id="div_lokasi">
				<span>Alamat Toko</span>
				<div>
					<span class="input-group-text-mall">
						<img src="<?=url('/')?>/public/img/icon_svg/home.svg" style="width: 100%;">
					</span>&nbsp;
					<input type="text" class="form-control-mall" id="alamat" name="alamat" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Alamat" aria-label="alamat" aria-describedby="basic-addon1" style="width: 100%;" value="{{$toko->alamat}}" required>
				</div>
			</div>
			<div class="input-group mb-3 div-input-mall" id="div_kelurahan">
				<span>Kelurahan</span>
				<div>
					<span class="input-group-text-mall">
						<img src="<?=url('/')?>/public/img/icon_svg/kategori.svg" style="width: 100%;">
					</span>
					<select type="text" class="form-control-mall" id="kelurahan" name="kelurahan" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" style="height: 2.5em;" required>
						<option value="" disabled selected>Pilih Kategori Toko</option>
						@foreach($kelurahan as $row)
						<option value="{{$row->id}}" @if($toko->kelurahan_id == $row->id ) selected='selected' @endif>{{$row->kelurahan}}
						</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="input-group mb-3 div-input-mall" id="div_jadwal">
				<span>Atur Lokasi Maps</span>
				<div>
					<span class="input-group-text-mall">
						<img src="<?=url('/')?>/public/img/icon_svg/calender.svg" style="width: 100%;">
					</span>
					<a href="{{url()->current()}}/atur-lokasi" class="form-control form-control-mall" style="vertical-align: center;display: flex; align-items: center; justify-content: flex-start; cursor: pointer; margin-left: 0.4em; " id="pilih_jadwal_buka_toko">Atur Lokasi</a>
				</div>
			</div>
			<div class="input-group mb-3 div-input-mall-square" id="div_foto_toko" style="margin-top: 1em; background: white;">
				@if($foto_1)
				<div style="text-align: center; width: 100%; margin-top: 1.2em; margin-bottom: 0.8em;">Upload Foto Toko</div>
				<div class="input-group mb-3 div-input-mall-square" id="div_foto_toko_1" style="margin-top: 1em; background:transparent; border: none; border-radius: 1.2em;">
					<div style="position: relative; display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_toko_privew_1">
						<img id="pic_toko_privew_1" src="<?=url('/')?>/public/img/toko/{{$foto_1->toko_id}}/maps/{{$foto_1->foto}}" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
						<div style="position: absolute;top: 40%;">
							<img id="pic_maps_1" src="<?=url('/')?>/public/img/icon_svg/plus_with_background.svg" onclick="tambah_foto_toko('1')" style=" width: 2.5em; margin-left: 40%; margin-bottom: 2em;">
							<div style="background: rgba(255, 255, 255, 0.85); padding: 0.2em 0.5em; color: #FF006E;">Foto Depan Tempat Usaha</div>
						</div>
					</div>
					<input type="hidden" name="id_foto_toko_1" id="id_foto_toko_1" value="{{$foto_1->id}}">
				</div>
				@else
				<div style="text-align: center; width: 100%; margin-top: 1.2em; margin-bottom: 0.8em;">Upload Foto Toko</div>
				<div class="input-group mb-3 div-input-mall-square" id="div_foto_toko_1" style="margin-top: 1em; background:transparent; border: none; border-radius: 1.2em;">
					<div style="position: relative; display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_toko_privew_1">
						<img id="pic_toko_privew_1" src="<?=url('/')?>/public/img/register/maps/tampak_depan.jpg" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
						<div style="position: absolute;top: 40%;">
							<img id="pic_maps_1" src="<?=url('/')?>/public/img/icon_svg/plus_with_background.svg" onclick="tambah_foto_toko('1')" style=" width: 2.5em; margin-left: 40%; margin-bottom: 2em;">
							<div style="background: rgba(255, 255, 255, 0.85); padding: 0.2em 0.5em; color: #FF006E;">Foto Depan Tempat Usaha</div>
						</div>
					</div>
				</div>
				@endif
				<input hidden type="file" name="foto_toko_1" id="foto_toko_1">
				<div style="display: flex; justify-content: space-between; width: 100%;">
					@if($foto_2)
					<div class="input-group mb-3 div-input-mall-square" id="div_foto_toko_2" style="background:transparent; border: none; border-radius: 1.2em; width: 40%;">
						<div style="display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_toko_privew_2">
							<img id="pic_toko_privew_2" src="<?=url('/')?>/public/img/toko/{{$foto_2->toko_id}}/maps/{{$foto_2->foto}}" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
							<div style="position: absolute;top: 40%;">
								<img id="pic_toko_2" src="<?=url('/')?>/public/img/icon_svg/plus_with_background.svg" onclick="tambah_foto_toko('2')" style=" width: 2.5em; margin-left: 20%; margin-bottom: 2em;">
								<div style="background: rgba(255, 255, 255, 0.85); padding: 0.2em 0.5em; color: #FF006E;">Bebas</div>
							</div>
						</div>
					</div>
					<input type="hidden" name="id_foto_toko_2" id="id_foto_toko_2" value="{{$foto_2->id}}">
					@else
					<div class="input-group mb-3 div-input-mall-square" id="div_foto_toko_2" style="background:transparent; border: none; border-radius: 1.2em; width: 40%;">
						<div style="display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_toko_privew_2">
							<img id="pic_toko_privew_2" src="<?=url('/')?>/public/img/register/maps/produk.png" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
							<div style="position: absolute;top: 40%;">
								<img id="pic_toko_2" src="<?=url('/')?>/public/img/icon_svg/plus_with_background.svg" onclick="tambah_foto_toko('2')" style=" width: 2.5em; margin-left: 20%; margin-bottom: 2em;">
								<div style="background: rgba(255, 255, 255, 0.85); padding: 0.2em 0.5em; color: #FF006E;">Bebas</div>
							</div>
						</div>
					</div>
					@endif
					<input hidden type="file" name="foto_toko_2" id="foto_toko_2" >
					@if($foto_3)
					<div class="input-group mb-3 div-input-mall-square" id="div_foto_toko_3" style="background:transparent; border: none; border-radius: 1.2em; width: 56%;">
						<div style="display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_toko_privew_3">
							<img id="pic_toko_privew_3" src="<?=url('/')?>/public/img/toko/{{$foto_3->toko_id}}/maps/{{$foto_3->foto}}	" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
							<div style="position: absolute;top: 40%;">
								<img id="pic_toko_3" src="<?=url('/')?>/public/img/icon_svg/plus_with_background.svg" onclick="tambah_foto_toko('3')" style=" width: 2.5em; margin-left: 15%; margin-bottom: 2em;">
								<div style="background: rgba(255, 255, 255, 0.85); padding: 0.2em 0.5em; color: #FF006E;">Bebas</div>
							</div>
						</div>
						<input hidden type="file" name="foto_toko_3" id="foto_toko_3">
					</div>
					@else
					<div class="input-group mb-3 div-input-mall-square" id="div_foto_toko_3" style="background:transparent; border: none; border-radius: 1.2em; width: 56%;">
						<div style="display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_toko_privew_3">
							<img id="pic_toko_privew_3" src="<?=url('/')?>/public/img/register/maps/bebas.png" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
							<div style="position: absolute;top: 40%;">
								<img id="pic_toko_3" src="<?=url('/')?>/public/img/icon_svg/plus_with_background.svg" onclick="tambah_foto_toko('3')" style=" width: 2.5em; margin-left: 15%; margin-bottom: 2em;">
								<div style="background: rgba(255, 255, 255, 0.85); padding: 0.2em 0.5em; color: #FF006E;">Bebas</div>
							</div>
						</div>
						<input hidden type="file" name="foto_toko_3" id="foto_toko_3">
					</div>
					@endif
					<input hidden type="file" name="foto_toko_3" id="foto_toko_3" >

				</div>
			</div>


			<button type="submit" class="btn btn-primary" style="background: #ff006e; margin-top: 1em;border: 1px solid #ff006e; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 70%;">
				Ubah Data
			</button>
		</form>
	</div>

	@if(Session::has('message'))
	<div id="modal-pemberitahuan" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
	aria-hidden="true" data-backdrop="static" data-keyboard="false" style="width: 100%;">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body text-center font-weight-bold py-3">
				{{Session::get('message')}}
				<div class="row mt-2 p-2">
					<button type="button" class="col-sm-12 btn waves-effect waves-light btn-outline-secondary"
					data-dismiss="modal">Tutup</button>

				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
@endif


</main>


@endsection

@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="<?=url('/')?>/public/plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript">


	$("#kelurahan").select2();

	@if(Session::has('message'))
	$('#modal-pemberitahuan').modal('show')
	@endif


	$("input[required], select[required]").attr("oninvalid",
		"this.setCustomValidity('Harap Dimasukkan')");
	$("input[required], select[required]").attr("oninput", "setCustomValidity('')");


	var i = 0;
	var jadwal_hari = [];
	var jadwal_buka = [];
	var jadwal_tutup = [];
	var value_kategori = [];
	var value_id_kategori = [];

	var i_kategori = 0;
	<?php for ($i = 0; $i < count($loop_id_val); $i++){?>
		@if ($loop_id_val[0] != "")
		value_id_kategori.push("<?=$loop_id_val[$i]?>");
		value_kategori.push("<?=$loop_val[$i]?>");
		@endif
	<?php } ?>


	<?php for ($i = 0; $i < count($loop_hari); $i++){?>
		@if ($loop_hari[0] != "")
		jadwal_hari.push("<?=$loop_hari[$i]?>");
		jadwal_buka.push("<?=$loop_buka[$i]?>");
		jadwal_tutup.push("<?=$loop_tutup[$i]?>");
		@endif
	<?php } ?>
	function input_focus(id) {
		$("#div_" + id).css('border', '1px solid #d1d2d4');
	}

	function input_blur(id) {
		$("#div_" + id).css('border', '1px solid white');
	}


	function tambah_kategori_modal(){
		$('#modal-kategori').modal('show');
	}

	function simpan_disabled_kategori(){
		alert("Tambahkan data terlebih dahulu");
	}

	function simpan_disabled_jadwal(){
		alert("Tambahkan data terlebih dahulu");        
	}


	function pilih_jadwal() {
		$("#modal-jadwal").modal('show');
	}

	function tambah_foto_toko(id) {
		$("#foto_toko_"+id).click();
		$("#foto_toko_"+id).change(function () {
			readURL(this, id);
		});

	}

	function readURL(input, id) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#pic_toko_privew_'+id).attr('src', e.target.result);
				$("#div_pic_toko_privew_"+id).prop('hidden', false);
				$("#div_pic_toko_"+id).prop('hidden', true);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	
	function tambah_jadwal() {
		var simbol = $("#jadwal").val();
		var hari = $("#jadwal option:selected").text();
		if (simbol == null){
			alert("Silahkan Pilih Jadwal");
		}
		else {
			var waktu_tutup = $("#waktu_tutup").val();
			var waktu_buka = $("#waktu_buka").val();
			var jadwal_sample = $("#jadwal_sample").html();
			var fix_id = jadwal_sample.replaceAll(hari.replaceAll(" ", '_')).trim();
			var fix_harinya = fix_id.replaceAll("harinya", hari).trim();
			var fix_waktu = fix_harinya.replace("jamnya", waktu_buka + " - " + waktu_tutup).trim();
			var fix_simbol = fix_waktu.replace("simbolnya", simbol).trim();
			$("#jadwal_fix").append(fix_simbol);
			jadwal_hari.push(hari);
			jadwal_buka.push(waktu_buka);
			jadwal_tutup.push(waktu_tutup);
			check_select();
			i++;
			$("#simpan_disabled_jadwal").prop("hidden", true);
			$("#simpan_enabled_jadwal").prop("hidden", false);

		}

	}

	function check_select() {
		var option_value = ["SH", "SS", "SJ", "S", "S", "R", "K", "J", "S", "M"];
		var option_text = ["Setiap-Hari", "Senin-Sabtu", "Senin-Jumat", "Senin", "Selasa", "Rabu", "Kamis", "Jumat",
		"Sabtu", "Minggu"
		];
		var option = "<option value='' disabled selected>--- Silahkan Pilih Hari ---</option>";
		for (var i = 0; i < option_text.length; i++) {
			var indikator = false;
			for (var j = 0; j < jadwal_hari.length; j++) {
				if (jadwal_hari[j] == option_text[i]) {
					indikator = true;
				}
			}
			if (indikator == false) {
				option += "<option value='" + option_value[i] + "' >" + option_text[i] + "</option>";
			}
		}
		$("#jadwal").html(option);
		var string_hari = jadwal_hari.toString();
		var string_buka = jadwal_buka.toString();
		var string_tutup = jadwal_tutup.toString();
		$("#jadwal_hari").val(string_hari.replaceAll(",", "~"));
		$("#jadwal_buka").val(string_buka.replaceAll(",", "~"));
		$("#jadwal_tutup").val(string_tutup.replaceAll(",", "~"));

		if ($("#jadwal_hari").val() == '') {
			$("#pilih_jadwal_buka_toko").html("Pilih Jadwal Toko");
		} else {
			$("#pilih_jadwal_buka_toko").html("Telah memilih Jadwal");
		}

	}

	function tambah_kategori(){
		var id_kategori = $("#kategori").val();
		var kategorinya = $("#kategori option:selected").text();
		if (id_kategori == null){
			alert("Silahkan Pilih Kategori");
		}
		else {
			var kategori_sample = $("#kategori_sample").html();
			var fix_id = kategori_sample.replaceAll("kategorinya", id_kategori).trim();
			var fix_kategorinya = fix_id.replaceAll("kategori_nya", kategorinya).trim();
			var fix_simbol = fix_kategorinya.replace("simbolnya", kategorinya.substring(0,1)).trim();
			$("#kategori_fix").append(fix_simbol);

			value_kategori.push(kategorinya);
			value_id_kategori.push(id_kategori);
			$(".list-kategori").html('');
			for (var i = 0; i < value_kategori.length; i++){
				$(".list-kategori").append("<badge class='badge badge-secondary'>"+value_kategori[i]+"</badge>");
			}

			check_select_kategori();
			i_kategori++;
			$("#simpan_disabled_kategori").prop("hidden", true);
			$("#simpan_enabled_kategori").prop("hidden", false);
		}
	}

	function check_select_kategori() {
		var option_value = ["SH", "SS", "SJ", "S", "S", "R", "K", "J", "S", "M"];

		var option_text = [];
		var option_id = [];
		@foreach ($daftar_kategori as $row)
		option_id.push("<?=$row->id?>");
		option_text.push("<?=$row->kategori?>");
		@endforeach
		var option = "";
		for (var i = 0; i < option_id.length; i++) {
			var indikator = false;
			for (var j = 0; j < value_id_kategori.length; j++) {
				if (value_id_kategori[j] == option_id[i]) {
					indikator = true;
				}
			}
			if (indikator == false) {
				option += "<option value='" + option_id[i] + "' >" + option_text[i] + "</option>";
			}
		}
		$("#kategori").html(option);
		var string_kategori = value_kategori.toString();
		var string_id_kategori = value_id_kategori.toString();
		$("#input_kategori").val(string_kategori.replaceAll(",", "~"));
		$("#input_id_kategori").val(string_id_kategori.replaceAll(",", "~"));
	}


	function hapus_jadwal(hari) {
        // alert(id);
        var temp;
        for (var i = 0; i < jadwal_hari.length; i++) {
        	if (jadwal_hari[i] == hari) {
        		jadwal_hari[i] = jadwal_hari[i + 1];
        		jadwal_buka[i] = jadwal_buka[i + 1];
        		jadwal_tutup[i] = jadwal_tutup[i + 1];
        	}
        }
        jadwal_hari.pop();
        jadwal_tutup.pop();
        jadwal_buka.pop();
        check_select();
        $("#" + hari.replaceAll(" ", "_")).remove();
    }

    function upgrade_mitra(){
    	$("#modal-upgrade").modal('show');
    }

    function hapus_kategori(kategori) {
    	kategori = kategori.replaceAll("_", " ");
    	var temp;
    	var find = false;
    	for (var i = 0; i < value_kategori.length; i++) {
    		if (find == true){
    			value_id_kategori[i] = value_id_kategori[i + 1];
    			value_kategori[i] = value_kategori[i + 1];
    		}
    		if (value_id_kategori[i] == kategori) {
    			value_id_kategori[i] = value_id_kategori[i + 1];
    			value_kategori[i] = value_kategori[i + 1];
    			find = true;
    		}
    	}
    	value_kategori.pop();
    	value_id_kategori.pop();
    	check_select_kategori();
    	$("#" + kategori.replaceAll(" ", "_")).remove();
    	$(".list-kategori").html('');
    	if (value_kategori.length == 0){
    		$("#simpan_disabled_kategori").prop("hidden", false);
    		$("#simpan_enabled_kategori").prop("hidden", true);            
    	}
    	for (var i = 0; i < value_kategori.length; i++){
    		$(".list-kategori").append("<badge class='badge badge-secondary'>"+value_kategori[i]+"</badge>");
    	}


    }
</script>
@endsection
