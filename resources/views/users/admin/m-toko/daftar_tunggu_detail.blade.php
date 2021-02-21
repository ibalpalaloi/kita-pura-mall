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
                <center class="mt-4"> <img src="../../assets/images/users/5.jpg" class="rounded-circle" width="150" />
                    <h4 class="card-title mt-2">Hanna Gover</h4>
                    <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
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
                    <form class="form-horizontal form-material" method="post" action="<?=url('/')?>">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-12">Nama Toko</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" value="{{$toko->nama_toko}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Nama Pemilik</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" value="{{$toko->nama_toko}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">No Hp</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" value="{{$toko->no_hp}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Alamat</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line">{{$toko->alamat_toko}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Kategori Toko</label>
                            <div class="col-sm-12">
                                <select class="form-control form-control-line">
                                    <option>Free</option>
                                    <option>Premium</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Deskripsi</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line">{{$toko->deskripsi}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Verifikasi</button>
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
