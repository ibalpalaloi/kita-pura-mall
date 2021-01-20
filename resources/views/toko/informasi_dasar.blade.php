@extends('layouts.toko')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card">
                <img class="card-img-top" src="{{asset('public/template/admin/assets/images/big/img1.jpg')}}" alt="Card image cap">
                <div class="card-body" style="text-align: center">
                    <h3 class="mt-3">Nama Toko</h3>
                    <p class="mt-3 font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ratione quidem temporibus sequi! Aliquam dolore asperiores animi, modi optio esse praesentium voluptate autem suscipit itaque soluta excepturi nam incidunt consectetur.</p>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td style="width: 50px"><img src="{{asset('public/template/admin/assets/images/tambahan/location.png')}}" alt="Card image cap"></td>
                            <td>Jln Sungai Manonda</td>
                        </tr>
                    </table>
                </div>
                
            </div>  
        </div>  
    </div>
    <div class="col-md-12 col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                </div>
                <h5 class="card-title">Informasi Dasar</h5>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="nav-item">
                        <a href="#informasi" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">
                        <span class="visible-xs"><i class=""></i></span><span class="hidden-xs">Informasi Toko</span>
                    </a>
                    </li>
                    <li role="presentation" class="nav-item">
                        <a href="#alamat" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class=""></i></span> 
                        <span class="hidden-xs">Alamat</span>
                    </a>
                    </li>
                    <li role="presentation" class="nav-item">
                        <a href="#sosial_media" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class=""></i></span> 
                        <span class="hidden-xs">Sosial Media</span>
                    </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="informasi">
                        <br>
                        <div class="row">
                            <div class="col-xs-4 col-md-4">
                                <div class="form-group">
                                    <label>Nama Toko</label>
                                </div>
                            </div>
                            <div class="col-xs-8 col-md-8">
                                <div class="form-group">
                                    <p>Nama Toko</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-md-4">
                                <div class="form-group">
                                    <label>Deskrispsi</label>
                                </div>
                            </div>
                            <div class="col-xs-8 col-md-8">
                                <div class="form-group">
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex porro sapiente quibusdam, culpa optio consectetur, dolores cum perspiciatis magnam repudiandae doloremque tempore nemo ipsa et dicta, quis expedita consequuntur. Dolore.</p>
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
                                    <p>0822-8768-3277</p>
                                </div>
                            </div>
                        </div>
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
                        <br>
                        <div style="float: right">
                            <button type="button" class="btn btn-danger btn-rounded"><i class=""></i> Edit</button>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="alamat">
                        <br>
                        <div class="row">
                            <div class="col-xs-4 col-md-4">
                                <div class="form-group">
                                    <label>Alamat Toko</label>
                                </div>
                            </div>
                            <div class="col-xs-8 col-md-8">
                                <div class="form-group">
                                    <p>Jln. raya No. 4</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-md-4">
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                </div>
                            </div>
                            <div class="col-xs-8 col-md-8">
                                <div class="form-group">
                                    <p>Kecamatan</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-md-4">
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                </div>
                            </div>
                            <div class="col-xs-8 col-md-8">
                                <div class="form-group">
                                    <p>Kelurahan</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-md-4">
                                <div class="form-group">
                                    <label>Kode Pos</label>
                                </div>
                            </div>
                            <div class="col-xs-8 col-md-8">
                                <div class="form-group">
                                    <p>87665</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div style="float: right">
                            <button type="button" class="btn btn-danger btn-rounded"><i class=""></i> Edit</button>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="sosial_media">
                        <br>
                        <div class="row">
                            <div class="col-xs-4 col-md-4">
                                <div class="form-group">
                                    <label>Facebook</label>
                                </div>
                            </div>
                            <div class="col-xs-8 col-md-8">
                                <div class="form-group">
                                    <p>facebook/nama_toko</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-md-4">
                                <div class="form-group">
                                    <label>Instagram</label>
                                </div>
                            </div>
                            <div class="col-xs-8 col-md-8">
                                <div class="form-group">
                                    <p>@@toko</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-md-4">
                                <div class="form-group">
                                    <label>Twitter</label>
                                </div>
                            </div>
                            <div class="col-xs-8 col-md-8">
                                <div class="form-group">
                                    <p>twitter</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-md-4">
                                <div class="form-group">
                                    <label>tik-tok</label>
                                </div>
                            </div>
                            <div class="col-xs-8 col-md-8">
                                <div class="form-group">
                                    <p>tok-tok</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div style="float: right">
                            <button type="button" class="btn btn-danger btn-rounded"><i class=""></i> Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection