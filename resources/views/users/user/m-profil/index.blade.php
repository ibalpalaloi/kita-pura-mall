@extends('layouts.home')

@section('title')
Explore |
@endsection

@section('header-scripts')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style type="text/css">
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

	.banner {
		max-width: 480px;
		width: 100%;
		margin: 0px auto;
		padding: 0.7em 0em 0.3em 0em;
	}


	.card-mall {
		background: white;
		/*box-shadow: rgba(152, 152, 152, 0.5) 0px 2px 8px 1px;*/
		border-radius: 1.5em;	
		margin-bottom: 1em;
	}

	.card-mall a {
		color: black;
	}

	.kategori {
		padding: 0.8em 0em 1em 0em;
		display: flex; 
		position: relative; 
		top: -3em; 
		margin-bottom: -2em;
		z-index: 2;   
		overflow-y: visible; 
		overflow-x: auto; 			
	}
	.homepage {
		min-height: calc(80vh - 60px);	
	}	

</style>
@endsection

@section('content')
<div class="text-center" hidden>
	<button type="button" id="btn_verifikasi" class="btn btn-default btn-rounded" data-toggle="modal" data-target="#modal-verifikasi">
	Open Modal Hapus</button>
</div>

<div class="modal fade" id="modal-verifikasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; box-shadow: none; border: none;">
			<div style="width: 80%;">
				<div style="background: transparent; margin-top: 4.5em; border-radius: 1.5em; position: relative;">
					<div style="display: flex; justify-content: center; flex-direction: column; align-items: center; width: 100%; position: absolute; top: -6.8em;">
						<img src="<?=url('/')?>/public/img/mitra/waiting.svg" style="width: 100%; margin-left: 0.7em; margin-bottom: 0em;">
						<h3 style="margin-top: 0em; color: white;">Berhasil!</h3>
						<div style="text-align: center; font-size: 0.8em; line-height: 1.2em; color: white;">data toko anda berhasil dikirimkan.<br>mohon tunggu verifikasi dari<br>tim kitapuramall</div>
						<a href="<?=url('/')?>/akun/mitra-free" style="color: white; background: #ffaa00; padding: 0.3em 0em 0.5em 0em; width: 50%; margin-top: 0.8em; border-radius: 2em; text-align: center; font-weight: 600;">Ubah data ?</a>
					</div>
					<img src="<?=url('/')?>/public/img/mitra/bg-waiting.svg" style="width: 100%;">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="wrapper" style="background: #ff006e; position: relative; z-index: -1">
	<div class="banner" style="display: flex; justify-content: flex-end;">
		<div class="" style="width: 30%; display: flex; align-items: flex-start; flex-direction: column; padding-top: 4em; padding-left: 2em;">
			<img src="<?=url('/')?>/public/img/logo.svg" style="width: 30%; width: 60%;">
			<img src="<?=url('/')?>/public/img/logo_text_vertical.svg" style="width: 30%; width: 90%; margin-top: 0.7em;">
		</div>
		<img src="<?=url('/')?>/public/img/user/img_user.png" style="width: 70%;">
	</div>
</div>


<main id="homepage" class="homepage" style="background: #eaf4ff;">
	<div class="card-mall kategori" style="padding: 5px;">
		<div style="display: flex; justify-content: center; flex-direction: row; align-items: center;">
			<div style="width: 25%; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em; ">
				<img src="<?=url('/')?>/public/img/user/lengkapi_berkas.png" style="width: 100%;">
			</div>
			<div style="width: 63%; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 2%;">
				<div class="container">
					<div>Lengkapi akun anda!</div>
					<div style="display: flex; justify-content: center; align-items: center;">
						<div class="progress" style="border-radius: 1.5em; width: 90%; height: 1rem;">
							<div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%; border-radius: 1.5em; background: #ff006e;">
							</div>
						</div>
						<div style="width: 5%; margin-left: 0.5em;"><b>2/5</b></div>
					</div>
					<div style="font-size: 0.60em; text-align: center; width: 90%;"><b>Lengkapi akun </b>anda, Untuk bisa melakukan transaksi pada aplikasi ini</div>
				</div>

			</div>
		</div> 
	</div>
	<div class="card-mall">
		<div style="padding: 1.5em 2em 1.5em 2em;">
			<a href="<?=url('/')?>/akun/pengaturan-profil">
				<span><img src="<?=url('/')?>/public/img/user/setting.svg"></span>
				<span>&nbsp;&nbsp;&nbsp;Pengaturan Profil</span>
			</a>
		</div>
	</div>
	<div class="card-mall">
		<div style="padding: 1.5em 2em 1.5em 2em;">
			<a href="<?=url('/')?>/user/jadi-mitra">
				<span><img src="<?=url('/')?>/public/img/user/mitra.svg"></span>
				<span>&nbsp;&nbsp;&nbsp;Kondisi Belum Jadi Mitra</span>
			</a>
		</div>
	</div>
	<div class="card-mall">
		<div style="padding: 1.5em 2em 1.5em 2em;">
			<a href="<?=url('/')?>/akun/mitra-free">
				<span><img src="<?=url('/')?>/public/img/user/mitra.svg"></span>
				<span>&nbsp;&nbsp;&nbsp;Kondisi Sudah Jadi Mitra Gratis</span>
			</a>
		</div>
	</div>
	<div class="card-mall">
		<div style="padding: 1.5em 2em 1.5em 2em;">
			<div onclick="menunggu_verifikasi()">
				<span><img src="<?=url('/')?>/public/img/user/mitra.svg"></span>
				<span>&nbsp;&nbsp;&nbsp;Kondisi Menunggu Verifikasi Data Mitra</span>
			</div>
		</div>
	</div>
	<div class="card-mall">
		<div style="padding: 1.5em 2em 1.5em 2em;">
			<a href="<?=url('/')?>/logout">
				<span>&nbsp;&nbsp;<img src="<?=url('/')?>/public/img/user/logout.svg"></span>
				<span>&nbsp;&nbsp;&nbsp;Keluar</span>
			</a>
		</div>
	</div>
</main>

@endsection

@section('footer-scripts')
@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript">
	function menunggu_verifikasi() {
		$("#btn_verifikasi").click();
	}
</script>

@endsection
