
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
        <link href="premium/icon-sets/icons/line-icons/premium-line-icons.min.css" rel="stylesheet">
        <link href="premium/icon-sets/icons/solid-icons/premium-solid-icons.css" rel="stylesheet">
        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="plugins/ionicons/css/ionicons.min.css" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/nifty.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/themes/type-e/theme-lime.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <link href="plugins/pace/pace.min.css" rel="stylesheet">
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
                            <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
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
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                    <i class="pli-bell"></i>
                                    <span class="badge badge-header badge-danger"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                    <div class="nano scrollable">
                                        <div class="nano-content">
                                            <ul class="head-list">
                                                <li>
                                                    <a href="#" class="media add-tooltip" data-title="Used space : 95%" data-container="body" data-placement="bottom">
                                                        <div class="media-left">
                                                            <i class="pli-data-settings icon-2x text-main"></i>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="text-nowrap text-main text-semibold">HDD is full</p>
                                                            <div class="progress progress-sm mar-no">
                                                                <div style="width: 95%;" class="progress-bar progress-bar-danger">
                                                                    <span class="sr-only">95% Complete</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="media" href="#">
                                                        <div class="media-left">
                                                            <i class="pli-file-edit icon-2x"></i>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="mar-no text-nowrap text-main text-semibold">Write a news article</p>
                                                            <small>Last Update 8 hours ago</small>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="media" href="#">
                                                        <span class="label label-info pull-right">New</span>
                                                        <div class="media-left">
                                                            <i class="pli-speech-bubble-7 icon-2x"></i>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="mar-no text-nowrap text-main text-semibold">Comment Sorting</p>
                                                            <small>Last Update 8 hours ago</small>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="media" href="#">
                                                        <div class="media-left">
                                                            <i class="pli-add-user-star icon-2x"></i>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="mar-no text-nowrap text-main text-semibold">New User Registered</p>
                                                            <small>4 minutes ago</small>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="media" href="#">
                                                        <div class="media-left">
                                                            <img class="img-circle img-sm" alt="Profile Picture" src="img/profile-photos/9.png">
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="mar-no text-nowrap text-main text-semibold">Lucy sent you a message</p>
                                                            <small>30 minutes ago</small>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="media" href="#">
                                                        <div class="media-left">
                                                            <img class="img-circle img-sm" alt="Profile Picture" src="img/profile-photos/3.png">
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="mar-no text-nowrap text-main text-semibold">Jackson sent you a message</p>
                                                            <small>40 minutes ago</small>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!--Dropdown footer-->
                                    <div class="pad-all bord-top">
                                        <a href="#" class="btn-link text-main box-block">
                                            <i class="pci-chevron chevron-right pull-right"></i>Show All Notifications
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li id="dropdown-user" class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                    <span class="ic-user pull-right" style="margin-top: 25px;">
                                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                        <!--You can use an image instead of an icon.-->
                                        <img class="img-circle img-user media-object" src="img/profile-photos/1.png" alt="Profile Picture">
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
                                            <a href="#"><i class="pli-male icon-lg icon-fw"></i> Profil</a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="badge badge-danger pull-right">9</span><i class="pli-mail icon-lg icon-fw"></i> Pesan</a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="label label-success pull-right">New</span><i class="pli-gear icon-lg icon-fw"></i> Pengaturan</a>
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
                                <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
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
                                                <img class="img-circle img-md" src="img/profile-photos/1.png" alt="Profile Picture">
                                            </div>
                                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                                <span class="pull-right dropdown-toggle">
                                                    <i class="dropdown-caret"></i>
                                                </span>
                                                <p class="mnp-name">{!! Auth::user()->name !!}</p>
                                                <span class="mnp-desc">{!! Auth::user()->roles->first()->display_name !!}</span>
                                            </a>
                                        </div>
                                        <div id="profile-nav" class="collapse list-group bg-trans">
                                            <a href="#" class="list-group-item">
                                                <i class="pli-male icon-lg icon-fw"></i> Profil
                                            </a>
                                            <a href="#" class="list-group-item">
                                                <i class="pli-gear icon-lg icon-fw"></i> Pengaturan
                                            </a>
                                            <a href="#" class="list-group-item">
                                                <i class="pli-information icon-lg icon-fw"></i> Bantuan
                                            </a>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="list-group-item">
                                                <i class="pli-unlock icon-lg icon-fw"></i> Keluar
                                            </a>
                                        </div>
                                    </div>


                                    <!--Shortcut buttons-->
                                    <!--================================-->
                                    <div id="mainnav-shortcut" class="hidden">
                                        <ul class="list-unstyled shortcut-wrap">
                                            <li class="col-xs-3" data-content="My Profile">
                                                <a class="shortcut-grid" href="#">
                                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                                        <i class="pli-male"></i>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="col-xs-3" data-content="Messages">
                                                <a class="shortcut-grid" href="#">
                                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                                        <i class="pli-speech-bubble-3"></i>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="col-xs-3" data-content="Activity">
                                                <a class="shortcut-grid" href="#">
                                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                                        <i class="pli-thunder"></i>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="col-xs-3" data-content="Lock Screen">
                                                <a class="shortcut-grid" href="#">
                                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                                        <i class="pli-lock-2"></i>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--================================-->
                                    <!--End shortcut buttons-->

                                    @if (Auth::user()->roles->first()->name == 'admin')
                                    <ul id="mainnav-menu" class="list-group">
                                        <li>
                                            <a href="#">
                                                <i class="pli-home"></i>
                                                <span class="menu-title">Beranda</span>
                                            </a>
                                            <a href="#">
                                                <i class="pli-envelope"></i>
                                                <span class="menu-title">Pesan</span>
                                            </a>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Kegiatan</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-genius"></i>
                                                <span class="menu-title">Porsema</span>
                                            </a>
                                            <a href="#">
                                                <i class="pli-pilot"></i>
                                                <span class="menu-title">Pergamanas</span>
                                            </a>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Sekolah</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-university"></i>
                                                <span class="menu-title">Sekolah</span>
                                            </a>
                                            <a href="#">
                                                <i class="pli-student-male"></i>
                                                <span class="menu-title">Siswa</span>
                                            </a>
                                            <a href="#">
                                                <i class="pli-teacher"></i>
                                                <span class="menu-title">Guru</span>
                                            </a>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Laporan</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-university"></i>
                                                <span class="menu-title">Sekolah</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <ul class="collapse">
                                                <li><a href="dashboard-2.html">Per Kabupaten</a></li>
                                                <li><a href="dashboard-3.html">Per Kecamatan</a></li>
                                                <li><a href="dashboard-3.html">Per Jumlah Siswa</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-student-male"></i>
                                                <span class="menu-title">Siswa</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <ul class="collapse">
                                                <li><a href="dashboard-2.html">Per Kecamatan</a></li>
                                                <li><a href="dashboard-2.html">Per Tahun Lahir</a></li>
                                                <li><a href="dashboard-2.html">Per Profesi Ayah</a></li>
                                                <li><a href="dashboard-2.html">Per Penghasilan Ayah</a></li>
                                                <li><a href="dashboard-2.html">Per Profesi Ibu</a></li>
                                                <li><a href="dashboard-2.html">Per Penghasilan Ibu</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-teacher"></i>
                                                <span class="menu-title">Guru</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <ul class="collapse">
                                                <li><a href="dashboard-2.html">Per Kecamatan</a></li>
                                                <li><a href="dashboard-2.html">Per Tahun Lahir</a></li>
                                                <li><a href="dashboard-2.html">Per Profesi</a></li>
                                                <li><a href="dashboard-2.html">Per Golongan Sertifikasi</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Pengaturan</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-male-2"></i>
                                                <span class="menu-title">Akun</span>
                                            </a>
                                            <a href="#">
                                                <i class="pli-big-data"></i>
                                                <span class="menu-title">Master Data</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="mainnav-widget">
                                        <div class="show-small">
                                            <a href="#" data-toggle="menu-widget" data-target="#wg-server">
                                                <i class="pli-monitor-2"></i>
                                            </a>
                                        </div>
                                        <div id="wg-server" class="hide-small mainnav-widget-content">
                                            <ul class="list-group">
                                                <li class="list-header pad-no mar-ver">Status Data</li>
                                                <li class="mar-btm">
                                                    <span class="label label-primary pull-right">15%</span>
                                                    <p>Sekolah</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                                            <span class="sr-only">15%</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mar-btm">
                                                    <span class="label label-purple pull-right">75%</span>
                                                    <p>Siswa</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                                            <span class="sr-only">75%</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mar-btm">
                                                    <span class="label label-purple pull-right">75%</span>
                                                    <p>Guru</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                                            <span class="sr-only">75%</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @elseif (Auth::user()->roles->first()->name == 'wilayah')
                                    <ul id="mainnav-menu" class="list-group">
                                        <li>
                                            <a href="#">
                                                <i class="pli-home"></i>
                                                <span class="menu-title">Beranda</span>
                                            </a>
                                            <a href="#">
                                                <i class="pli-envelope"></i>
                                                <span class="menu-title">Pesan</span>
                                            </a>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Kegiatan</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-genius"></i>
                                                <span class="menu-title">Porsema</span>
                                            </a>
                                            <a href="#">
                                                <i class="pli-pilot"></i>
                                                <span class="menu-title">Pergamanas</span>
                                            </a>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Sekolah</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-university"></i>
                                                <span class="menu-title">Sekolah</span>
                                            </a>
                                            <a href="#">
                                                <i class="pli-student-male"></i>
                                                <span class="menu-title">Siswa</span>
                                            </a>
                                            <a href="#">
                                                <i class="pli-teacher"></i>
                                                <span class="menu-title">Guru</span>
                                            </a>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Laporan</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-university"></i>
                                                <span class="menu-title">Sekolah</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <ul class="collapse">
                                                <li><a href="dashboard-2.html">Per Kabupaten</a></li>
                                                <li><a href="dashboard-3.html">Per Kecamatan</a></li>
                                                <li><a href="dashboard-3.html">Per Jumlah Siswa</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-student-male"></i>
                                                <span class="menu-title">Siswa</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <ul class="collapse">
                                                <li><a href="dashboard-2.html">Per Kecamatan</a></li>
                                                <li><a href="dashboard-2.html">Per Tahun Lahir</a></li>
                                                <li><a href="dashboard-2.html">Per Profesi Ayah</a></li>
                                                <li><a href="dashboard-2.html">Per Penghasilan Ayah</a></li>
                                                <li><a href="dashboard-2.html">Per Profesi Ibu</a></li>
                                                <li><a href="dashboard-2.html">Per Penghasilan Ibu</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-teacher"></i>
                                                <span class="menu-title">Guru</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <ul class="collapse">
                                                <li><a href="dashboard-2.html">Per Kecamatan</a></li>
                                                <li><a href="dashboard-2.html">Per Tahun Lahir</a></li>
                                                <li><a href="dashboard-2.html">Per Profesi</a></li>
                                                <li><a href="dashboard-2.html">Per Golongan Sertifikasi</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Pengaturan</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-male-2"></i>
                                                <span class="menu-title">Akun</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="mainnav-widget">
                                        <div class="show-small">
                                            <a href="#" data-toggle="menu-widget" data-target="#wg-server">
                                                <i class="pli-monitor-2"></i>
                                            </a>
                                        </div>
                                        <div id="wg-server" class="hide-small mainnav-widget-content">
                                            <ul class="list-group">
                                                <li class="list-header pad-no mar-ver">Status Data</li>
                                                <li class="mar-btm">
                                                    <span class="label label-primary pull-right">15%</span>
                                                    <p>Sekolah</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                                            <span class="sr-only">15%</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mar-btm">
                                                    <span class="label label-purple pull-right">75%</span>
                                                    <p>Siswa</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                                            <span class="sr-only">75%</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mar-btm">
                                                    <span class="label label-purple pull-right">75%</span>
                                                    <p>Guru</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                                            <span class="sr-only">75%</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @elseif (Auth::user()->roles->first()->name == 'cabang')
                                    <ul id="mainnav-menu" class="list-group">
                                        <li>
                                            <a href="#">
                                                <i class="pli-home"></i>
                                                <span class="menu-title">Beranda</span>
                                            </a>
                                            <a href="#">
                                                <i class="pli-envelope"></i>
                                                <span class="menu-title">Pesan</span>
                                            </a>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Kegiatan</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-genius"></i>
                                                <span class="menu-title">Porsema</span>
                                            </a>
                                            <a href="#">
                                                <i class="pli-pilot"></i>
                                                <span class="menu-title">Pergamanas</span>
                                            </a>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Sekolah</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-university"></i>
                                                <span class="menu-title">Sekolah</span>
                                            </a>
                                            <a href="#">
                                                <i class="pli-student-male"></i>
                                                <span class="menu-title">Siswa</span>
                                            </a>
                                            <a href="#">
                                                <i class="pli-teacher"></i>
                                                <span class="menu-title">Guru</span>
                                            </a>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Laporan</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-university"></i>
                                                <span class="menu-title">Sekolah</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <ul class="collapse">
                                                <li><a href="dashboard-2.html">Per Kabupaten</a></li>
                                                <li><a href="dashboard-3.html">Per Kecamatan</a></li>
                                                <li><a href="dashboard-3.html">Per Jumlah Siswa</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-student-male"></i>
                                                <span class="menu-title">Siswa</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <ul class="collapse">
                                                <li><a href="dashboard-2.html">Per Kecamatan</a></li>
                                                <li><a href="dashboard-2.html">Per Tahun Lahir</a></li>
                                                <li><a href="dashboard-2.html">Per Profesi Ayah</a></li>
                                                <li><a href="dashboard-2.html">Per Penghasilan Ayah</a></li>
                                                <li><a href="dashboard-2.html">Per Profesi Ibu</a></li>
                                                <li><a href="dashboard-2.html">Per Penghasilan Ibu</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-teacher"></i>
                                                <span class="menu-title">Guru</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <ul class="collapse">
                                                <li><a href="dashboard-2.html">Per Kecamatan</a></li>
                                                <li><a href="dashboard-2.html">Per Tahun Lahir</a></li>
                                                <li><a href="dashboard-2.html">Per Profesi</a></li>
                                                <li><a href="dashboard-2.html">Per Golongan Sertifikasi</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Pengaturan</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-male-2"></i>
                                                <span class="menu-title">Akun</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="mainnav-widget">
                                        <div class="show-small">
                                            <a href="#" data-toggle="menu-widget" data-target="#wg-server">
                                                <i class="pli-monitor-2"></i>
                                            </a>
                                        </div>
                                        <div id="wg-server" class="hide-small mainnav-widget-content">
                                            <ul class="list-group">
                                                <li class="list-header pad-no mar-ver">Status Data</li>
                                                <li class="mar-btm">
                                                    <span class="label label-primary pull-right">15%</span>
                                                    <p>Sekolah</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                                            <span class="sr-only">15%</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mar-btm">
                                                    <span class="label label-purple pull-right">75%</span>
                                                    <p>Siswa</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                                            <span class="sr-only">75%</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mar-btm">
                                                    <span class="label label-purple pull-right">75%</span>
                                                    <p>Guru</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                                            <span class="sr-only">75%</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @elseif (Auth::user()->roles->first()->name == 'sekolah')
                                    <ul id="mainnav-menu" class="list-group">
                                        <li>
                                            <a href="#">
                                                <i class="pli-home"></i>
                                                <span class="menu-title">Beranda</span>
                                            </a>
                                            <a href="#">
                                                <i class="pli-envelope"></i>
                                                <span class="menu-title">Pesan</span>
                                            </a>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Sekolah</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-student-male"></i>
                                                <span class="menu-title">Siswa</span>
                                            </a>
                                            <a href="#">
                                                <i class="pli-teacher"></i>
                                                <span class="menu-title">Guru</span>
                                            </a>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Laporan</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-student-male"></i>
                                                <span class="menu-title">Siswa</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <ul class="collapse">
                                                <li><a href="dashboard-2.html">Per Kecamatan</a></li>
                                                <li><a href="dashboard-2.html">Per Tahun Lahir</a></li>
                                                <li><a href="dashboard-2.html">Per Profesi Ayah</a></li>
                                                <li><a href="dashboard-2.html">Per Penghasilan Ayah</a></li>
                                                <li><a href="dashboard-2.html">Per Profesi Ibu</a></li>
                                                <li><a href="dashboard-2.html">Per Penghasilan Ibu</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-teacher"></i>
                                                <span class="menu-title">Guru</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <ul class="collapse">
                                                <li><a href="dashboard-2.html">Per Kecamatan</a></li>
                                                <li><a href="dashboard-2.html">Per Tahun Lahir</a></li>
                                                <li><a href="dashboard-2.html">Per Profesi</a></li>
                                                <li><a href="dashboard-2.html">Per Golongan Sertifikasi</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Pengaturan</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-male-2"></i>
                                                <span class="menu-title">Akun</span>
                                            </a>
                                        </li>
                                    </ul>
                                    @elseif (Auth::user()->roles->first()->name == 'operator')
                                    <ul id="mainnav-menu" class="list-group">
                                        <li>
                                            <a href="#">
                                                <i class="pli-home"></i>
                                                <span class="menu-title">Beranda</span>
                                            </a>
                                            <a href="#">
                                                <i class="pli-envelope"></i>
                                                <span class="menu-title">Pesan</span>
                                            </a>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Sekolah</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-student-male"></i>
                                                <span class="menu-title">Siswa</span>
                                            </a>
                                            <a href="#">
                                                <i class="pli-teacher"></i>
                                                <span class="menu-title">Guru</span>
                                            </a>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Laporan</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-student-male"></i>
                                                <span class="menu-title">Siswa</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <ul class="collapse">
                                                <li><a href="dashboard-2.html">Per Kecamatan</a></li>
                                                <li><a href="dashboard-2.html">Per Tahun Lahir</a></li>
                                                <li><a href="dashboard-2.html">Per Profesi Ayah</a></li>
                                                <li><a href="dashboard-2.html">Per Penghasilan Ayah</a></li>
                                                <li><a href="dashboard-2.html">Per Profesi Ibu</a></li>
                                                <li><a href="dashboard-2.html">Per Penghasilan Ibu</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-teacher"></i>
                                                <span class="menu-title">Guru</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <ul class="collapse">
                                                <li><a href="dashboard-2.html">Per Kecamatan</a></li>
                                                <li><a href="dashboard-2.html">Per Tahun Lahir</a></li>
                                                <li><a href="dashboard-2.html">Per Profesi</a></li>
                                                <li><a href="dashboard-2.html">Per Golongan Sertifikasi</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="list-header">Pengaturan</li>
                                        <li>
                                            <a href="#">
                                                <i class="pli-male-2"></i>
                                                <span class="menu-title">Akun</span>
                                            </a>
                                        </li>
                                    </ul>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <footer id="footer">
                <div class="hide-fixed pull-right pad-rgt">
                    <p class="pad-lft">&#0169; 2018 <strong>{!! config('constants.options.lembaga'); !!}</strong></p>
                </div>
            </footer>
            <button class="scroll-top btn">
                <i class="pci-chevron chevron-up"></i>
            </button>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/nifty.min.js"></script>
        <script src="plugins/pace/pace.min.js"></script>

        @yield('script')
    </body>
</html>

