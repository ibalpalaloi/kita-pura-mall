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
		text-decoration: none !important;
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
<?php
$daftar_mitra = "";
if (!empty($_GET['daftar_mitra'])){
	$daftar_mitra = $_GET['daftar_mitra'];
}
?>

<?php
$daftar_mitra_premium = "";
if (!empty($_GET['daftar_mitra_premium'])){
	$daftar_mitra_premium = $_GET['daftar_mitra_premium'];
}
?>

@if(Session::get('message') == 'Belum Terverifikasi')
<div class="modal fade" id="modal-verifikasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; box-shadow: none; border: none;">
			<div style="width: 80%;">
				<div style="background: transparent; margin-top: 4.5em; border-radius: 1.5em; position: relative;">
					<div style="display: flex; justify-content: center; flex-direction: column; align-items: center; width: 100%; position: absolute; top: -6.8em;">
						<img src="<?=url('/')?>/public/img/mitra/waiting.svg" style="width: 100%; margin-left: 0.7em; margin-bottom: 0em;">
						<h3 style="margin-top: 0em; color: white;">Berhasil!</h3>
						<div style="text-align: center; font-size: 0.8em; line-height: 1.2em; color: white;">data toko anda berhasil dikirimkan.<br>mohon tunggu verifikasi dari<br>tim kitapuramall</div>
						<a href="<?=url('/')?>/akun/mitra/{{Session::get('jenis_mitra')}}" style="color: white; background: #ffaa00; padding: 0.3em 0em 0.5em 0em; width: 50%; margin-top: 0.8em; border-radius: 2em; text-align: center; font-weight: 600;">Ubah data ?</a>
					</div>
					<img src="<?=url('/')?>/public/img/mitra/bg-waiting.svg" style="width: 100%;">
				</div>
			</div>
		</div>
	</div>
</div>
@endif

@if(Session::get('message') == 'Biodata Belum Lengkap')
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

@if((Session::get('message') == 'KTP Belum Lengkap') || ($cek_ktp == "KTP Belum Lengkap"))
<div class="modal fade" id="modal-verifikasi-ktp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; box-shadow: none; border: none;">
			<div style="width: 80%;">
				<div style="background: transparent; margin-top: 4.5em; border-radius: 1.5em; position: relative;">
					<div style="display: flex; justify-content: center; flex-direction: column; align-items: center; width: 100%; position: absolute; top: -6.8em;">
						<img src="<?=url('/')?>/public/img/mitra/waiting.svg" style="width: 100%; margin-left: 0.7em; margin-bottom: 0em;">
						<h3 style="margin-top: 0em; color: white;">1 Langkah Lagi</h3>
						<div style="text-align: center; font-size: 0.8em; line-height: 1.2em; color: white;">data toko anda berhasil dikirimkan.<br>mohon tunggu verifikasi dari<br>tim kitapuramall</div>
						@if(Session::get('status_mitra') == 'free')
						<a href="<?=url('/')?>/akun/mitra/{{Session::get('status_mitra')}}/upgrade-premium/upload-ktp" style="color: white; background: #ffaa00; padding: 0.3em 0em 0.5em 0em; width: 50%; margin-top: 0.8em; border-radius: 2em; text-align: center; font-weight: 600;">Ubah data ?</a>
						@else
						<a href="<?=url('/')?>/akun/mitra/{{Session::get('status_mitra')}}/upload-ktp" style="color: white; background: #ffaa00; padding: 0.3em 0em 0.5em 0em; width: 50%; margin-top: 0.8em; border-radius: 2em; text-align: center; font-weight: 600;">Ubah data ?</a>
						@endif
					
					</div>
					<img src="<?=url('/')?>/public/img/mitra/bg-waiting.svg" style="width: 100%;">
				</div>
			</div>
		</div>
	</div>
</div>
@endif

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
				@if (Session::get('status_mitra') != 'Belum jadi mitra')
				<div style="font-size: 0.6em; background: #ff006e; color: white; padding: 0.3em 1.5em 0.3em 1.5em; border-radius:2em; position: absolute; bottom: 1.5em;">Mitra {{ucfirst($status_aktif_mitra)}}</div>
				@endif
			</div>
			<div style="width: 63%; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 2%;">
				<div class="container">
				@if(Session::get('progress_biodata') == '5')
				<div>Semoga Harimu <strong>Menyenangkan!</strong></div>
				@else
				<div>Lengkapi akun anda!</div>			
				@endif
					<div style="display: flex; justify-content: center; align-items: center;">
						<div class="progress" style="border-radius: 1.5em; width: 90%; height: 1rem;">
							<div class="progress-bar" role="progressbar" aria-valuenow="{{Session::get('progress_biodata')*20}}" aria-valuemin="0" aria-valuemax="100" style="width:{{Session::get('progress_biodata')*20}}%; border-radius: 1.5em; background: #ff006e;">
							</div>
						</div>
						<div style="width: 5%; margin-left: 0.5em;"><b>{{Session::get('progress_biodata')}}/5</b></div>
					</div>
					@if(Session::get('progress_biodata') == '5')
					<div style="font-size: 0.60em; text-align: center; width: 90%;"><b>Data Anda Sudah Lengkap </b>anda bisa melakukan transaksi pada aplikasi ini</div>
					@else
					<div style="font-size: 0.60em; text-align: center; width: 90%;"><b>Lengkapi akun </b>anda, Untuk bisa melakukan transaksi pada aplikasi ini</div>

					@endif
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
			<a href="<?=url('/')?>/akun/mitra">
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript">

	@if(Session::get('message') == 'Biodata Belum Lengkap')
		$('#modal-pemberitahuan').modal('show')
	@endif


	@if(Session::get('message') == 'Belum Terverifikasi')
		$('#modal-verifikasi').modal('show');
	@endif

	@if((Session::get('message') == 'KTP Belum Lengkap') || ($cek_ktp == "KTP Belum Lengkap"))
		$('#modal-verifikasi-ktp').modal('show');
	@endif	


	@if ($status_aktif_mitra == "Belum lengkap")
	function verifikasi_ktp(){
		$('#modal-verifikasi-ktp').modal('show');
	}
	@endif

	@if ($daftar_mitra == 'success')
		$('#modal-verifikasi').modal('show');
	@endif	




</script>

@endsection
