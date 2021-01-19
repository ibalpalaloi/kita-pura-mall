<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/template/admin/plugins/images/favicon.png')}}">
<title>Ample Admin Template - The Ultimate Multipurpose admin template</title>
<!-- Bootstrap Core CSS -->
<link href="{{asset('public/template/admin/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- animation CSS -->
<link href="{{asset('public/template/admin/css/animate.css')}}" rel="stylesheet">
<!-- Wizard CSS -->
<link href="{{asset('public/template/admin/plugins/bower_components/register-steps/steps.css')}}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{asset('public/template/admin/css/style.css')}}" rel="stylesheet">
<!-- color CSS -->
<link href="{{asset('public/template/admin/css/colors/default.css')}}" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="step-register">
  <div class="register-box">
    <div class="">
       
      <!-- multistep form -->
        <form id="msform">
        {{-- <!-- progressbar -->
        <ul id="eliteregister">
        <li class="active">Account Setup</li>
        <li>Social Profiles</li>
        <li>Personal Details</li>
        </ul>
        <!-- fieldsets --> --}}
        <fieldset>
        <h2 class="fs-title">INFORMASI DASAR</h2>
        <input type="text" name="email" placeholder="Email" />
        <textarea name="alamat" id="" cols="10" rows="4" placeholder="Alamat"></textarea>
        <select name="" id="">
            <option value="">kecamatan</option>
        </select>
        <input type="Kecamatan" name="cpass" placeholder="Kelurahan" />
        <textarea name="" id="" cols="30" rows="4" placeholder="Deskripsi Toko"></textarea>
        <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
        {{-- <fieldset>
        <h2 class="fs-title">Social Profiles</h2>
        <h3 class="fs-subtitle">Your presence on the social network</h3>
        <input type="text" name="twitter" placeholder="Twitter" />
        <input type="text" name="facebook" placeholder="Facebook" />
        <input type="text" name="gplus" placeholder="Google Plus" />
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
        <fieldset>
        <h2 class="fs-title">Personal Details</h2>
        <h3 class="fs-subtitle">We will never sell it</h3>
        <input type="text" name="fname" placeholder="First Name" />
        <input type="text" name="lname" placeholder="Last Name" />
        <input type="text" name="phone" placeholder="Phone" />
        <textarea name="address" placeholder="Address"></textarea>
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="submit" name="submit" class="submit action-button" value="Submit" />
        </fieldset> --}}
        </form>
        <div class="clear"></div>
    </div>
  </div>
</section>
<!-- jQuery -->
<script src="{{asset('public/template/admin/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('public/template/admin/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{asset('public/template/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
<script src=".{{asset('public/template/admin/plugins/bower_components/register-steps/jquery.easing.min.js')}}"></script>
<script src="../plugins/bower_components/register-steps/register-init.js"></script>
<!--slimscroll JavaScript -->
<script src="{{asset('public/template/admin/js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('public/template/admin/js/waves.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{asset('public/template/admin/js/custom.min.js')}}"></script>
<!--Style Switcher -->
<script src="{{asset('public/template/admin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>
</body>
</html>
