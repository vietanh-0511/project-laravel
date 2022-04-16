<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>
        Admin
    </title>
    <!-- data table css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.foundation.min.css">

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.3.0') }}" rel="stylesheet" />
    <script>
        // Facebook Pixel Code Don't Delete
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window,
            document, 'script', '//connect.facebook.net/en_US/fbevents.js');
        try {
            fbq('init', '111649226022273');
            fbq('track', "PageView");
        } catch (err) {
            console.log('Facebook Track Error:', err);
        }
    </script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
</head>

<body class="sidebar-mini clickup-chrome-ext_installed">
    <!-- Google Tag Manager (noscript) -->
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" /></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <div class="wrapper">
        <div class="sidebar" data-color="orange">
            <div class="sidebar" data-color="orange">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="" class="simple-text logo-mini"><img src="{{ asset('assets/img/bus-logo.jpg') }}" class="avatar"></a>
                        <a href="" class="simple-text logo-normal">{{ _('Quản lý bán vé xe') }}</a>
                    </div>
                    <ul class="nav">
                        <li>
                            <center>
                                <h3 style="color: aliceblue;">Danh mục</h3>
                            </center>
                        </li>
                        <li>
                            <a data-toggle="collapse" href="#hang_xe" aria-expanded="false">
                                <i class="fab fa-adn"></i>
                                <span class="nav-link-text">{{ _('Hãng xe') }}</span>
                                <b class="caret mt-1"></b>
                            </a>
                            <div class="collapse" id="hang_xe">
                                <ul class="nav pl-4">
                                    <li class="{{ $activePage == 'hang_xe' ? 'active' :'' }}">
                                        <a href="{{ route('admin.ds_hang_xe')}}">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            <p>{{ _('Danh sách') }}</p>
                                        </a>
                                    </li>
                                    <li class="{{ $activePage == 'them_hang_xe' ? 'active' :'' }}">
                                        <a href="{{ route('admin.them_hang_xe')}}">
                                            <i class="fas fa-plus-circle"></i>
                                            <p>{{ _('Thêm hãng xe mới') }}</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a data-toggle="collapse" href="#loai_xe" aria-expanded="false">
                                <i class="fab fa-bandcamp"></i>
                                <span class="nav-link-text">{{ _('Loại xe') }}</span>
                                <b class="caret mt-1"></b>
                            </a>
                            <div class="collapse" id="loai_xe">
                                <ul class="nav pl-4">
                                    <li class="{{ $activePage == 'loai_xe' ? 'active' :'' }}">
                                        <a href="{{ route('admin.ds_loai_xe')}}">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            <p>{{ _('Danh sách') }}</p>
                                        </a>
                                    </li>
                                    <li class="{{ $activePage == 'them_loai_xe' ? 'active' :'' }}">
                                        <a href="{{ route('admin.them_loai_xe')}}">
                                            <i class="fas fa-plus-circle"></i>
                                            <p>{{ _('Thêm loại xe') }}</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li>
                            <a data-toggle="collapse" href="#tuyen_xe" aria-expanded="false">
                                <i class="fa fa-compass" aria-hidden="true"></i>
                                <span class="nav-link-text">{{ __('Tuyến xe chạy') }}</span>
                                <b class="caret mt-1"></b>
                            </a>
                            <div class="collapse" id="tuyen_xe">
                                <ul class="nav pl-4">
                                    <li class="{{ $activePage == 'tuyen_xe' ? 'active' :'' }}">
                                        <a href="{{ route('admin.ds_tuyen_xe_chay')}}">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            <p>{{ _('Danh sách tuyến') }}</p>
                                        </a>
                                    </li>
                                    <li class="{{ $activePage == 'them_tuyen_xe' ? 'active' :'' }}">
                                        <a href="{{ route('admin.them_tuyen')}}">
                                            <i class="fas fa-plus-circle"></i>
                                            <p>{{ _('Thêm tuyến đường mới') }}</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a data-toggle="collapse" href="#lich_trinh" aria-expanded="false">
                                <i class="now-ui-icons ui-1_bell-53"></i>
                                <span class="nav-link-text">{{ __('Lịch trình') }}</span>
                                <b class="caret mt-1"></b>
                            </a>
                            <div class="collapse" id="lich_trinh">
                                <ul class="nav pl-4">
                                    <li class="{{ $activePage == 'lich_trinh' ? 'active' :'' }}">
                                        <a href="{{ route('admin.ds_lich_trinh')}}">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            <p>{{ _('Danh sách lịch trình') }}</p>
                                        </a>
                                    </li>
                                    <li class="{{ $activePage == 'them_lich_trinh' ? 'active' :'' }}">
                                        <a href="{{ route('admin.them_lich_trinh')}}">
                                            <i class="fas fa-plus-circle"></i>
                                            <p>{{ _('Thêm lịch trình') }}</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a data-toggle="collapse" href="#khach_hang" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="nav-link-text">{{ __('Khách hàng') }}</span>
                                <b class="caret mt-1"></b>
                            </a>
                            <div class="collapse" id="khach_hang">
                                <ul class="nav pl-4">
                                    <li class="{{ $activePage == 'khach_hang' ? 'active' :'' }}">
                                        <a href="{{ route('admin.ds_khach_hang')}}">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            <p>{{ _('Danh sách') }}</p>
                                        </a>
                                    </li>
                                    <li class="{{ $activePage == 'them_khach_hang' ? 'active' :'' }}">
                                        <a href="{{ route('admin.them_khach_hang')}}">
                                            <i class="fas fa-plus-circle"></i>
                                            <p>{{ _('Thêm khách hàng mới') }}</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a data-toggle="collapse" href="#xe_khach" aria-expanded="false">
                                <i class="fas fa-bus"></i>
                                <span class="nav-link-text">{{ __('Xe khách') }}</span>
                                <b class="caret mt-1"></b>
                            </a>
                            <div class="collapse" id="xe_khach">
                                <ul class="nav pl-4">
                                    <li class="{{ $activePage == 'xe_khach' ? 'active' :'' }}">
                                        <a href="{{ route('admin.ds_xe')}}">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            <p>{{ _('Danh sách xe') }}</p>
                                        </a>
                                    </li>
                                    <li class="{{ $activePage == 'them_xe_khach' ? 'active' :'' }}">
                                        <a href="{{ route('admin.them_xe')}}">
                                            <i class="fas fa-plus-circle"></i>
                                            <p>{{ _('Thêm xe mới') }}</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="{{ $activePage == 'ds_hoa_don' ? 'active' :'' }}">
                            <a href="{{ route('admin.ds_hoa_don')}}">
                                <i class="fas fa-receipt"></i>
                                <p>{{ _('Thông tin hóa đơn') }}</p>
                            </a>
                        </li>

                        <li class="{{ $activePage == 'dat_ve' ? 'active' :'' }}">
                            <a href="{{ route('admin.dat_ve_cho_khach')}}">
                                <i class="fas fa-receipt"></i>
                                <p>{{ _('Đặt vé cho khách') }}</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo"></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">

                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">{{ __("Account") }}</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

                                    <a class="dropdown-item" href="{{ route('admin.admin',[session()->get('ma')])}}">{{ __("Thông Tin Admin") }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        {{ __('Đăng xuất') }}
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="panel-header" style="background:#fa7037; height: 15%;">

            </div>

            <div class="content" style="background: linear-gradient(#555555, black);">
                @yield('content')
            </div>

            <footer class="footer">

            </footer>
        </div>
    </div>


    </div>
    </footer>
    </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- data table js -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <!-- sweet alert -->
    <script src="https://unpkg.com/[email protected]/dist/sweetalert2.all.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.3.0') }}" type="text/javascript"></script>
    @stack('js')
    @include('sweetalert::alert')

</body>

</html>