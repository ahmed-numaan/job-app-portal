<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AdminLTE 4</title>
    @vite('resources/js/admin.js')
</head>

<!-- <body class="hold-transition layout-fixed sidebar-expand-lg sidebar-mini bg-body-tertiary"> -->
<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <div class="app-wrapper">

        @include('admin_layout.navbar')
        @include('admin_layout.sidebar')

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

</body>
</html>
