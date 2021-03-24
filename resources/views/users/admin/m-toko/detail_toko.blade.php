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
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer-scripts')
@endsection
