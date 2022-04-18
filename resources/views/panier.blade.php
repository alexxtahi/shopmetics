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

    <!-- Message après opération -->
    @if (!empty($detailsTransaction['paymentMsg']))
        @if ($detailsTransaction['status'] == 'REFUSED')
            <div class="alert alert-danger text-center">
                {{ $detailsTransaction['paymentMsg'] }}
            </div>
        @elseif ($detailsTransaction['status'] == 'ACCEPTED')
            <div class="alert alert-success text-center" role="alert">
                {{ $detailsTransaction['paymentMsg'] }}
            </div>
        @endif
    @endif

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Produit</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Montant</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @forelse ($cart as $items)
                                    <tr class="prod_general">
                                        <td class="cart-pic first-row">
                                            <img src="{{ asset($items->produits->img_prod) }}" alt="none">
                                        </td>

                                        <td class="cart-title first-row text-center">
                                            <h5>{{ $items->produits->designation }}</h5>
                                        </td>

                                        <td class="p-price first-row">
                                            {{ number_format($items->produits->prix_prod, 0, ',', ' ') }}
                                            FCFA
                                        </td>

                                        <input type="hidden" class="qt-dest" value="{{ $items->id_prod }}">

                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <span class="qtybtn change_qt decr">-</span>
                                                    <input type="number" class="prod_qt"
                                                        value="{{ $items->qt_prod }}" disabled='true'>
                                                    <span class="qtybtn change_qt incr">+</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="total-price first-row">
                                            {{ number_format($items->produits->prix_prod * $items->qt_prod, 0, ',', ' ') }}
                                            FCFA
                                        </td>

                                        <td class="close-td first-row">
                                            <a href="{{ route('produit.destroy', ['id' => $items->id_prod]) }}">
                                                <i class="ti-close"></i>
                                            </a>
                                        </td>
                                    </tr>


                                    @php
                                        $total += $items->produits->prix_prod * $items->qt_prod;
                                    @endphp

                                @empty
                                @endforelse



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
                                    @if ('condition' == 'Coupon de réduction')
                                        <li class="subtotal">Subtotal <span>{{ $total }}</span></li>
                                    @endif
                                    <li class="cart-total">Total <span> {{ number_format($total, 0, ',', ' ') }}
                                            (TTC)</span></li>
                                </ul>
                                <a href="{{ route('verification') }}" class="proceed-btn">Valider la commande</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>




    <!-- Footer Section -->
    @include('includes.footer')
    <!-- Js Plugins -->
    @include('includes.js')



</body>

</html>
