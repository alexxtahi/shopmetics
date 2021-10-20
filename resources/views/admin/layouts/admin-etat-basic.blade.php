<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title></title>
        <!-- General CSS Files -->
        @include('admin.includes.admin-css')
    </head>

    <body>
        <div id="app">
            <div class="main-wrapper">
                <div class="navbar-bg"></div>
                <!-- Main Content -->
                @yield('content')
                <!-- End Main Content -->
            </div>
        </div>
        <!-- General JS Scripts -->
        @include('admin.includes.admin-js')
        @yield('script')
    </body>
</html>
