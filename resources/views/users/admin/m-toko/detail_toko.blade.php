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
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Project Assinging</h4>
                <h6 class="card-subtitle">To use add <code>.r-separator</code> class in the form with form styling.</h6>
            </div>
            <hr class="mt-0">
            <form class="form-horizontal r-separator">
                <div class="card-body">
                    <h4 class="card-title">Personal Info</h4>
                    <div class="form-group row align-items-center mb-0">
                        <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Username</label>
                        <div class="col-9 border-left pb-2 pt-2">
                            <input value="{{$toko->username}}" type="text" class="form-control" id="inputEmail3" placeholder="First Name Here">
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Jenis Mitra</label> 
                        <div class="col-9 border-left pb-2 pt-2">
                            <input value="{{$toko->jenis_mitra}}" type="text" class="form-control" id="inputEmail3" placeholder="Last Name Here">
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Nama Toko</label>
                        <div class="col-9 border-left pb-2 pt-2">
                            <input value="{{$toko->nama_toko}}" type="email" class="form-control" id="inputEmail3" placeholder="Email Here">
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <label for="inputEmail3" class="col-3 text-right control-label col-form-label">no HP</label>
                        <div class="col-9 border-left pb-2 pt-2">
                            <input value="{{$toko->no_hp}}" type="text" class="form-control" id="inputEmail3" placeholder="Contact No Here">
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Alamat</label>
                        <div class="col-9 border-left pb-2 pt-2">
                            <input value="{{$toko->alamat}}" type="text" class="form-control" id="inputEmail3" placeholder="Contact No Here">
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Kabupaten / Kota</label>
                        <div class="col-9 border-left pb-2 pt-2">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Contact No Here">
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Kecamatan</label>
                        <div class="col-9 border-left pb-2 pt-2">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Contact No Here">
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Kelurahan</label>
                        <div class="col-9 border-left pb-2 pt-2">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Contact No Here">
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('footer-scripts')
@endsection
