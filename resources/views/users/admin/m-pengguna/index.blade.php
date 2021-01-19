@extends('layouts.admin')


@section('title')
Pengguna
@endsection

@section('header-scripts')


@endsection

@section('modal')


@endsection


@section('content')

<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Pengguna</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li class=""> <a href="">Beranda</a> </li>
            <li class=""><a href="">Manajemen</a></li>
            <li class="active">Pengguna</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">Daftar Pengguna
                <div class="panel-action">
                    <a href="javascript:void(0)" data-perform="panel-collapse"><i class="ti-minus"></i></a>
                </div>
            </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body p-t-0">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Andipa Batara Putra</td>
                                    <td>andipabp@gmail.com</td>
                                    <td>Aktif</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Andipa Batara Putra</td>
                                    <td>andipabp@gmail.com</td>
                                    <td>Aktif</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer"> Panel Footer </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer-scripts')


@endsection
