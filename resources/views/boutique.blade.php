<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Metas -->
    @include('includes.meta')
    <!-- Css Styles -->
    @include('includes.css')
</head>

<body>

    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    @include('includes.header')
    <!-- Header Section End -->


    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Accueil</a>
                        <span>Boutique</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container produit_data">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Catégories</h4>
                        <ul class="filter-catagories">
                            <!-- Récupération des catégories depuis la base de données -->
                            @foreach ($categories as $categorie)
                                @if (isset($_GET['categorie']) && !empty($_GET['categorie']) && $_GET['categorie'] == $categorie->id)
                                    <li><a href="{{ url('/boutique/filtre-categories?id_cat=' . $categorie->id) }}" class="active-filter">{{ $categorie->lib_cat }}</a></li>
                                @else
                                    <li><a href="{{ url('/boutique/filtre-categories?id_cat=' . $categorie->id) }}">{{ $categorie->lib_cat }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <!--
                    <div class="filter-widget">
                        <h4 class="fw-title">Marque</h4>
                        <div class="fw-brand-check">
                            <div class="bc-item">
                                <label for="bc-calvin">
                                    Calvin Klein
                                    <input type="checkbox" id="bc-calvin">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-polo">
                                    Polo
                                    <input type="checkbox" id="bc-polo">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-tommy">
                                    Tommy Hilfiger
                                    <input type="checkbox" id="bc-tommy">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    -->
                    <form action="{{ route('boutique.filtre-prix') }}" method="GET" class="filter-widget">
                        <h4 class="fw-title">Prix</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <!-- Si le filtre de prix min a été appliqué -->
                                    @if (isset($priceFilterMin) && !empty($priceFilterMin))
                                        <input type="text" id="minamount" name="minamount" value="{{ $priceFilterMin }}">
                                    @else
                                        <input type="text" id="minamount" name="minamount">
                                    @endif
                                    <!-- Si le filtre de prix max a été appliqué -->
                                    @if (isset($priceFilterMax) && !empty($priceFilterMax))
                                        <input type="text" id="maxamount" name="maxamount" value="{{ $priceFilterMax }}">
                                    @else
                                        <input type="text" id="maxamount" name="maxamount">
                                    @endif
                                </div>
                            </div>
                            @if ((isset($priceFilterMin) && isset($priceFilterMax)) &&
                                (!empty($priceFilterMin) && !empty($priceFilterMax)))
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="{{ $priceFilterMin }}" data-max="{{ $priceFilterMax }}" id="price-filter">
                            @else
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="0" data-max="100000" id="price-filter">
                            @endif
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <button type="submit" class="filter-btn">Filtrer</button>
                        <a href="{{ route("boutique") }}" class="filter-btn">Réinitialiser</a>
                    </form>
                    <!--
                    <div class="filter-widget">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                            <div class="cs-item">
                                <input type="radio" id="cs-black">
                                <label class="cs-black" for="cs-black">Black</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-violet">
                                <label class="cs-violet" for="cs-violet">Violet</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-blue">
                                <label class="cs-blue" for="cs-blue">Blue</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-yellow">
                                <label class="cs-yellow" for="cs-yellow">Yellow</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-red">
                                <label class="cs-red" for="cs-red">Red</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-green">
                                <label class="cs-green" for="cs-green">Green</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            <div class="sc-item">
                                <input type="radio" id="s-size">
                                <label for="s-size">s</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="m-size">
                                <label for="m-size">m</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="l-size">
                                <label for="l-size">l</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="xs-size">
                                <label for="xs-size">xs</label>
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="filter-widget">
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            @foreach ($tags as $tag)
                                @if (isset($selectedTag) && !empty($selectedTag) && $selectedTag == $tag->lib_tag)
                                    <a href="{{ url('/boutique/filtre-tags?tag=' . $tag->lib_tag) }}" class="active-tag">{{ $tag->lib_tag }}</a>
                                @else
                                    <a href="{{ url('/boutique/filtre-tags?tag=' . $tag->lib_tag) }}">{{ $tag->lib_tag }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                               
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p><strong>{{ $produits->count() }}</strong> Produits</p>
                            </div>
                        </div>
                    </div>
                    <div class="product-list ">
                        <div class="row">
                            <!-- Récupération des produits depuis la base de données -->
                            @forelse ($produits as $produit)
                                <div class="col-lg-4 col-sm-6 prod_general2">
                                    <div class="product-item" >
                                        <div class="pi-pic">
                                            <img src= "{{ asset($produit->img_prod) }}"  alt="">
                                            <!-- Afficher la bannière promo si le produit est en promotion -->
                                            @if ($produit->en_promo == true)
                                            <div class="sale pp-sale">Sale</div>
                                            @endif
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <!-- Rajouter les accolades pour que ça marche <button value="{$produit->id}}" id="cartBtn" class="btn_add">+ Ajouter au panier</button> -->
                                                <div>
                                                    <li class="w-icon active"><a href="{{route('produit', ['id'=>$produit->id])}}"><i class="icon_bag_alt"></i></a></li>
                                                    <button id="cartBtn2" class="primary-btn pd-cart prod_id2 "
                                                        value="{{ $produit->id }}">+ Ajouter au panier
                                                    </button>
                                                </div>

                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name"><!-- {$produit->lib_cat }--></div>
                                            <a href="#">
                                                <h5>{{ $produit->designation }}</h5>
                                            </a>
                                            <div class="product-price">
                                                <!-- Prix actuel -->
                                                {{ number_format($produit->prix_prod, 0, ',', ' ') }} FCFA
                                                <!-- Ancien prix -->
                                                @if ($produit->ancien_prix != $produit->prix_prod)
                                                <span>{{ number_format($produit->ancien_prix, 0, ',', ' ') }} FCFA</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty

                            ~@endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('fashi/img/logo-carousel/logo-1.png') }}" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('fashi/img/logo-carousel/logo-2.png') }}" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('fashi/img/logo-carousel/logo-3.png') }}" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('fashi/img/logo-carousel/logo-4.png') }}" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('fashi/img/logo-carousel/logo-5.png') }}" alt="">
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
