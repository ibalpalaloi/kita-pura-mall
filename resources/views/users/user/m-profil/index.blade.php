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
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: #ff006e; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: 0;">
				<img src="<?=url('/')?>/public/img/mitra/modal_daftar_register.svg" style="width: 80%; position: absolute; top: -16em;">
				<div style="font-size: 2em; font-weight: 600; margin-top: 1em;">Mohon Tunggu...</div>
				<div style="font-size: 1.1em; text-align: center; width: 90%; font-weight: 0; color: #ffe6f1;">kitapuramall akan mengkonfirmasi permintaan anda. mohon tunggu konfirmasi</div>
				<a href="<?=url('/')?>/akun/pengaturan-profil" style="margin-bottom: 1em; font-size: 1.1em;margin-top: 0.5em; text-align: center; text-decoration: underline; color: white;">Konfirmasi lama? Klik disini
				</a>
			</div>
		</div>
	</div>
</div>
@endif

@if(Session::get('message') == 'Belum Terverifikasi KTP')
<div class="modal fade" id="modal-verifikasi-upgrade-ktp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: #ff006e; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: 0;">
				<img src="<?=url('/')?>/public/img/mitra/modal_1_step.svg" style="width: 80%; position: absolute; top: -11em;">
				<div style="font-size: 2em; font-weight: 600; margin-top: 1em;">1 Langkah Lagi</div>
				<div style="font-size: 1.1em; text-align: center; width: 90%; font-weight: 0; color: #ffe6f1;">anda sedang dalam proses upgrade akun free ke akun premium. Sisa 1 langkah lagi kamu sudah bisa menikmati akun premium</div>
				<a href="<?=url('/')?>/akun/mitra/free/upgrade-premium/upload-ktp" class="btn btn-primary" style="margin-bottom: 0em; font-size: 1.1em;margin-top: 1em; text-align: center; color: white;">Lanjutkan
				</a>
				<a href="<?=url('/')?>/akun/mitra/free/upgrade-premium/batalkan-upgrade" style="margin-bottom: 1em; font-size: 1em;margin-top: 0.5em; text-align: center; text-decoration: underline; color: white;">Batalkan Upgrade?
				</a>
			</div>
		</div>
	</div>
</div>
@endif

@if(Session::get('message') == 'Belum Terverifikasi Upgrade')
<div class="modal fade" id="modal-verifikasi-upgrade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: #ff006e; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: 0;">
				<img src="<?=url('/')?>/public/img/mitra/modal_daftar_register.svg" style="width: 80%; position: absolute; top: -16em;">
				<div style="font-size: 2em; font-weight: 600; margin-top: 1em;">Mohon Tunggu...</div>
				<div style="font-size: 1.1em; text-align: center; width: 90%; font-weight: 0; color: #ffe6f1;">anda sedang dalam proses upgrade akun free ke akun premium. Silahkan menunggu admin untuk memverifikasi data anda</div>
				<a href="<?=url('/')?>/akun/mitra/free/upgrade-premium/batalkan-upgrade" style="margin-bottom: 1em; font-size: 1.1em;margin-top: 0.5em; text-align: center; text-decoration: underline; color: white;">Batalkan Upgrade?
				</a>
			</div>
		</div>
	</div>
</div>
@endif

@if(Session::get('message') == 'Batal Upgrade')
<div class="modal fade" id="modal-batal-upgrade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: #ff006e; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: 0;">
				<img src="<?=url('/')?>/public/img/mitra/modal_daftar_register.svg" style="width: 80%; position: absolute; top: -16em;">
				<div style="font-size: 2em; font-weight: 600; margin-top: 1em;">Yahhh</div>
				<div style="font-size: 1.1em; text-align: center; width: 90%; font-weight: 0; color: #ffe6f1;">kamu telah membatalkan upgrade akun ke premium</div>
			</div>
		</div>
	</div>
</div>
@endif


@if(Session::get('message') == 'Belum Terverifikasi')
<div class="modal fade" id="modal-verifikasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: #ff006e; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: 0;">
				<img src="<?=url('/')?>/public/img/mitra/modal_daftar_register.svg" style="width: 80%; position: absolute; top: -16em;">
				<div style="font-size: 2em; font-weight: 600; margin-top: 1em;">Mohon Tunggu...</div>
				<div style="font-size: 1.1em; text-align: center; width: 90%; font-weight: 0; color: #ffe6f1;">kitapuramall akan mengkonfirmasi permintaan anda. mohon tunggu konfirmasi</div>
				<a href="<?=url('/')?>/akun/pengaturan-profil" style="margin-bottom: 1em; font-size: 1.1em;margin-top: 0.5em; text-align: center; text-decoration: underline; color: white;">Konfirmasi lama? Klik disini
				</a>
			</div>
		</div>
	</div>
</div>
@endif

@if($toko)
@if($toko->notif == 0)
<div class="modal fade" id="modal-notif-berhasil-toko" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: 0em 0em 0em 0em; color: white; border: none; box-shadow: none;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: 30%; right: 1em;">
				<img src="<?=url('/')?>/public/img/modal_assets/modal_berhasil_mitra.svg" style="width: 100%;">
				<div style="position: absolute; margin: 2.5em 1.5em 0em 1.5em; padding: 0em 1.5em 0em 1.5em; top: 60%;">
					<div style="font-size: 2em; font-weight: 600; text-align: center;">Selamat !!</div>
					<div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 1.2em;">anda sudah bergabung menjadi mitra <span style="font-weight: 600;">kitapuramall</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
@endif

@if($biodata->notif == 1)
<div class="modal fade" id="modal-notif-berhasil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: 0em 0em 0em 0em; color: white; border: none; box-shadow: none;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: 30%; right: 1em;">
				<img src="<?=url('/')?>/public/img/modal_assets/modal_berhasil_biodata.svg" style="width: 100%;">
				<div style="position: absolute; margin: 1em 1.5em 0em 1.5em; padding: 0em 1.5em 0em 1.5em; top: 60%;">
					<div style="font-size: 2em; font-weight: 600; text-align: center;">Yeah, Hore!</div>
					<div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 1.2em;">selamat anda sudah bisa menikmati semua fitur <span style="font-weight: 600;">kitapuramall</span>
					</div>
					<div style="width: 100%; display: flex; justify-content: center;">
						<div data-dismiss="modal" style="background: white;padding: 0.5em 3em;border-radius: 1.5em; width: auto; color: #027B32; font-size: 1.2em;">Okey</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif

@if(Session::get('status_password') == 'sukses')
<div class="modal fade" id="modal-ubah-password-sukses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: 0em 0em 0em 0em; color: white; border: none; box-shadow: none;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: 30%; right: 1em;">
				<img src="<?=url('/')?>/public/img/modal_assets/modal_sukses_input.svg" style="width: 100%;">
				<div style="position: absolute; margin: 1em 1.5em 0em 1.5em; padding: 0em 1.5em 0em 1.5em; top: 50%;">
					<div style="font-size: 2em; font-weight: 600; text-align: center;">Berhasil!</div>
					<div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 1.2em;">selamat anda telah berhasil mengganti password anda 
					</div>
					<div style="width: 100%; display: flex; justify-content: center;">
						<div data-dismiss="modal" style="background: white;padding: 0.5em 3em;border-radius: 1.5em; width: auto; color: #027B32; font-size: 1.2em;">Okey</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif

@if(Session::get('status_password') == 'gagal');
<div class="modal fade" id="modal-ubah-password-gagal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: 0em 0em 0em 0em; color: white; border: none; box-shadow: none;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: 30%; right: 1em;">
				<img src="<?=url('/')?>/public/img/modal_assets/modal_error_input.svg" style="width: 100%;">
				<div style="position: absolute; margin: 1em 1.5em 0em 1.5em; padding: 0em 1.5em 0em 1.5em; top: 50%;">
					<div style="font-size: 2em; font-weight: 600; text-align: center;">Gagal!</div>
					<div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 1.2em;">{{Session::get('pass_message')}}
					</div>
					<div style="width: 100%; display: flex; justify-content: center;">
						<div data-dismiss="modal" style="background: white;padding: 0.5em 3em;border-radius: 1.5em; width: auto; color: white; font-size: 1.2em; background: #FFBD03;">Okey</div>
					</div>
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
						<a href="<?=url('/')?>/akun/mitra/{{Session::get('status_mitra')}}/upload-ktp" style="color: white; background: #ffaa00; padding: 0.3em 0em 0.5em 0em; width: 50%; margin-top: 0.8em; border-radius: 2em; text-align: center; font-weight: 600;">Lengkapi Sekarang</a>
						@endif
					</div>
					<img src="<?=url('/')?>/public/img/mitra/bg-waiting.svg" style="width: 100%;">
				</div>
			</div>
		</div>
	</div>
</div>
@endif


<div class="modal fade" id="modal-ganti-pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
		<div class="modal-content" style="border-radius: 1.2em; background: #eaf4ff; display: flex; justify-content: center; align-items: center;">

			<form action="{{url()->current()}}/ubah-password" method="post">
				@csrf
				@method('PUT')
				<div class="modal-body">
					<div>
						<div style="font-weight: 600; font-size: 1em; line-height: 1.1em; font-size: 1.2em;">Silahkan Masukan Password Baru</div>
					</div>
				</div>
				<hr style="border-top: 1px solid #c8d2dd; width: 100%;">
				@if(Session::has('pass_message'))
				<div class="mb-3">
					<span class="badge badge-pill badge-danger">{{Session::get('pass_message')}}</span>	
				</div>
				@endif
				<div style="width: 90%;">
					<label for="">Password Lama</label>
					<div class="input-group mb-3 div-input-mall" id="div_no_hp">
						<input type="password" class="form-control form-control-mall-modal" id="password_old"  name="password_old" required style="width: 100%; height: auto !important;" >
					</div>
					<label for="">Password Baru</label>
					<div class="input-group mb-3 div-input-mall" id="div_no_hp">
						<input type="password" class="form-control form-control-mall-modal" id="password"  name="password" required style="width: 100%; height: auto !important;">
					</div>
					<label for="">Ulangi Password Baru</label>
					<div class="input-group mb-3 div-input-mall" id="div_no_hp">
						<input type="password" class="form-control form-control-mall-modal" id="konfirmasi_password" name="konfirmasi_password" required style="width: 100%; height: auto !important;" >
					</div>
				</div>
				<button type="submit" class="btn btn-primary" style="background: #ffaa00;;border: 1px solid #ffaa00; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 90%; margin-bottom: 1em;">Ubah Password
				</button>
			</form>
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
				@if ($biodata->foto)
				<img src="<?=url('/')?>/public/img/user/profile_picture/{{$biodata->foto}}" style="width: 100%; border-radius: 50%;">
				@else
				<img src="<?=url('/')?>/public/img/user/profile_picture/user.png" style="width: 100%; border-radius: 50%;">
				@endif
				@if (Session::get('status_mitra') != 'Belum jadi mitra')
				<?php $img = "";
				if (Session::get('status_mitra') == 'free'){
					$img = url('/')."/public/img/icon_svg/icon_gratis.svg";
				}
				else {
					$img = url('/')."/public/img/icon_svg/icon_premium.svg";
				}
				?>
				<div style="font-size: 0.7em; background: #ff006e; color: white; padding: 0.3em 1em 0.3em 1em; border-radius:2em; position: absolute; bottom: 1em;"><img src="<?=$img?>">&nbsp;Mitra {{ucfirst($status_aktif_mitra)}}</div>
				@endif
			</div>
			<div style="width: 63%; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 2%;">
				<div class="container">
					@if(Session::get('progress_biodata') == '5')
					<div style="line-height: 1.1em; text-align: center;">Semoga Harimu <strong>Menyenangkan!</strong></div>
					@else
					<div style="font-size: 0.85em;">Selamat bergabung di <strong>kitapuramall</strong> !</div>			
					@endif
					<div style="display: flex; justify-content: center; align-items: center;">
						<div class="progress" style="border-radius: 1.5em; width: 100%; height: 1rem;">
							<div class="progress-bar" role="progressbar" aria-valuenow="{{Session::get('progress_biodata')*20}}" aria-valuemin="0" aria-valuemax="100" style="width:100%; border-radius: 1.5em; background: #ff006e;">
							</div>
						</div>
					</div>
					@if(Session::get('progress_biodata') == '5')
					<div style="font-size: 0.75em; text-align: center; width: 90%;"><b>Data Anda Sudah Lengkap </b>anda bisa melakukan transaksi pada aplikasi ini</div>
					@else
					<div style="font-size: 0.75em; text-align: center; width: 90%;"><b>Data Anda Sudah Lengkap </b>anda bisa melakukan transaksi pada aplikasi ini</div>
					@endif
				</div>
			</div>
		</div> 
	</div>
	<div class="card-mall" onclick='go_link("<?=url('/')?>/akun/pengaturan-profil")'>
		<div style="padding: 1.5em 2em 1.5em 2em;">
			<div>
				<span><img src="<?=url('/')?>/public/img/user/setting.svg"></span>
				<span>&nbsp;&nbsp;&nbsp;Pengaturan Profil</span>
			</div>
		</div>
	</div>
	<div class="card-mall" onclick='go_link("<?=url('/')?>/akun/mitra")'>
		<div style="padding: 1.5em 2em 1.5em 2em;">
			<div>
				<span><img src="<?=url('/')?>/public/img/user/mitra.svg"></span>
				<span>&nbsp;&nbsp;&nbsp;Mitra Kitapura</span>
			</div>

		</div>
	</div>
	<div class="card-mall" onclick='go_link("<?=url('/')?>/user/keranjang")'>
		<div style="padding: 1.5em 2em 1.5em 2em;">
			<div>
				<span><img src="<?=url('/')?>/public/img/user/keranjang.svg" style="width: 1.5em;"></span>
				<span>&nbsp;&nbsp;&nbsp;Keranjang Belanja</span>
			</div>
		</div>
	</div>
	<div class="card-mall" onclick="WhatsappMessage('+6285158362224')">
		<div style="padding: 1.5em 2em 1.5em 2em;">
			<div>
				<span><img src="<?=url('/')?>/public/img/user/ask_admin.svg" style="width: 1.5em;"></span>
				<span>&nbsp;&nbsp;&nbsp;Perlu Bantuan? Tanya Admin</span>
			</div>
		</div>
	</div>
	<div class="card-mall" onclick='go_link("<?=url('/')?>/logout")' style="margin-bottom: 7em;">
		<div style="padding: 1.5em 2em 1.5em 2em;">
			<div>
				<span>&nbsp;&nbsp;<img src="<?=url('/')?>/public/img/user/logout.svg"></span>
				<span>&nbsp;&nbsp;&nbsp;Keluar</span>
			</div>
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
	$('#modal-pemberitahuan').modal('show');
	@endif

	@if(Session::get('status_password') == 'sukses');
	$('#modal-ubah-password-sukses').modal('show');
	@endif

	@if(Session::get('status_password') == 'gagal');
	$('#modal-ubah-password-gagal').modal('show');
	@endif

	@if($biodata->notif == 1)
	$('#modal-notif-berhasil').modal('show');
	$.ajax({
		url:"{{ route('notif_lengkap') }}",
		method: "post",
		data : {nomor:"<?=$biodata->id?>", _token:'{{csrf_token()}}'},
		success:function(result)
		{
			// do something
		}
	})  
	@endif

	function go_link(id){
		show_loader();
		location.href=id;
	}

	function ganti_pass(){
		$('#modal-ganti-pass').modal('show');
	}

	@if($toko)
	@if($toko->notif == 0)
	$("#modal-notif-berhasil-toko").modal('show');
	$.ajax({
		url:"{{ route('notif_toko_lengkap') }}",
		method: "post",
		data : {nomor:"<?=$toko->id?>", _token:'{{csrf_token()}}'},
		success:function(result)
		{
			// do something
		}
	})  
	@endif
	@endif

	@if(Session::get('message') == 'Belum Terverifikasi')
	$('#modal-verifikasi').modal('show');
	@endif

	@if(Session::get('message') == 'Belum Terverifikasi KTP')
	$('#modal-verifikasi-upgrade-ktp').modal('show');
	@endif

	@if(Session::get('message') == 'Batal Upgrade')
	$('#modal-batal-upgrade').modal('show');
	@endif


	@if(Session::get('message') == 'Belum Terverifikasi Upgrade')
	$('#modal-verifikasi-upgrade').modal('show');
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

    var isMobile = mobilecheck();

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


   function WhatsappMessage(no_hp) {
        event.preventDefault();
        var apilink = 'http://';
        var phone = no_hp;
        var message = 'Halo admin';

        // apilink += isMobile ? 'api' : 'web';
        // apilink += '.whatsapp.com/send?phone=' + phone + '&text=' + encodeURI(message);
        var walink = 'https://wa.me/'+ phone +'?text=' + encodeURI(message);
        window.open(walink);
    } 


</script>

@endsection
