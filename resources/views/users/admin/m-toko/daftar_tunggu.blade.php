@extends('layouts.admin')


@section('title')
Daftar Tunggu
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
                <h4 class="card-title">Daftar Tunggu Toko</h4>
                <br>
                <div class="table-responsive">
                    <table class="table table-dark mb-0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Toko</th>
                                <th scope="col">Pemilik</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($daftar_toko as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td><a href="<?=url('/')?>/admin/manajemen/daftar_tunggu_toko/{{$data->id}}">{{$data->nama_toko}}</a></td>
                                <td>{{$data->nama_pemilik}}</td>
                                <td>{{$data->no_hp}}</td>
                                <td>{{$data->alamat_toko}}</td>
                                <td>{{$data->created_at}}</td>
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
