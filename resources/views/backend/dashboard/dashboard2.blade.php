<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard 2</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Orange-Thailand" />
    <meta name="keywords" content="รับทำเว็บไซต์ ออกแบบเว็บไซต์ รับทำ SEO และรับเขียนโปรแกรมโดยทีมงานมืออาชีพ" />
    <meta name="author" content="O.Suraphon"/>

    <!-- Favicon icon -->
    <link rel="icon" href="{{URL::asset('bootstrap4/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('backend/bootstrap4/bower_components/bootstrap/css/bootstrap.min.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('backend/bootstrap4/assets/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('backend/bootstrap4/assets/icon/icofont/css/icofont.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('backend/bootstrap4/assets/icon/font-awesome/css/font-awesome.min.css')}}">
    <!-- Syntax highlighter Prism css -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('backend/bootstrap4/assets/pages/prism/prism.css')}}">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('backend/bootstrap4/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('backend/bootstrap4/assets/css/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('backend/bootstrap4/assets/css/pcoded-horizontal.min.css')}}">
</head>
<!-- Menu horizontal fixed layout -->

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <div id="pcoded" class="pcoded">

        <div class="pcoded-container">
            {{-- nav container --}}
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="index.html">
                            {{-- <img class="img-fluid" src="../files/assets/images/logo.png" alt="Theme-Logo" /> --}}
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                {{-- <a href="#!">
                                    <span>John Doe</span>
                                    <i class="ti-angle-down"></i>
                                </a> --}}
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="auth-normal-sign-in.html">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- /nav container --}}

            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <nav class="pcoded-navbar">
                    <div class="pcoded-inner-navbar">
                        {{-- ul --}}
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                                    <span class="pcoded-mtext">Dashboard 1</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                               
                                <ul class="pcoded-submenu">
                                    <li class=" ">
									<a href="{{ url('/') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Dashboard 1</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul> 
                            </li>

                            <li class="pcoded-hasmenu">
                                <a href="{{ url('/') }}">
                                    <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                                    <span class="pcoded-mtext">Dashboard 2</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>                                                        
                            </li>
                            
                            <li class="pcoded-hasmenu">
                                <a href="{javascript:void(0)}">
                                    <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                                    <span class="pcoded-mtext">Dashboard 3</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="ti-home"></i></span>
                                            <span class="pcoded-mtext">Dashboard 3</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="{{ url('/') }}">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Dashboard 3</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>                                                                                  
                                        </ul>
                                    </li>                                                                
                                </ul>
                            </li>
                        </ul>
                        {{-- /ul --}}
                    </div>
                </nav>


                <div class="pcoded-wrapper">
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header card m-t-50">
                                        <div class="card-block">
                                                <h5 class="m-b-10">Dashboard 3</h5>
                                            <p class="text-muted m-b-10">lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"> <i class="fa fa-home"></i> </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Page Layouts</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Horizontal</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">fixed Layout</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->

                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <!-- Default card start -->
                                                <div class="card">
                                                    <div class="card-block">
                                                        <span>
                                                             Horizontal Fixed layout is useful for those users who wants header menu options on top.
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- Default card end -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                             <!-- /Main-body start -->

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script src="{{URL::asset('backend/bootstrap4/bower_components/jquery/js/jquery.min.js')}} "></script>
    <script src="{{URL::asset('backend/bootstrap4/bower_components/jquery-ui/js/jquery-ui.min.js')}} "></script>
    <script src="{{URL::asset('backend/bootstrap4/bower_components/popper.js/js/popper.min.js')}} "></script>
    <script src="{{URL::asset('backend/bootstrap4/bower_components/bootstrap/js/bootstrap.min.js')}} "></script>
   
    <!-- jquery slimscroll js -->
    <script src="{{URL::asset('backend/bootstrap4/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}} "></script>

    <!-- modernizr js -->
    <script src="{{URL::asset('backend/bootstrap4/bower_components/modernizr/js/modernizr.js')}} "></script>
    <script src="{{URL::asset('backend/bootstrap4/bower_components/modernizr/js/css-scrollbars.js')}} "></script>

    <!-- Syntax highlighter prism js -->
    <script src="{{URL::asset('backend/bootstrap4/assets/pages/prism/custom-prism.js')}} "></script>

    <!-- i18next.min.js -->
    <script src="{{URL::asset('backend/bootstrap4/bower_components/i18next/js/i18next.min.js')}} "></script>
    <script src="{{URL::asset('backend/bootstrap4/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}} "></script>
    <script src="{{URL::asset('backend/bootstrap4/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}} "></script>
    <script src="{{URL::asset('backend/bootstrap4/bower_components/jquery-i18next/js/jquery-i18next.min.js')}} "></script>
   
    <script src="{{URL::asset('backend/bootstrap4/assets/js/pcoded.min.js')}} "></script>
    <script src="{{URL::asset('backend/bootstrap4/assets/js/vertical/menu/menu-hori-fixed.js')}} "></script>
    <script src="{{URL::asset('backend/bootstrap4/assets/js/jquery.mCustomScrollbar.concat.min.js')}} "></script>
    <script src="{{URL::asset('backend/bootstrap4/assets/js/script.js')}} "></script>

    <script type="text/javascript">
        $(document).ready(function(){
             // Add style nav.
             $('.pcoded-header').attr('header-theme','theme1');
        });
   </script>  

</body>

</html>
