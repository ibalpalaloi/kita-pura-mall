@extends('layouts.home_premium')

@section('title')

@endsection

@section('header-scripts')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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

	.btn-menu-analitik {
		color: #a1a4a8; 
		margin: 0em 0.3em 0em 0.3em; 
		background: white; 
		padding: 0.3em 1.3em 0.3em 1.3em; 
		border-radius: 2em;
		border: 1px solid white;		
	}

	.analitik-active {
		color: white;
		background: #dd9d25;
		border: 1px solid #dd9d25;
	}

	.card-menu-premium {
		background: transparent; 
		display: flex; 
		justify-content: center; 
		margin-top: .5em; 
		flex-direction: column; 
		align-items: center;		
		border-radius: 1.5em;
	}

	.modal-dialog-bottom{
		margin: 0;
		display: flex;
		align-items: flex-end;
		height: 100%;

	}  


/*
	@charset "utf-8";
	.st0
	{
		background : -moz-linear-gradient(-39.86% 71.45% 30deg,rgba(35, 35, 35, 1) 0%,rgba(53, 53, 53, 1) 30.17%,rgba(28, 28, 29, 1) 59.5%,rgba(37, 37, 38, 1) 85.75%);
		background : -webkit-linear-gradient(30deg, rgba(35, 35, 35, 1) 0%, rgba(53, 53, 53, 1) 30.17%, rgba(28, 28, 29, 1) 59.5%, rgba(37, 37, 38, 1) 85.75%);
		background : -webkit-gradient(linear,-39.86% 71.45% ,139.86% 28.55% ,color-stop(0,rgba(35, 35, 35, 1) ),color-stop(0.3017,rgba(53, 53, 53, 1) ),color-stop(0.595,rgba(28, 28, 29, 1) ),color-stop(0.8575,rgba(37, 37, 38, 1) ));
		background : -o-linear-gradient(30deg, rgba(35, 35, 35, 1) 0%, rgba(53, 53, 53, 1) 30.17%, rgba(28, 28, 29, 1) 59.5%, rgba(37, 37, 38, 1) 85.75%);
		background : -ms-linear-gradient(30deg, rgba(35, 35, 35, 1) 0%, rgba(53, 53, 53, 1) 30.17%, rgba(28, 28, 29, 1) 59.5%, rgba(37, 37, 38, 1) 85.75%);
		-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='#232323', endColorstr='#252526' ,GradientType=0)";
		background : linear-gradient(60deg, rgba(35, 35, 35, 1) 0%, rgba(53, 53, 53, 1) 30.17%, rgba(28, 28, 29, 1) 59.5%, rgba(37, 37, 38, 1) 85.75%);
		border-style : Solid;
		border-width : 1px;
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#232323',endColorstr='#252526' , GradientType=1);
		background-size: cover;
		}*/


</style>
@endsection

@section('content')

<div id="modal-atur-maps" class="modal fade" id="modal-trigger-location" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-bottom" role="document" style="padding: 0px; overflow-y: initial !important;">
		<div class="modal-content" style="border-radius: 1em; background: #eaf4ff; display: flex; justify-content: center; align-items: center; border-bottom-left-radius: 0em; border-bottom-right-radius: 0em;">
			<div class="modal-body" style="width: 100%;height: 80vh; overflow-y: auto;">
				@for ($i = 0; $i < 3; $i++)
				<div class="input-group mb-2 div-input-mall-square" id="div_foto_toko_{{$i}}" style="margin-top: 1em; background: white; border-radius: 1.2em;">
					<div style="text-align: center; width: 100%; margin-top: 1.2em; margin-bottom: 0.8em;">Foto Maps {{$i+1}} </div>
					<div style="display: flex; justify-content: center; width: 100%; border: 2px dashed #0066ff; margin: 0px 10% 2em 10%; height: 11.5em; cursor: pointer;" onclick='tambah_foto_toko("{{$i}}")' id="div_pic_toko_{{$i}}">
						<img src="<?=url('/')?>/public/img/icon_svg/plus_circle.svg" style="width: 2em;">
					</div>
					<div style="display: flex; justify-content: center; width: 100%; margin: 0px 10% 2em 10%; height: 11.5em;" id="div_pic_toko_privew_{{$i}}" hidden>
						<img id="pic_toko_privew_{{$i}}" src="<?=url('/')?>/public/img/img.jpg" style="width: 100%; object-fit: cover;height: 100%;">
						<img id="pic_toko_{{$i}}" src="<?=url('/')?>/public/img/icon_svg/plus_circle.svg" onclick='tambah_foto_toko("{{$i}}")' style="position: absolute; right: 1em; bottom: 1em;">

					</div>

					<input hidden type="file" name="foto_toko_{{$i}}" id="foto_toko_{{$i}}" required>
				</div>
				@endfor
			</div>

		</div>
	</div>
</div>


<header class="style__Container-sc-3fiysr-0 header" style="background: transparent; padding-top: 0.3em;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh">
		<a href="<?=url('/')?>/akun" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; padding-bottom: 0.3em; padding-right: 0.7em;">
			<img src="<?=url('/')?>/public/img/back_white.svg">
		</a>
		<a id="defaultheader_logo" title="Kitabisa" style="height: 100%; width: 70%; display: flex; justify-content: center; align-items: center;">
			<img src="<?=url('/')?>/public/img/logo_premium.svg" style="height: 80%;">
		</a>
		<a style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center;">
			<img src="<?=url('/')?>/public/img/icon_svg/landing_page.svg" style="width: 100%;">
		</a>
	</div>
</header>


@php $url = url('/')."/public/img/home/bg-premium.svg"; @endphp
<main id="homepage" class="homepage" style='background: transparent; padding: 5em 0px 0px 0px;'>
	<div>
		<div style="padding: 0px 16px 1em;">
			<h3 style="color: white;">Transaksi</h3>
			<div style=" display: flex; justify-content: space-between; align-items: center;">
				<div style="font-size: 0.8em; line-height: 1.2em; color: #a1a4a8;">Statistik</div>
				<div style="display: flex; font-size: 0.6em;color: #a1a4a8;">
					<div class="btn-menu-analitik analitik-active">Pekanan</div>
					<div class="btn-menu-analitik">Bulanan</div>
				</div>				
			</div>
		</div>
		<div class="grafis" style="">
			<canvas id="chart-0" hidden></canvas>
			<canvas id="chart-1"></canvas>
		</div>
		<div class="card-menu-premium" style="margin-top: 0em;padding-top: 0px;">
			<div style="margin-top: 0em; background: transparent; padding: 0.5em; display: flex; justify-content: center; border-radius: 1.5em; font-size: 0.75em;">
			</div>
			<div style="width: 100%;">
				<div class="statis" style="width: 100%; display: flex; justify-content: center; flex-direction: column; color: #a1a4a8;">
					<div style="display: flex; justify-content: space-around;">
						<div class="item-statis" style="display: flex; justify-content: center;">
							<div style="margin-left: 0.5em;">
								<hr style="border: 3px solid #dd9d25; border-radius: 1.5em; width: 1.5em; margin-bottom: 0em;">
								<div style="margin-top: 1px;font-size: 1.6em; font-weight: 700; margin-bottom: 0em; text-align: center; color: white;">1000</div>
								<div style="font-size: 0.7em; margin-top: 0em; line-height: 0.3em; margin-bottom: 1.2em; text-align: center; color: white;">Pengujung</div>
							</div>
						</div>
						<div class="item-statis" style="display: flex; justify-content: center;">
							<div style="margin-left: 0.5em;">
								<hr style="border: 3px solid #dd9d25; border-radius: 1.5em; width: 1.5em; margin-bottom: 0em;">
								<div style="font-size: 1.6em; color: white; font-weight: 700; margin-bottom: 0em; text-align: center;">1000</div>
								<div style="font-size: 0.7em; margin-top: 0em; line-height: 0.3em; margin-bottom: 1.2em; text-align: center; color: white;">Transaksi</div>
							</div>
						</div>

					</div>
				</div>
			</div>			
		</div>
		<div style="display: flex; justify-content: center; flex-direction: column; align-items: center; padding-bottom: 1.2em;">
			<a href="<?=url('/')?>/akun/mitra/premium/atur-toko" style="padding-left: 0.4em;">
				<img src="<?=url('/')?>/public/img/button/toko_premium/atur_toko.svg" style="width: 100%;">
			</a>
			<a href="<?=url('/')?>/akun/mitra/premium/tambah-produk" style="padding-left: 0.4em;">
				<img src="<?=url('/')?>/public/img/button/toko_premium/tambah_produk.svg" style="width: 100%;">
			</a>
			<a href="<?=url('/')?>/akun/mitra/premium/atur-produk" style="padding-left: 0.4em;">
				<img src="<?=url('/')?>/public/img/button/toko_premium/atur_produk.svg" style="width: 100%;">
			</a>
			<a href="<?=url('/')?>/akun/mitra/premium/list-pesanan" style="padding-left: 0.4em;">
				<img src="<?=url('/')?>/public/img/button/toko_premium/list_pesanan.svg" style="width: 100%;">
			</a>
		</div>
	</div>

</main>

@endsection

@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script type="text/javascript">

	var label_bulanan = ["01", "02", '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
	var jumlah_bulanan = [15, 24, 35, 12, 16, 12, 29, 40, 8, 0,0,0];
	var maxJumlah_bulanan = Math.max.apply(Math, jumlah_bulanan)/2;
	var color_bulanan = ["#ffaa00", "#ffaa00", "#ffaa00", "#ffaa00","#ffaa00", "#ffaa00","#ffaa00", "#ffaa00","#ffaa00", "#ffaa00","#ffaa00", "#ffaa00"];


	var label_pekanan = ["", "Senin", "Selasa", "Rabu", "Kamis","Jumat", "Sabtu", "Minggu", ""];
	var jumlah_pekanan = [0, 15, 24, 35, 30, 28, 34, 0, 0];
	var maxJumlah_pekanan = Math.max.apply(Math, jumlah_pekanan)/2;
	var color_pekanan = ["#ffaa00", "#ffaa00", "#ffaa00", "#ffaa00","#ffaa00", "#ffaa00", "#ffaa00"];
	create_chart(label_bulanan, jumlah_bulanan, color_bulanan, "chart-0", maxJumlah_bulanan);
	create_chart(label_pekanan, jumlah_pekanan, color_pekanan, "chart-1", maxJumlah_pekanan);

	function atur_maps(){
		$("#modal-atur-maps").modal('show');
	}

	function tambah_foto_toko(i){
		$("#foto_toko_"+i).click();
	}	

	$("#foto_toko_0").change(function(){
		readURL(this, "0");
	});
	$("#foto_toko_1").change(function(){
		readURL(this, "1");
	});
	$("#foto_toko_2", "2").change(function(){
		readURL(this);
	});	


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

	function create_chart(label, jumlah, color, target, margin_top){
		var chartData = {
			labels: label,
			datasets: [{
				data: jumlah,
				backgroundColor: color,
				strokeColor: color,   
			}]
		};

		var ctx = document.getElementById(target);
		var ctx_gradient = ctx.getContext("2d");
		var gradientFill = ctx_gradient.createLinearGradient(0, 50, 0, 150);
		gradientFill.addColorStop(1, "transparent");
		gradientFill.addColorStop(0, "#dc961c");

		var data = {
			labels: label,
			datasets: [{
				data: jumlah,
				fill: true,
				borderColor: "#ffaa00",
				pointBackgroundColor: "#1c1e1e",
				pointRadius: [0, 5, 5, 5, 5, 5, 5, 5, 0],
				pointBorderWidth: 2,
				backgroundColor: gradientFill,    			

			}]
		}

		Chart.defaults.global.defaultFontSize = "10";
		Chart.defaults.global.defaultFontColor = "white";
		var myChart = new Chart(ctx, {
			type: 'line',
			label: '90',
			data: data,
			options: {
				"hover": {
					"animationDuration": 4
				},
				"animation": {
					"duration": 1,
					"onComplete": function() {
						var chartInstance = this.chart,
						ctx = chartInstance.ctx;
						ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
						ctx.textAlign = 'center';
						ctx.textBaseline = 'bottom';
						this.data.datasets.forEach(function(dataset, i) {
							var meta = chartInstance.controller.getDatasetMeta(i);
							meta.data.forEach(function(bar, index) {
								if ((index != 0) && (index != 8)){
									var data = dataset.data[index];
									ctx.fillStyle = "white";
									ctx.fillText(data, bar._model.x, bar._model.y - 5);
								}
							});
						});
					}
				},
				datasetFill: true,
				legend: {"display": false},
				tooltips: {"enabled": false},
				scales: {
					yAxes: [{
						display: false,
						gridLines: {display: true},
						ticks: {
							max: Math.max(...data.datasets[0].data) + margin_top,
							display: false,
							beginAtZero: true,
							padding: 25
						},
					}],
					xAxes: [{
						gridLines: {display: false},
						ticks: {beginAtZero: true}
					}]
				}
			}
		});
	}

</script>
@endsection
