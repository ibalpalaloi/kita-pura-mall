@extends('layouts.toko')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4>Pengaturan Akun</h4>
                <hr>
                <div class="row">
                    <div class="col-xs-4 col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                        </div>
                    </div>
                    <div class="col-xs-8 col-md-8">
                        <div class="form-group">
                            <p>emailtoko@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-md-4">
                        <div class="form-group">
                            <label>No Telp</label>
                        </div>
                    </div>
                    <div class="col-xs-8 col-md-8">
                        <div class="form-group">
                            <p>0988 - 0098 - 8688</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-md-4">
                        <div class="form-group">
                            <label>Password</label>
                        </div>
                    </div>
                    <div class="col-xs-8 col-md-8">
                        <div class="form-group">
                            <p><a href="">Ubah Password</a></p>
                        </div>
                    </div>
                </div>
                <div style="float: right">
                    <button type="button" class="btn btn-danger btn-rounded"><i class=""></i> Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection