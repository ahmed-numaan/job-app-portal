<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>AdminSite Module - {{ config('app.name', 'Laravel') }}</title>

        <meta name="description" content="{{ $description ?? '' }}">
        <meta name="keywords" content="{{ $keywords ?? '' }}">
        <meta name="author" content="{{ $author ?? '' }}">

        <!-- Fonts -->
        <!-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->

        @vite([
            'Modules/AdminSite/Resources/assets/css/admin.css',
            'Modules/AdminSite/Resources/assets/js/admin.js'
        ])

        <link href="{{ asset('vendor/select2.min.css') }}" rel="stylesheet">
        
    </head>

    
<!-- <body class="hold-transition layout-fixed sidebar-expand-lg sidebar-mini bg-body-tertiary"> -->
<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <div class="app-wrapper">

        @include('adminsite::components.layouts.navbar')
        @include('adminsite::components.layouts.sidebar')

        <main class="app-main">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>

        <!--begin::Footer-->
        <footer class="app-footer">
        <!--begin::To the end-->
        <div class="float-end d-none d-sm-inline">Anything you want</div>
        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
            Copyright &copy; 2014-2025&nbsp;
            <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
        </footer>
        <!--end::Footer-->

    </div>

    @stack('scripts')
</body>
</html>
