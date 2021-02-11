@extends('layouts.home_no_menu')

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

</style>
@endsection

@section('content')


<header class="style__Container-sc-3fiysr-0 header" style="background: white;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: space-between;">
		<a href="<?=url('/')?>/akun" style="padding-left: 1em;">
			<img src="<?=url('/')?>/public/img/back_black.svg">
		</a>
		<a id="defaultheader_logo" title="Kitabisa" style="margin-left: 20px; height:33px;margin-right:20px" href="/">
			<img src="<?=url('/')?>/public/img/logo_black.svg">
			<img src="<?=url('/')?>/public/img/logo_text_black.svg">
		</a>
		<div style="margin-right: 2.5em;">
			<img src="<?=url('/')?>/public/img/back.svg" hidden>
		</div>
	</div>
</header>



<main id="homepage" class="homepage" style="padding-top: 6em; background: #eaf4ff;">
	<div>
		<h3>Analitik</h3>
		<div style="text-align: justify; font-size: 0.8em; line-height: 1.2em; color: #a1a4a8;">dengan fitur ini kalian bisa melihat total pengunjung yang mengunjungi toko anda dan berapa jumlah transaksi yang terjadi</div>
		<div class="card-menu-premium">
			<div style="margin-top: 0.5em; background: #eaf4ff; padding: 0.5em; display: flex; justify-content: center; border-radius: 1.5em; font-size: 0.75em;">
				<div class="btn-menu-analitik analitik-active">Pekanan</div>
				<div class="btn-menu-analitik">Bulanan</div>
			</div>
			<div style="margin-top: 1em; width: 100%;">
				<div class="statis" style="width: 100%; display: flex; justify-content: center; flex-direction: column; color: #a1a4a8;">
					<div style="font-size: 1.8em; font-weight: 600; text-align: center;">Total</div>
					<div style="display: flex; justify-content: space-around;">
						<div class="item-statis" style="display: flex; justify-content: center;">
							<div style="display: flex; align-items: center;">
								<img src="<?=url('/')?>/public/img/icon_svg/pengujung.svg" style="height: 2em;">
							</div>
							<div style="margin-left: 0.5em;">
								<div style="font-size: 1.6em; font-weight: 700; margin-bottom: 0em; text-align: center;">1000</div>
								<div style="font-size: 0.7em; margin-top: 0em; line-height: 0.3em; margin-bottom: 1.2em; text-align: center;">Pengujung</div>
							</div>
						</div>
						<div class="item-statis" style="display: flex; justify-content: center;">
							<div style="display: flex; align-items: center;">
								<img src="<?=url('/')?>/public/img/icon_svg/transaksi.svg" style="height: 2em;">
							</div>
							<div style="margin-left: 0.5em;">
								<div style="font-size: 1.6em; font-weight: 700; margin-bottom: 0em; text-align: center;">1000</div>
								<div style="font-size: 0.7em; margin-top: 0em; line-height: 0.3em; margin-bottom: 1.2em; text-align: center;">Pengujung</div>
							</div>
						</div>

					</div>
				</div>
				<div class="grafis" style="padding: 1em;">
					<canvas id="chart-pekanan"></canvas>
					<canvas id="chart-bulanan"></canvas>
				</div>
			</div>			
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
	var color_bulanan = ["#ffaa00"];

	var label_pekanan = ["Senin", "Selasa", "Rabu", "Kamis","Jumat", "Sabtu", "Minggu"];
	var jumlah_pekanan = [15, 24, 35, 12, 16, 12, 19];
    var maxJumlah_pekanan = Math.max.apply(Math, jumlah_pekanan)/2;
	var color_pekanan = ["#ffaa00"];



    //get data
    create_chart(label_bulanan, jumlah_bulanan, color_bulanan, "chart-bulanan", maxJumlah_bulanan);
    create_chart(label_pekanan, jumlah_pekanan, color_pekanan, "chart-pekanan", maxJumlah_pekanan);
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
    	var data = {
    		labels: label,
    		datasets: [{
    			data: jumlah,
    			backgroundColor: color,
    			// fill: true,
    			borderColor: "#ffaa00",
    			borderDash: [4, 2],  	
    			backgroundColor: "rgba(151,205,187,0.2)",    			

    		}]
    	}
    	Chart.defaults.global.defaultFontSize = "10";
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
    							var data = dataset.data[index];
    							ctx.fillText(data, bar._model.x, bar._model.y - 5);
    						});
    					});
    				}
    			},
    			datasetFill: true,
    			legend: {"display": false,},
    			tooltips: {"enabled": false},
    			scales: {
    				yAxes: [{
    					display: true,
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
    			},

    		}
    	});
		
    }



</script>
@endsection
