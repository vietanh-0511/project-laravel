<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/now-ui-dashboard-pro" />

    <title>
        Đặt vé xe khách
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
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
    </noscript>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="wrapper">

        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
            @csrf</form>
        <div class="sidebar" data-color="orange">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <!-- logo -->
            <div class="logo">
                <a href="{{ route('user.ds_xe')}}" class="simple-text logo-mini">
                    <img src="{{ asset('assets/img/bus-logo.jpg') }}" class="avatar">
                </a>
                <a style="" href="{{ route('user.ds_xe')}}" class="simple-text logo-normal">
                    {{ __('Bán vé xe khách') }}
                </a>
            </div>
            <!-- / -->

            <!-- sidebar -->
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <center>
                            <h3 style="color: aliceblue;">Danh mục</h3>
                        </center>
                    </li>
                    <li>
                        <a href="{{ route('user.ds_xe')}}">
                            <i class="now-ui-icons design_app"></i>
                            <p>{{ __('Danh sách xe') }}</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.tim_tuyen')}}">
                            <i class="now-ui-icons location_map-big"></i>
                            <p>{{ __('Tìm xe theo tuyến') }}</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.tim_ve_theo_so_dien_thoai')}}">
                            <i class="now-ui-icons location_map-big"></i>
                            <p>{{ __('Xem thông tin vé đã đặt') }}</p>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- // -->

        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form method="post" action="{{route('user.search')}}">
                            {{csrf_field()}}
                            <div class="input-group no-border">
                                <input type="text" value="" name="search" id="search" class="form-control" placeholder="Tìm kiếm...">
                                <div class="input-group-append">
                                    <button class="input-group-text">
                                        <i class="now-ui-icons ui-1_zoom-bold"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header" style="height: 10%;background-image: linear-gradient( #fa7037,#fa7037)">
            </div>
            <div class="content" style="background-image: linear-gradient(#555555,black); ">
                @yield('user_content')
            </div>
            <footer class="footer">

            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
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