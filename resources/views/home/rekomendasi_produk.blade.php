
		@foreach ($produk as $data) 
		<div class="carousel-cell">
			<div class="like-product" style="position: absolute; top: 0; right: 0; padding: 0.4em 0.5em 0.4em 0.5em;">
				<div class="stroke-like-product" style="background: #fafafa; padding: 0.3em; border-radius: 1.5em;">
					<div class="border-like-product" style="border: 2px solid #ff006e; border-radius: 1.5em; padding: 0.3em;color: #ff006e; font-size: 0.8em;">
						<img src="<?=url('/')?>/public/img/like.svg" style="width: 1.5em;">&nbsp;1000+
					</div>
				</div>
			</div>
			<div class="label-product" style="position: absolute; bottom: 0em; left: 0em; padding: 0.4em 0.5em 0.4em 0.5em; display: flex; width: 100%; background-color: rgba(0,0,0,0.3); justify-content: space-between;">
				<div class="keterangan-product" style="display: flex;">
					<div class="logo-toko-product" style="width: 3em;">
						<img src="<?=url('/')?>/public/img/user/" style="width: 100%;">
					</div>
					<div class="detail-keterangan-product" style="display: flex; flex-direction: column; justify-content: center; color: white; margin-left: 0.3em;">
						<div style="font-size: 1em;">{{$data->toko->nama_toko}}</div>
						<div style="font-size: 0.6em;">{{$data->toko->alamat}}</div>
					</div>
				</div>
				<div class="" style="width: 3em">
					<img src="<?=url('/')?>/public/img/belanja.svg" style="width: 100%;">
				</div>
			</div>
			<img src="<?=url('/')?>/public/img/product/">
		</div>
		@endforeach