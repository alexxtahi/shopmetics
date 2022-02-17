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

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Accueil</a>
                        <a href="{{ route('boutique') }}">Boutique</a>
                        <span>Panier</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">      
                    <div class="col-lg-12">
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th class="p-name">Produit</th>
                                        <th>Prix</th>
                                        <th>Quantité</th>
                                        <th>Montant</th>
                                        <th><i class="ti-close"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::content() as $produit) 
                                        <tr>
                                            item
                                            <td class="cart-pic first-row"><img src= "{{asset($produit->options->photo)}}" alt=""></td>
                                            <td class="cart-title first-row">
                                                <h5>{{$produit->name}}</h5>
                                            </td>
                                            <td class="p-price first-row">{{$produit->price}} Fcfa</td>
                                            <td class="qua-col first-row">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text"  value="1">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total-price first-row">{{$produit->price}} Fcfa</td>
                                            <td class="close-td first-row"><a href="{{route('cart.store', ['id'=> $produit->rowId]) }}"><i class="ti-close"> </i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="cart-buttons">
                                    <a href="{{ route('boutique') }}" class="primary-btn continue-shop">Boutique</a>
                                    <a href="{{ route('panier') }}" class="primary-btn up-cart">Actualiser</a>
                                </div>
                                <!--
                                <div class="discount-coupon">
                                    <h6>Coupon de réduction</h6>
                                    <form action="#" class="coupon-form">
                                        <input type="text" placeholder="Entrez votre coupon ici">
                                        <button type="submit" class="site-btn coupon-btn">Appliquer</button>
                                    </form>
                                </div>
                                -->
                            </div>
                            <div class="col-lg-4 offset-lg-4">
                                <div class="proceed-checkout">
                                    
                                    <ul>
                                        <!-- Affichage du total de base au cas ou il y'a un couon de réduction -->
                                        @if ("condition" == "Coupon de réduction")
                                        <li class="subtotal">Subtotal <span>$240.00</span></li>
                                        @endif
                                        <li class="cart-total">Total <span>{{Cart::subtotal()}} Fcfa (TTC)</span></li>
                                    </ul>
                                    <a href="#" class="proceed-btn">Valider la commande</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
                
            </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section -->
    @include('includes.footer')
    <!-- Js Plugins -->
    @include('includes.js')
</body>

</html>
