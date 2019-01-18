<!-- Aplikasi ini dikembangkan untuk pendataan Sekolah dan Madrasah dibawah nauangan MAARIF -->
<!-- Dikembangkan oleh rohmad.ew@gmail.com -->

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main-custom.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
        
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                @yield('links')
            </div>
            @endif

            <div class="content">
                @yield('content')
            </div>
        </div>
        
        @yield('scripts')
    </body>
</html>
