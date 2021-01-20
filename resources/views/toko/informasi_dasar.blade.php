@extends('layouts.toko')

@section('content')
<br><br>
<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="white-box">
        </div>
    </div>
    <div class="col-md-8 col-xs-12">
        <div class="white-box">
            <ul class="nav nav-tabs tabs customtab">
                <li class="active tab">
                    <a href="#home" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Informasi</span> </a>
                </li>
                <li class="tab">
                    <a href="#profile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Alamat</span> </a>
                </li>
                <li class="tab">
                    <a href="#messages" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Sosial Media</span> </a>
                </li>
                <li class="tab">
                    <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <h3 class="box-title m-b-0">Informasi Dasar</h3>
                    <form data-toggle="validator">
                        <div class="form-group">
                            <label for="inputName1" class="control-label">Name</label>
                            <input type="text" class="form-control" id="inputName1" placeholder="Cina Saffary" required> </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="textarea" class="control-label">Text area</label>
                            <textarea id="textarea" class="form-control" required></textarea> <span class="help-block with-errors">Hey look, this one has feedback icons!</span> </div>
                        <div class="form-group">
                            <label for="inputPassword" class="control-label">Password</label>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <input type="password" data-toggle="validator" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required> <span class="help-block">Minimum of 6 characters</span> </div>
                                <div class="form-group col-sm-6">
                                    <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="radio">
                                <input type="radio" name="underwear" id="out" required>
                                <label for="out"> Boxers </label>
                            </div>
                            <div class="radio">
                                <input type="radio" name="underwear" id="in" required>
                                <label for="in"> Briefs </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <input type="checkbox" id="terms" data-error="Before you wreck yourself" required>
                                <label for="terms"> Check yourself </label>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="profile">
                    
                </div>
                <div class="tab-pane" id="messages">
                    
                </div>
                <div class="tab-pane" id="settings">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection