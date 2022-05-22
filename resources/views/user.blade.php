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
    <!--<div id="preloder">
        <div class="loader"></div>
    </div>-->

    <!-- Header Section Begin -->
    @include('includes.header')
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Accueil</a>
                        <span>Mon Compte</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Footer Section -->
@include('includes.footer')
<!-- Js Plugins -->
@include('includes.js')

</body>
</html>