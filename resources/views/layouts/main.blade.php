<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Metas -->
    @include('includes.meta')
    <!-- Css Styles -->
    @include('includes.css')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    @include('includes.header')
    <!-- Header End -->

    <!-- Hero Section Begin -->
    @include('layouts.hero')
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    @include('layouts.banner')
    <!-- Banner Section End -->

    <!-- Content Section Begin -->
    <!-- include('includes.content') Ne pas utiliser-->
    @yield('content')
    <!-- Content Section End -->

    <!-- Footer Section Begin -->
    @include('includes.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('includes.js')

</body>

</html>
