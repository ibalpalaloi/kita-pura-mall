@extends('layouts.admin')


@section('title')
Detail Daftar Tunguu
@endsection

@section('header-scripts')


@endsection

@section('modal')
@endsection


@section('content')

<div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="mt-4"> <img src="<?=url('/')?>/public/img/product/product_5.jpg" class="rounded-circle" width="150" />
                    <h4 class="card-title mt-2">{{$toko->nama_toko}}</h4>
                    <div class="row text-center justify-content-md-center">
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                    </div>
                </center>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <div class="card-body">
                    <form class="form-horizontal form-material" method="post" action="<?=url('/')?>/admin/manajemen/daftar_tunggu_toko/post">
                        {{ csrf_field() }}
                        <input type="text" name="id" value="{{$toko->id}}" hidden>
                        <input type="text" name="toko_id" value="{{$toko->toko_id}}" hidden>
                        <input type="text" name="user_id" value="{{$toko->users_id}}" hidden>
                        <input type="text" name="kelurahan_id" value="{{$toko->kelurahan_id}}" hidden>
                        <input type="text" name="logo_toko" value="{{$toko->logo_toko}}" hidden>
                        <div class="form-group">
                            <label class="col-md-12">Nama Toko</label>
                            <div class="col-md-12">
                                <input name="nama_toko" type="text" class="form-control form-control-line" value="{{$toko->nama_toko}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Nama Pemilik</label>
                            <div class="col-md-12">
                                <input name="nama_pemilik" type="text" class="form-control form-control-line" value="{{$toko->user->biodata->nama}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">No Hp</label>
                            <div class="col-md-12">
                                <input name="no_hp" type="text" class="form-control form-control-line" value="{{$toko->no_hp}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Alamat</label>
                            <div class="col-md-12">
                                <textarea name="alamat" rows="5" class="form-control form-control-line">{{$toko->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Jenis Mitra</label>
                            <div class="col-sm-12">
                                <select name="jenis_mitra" class="form-control form-control-line">
                                    <option value="free" @if($toko->jenis_mitra == 'free') selected @endif>Free</option>
                                    <option value="premium" @if($toko->jenis_mitra == 'premium') selected @endif>Premium</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Kategori Toko</label>
                            <div class="col-sm-12">
                                <select name="kategori_toko" class="form-control form-control-line">
                                    @foreach ($kategori_toko as $item)
                                        <option @if($toko->kategori_toko_id == $item->id) selected @endif value="{{$item->id}}">{{$item->kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Deskripsi</label>
                            <div class="col-md-12">
                                <textarea name="deskripsi" rows="5" class="form-control form-control-line">{{$toko->deskripsi}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Latitude</label>
                            <div class="col-md-12">
                                <input name="latitude" type="text" class="form-control form-control-line" value="{{$toko->latitude}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">longitude</label>
                            <div class="col-md-12">
                                <input name="longitude" type="text" class="form-control form-control-line" value="{{$toko->longitude}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Verifikasi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer-scripts')
@endsection
