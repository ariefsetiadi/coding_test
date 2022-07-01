<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 11]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
        <!-- Meta -->

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">

        <!-- Favicon icon -->
        <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

        <title>{{ $title }}</title>

        <!-- prism css -->
        <link rel="stylesheet" href="{{ asset('assets/css/plugins/prism-coy.css') }}">

        <!-- vendor css -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        @stack('css')
    </head>

    <body>
        <!-- [ Pre-loader ] start -->
        <div class="loader-bg">
            <div class="loader-track">
                <div class="loader-fill"></div>
            </div>
        </div>
        <!-- [ Pre-loader ] End -->

        <!-- [ navigation menu ] start -->
        <nav class="pcoded-navbar theme-horizontal menu-light brand-blue">
            <div class="navbar-wrapper container">
                <div class="navbar-content sidenav-horizontal" id="layout-sidenav">
                    <ul class="nav pcoded-inner-navbar sidenav-inner">
                        <li class="nav-item pcoded-menu-caption">
                            <label>Navigation</label>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link {{ (Request::segment(1) == 'home') ? 'active' : '' }}">
                                <span class="pcoded-micon">
                                    <i class="feather icon-home"></i>
                                </span>
                                <span class="pcoded-mtext">Home</span>
                            </a>
                        </li>
                        <li class="nav-item pcoded-hasmenu">
                            <a href="javascript:void(0)" class="nav-link ">
                                <span class="pcoded-micon">
                                    <i class="feather icon-layout"></i>
                                </span>
                                <span class="pcoded-mtext">Page layouts</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li><a href="#" target="_blank">Vertical</a></li>
                                <li><a href="#" target="_blank">Horizontal</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- [ navigation menu ] end -->

        <!-- [ Header ] start -->
        <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
            <div class="container">
                <div class="m-header">
                    <a class="mobile-menu" id="mobile-collapse" href="javascript:void(0)"><span></span></a>
                    <a href="javascript:void(0)" class="b-brand">
                        <!-- ========   change your logo hear   ============ -->
                        <img src="{{ asset('assets/images/logo.png') }}" alt="" class="logo">
                        <img src="{{ asset('assets/images/logo-icon.png') }}" alt="" class="logo-thumb">
                    </a>
                    <a href="javascript:void(0)" class="mob-toggler">
                        <i class="feather icon-more-vertical"></i>
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
                                <div class="dropdown-menu dropdown-menu-right notification">
                                    <div class="noti-head">
                                        <h6 class="d-inline-block m-b-0">Notifications</h6>
                                        <div class="float-right">
                                            <a href="javascript:void(0)" class="m-r-10">mark as read</a>
                                            <a href="javascript:void(0)">clear all</a>
                                        </div>
                                    </div>
                                    <ul class="noti-body">
                                        <li class="n-title">
                                            <p class="m-b-0">NEW</p>
                                        </li>
                                        <li class="notification">
                                            <div class="media">
                                                <img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
                                                    <p>New ticket Added</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="n-title">
                                            <p class="m-b-0">EARLIER</p>
                                        </li>
                                        <li class="notification">
                                            <div class="media">
                                                <img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>10 min</span></p>
                                                    <p>Prchace New Theme and make payment</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="notification">
                                            <div class="media">
                                                <img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>12 min</span></p>
                                                    <p>currently login</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="notification">
                                            <div class="media">
                                                <img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                                    <p>Prchace New Theme and make payment</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="noti-footer">
                                        <a href="javascript:void(0)">show all</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown drp-user">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-user"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-notification">
                                    <div class="pro-head">
                                        <span>{{ Auth::user()->fullname }}</span>
                                        <a href="{{ route('logout') }}" class="dud-logout" title="Logout">
                                            <i class="feather icon-log-out"></i>
                                        </a>
                                    </div>
                                    <ul class="pro-body">
                                        <li><a href="#" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                                        <li><a href="#" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                                        <li><a href="#" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- [ Header ] end -->

        <!-- [ Main Content ] start -->
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper container">
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-header">
                                    <div class="page-block">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="page-header-title">
                                                    <h3 class="mb-1">{{ $title }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @yield('content')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Required Js -->
        <script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/ripple.js') }}"></script>
        <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/prism.js') }}"></script>
        <script src="{{ asset('assets/js/horizontal-menu.js') }}"></script>
        <script src="{{ asset('assets/js/analytics.js') }}"></script>

        @stack('js')

        <script>
            (function() {
                if ($('#layout-sidenav').hasClass('sidenav-horizontal') || window.layoutHelpers.isSmallScreen()) {
                    return;
                }
                try {
                    window.layoutHelpers._getSetting("Rtl")
                    window.layoutHelpers.setCollapsed(
                        localStorage.getItem('layoutCollapsed') === 'true',
                        false
                    );
                } catch (e) {}
            })();
            $(function() {
                $('#layout-sidenav').each(function() {
                    new SideNav(this, {
                        orientation: $(this).hasClass('sidenav-horizontal') ? 'horizontal' : 'vertical'
                    });
                });
                $('body').on('click', '.layout-sidenav-toggle', function(e) {
                    e.preventDefault();
                    window.layoutHelpers.toggleCollapsed();
                    if (!window.layoutHelpers.isSmallScreen()) {
                        try {
                            localStorage.setItem('layoutCollapsed', String(window.layoutHelpers.isCollapsed()));
                        } catch (e) {}
                    }
                });
            });
            $(document).ready(function() {
                $("#pcoded").pcodedmenu({
                    themelayout: 'horizontal',
                    MenuTrigger: 'hover',
                    SubMenuTrigger: 'hover',
                });
            });
        </script>
    </body>
</html>
