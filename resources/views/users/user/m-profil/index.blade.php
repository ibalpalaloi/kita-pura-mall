@extends('layouts.home')

@section('title')
Explore |
@endsection

@section('header-scripts')
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
				<span>&nbsp;&nbsp;&nbsp;Mitra Kitapura</span>
			</a>
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

@endsection
