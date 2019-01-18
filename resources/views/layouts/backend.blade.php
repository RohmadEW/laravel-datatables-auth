
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="description" content="{{ config('constants.options.desc_apps') }}" />
        <meta property="og:title" content="{{ config('constants.options.name_apps') }}" />
        <meta property="og:url" content="{{ URL::to('/') }}" />
        <meta property="og:description" content="{{ config('constants.options.desc_apps') }}" />
        <meta property="og:image" content="{{ asset('img/logo.png') }}" />
        <meta property="og:image:width" content="496" />
        <meta property="og:image:height" content="279" />
        <meta property="og:type" content="article" />
        <meta property="og:updated_time" content="<?php strtotime(date('Y-m-d H:i:s')) ?>" />

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('constants.options.name_apps') }} - {{ config('constants.options.lembaga_singkatan') }}</title>

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link href="{{ asset('premium/icon-sets/icons/line-icons/premium-line-icons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('premium/icon-sets/icons/solid-icons/premium-solid-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/nifty.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <!--<link href="{{ asset('css/themes/type-e/theme-lime.min.css') }}" rel="stylesheet">-->
        <link href="{{ asset('plugins/pace/pace.min.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/sweetalert/dist/sweetalert.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/ladda/dist/ladda-themeless.min.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/c3-0.6.12/c3.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    </head>
    <body>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <div id="container" class="effect aside-float aside-bright mainnav-lg">
            <header id="navbar">
                <div id="navbar-container" class="boxed">
                    <div class="navbar-header">
                        <a href="index.html" class="navbar-brand">
                            <img src="{{ asset('img/logo.png') }}" alt="Nifty Logo" class="brand-icon">
                            <div class="brand-title">
                                <span class="brand-text">{{ config('constants.options.name_apps') }}</span>
                            </div>
                        </a>
                    </div>
                    <div class="navbar-content">
                        <ul class="nav navbar-top-links">
                            <li class="tgl-menu-btn">
                                <a class="mainnav-toggle" href="#">
                                    <i class="pli-list-view"></i>
                                </a>
                            </li>
                            <li>
                                <div class="custom-search-form">
                                </div>
                            </li>
                        </ul>
                        <ul class="nav navbar-top-links">
                            <li id="dropdown-user" class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                    <span class="ic-user pull-right" style="margin-top: 25px;">
                                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                        <!--You can use an image instead of an icon.-->
                                        <img class="img-circle img-user media-object" src="{{ Auth::user()->photo == null ? asset('img/profile-photos/1.png') : route('file', array('folder' => 'profil','filename' => Auth::user()->photo)) }}" alt="Profile Picture">
                                        <!--<i class="pli-male"></i>-->
                                    </span>
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <!--You can also display a user name in the navbar.-->
                                    <div class="username hidden-xs">{!! Auth::user()->name !!}</div>
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                </a>


                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                                    <ul class="head-list">
                                        <li>
                                            <a href="{{ route('profil.index') }}"><i class="pli-male icon-lg icon-fw"></i> Profil</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="pli-unlock icon-lg icon-fw"></i> Keluar</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <div class="boxed">
                <div id="content-container">
                    <div id="page-head">
                        <div id="page-title">
                            @yield('page-title')
                        </div>
                        <ol class="breadcrumb">
                            @yield('breadcrumb')
                        </ol>
                    </div>
                    <div id="page-content">
                        @yield('content')
                    </div>
                </div>
                <nav id="mainnav-container">
                    <div id="mainnav">


                        <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
                        <!--It will only appear on small screen devices.-->
                        <!--================================
                        <div class="mainnav-brand">
                            <a href="index.html" class="brand">
                                <img src="{{ asset('img/logo.png') }}" alt="Nifty Logo" class="brand-icon">
                                <span class="brand-text">Nifty</span>
                            </a>
                            <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
                        </div>
                        -->



                        <!--Menu-->
                        <!--================================-->
                        <div id="mainnav-menu-wrap">
                            <div class="nano">
                                <div class="nano-content">

                                    <!--Profile Widget-->
                                    <!--================================-->
                                    <div id="mainnav-profile" class="mainnav-profile">
                                        <div class="profile-wrap text-center">
                                            <div class="pad-btm">
                                                <img class="img-circle img-md" src="{{ Auth::user()->photo == null ? asset('img/profile-photos/1.png') : route('file', array('folder' => 'profil','filename' => Auth::user()->photo)) }}" alt="Profile Picture">
                                            </div>
                                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                                <span class="pull-right dropdown-toggle">
                                                    <i class="dropdown-caret"></i>
                                                </span>
                                                <p class="mnp-name">{!! Auth::user()->name !!}</p>
                                                <span class="mnp-desc">{!! Auth::user()->roles->first()->display_name !!}</span>
                                                <br>
                                                <span class="mnp-desc">{!! Auth::user()->wilayah == NULL ? '' : Auth::user()->wilayah->nama !!}</span>
                                            </a>
                                        </div>
                                        <div id="profile-nav" class="collapse list-group bg-trans">
                                            <a href="{{ route('profil.index') }}" class="list-group-item">
                                                <i class="pli-male icon-lg icon-fw"></i> Profil
                                            </a>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="list-group-item">
                                                <i class="pli-unlock icon-lg icon-fw"></i> Keluar
                                            </a>
                                        </div>
                                    </div>

                                    <ul id="mainnav-menu" class="list-group">
                                        <li class="{{  str_contains(Route::currentRouteAction(), ['App\\Http\\Controllers\\HomeController@'])  ? 'active-link' : '' }} ">
                                            <a href="{{ url('/home') }}">
                                                <i class="pli-home"></i>
                                                <span class="menu-title">Beranda</span>
                                            </a>
                                        </li>
                                        @if (!(Auth::user()->roles->first()->name == 'sekolah' || Auth::user()->roles->first()->name == 'operator'))
                                        <li class="list-divider"></li>
                                        <li class="list-header">Pengaturan</li>
                                        <li class="{{  str_contains(Route::currentRouteAction(), ['App\\Http\\Controllers\\Backend\\AkunController@'])  ? 'active-link' : '' }} ">
                                            <a href="{!! route('akun.index') !!}">
                                                <i class="pli-male-2"></i>
                                                <span class="menu-title">Akun</span>
                                            </a>
                                        </li>
                                        @if (Auth::user()->roles->first()->name == 'admin')
                                        <li class="{{  str_contains(Route::currentRouteAction(), ['App\\Http\\Controllers\\Backend\\PengaturanController@'])  ? 'active-link' : '' }} ">
                                            <a href="{!! route('pengaturan.index') !!}">
                                                <i class="pli-gear"></i>
                                                <span class="menu-title">Sistem</span>
                                            </a>
                                        </li>
                                        @endif
                                        @endif
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <footer id="footer">

                <div class="show-fixed pad-rgt pull-right">
                    &#0169; 2018 <strong>{!! config('constants.options.lembaga'); !!}</strong>
                </div>

                <div class="hide-fixed pull-right pad-rgt">
                    &#0169; 2018 <strong>{!! config('constants.options.lembaga'); !!}</strong>
                </div>

                <p class="pad-lft">{!! Session::get('ta_semester_nama') !!}</p>
            </footer>
            <button class="scroll-top btn">
                <i class="pci-chevron chevron-up"></i>
            </button>
        </div>

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/nifty.min.js') }}"></script>
        <script src="{{ asset('plugins/pace/pace.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
        <script src="{{ asset('plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/build/vfs_fonts.js') }}"></script>
        <script src="{{ asset('plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/extensions/Buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/extensions/Buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/extensions/Buttons/js/buttons.colVis.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/extensions/Buttons/js/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/pdfmake.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/vfs_fonts.js') }}"></script>
        <script src="{{ asset('plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
        <script src="{{ asset('plugins/ladda/dist/spin.min.js') }}"></script>
        <script src="{{ asset('plugins/ladda/dist/ladda.min.js') }}"></script>
        <script src="{{ asset('plugins/ladda/dist/ladda.jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('plugins/d3/d3.min.js') }}" charset="utf-8"></script>
        <script src="{{ asset('plugins/c3-0.6.12/c3.min.js') }}"></script>

        <script src="{{ asset('js/custom.js') }}"></script>

        <script type="text/javascript">
                                                $(document).ajaxStart(function () {
                                                    Pace.restart();
                                                });
        </script>

        @yield('scripts')
        @yield('footer-scripts')
    </body>
</html>

