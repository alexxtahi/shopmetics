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
                    <div class="breadcrumb-text">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Accueil</a>
                        <span>Commandes</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Faq Section Begin -->
    <div class="faq-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-accordin">
                        <div class="accordion" id="accordionExample">

                            @if ($total_commandes > 0)
                                <h2>
                                    <strong>
                                        Vos Commandes<span class="custom-span">.</span>
                                    </strong>
                                </h2>
                                <p style="margin-bottom: 60px">
                                    Vous avez passé <span class="custom-span">{{ $total_commandes }}</span>
                                    commande(s).
                                </p>
                            @endif

                            @forelse ($commandes as $commande)
                                <div class="card">
                                    <div class="card-heading active">
                                        <a class="active" data-toggle="collapse" data-target="#collapseOne">
                                           Code de la commande : {{ $commande->code_cmd . ' - ' . $commande->date_cmd }}
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                @forelse ($commande->produits as $commande_produit)
                                                    <li>
                                                        {{ $commande_produit->designation }}
                                                        X{{ $commande_produit->qte_cmd }} <br>
                                                        <span
                                                            class="custom-span"><strong>{{ $commande_produit->prix_prod_actuel * $commande_produit->qte_cmd }} FCFA</strong></span>
                                                    </li>
                                                    <hr>
                                                @empty
                                                    <li>
                                                        <span class="custom-span">Aucun produit</span>
                                                    </li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h2><strong>Vous n'avez pas encore passé de commande.</strong></h2>
                                <p>Rendez-vous dans la <a class="custom-link"
                                        href="{{ route('boutique') }}">boutique</a> pour découvrir
                                    nos produits !</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Faq Section End -->

    <!-- Footer Section -->
    @include('includes.footer')
    <!-- Js Plugins -->
    @include('includes.js')
</body>

</html>
