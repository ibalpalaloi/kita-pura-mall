<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="robots" content="noindex,nofollow">
    <title>Admin | @yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/template/admin/assets/images/favicon.png')}}">
    <!-- Custom CSS -->
    <link href="{{asset('public/template/admin/dist/css/style.min.css')}}" rel="stylesheet">

    @yield('header-scripts')


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-lg navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-lg-none sidebartoggler"
                        href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <img src="{{asset('public/img/logo_black.svg')}}">
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <img src="{{asset('public/img/logo_text_black.svg')}}">
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('public/template/admin/assets/images/users/1.jpg')}}" alt="user"
                                    class="rounded-circle" width="31">
                                <span class="ml-2 user-text font-medium">{{strtoupper(Session::get('level_akses'))}}</span><span
                                    class="fas fa-angle-down ml-2 user-text"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                                    <div class=""><img
                                            src="{{asset('public/template/admin/assets/images/users/1.jpg')}}"
                                            alt="user" class="rounded" width="80"></div>
                                    <div class="ml-2">
                                        <h4 class="mb-0">{{strtoupper(Session::get('username'))}}</h4>
                                        <a href="javascript:void(0)"
                                            class="btn btn-sm btn-danger text-white mt-2 btn-rounded">Ganti Password</a>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="{{url('/admin/logout')}}"><i
                                        class="fa fa-power-off mr-1 ml-1"></i> Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                        <li class="sidebar-item"> <a
                                class="sidebar-link waves-effect waves-dark sidebar-link " href="{{url('/admin/beranda')}}"
                                aria-expanded="false"><i class="fa fa-home"></i><span
                                    class="hide-menu">Beranda</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link two-column has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-account"></i><span class="hide-menu">Pengguna </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="<?=url('/')?>/admin/manajemen/pengguna" class="sidebar-link">
                                        <i class="mdi mdi-account-multiple"></i>
                                        <span class="hide-menu">Daftar Pengguna</span>
                                    </a>
                                    <a href="<?=url('/')?>/admin/manajemen/pengguna_daftar_otp" class="sidebar-link">
                                        <i class="mdi mdi-account-multiple"></i>
                                        <span class="hide-menu">Daftar OTP</span>
                                    </a>
                                    <a href="<?=url('/')?>/admin/manajemen/pengguna_lupa_password" class="sidebar-link">
                                        <i class="mdi mdi-account-multiple"></i>
                                        <span class="hide-menu">Lupa Password</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link two-column has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-window-maximize"></i><span class="hide-menu">Toko</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                    <a href="<?=url('/')?>/admin/manajemen/toko" class="sidebar-link">
                                        <i class="mdi mdi-window-open"></i>
                                        <span class="hide-menu">Daftar Toko</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?=url('/')?>/admin/manajemen/kategori_toko" class="sidebar-link">
                                        <i class="mdi mdi-tablet"></i>
                                        <span class="hide-menu">Kategori Toko</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link two-column has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-shopping"></i><span class="hide-menu">Produk</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="<?=url('/')?>/admin/manajemen/kategori_produk" class="sidebar-link">
                                        <i class="mdi mdi-sort-variant"></i>
                                        <span class="hide-menu">Kategori Produk</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link two-column has-arrow waves-effect waves-dark"
                            href="javascript:void(0)" aria-expanded="false"><i
                                class="mdi mdi-shopping"></i><span class="hide-menu">Diagram</span></a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="<?=url('/')?>/admin/manajemen/diagram_user" target="blank" class="sidebar-link">
                                    <i class="mdi mdi-sort-variant"></i>
                                    <span class="hide-menu">user</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            @yield('modal')
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb border-bottom">
                @yield('page-title')

            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="page-content container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                @yield('content')

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Kaili Nusantara Production
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('public/template/admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('public/template/admin/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('public/template/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <script src="{{asset('public/template/admin/dist/js/app.min.js')}}"></script>
    <script src="{{asset('public/template/admin/dist/js/app.init.horizontal-fullwidth.js')}}"></script>
    <script src="{{asset('public/template/admin/dist/js/app-style-switcher.horizontal.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('public/template/admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}">
    </script>
    <script src="{{asset('public/template/admin/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('public/template/admin/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('public/template/admin/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('public/template/admin/dist/js/custom.min.js')}}"></script>
    @yield('footer-scripts')
</body>

</html>
