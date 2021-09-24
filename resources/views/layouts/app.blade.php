<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopmetics | Accueil</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

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
