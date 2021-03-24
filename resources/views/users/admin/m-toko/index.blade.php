@extends('layouts.admin')


@section('title')
Toko
@endsection

@section('header-scripts')


@endsection

@section('modal')
@endsection


@section('content')

<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card-body">
                <h4 class="card-title">Toko</h4>
                <a type="button" class="btn btn-primary" href="<?=url('/')?>/admin/manajemen/daftar_tunggu_toko">
                    Daftar Tunggu
                </a>
                <br><br>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped border">
                        <thead>
                            <tr>
                                <th>Nama Toko</th>
                                <th>No Telp</th>
                                <th>Alamat</th>
                                <th>Kategori Toko</th>
                                <th>Nama Pemilik</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($toko as $data)
                                <tr>
                                    <td>{{$data->nama_toko}}</td>
                                    <td>{{$data->no_hp}}</td>
                                    <td>{{$data->alamat}}</td>
                                    <td>
                                        @foreach ($data->kategorinya_toko as $kategori)
                                            {{$kategori->kategori_toko->kategori}},
                                        @endforeach
                                    </td>
                                    <td>{{$data->nama_pemilik}}</td>
                                    <td>
                                        <a href="<?=url('/')?>/admin/manajemen/toko/{{$data->id}}" type="button" class="btn btn-primary">Ubah</a>
                                        <a type="button" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer-scripts')
@endsection
