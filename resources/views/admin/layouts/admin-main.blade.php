<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>Shopmetics - Tableau de bord</title>
        <!-- General CSS Files -->
        @include('admin.includes.admin-css')
    </head>

    <body>
        <div id="app">
            <div class="main-wrapper">
                <div class="navbar-bg"></div>
                <!-- Header -->
                @include('admin.includes.admin-header')
                <!-- End Header -->
                <!-- Sidebar -->
                @include('admin.includes.admin-sidebar')
                <!-- End Sidebar -->
                <!-- Main Content -->
                @yield('content')
                <!-- End Main Content -->
                <!-- Footer -->
                @include('admin.includes.admin-footer')
                <!-- End Footer -->
            </div>
        </div>
        <!-- General JS Scripts -->
        @include('admin.includes.admin-js')
    </body>
</html>
