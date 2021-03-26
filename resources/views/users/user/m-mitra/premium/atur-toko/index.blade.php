	@extends('layouts.home_premium')

	@section('title')

	@endsection

	@section('header-scripts')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/plugins/lunar/css/lunar.css">
	<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/plugins/select2/css/select2.css">

	<style type="text/css">
		.banner {
			max-width: 480px;
			width: 100%;
			margin: 0px auto;
			padding: 4em 0em 4em 0em;
		}

		.header {
			background: #ffaa00;
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
			border-bottom-left-radius: 0.5em; 
			border-top-left-radius: 0.5em; 
		}


		.form-control-mall {
			height: 2.5em; 
			border-bottom-right-radius: 0.5em; 
			border-top-right-radius: 0.5em; 
			border:  none;	
			background: #202020;
			color: white;
			font-weight: 600;
			padding: 0em 0em 0em 0.6em;	
			margin-left: 0px;
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

		.select2-selection--single {
			border: none !important;
			margin: 0.2em;
			padding: 0.3em;

		}
		.select2-selection__arrow {
			margin-top: 0.7em;
			display: none;
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

		.modal-content-jadwal{
			position:fixed;
			padding:0;
			margin:0;
			top:auto;
			right:auto;
			left:auto;
			bottom:0;
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
			color: white;
		}

		.select2-container .select2-selection--single {
			height: auto !important;
			background: #202020;	

		}  

		.select2 {
			background: #202020 !important;
			color: white;		
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

		.btn-menu-analitik {
			color: #a1a4a8; 
			margin: 0em 0.3em 0em 0.3em; 
			background: white; 
			padding: 0.3em 1.3em 0.3em 1.3em; 
			border-radius: 2em;		
		}

		.analitik-active {
			color: white;
			background: #ffaa00;
		}

		.card-menu-premium {
			background: white; 
			display: flex; 
			justify-content: center; 
			margin-top: .5em; 
			flex-direction: column; 
			align-items: center;		
			border-radius: 1.5em;
		}

		.modal .close {
			right: -1.3em !important;
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

		.list-kategori {
			display: flex; justify-content: flex-start; flex-wrap: wrap;
		}

		.list-kategori .badge {
			margin-right: 0.5em;
			margin-bottom: 0.5em;
			border-radius: 1.5em;
			background-color: #EBEBEB;
			color: #5C5C5C;
			height: auto;	
			padding: 0.3em 0.5em 0.3em 0.5em;

		}

		.is-invalid {
			border: 1px solid red !important;
		}

		.is-invalid-text {
			color: red !important;
		}

		.select2-selection--single {
			padding-left: 0em;
			padding-bottom: 0.5em;
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
				// dd($loop_val);

					for ($i = 0; $i < count($loop_id_val); $i++){
						?>
						@if ($loop_id_val[0] != "")
						<div class="input-group mb-3 div-input-mall-square" id="{{str_replace(' ', '_', $loop_id_val[$i])}}" style="width: 90%; background: white; border: 1px solid white;">
							@for ($j = 0; $j < count($kategori_id_val); $j++) 
							@if ($kategori_id_val[$j]==$loop_id_val[$i])
							<div style="width: 20%; display: flex; justify-content: center; margin-left: 3%;">
								<div style="width: 2.5em; height: 2.5em; background:#FFC331; margin: 0.5em; border-radius: 50%; vertical-align: middle; color: white; padding: 0;line-height: 2.3em; text-align: center;">
									{{substr($kategori_val[$j], 0, 1)}}
								</div> 
							</div> 
							<div style="margin-left: 2%; width: 60%;">
								<div style="margin-top: 0.5em; font-weight: 700; text-align: left;">
									{{$kategori_val[$j]}}
									<?php $loop_val[$i] = $kategori_val[$j]; ?>
								</div>
							</div>
							<div onclick='hapus_kategori("{{$loop_id_val[$i]}}")' style="width: 15%; cursor: pointer; display: flex; align-items: center; background: #FFC331; justify-content: center; border-top-right-radius: 0.5em; border-bottom-right-radius: 0.5em; color: white; font-weight:700; font-size: 1.2em;">
								X
							</div>
							@endif 
							@endfor 

						</div>
						@endif
						<?php
					}
					?>
				</div>
				<div id="kategori_sample" style="width: 100%; display: flex; justify-content: center;" hidden>
					<div class="input-group mb-3 div-input-mall-square" id="kategorinya" style="width: 90%; background: white; border: 1px solid white;">
						<div style="width: 20%; display: flex; justify-content: center; margin-left: 3%;">
							<div style="width: 2.5em; height: 2.5em; background:#FFC331; margin: 0.5em; border-radius: 50%; vertical-align: middle; color: white; padding: 0;line-height: 2.3em; text-align: center;">
							simbolnya</div>
						</div>
						<div style="margin-left: 2%; width: 60%;">
							<div style="margin-top: 1em; font-weight: 700; text-align: left;">kategori_nya</div>
						</div>
						<div onclick='hapus_kategori("kategorinya")' style="width: 15%; cursor: pointer; display: flex; align-items: center; background: #FFC331; justify-content: center; border-top-right-radius: 0.5em; border-bottom-right-radius: 0.5em; color: white; font-weight:700; font-size: 1.2em;">
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
						<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 100%; background: #FFC331; display: flex; justify-content: center; color: white; align-items: center;"  onclick="tambah_kategori()">
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
		<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
			<div class="modal-content" style="border-radius: 1.2em; background: #eaf4ff; display: flex; justify-content: center; align-items: center;">
				<div class="modal-body">
					<div>
						<div class="nama-toko"
						style="font-weight: 600; font-size: 1em; line-height: 1.1em; font-size: 1.2em;">Silahkan Masukan
						Jadwal<br>Buka/Tutup Usaha Anda</div>
					</div>
				</div>
				<div id="jadwal_fix" style="width: 100%; display: flex; justify-content: center; flex-direction: column; align-items: center;">
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
				<?php 
				$div_disabled = "";
				$div_enabled = "";
				if ($hari != ''){
					$div_disabled = "hidden";            	

				}
				else {
					$div_enabled = "hidden";


				}
				?>
				<div style="width: 100%; display: flex; justify-content: center; flex-direction: column; align-items: center;" id="input_jadwal" {{$div_disabled}}>
					<div style="width: 90%; display: flex; justify-content: space-between; border-top-right-radius: 0em; border-bottom-right-radius: 0em;">

						<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 40%; border-top-right-radius: 0em; border-bottom-right-radius: 0em;">
							<small style="margin-left: 2em;">Jadwal Buka</small>
							<select type="text" class="form-control form-control-mall-modal" id="jadwal_mulai" aria-label="jadwal" aria-describedby="basic-addon1" style="width: 90%; text-align: center !important;  padding-left: 1.2em;">
								<option value="Senin" selected>Senin</option>
								<option value="Selasa">Selasa</option>
								<option value="Rabu">Rabu</option>
								<option value="Kamis">Kamis</option>
								<option value="Jumat">Jumat</option>
								<option value="Sabtu">Sabtu</option>
								<option value="Minggu">Minggu</option>
							</select>			
						</div>
						<div class="div-input-mall input-group mb-3" style="padding-left: 1em; width: 20%; border-radius: 0; background: white; text-align: center; padding-top: 1.5em;">
							<i style="text-align: center;">s/d</i>
						</div> 
						<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 40%; border-top-left-radius: 0em; border-bottom-left-radius: 0em;">
							<small style="margin-left: 2em; color: white;">Jadwal Buka</small>
							<select type="text" class="form-control form-control-mall-modal" id="jadwal_akhir" aria-label="jadwal" aria-describedby="basic-addon1" style="width: 90%; text-align: center !important; padding-left: 1.2em;">
								<option value="Senin">Senin</option>
								<option value="Selasa">Selasa</option>
								<option value="Rabu">Rabu</option>
								<option value="Kamis">Kamis</option>
								<option value="Jumat">Jumat</option>
								<option value="Sabtu">Sabtu</option>
								<option value="Minggu" selected>Minggu</option>
							</select>	
						</div>
					</div>

					<div style="width: 90%; display: flex; justify-content: space-between;">
						<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 48%;">
							<small style="margin-left: 2em;">Waktu Buka</small>
							<input type="time" class="form-control form-control-mall-modal" id="waktu_buka" value="07:00" min="09:00"
							max="18:00" required style="width: 100%; height: auto !important;">
						</div>
						<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 48%;">
							<small style="margin-left: 2em;">Waktu Tutup</small>
							<input type="time" class="form-control form-control-mall-modal" id="waktu_tutup" value="16:00" min="09:00"
							max="18:00" required style="width: 100%; height: auto !important;">
						</div>
						<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 15%; background: #FF006E; display: flex; justify-content: center; color: white; align-items: center;"  onclick="tambah_jadwal()" hidden>
							<i class="fa fa-plus"></i>
						</div>
					</div>
				</div>

				<button class="btn btn-primary" id="tambah_jadwal_lain" onclick="tambah_jadwal_lain()" style="background: #6c757d;border: 1px solid #6c757d; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 90%; margin-bottom: 1em;" {{$div_enabled}}><img src="<?=url('/')?>/public/img/icon_svg/simpan_file.svg" style="width: 1em;">&nbsp;&nbsp;Tambah Jadwal Lain
				</button>
				<button class="btn btn-primary" id="simpan_disabled_jadwal" onclick="tambah_jadwal()" style="background: #6c757d;border: 1px solid #6c757d; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 90%; margin-bottom: 1em;" {{$div_disabled}}><img src="<?=url('/')?>/public/img/icon_svg/simpan_file.svg" style="width: 1em;" >&nbsp;&nbsp;Tambah Jadwal
				</button>
				<button data-dismiss="modal" id="simpan_enabled_jadwal" class="btn btn-primary" style="background: #80B918; border: 1px solid #80B918; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 90%; margin-bottom: 1em;"  {{$div_enabled}}><img src="<?=url('/')?>/public/img/icon_svg/simpan_file.svg" style="width: 1em;">&nbsp;&nbsp;Simpan
				</button>
			</div>
		</div>
	</div>


	<header class="style__Container-sc-3fiysr-0 header" style="background:#353535; padding-top: 0.3em;">
		<div class="style__Wrapper-sc-3fiysr-2 hBSxmh">
			<a href="<?=url('/')?>/akun/mitra/premium" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; padding-bottom: 0.3em; padding-right: 0.7em;">
				<img src="<?=url('/')?>/public/img/back_white.svg">
			</a>
			<a id="defaultheader_logo" title="Kitabisa" style="height: 100%; width: 70%; display: flex; justify-content: center; align-items: center;">
				<img src="<?=url('/')?>/public/img/logo_premium.svg" style="height: 80%;">
			</a>
			<a style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center;">
			</a>
		</div>
	</header>


	<main id="homepage" class="homepage" style="padding-top: 4em; background: transparent;">
		<form id="form_input" enctype="multipart/form-data" action="<?=url('/')?>/akun/mitra/{{$toko->jenis_mitra}}/simpan" method="post">
			{{csrf_field()}}
			{{method_field('PUT')}}
			<div style="display: flex; justify-content: center;">
				<div style="width: 90%; margin-top: 1em; display: flex; flex-direction: column; align-items: center;">
					<div class="mb-4" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
						<div style="font-weight: 600; color: white; font-size: 1.8em; margin-bottom: 0.1em;">Atur Toko</div>
						@php $url = url('/')."/public/img/button/toko_premium/bg-photo-profile.svg"; @endphp
						<div style='background-image: url("<?=$url?>"); padding: 1.5em;'>
							<div id="div_pic_toko_privew" style="position: relative; padding: auto 0; display: flex; justify-content: center; align-items: center; border-radius: 50%; width: 9rem; height: 9rem; background: #1c1c1c;">
								@if ($toko->logo_toko)
								<img id="pic_toko_privew" src="<?=url('/')?>/public/img/toko/{{$toko->id}}/logo/{{$toko->logo_toko}}" style="width: 100%; border-radius: 50%; object-fit: cover;height: 100%;">
								@else
								<img id="pic_toko_privew" src="<?=url('/')?>/public/img/mitra/logo/premium.svg" style="width: 100%; border-radius: 50%; object-fit: cover;height: 100%;">
								@endif
								<img id="pic_toko" src="<?=url('/')?>/public/img/icon_svg/add_circle_yellow.svg" onclick="tambah_foto_toko()" style="position: absolute; right: 0px; bottom: 0px;">
							</div>
						</div>
						<input type="file" name="foto_toko" id="foto_toko" hidden>
						<div style="display: flex; justify-content: center; flex-direction: column;">
							<input type="text" id="nama_toko" name="nama_toko" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Nama Toko" aria-label="Nama Toko" aria-describedby="basic-addon1" style="width: 100%; background: transparent; color: white; text-align: center; font-size: 1.5em; font-weight: 645;" required value="{{$toko->nama_toko}}">
							<input type="text" id="username_toko" name="username_toko" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Username Toko" aria-label="Username Toko" aria-describedby="basic-addon1" style="width: 100%; background: transparent; color: white; text-align: center; font-size: 1em; font-weight: 645;" required value="{{$toko->username}}">
						</div>
					</div>
					<div class="input-group mb-3 st0 @if($errors->first('input_kategori')) is-invalid @endif" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em; height: 8.5em;">
						<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em; margin-bottom: 0; padding-left: 0.2em;">Deskripsi Toko</div>
						<div style="height: 5em; width: 100%; padding: 0;">
							<textarea id="deskripsi" name="deskripsi" onblur="input_blur(this.id)" onfocus="input_focus(this.id)" style="width: 100%; height: 6em; border-radius: 0.5em; margin: 0em 0em 1em 0em;  background: #292929; color: #dddddd; border: none; font-size: 0.9em; padding: 0.3em 0.6em 0.5em 0.6em; text-align: justify;" rows="5" required placeholder="Masukan deskripsi singkat tentang toko">{{$toko->deskripsi}}</textarea>
						</div>
					</div>
					<div class="input-group mb-3 st0 @if($errors->first('input_kategori')) is-invalid @endif" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
						<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Kategori</div>
						<div style="width: 100%; background: #292929; border-radius: 0.5em;margin-top: 0.3em; display: flex; justify-content: space-between;">
							<div class="list-kategori" style="min-height: 5em; align-items: flex-start; padding: 0.5em 0.5em 0.5em 0.5em; width: 88%;">
								@for ($i = 0; $i < count($loop_val); $i++)
								<badge class='badge badge-secondary'>{{$loop_val[$i]}}</badge>
								@endfor

							</div>
							<div style="width: 2em; height: 2em; font-size: 0.8em; background: #FFC331; color: #202020; border-radius: 50%; padding-top: 0.2em; padding-left: 0.5em; margin: 1em;" onclick="tambah_kategori_modal()">
								<i class="fa fa-plus"></i>
							</div>
						</div>
					</div>

					<div class="input-group mb-3 st0" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
						<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Nomor Whatsapp Business</div>
						<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
							<span class="input-group-text-mall" style="width: 3em; background: #202020;">
								<img src="<?=url('/')?>/public/img/icon_svg/handphone_white.svg" style="width: 60%;">
							</span>
							<input type="text" class="form-control-mall" id="no_hp" name="no_hp" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Nomor Handphone" aria-label="no_hp" aria-describedby="basic-addon1" style="width: 100%;" value="{{$toko->no_hp}}" required>
						</div>
					</div>
					<div class="input-group mb-3 st0 @if($errors->first('jadwal_hari')) is-invalid @endif" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
						<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Jadwal Toko</div>
						<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
							<span class="input-group-text-mall" style="width: 3em; background: #202020;">
								<img src="<?=url('/')?>/public/img/icon_svg/jadwal_white.svg" style="width: 50%;">
							</span>
							<div onclick="pilih_jadwal()" class="form-control form-control-mall" style="vertical-align: center;display: flex; align-items: center; justify-content: flex-start; cursor: pointer; border-top-left-radius: 0px; border-bottom-left-radius: 0px;" id="pilih_jadwal_buka_toko">Pilih Jadwal Toko</div>

						</div>
					</div>
					<div hidden> 
						<input name="input_kategori" id="input_kategori">
						<input name="input_id_kategori" id="input_id_kategori" value="{{$input_id_kategori}}">					
						<input type="hidden" name="jadwal_hari" id="jadwal_hari" value="{{$hari}}">
						<input type="hidden" name="jadwal_buka" id="jadwal_buka" value="{{$buka}}">
						<input type="hidden" name="jadwal_tutup" id="jadwal_tutup" value="{{$tutup}}">
					</div>
					<div class="input-group mb-3 st0" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
						<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Alamat</div>
						<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
							<span class="input-group-text-mall" style="width: 3em; background: #202020;">
								<img src="<?=url('/')?>/public/img/icon_svg/marker_white.svg" style="width: 60%;">
							</span>
							<input type="text" class="form-control-mall" id="alamat" name="alamat" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Alamat" aria-label="alamat" aria-describedby="basic-addon1" style="width: 100%;" value="{{$toko->alamat}}">
						</div>
					</div>

					<div class="input-group mb-3 st0 @if($errors->first('kab_kota')) is-invalid @endif" id="div_kab_kota" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
						<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Kabupaten / Kota</div>
						<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
							<span class="input-group-text-mall" style="width: 3em; background: #202020;">
								<img src="<?=url('/')?>/public/img/icon_svg/kategori_white.svg" style="width: 40%;">
							</span>
							<select type="text" class="form-control-mall" id="kota" name="kota" style="height: 2.5em;" required>
								<option value="" disabled selected>Pilih Kabupaten / Kota</option>
								@foreach($kota as $row)
								<option value="{{$row->id}}" @if ($kota_selected == $row->id) selected @endif>{{$row->nama}}
								</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="input-group mb-3 st0 @if($errors->first('kelurahan')) is-invalid @endif" id="div_kelurahan" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
						<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Kelurahan</div>
						<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
							<span class="input-group-text-mall" style="width: 2.5em; background: #202020;">
								<img src="<?=url('/')?>/public/img/icon_svg/kategori_white.svg" style="width: 42%;">
							</span>
							<select type="text" class="form-control-mall" id="kelurahan" name="kelurahan" style="height: 2.5em;" required>
								@foreach($kelurahan as $row)
								<option value="{{$row->id}}" @if ($toko->kelurahan_id == $row->id) selected @endif>{{$row->kelurahan}}
								</option>
								@endforeach
							</select>
						</div>
					</div>


					<button type="submit" class="btn btn-primary" style="padding: 0px; background: transparent; border: none;" onclick="cek_data()">
						<img src="<?=url('/')?>/public/img/button/toko_premium/simpan.svg" style="width: 100%; margin: 0px;">
					</button>	
				</div>
			</div>
		</form>

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



@if ($errors->any())
<div id="modal-pemberitahuan" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
aria-hidden="true" data-backdrop="static" data-keyboard="false" style="width: 100%;">
<div class="modal-dialog modal-sm modal-dialog-centered">
	<div class="modal-content">
		<div class="modal-body text-center font-weight-bold py-3">
			@if($errors->first('foto_toko'))
			Harus memasukkan logo toko
			@else
			Semua form harus diisi
			@endif
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

@endsection

@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?=url('/')?>/public/plugins/select2/js/select2.full.min.js"></script>
<script>
	$('#kota').change(function(){
		// show_loader();
		$('#kelurahan').empty();
		$('#kelurahan').append($('<option>', {
			text: 'Memuat'
		}));
		$.ajax({
			url: "{{ route('get_kelurahan_from_kota') }}?id_kota="+$(this).val(),
			method: 'GET', 
			success: function(data){
				// hide_loader();
				$('#kelurahan').empty();
				$('#kelurahan').html(data.html);
			}
		})
	})

	$('#kecamatan').change(function(){
		$('#kelurahan').empty();
		$('#kelurahan').append($('<option>', {
			text: 'Memuat'
		}));
		$.ajax({
			url: "{{ route('get_kelurahan') }}?id_kecamatan="+$(this).val(),
			method: 'GET', 
			success: function(data){
				$('#kelurahan').empty();
				$('#kelurahan').html(data.html);
			}
		})
	})
</script>
<script type="text/javascript">
	@if(Session::has('message'))
	$('#modal-pemberitahuan').modal('show')
	@endif

	$("input[required], select[required]").attr("oninvalid",
		"this.setCustomValidity('Harap Dimasukkan')");
	$("input[required], select[required]").attr("oninput", "setCustomValidity('')");

	function tambah_kategori_modal(){
		$('#modal-kategori').modal('show');
	}

	function tambah_jadwal_lain(){
		$("#tambah_jadwal_lain").prop('hidden', true);
		$("#input_jadwal").prop('hidden', false);
		$("#simpan_disabled_jadwal").prop("hidden", false);
		$("#simpan_enabled_jadwal").prop("hidden", true);

	}

	$("#kelurahan").select2();

	var i = 0;
	var jadwal_hari = [];
	var jadwal_buka = [];
	var jadwal_tutup = [];
	<?php for ($i = 0; $i < count($loop_hari); $i++){?>
		@if ($loop_hari[0] != "")
		jadwal_hari.push("<?=$loop_hari[$i]?>");
		jadwal_buka.push("<?=$loop_buka[$i]?>");
		jadwal_tutup.push("<?=$loop_tutup[$i]?>");
		@endif
	<?php } ?>


	var value_kategori = [];
	var value_id_kategori = [];
	var i_kategori = 0;
	<?php for ($i = 0; $i < count($loop_id_val); $i++){?>
		@if ($loop_id_val[0] != "")
		value_id_kategori.push("<?=$loop_id_val[$i]?>");
		value_kategori.push("<?=$loop_val[$i]?>");
		@endif
	<?php } ?>


	function input_focus(id){
		$("#div_"+id).css('border', '1px solid #d1d2d4');
	}

	function input_blur(id){
		$("#div_"+id).css('border', '1px solid white');		
	}		


	function pilih_jadwal(){
		$("#modal-jadwal").modal('show');
	}

	function tambah_foto_toko(){
		$("#foto_toko").click();
	}

	function tambah_foto_lokasi_toko(){
		$("#foto_lokasi_toko").click();
	}

	$( "#form_input" ).submit(function( event ) {
		show_loader();
	});
		// $("input#username").on({
		// 	keydown: function(e) {
		// 		if ((e.which === 32) || (e.which === 64) || (e.which === 37))
		// 			return false;
		// 	},
		// 	change: function() {
		// 		this.value = this.value.replace(/\s/g, "");
		// 	}
		// });
		$("#username").keypress(function(e) {
			if ((String.fromCharCode(e.which).match(/[^A-Za-z0-9_ ]/) || e.which === 32)) {
				e.preventDefault();
				// alert("Special characters are not allowed. Use 'A-Z', 'a-z' and '0-9'.");
			}
		});


		function tambah_jadwal() {
			var jadwal_awal = $("#jadwal_mulai").val();
			var jadwal_akhir = $("#jadwal_akhir").val();
			var simbol = jadwal_awal.substring(1, 0)+jadwal_akhir.substring(1, 0);
			if (jadwal_awal == jadwal_akhir){
				var hari = jadwal_awal;				
			}
			else {
				var hari = jadwal_awal+"-"+jadwal_akhir;

			}
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
				$("#tambah_jadwal_lain").prop("hidden", false);
				$("#input_jadwal").prop('hidden', true);
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

		function check_select(){
			var option_value = ["SH", "SS", "SJ", "S", "S", "R", "K", "J", "S", "M"];
			var option_text = ["Setiap-Hari", "Senin-Sabtu", "Senin-Jumat", "Senin", "Selasa", "Rabu", "Kamis","Jumat", "Sabtu", "Minggu"];
			var option = "<option disabled selected>--- Silahkan Pilih Hari ---</option>";
			for (var i = 0; i < option_text.length; i++){
				var indikator = false;
				for (var j = 0; j < jadwal_hari.length; j++){
					if (jadwal_hari[j] == option_text[i]){
						indikator = true;
					}
				}
				if (indikator == false){
					option += "<option value='"+option_value[i]+"' >"+option_text[i]+"</option>"; 				
				}
			}
			$("#jadwal").html(option);		
			var string_hari = jadwal_hari.toString();
			var string_buka = jadwal_buka.toString();
			var string_tutup = jadwal_tutup.toString();
			$("#jadwal_hari").val(string_hari.replaceAll(",", "~"));
			$("#jadwal_buka").val(string_buka.replaceAll(",", "~"));
			$("#jadwal_tutup").val(string_tutup.replaceAll(",", "~"));

			if ($("#jadwal_hari").val() == ''){
				$("#pilih_jadwal_buka_toko").html("Pilih Jadwal Buka Tutup Toko");
			}
			else {
				$("#pilih_jadwal_buka_toko").html("Telah memilih Jadwal");			
			}

		}

		function simpan_disabled_kategori(){
			alert("Tambahkan data terlebih dahulu");
		}

		function simpan_disabled_jadwal(){
			alert("Tambahkan data terlebih dahulu");        
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
			for (var i = 0; i < option_text.length; i++) {
				var indikator = false;
				for (var j = 0; j < value_kategori.length; j++) {
					if (value_kategori[j] == option_text[i]) {
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


		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#pic_toko_privew').attr('src', e.target.result);
					$("#div_pic_toko_privew").prop('hidden', false);
					$("#div_pic_toko").prop('hidden', true);
					var gambarnya = $("#foto_toko").val();
					$("#gambar_toko").val(gambarnya);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#foto_toko").change(function(){
			readURL(this);
		});


		function readURLlokasi(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#pic_lokasi_toko_privew').attr('src', e.target.result);
					$("#div_pic_lokasi_toko_privew").prop('hidden', false);
					$("#div_pic_lokasi_toko").prop('hidden', true);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#foto_lokasi_toko").change(function(){
			readURLlokasi(this);
		});

		function ubah_nama_toko(){
			$("#div_nama_toko").prop('hidden', true);
			$("#nama_toko").prop('hidden', false);
		}

		function hapus_jadwal(hari){
			// alert(id);
			var temp;
			for (var i = 0; i < jadwal_hari.length; i++){
				if (jadwal_hari[i] == hari){
					jadwal_hari[i] = jadwal_hari[i+1];
					jadwal_buka[i] = jadwal_buka[i+1];
					jadwal_tutup[i] = jadwal_tutup[i+1];

				}
			}
			jadwal_hari.pop();
			jadwal_tutup.pop();
			jadwal_buka.pop();
			check_select();
			$("#"+hari.replaceAll(" ", "_")).remove();
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
