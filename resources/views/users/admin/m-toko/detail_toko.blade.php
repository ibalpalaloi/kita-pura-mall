@extends('layouts.admin')


@section('title')
Toko
@endsection

@section('header-scripts')


@endsection

@section('modal')
@endsection


@section('content')
{{-- modal data toko --}}
<div id="modal_data_toko" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">Data Toko</h4>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?=url('/')?>/admin/manajemen/toko/{{$toko->id}}/post_ubah" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nama Toko:</label>
                        <input value="{{$toko->nama_toko}}" type="text" class="form-control" id="nama_toko" name="nama_toko">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Username:</label>
                        <input value="{{$toko->username}}" type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Jenis Mitra:</label>
                        <select class="form-control" name="jenis_mitra" id="jenis_mitra">
                            <option @if($toko->jenis_mitra == 'premium') selected @endif value="premium">Premium</option>
                            <option @if($toko->jenis_mitra == 'free') selected @endif value="free">Free</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">No Hp:</label>
                        <input value="{{$toko->no_hp}}" type="text" class="form-control" id="no_hp" name="no_hp">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Deskripsi:</label>
                        <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10">{{$toko->deskripsi}}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect">Ubah</button>
                    </div>
                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

{{-- modal data toko --}}
<div id="modal_alamat_toko" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">Alamat Toko</h4>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?=url('/')?>/admin/manajemen/toko/{{$toko->id}}/post_ubah_alamat" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Alamat:</label>
                        <textarea class="form-control" name="alamat" id="" cols="30" rows="10">{{$toko->alamat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Kabupaten Kota:</label>
                        <select class="form-control" name="kota" id="select_kota">
                            <option value="">Pilih Kabupaten / Kota</option>
                            @foreach ($kabupaten as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Kecamatan:</label>
                        <select class="form-control" name="kecamatan" id="select_kecamatan">
                            <option value="" disabled>Kecamatan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Kelurahan:</label>
                        <select class="form-control" name="kelurahan" id="select_kelurahan">
                            <option value="" disabled>Kelurahan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Latitude:</label>
                        <input value="{{$toko->latitude}}" type="text" class="form-control" id="username" name="latitude">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Longitude:</label>
                        <input value="{{$toko->longitude}}" type="text" class="form-control" id="username" name="longitude">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect">Ubah</button>
                    </div>
                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Project Assinging</h4>
                <h6 class="card-subtitle">To use add <code>.r-separator</code> class in the form with form styling.</h6>
            </div>
            <hr class="mt-0">
            <div class="card-body">
                <h4 class="card-title">Personal Info</h4>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Nama Toko</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->nama_toko}}" type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="First Name Here">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Username</label> 
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->username}}" type="text" class="form-control" id="username" name="username">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Jenis Mitra</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->jenis_mitra}}" type="email" class="form-control" id="jenis_mitra" name="jenis_mitra">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Kategori Toko</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        @foreach ($kategorinya_toko as $data)
                            <li>{{$data->kategori_toko->kategori}}</li>
                        @endforeach
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">No HP Toko</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->no_hp}}" type="text" class="form-control" id="no_hp_toko" name="no_hp_toko">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Deskripsi Toko</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <textarea readonly name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{{$toko->deskripsi}}</textarea>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group mb-0 text-right">
                    <button data-toggle="modal" data-target="#modal_data_toko" type="button" class="btn btn-info waves-effect waves-light">ubah</button>
                </div>
            </div>
            <hr class="mt-0">
            <div class="car-body">
                
            </div>
            <div class="card-body">
                <h4 class="card-title">Lokasi</h4>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Alamat</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <textarea readonly name="alamat" id="alamat" cols="30" rows="10" class="form-control">{{$toko->alamat}}</textarea>
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Kabupaten / Kota</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->kelurahan->kecamatan->kabupaten_kota->nama}}" type="text" class="form-control" id="kabupaten" name="kota">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Kecamatan</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->kelurahan->kecamatan->nama}}" type="text" class="form-control" id="kecamatan" name="kecamatan">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Kelurahan</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->kelurahan->kelurahan}}" type="text" class="form-control" id="kelurahan" name="kelurahan">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Latitude</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->latitude}}" type="text" class="form-control" id="latitude" name="latitude">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">longitude</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->longitude}}" type="text" class="form-control" id="longitude" name="longitude">
                    </div>
                </div>
                <div class="form-group mb-0 text-right">
                    <button data-toggle="modal" data-target="#modal_alamat_toko" type="button" class="btn btn-info waves-effect waves-light">ubah</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer-scripts')
<script>
    $('#select_kota').change(function(){
		// show_loader();
		$('#select_kecamatan').empty();
		$('#select_kecamatan').append($('<option>', {
			text: 'Memuat'
		}));
		$.ajax({
			url: "{{ route('get_kecamatan') }}?id_kota="+$(this).val(),
			method: 'GET', 
			success: function(data){
				// hide_loader();
				$('#select_kecamatan').empty();
				$('#select_kecamatan').html(data.html);
			}
		})
	})

    $('#select_kecamatan').change(function(){
		$('#select_kelurahan').empty();
		$('#select_kelurahan').append($('<option>', {
			text: 'Memuat'
		}));
		$.ajax({
			url: "{{ route('get_kelurahan') }}?id_kecamatan="+$(this).val(),
			method: 'GET', 
			success: function(data){
				$('#select_kelurahan').empty();
				$('#select_kelurahan').html(data.html);
			}
		})
	})
</script>
@endsection
