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

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container prod_cont">
            <div class="row">
                <div class="col-lg-3">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                            <!-- Récupération des catégories depuis la base de données -->
                            @foreach ($categories as $categorie)
                                @if (isset($_GET['categorie']) && !empty($_GET['categorie']) && $_GET['categorie'] == $categorie->id)
                                    <li><a href="{{ url('/boutique/filtre-categories?id_cat=' . $categorie->id) }}"
                                            class="active-filter">{{ $categorie->lib_cat }}</a></li>
                                @else
                                    <li><a
                                            href="{{ url('/boutique/filtre-categories?id_cat=' . $categorie->id) }}">{{ $categorie->lib_cat }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <form action="{{ route('boutique.filtre-prix') }}" method="GET" class="filter-widget">
                        <h4 class="fw-title">Prix</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <!-- Si le filtre de prix min a été appliqué -->
                                    @if (isset($priceFilterMin) && !empty($priceFilterMin))
                                        <input type="text" id="minamount" name="minamount"
                                            value="{{ $priceFilterMin }}">
                                    @else
                                        <input type="text" id="minamount" name="minamount">
                                    @endif
                                    <!-- Si le filtre de prix max a été appliqué -->
                                    @if (isset($priceFilterMax) && !empty($priceFilterMax))
                                        <input type="text" id="maxamount" name="maxamount"
                                            value="{{ $priceFilterMax }}">
                                    @else
                                        <input type="text" id="maxamount" name="maxamount">
                                    @endif
                                </div>
                            </div>
                            @if (isset($priceFilterMin) && isset($priceFilterMax) && (!empty($priceFilterMin) && !empty($priceFilterMax)))
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="{{ $priceFilterMin }}" data-max="{{ $priceFilterMax }}"
                                    id="price-filter">
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
                <a href="{{ route('boutique') }}" class="filter-btn">Réinitialiser</a>
                </form>

                <div class="filter-widget">
                    <h4 class="fw-title">Tags</h4>
                    <div class="fw-tags">
                        @foreach ($tags as $tag)
                            @if (isset($selectedTag) && !empty($selectedTag) && $selectedTag == $tag->lib_tag)
                                <a href="{{ url('/boutique/filtre-tags?tag=' . $tag->lib_tag) }}"
                                    class="active-tag">{{ $tag->lib_tag }}</a>
                            @else
                                <a
                                    href="{{ url('/boutique/filtre-tags?tag=' . $tag->lib_tag) }}">{{ $tag->lib_tag }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-pic-zoom">
                            <img class="product-big-img" src="{{ asset($MonProduits->img_prod) }}" alt="">
                            <div class="zoom-icon">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>

                        <!--<div class="product-thumbs">
                                    <div class="product-thumbs-track ps-slider owl-carousel">
                                        <div class="pt active" data-imgbigurl="img/product-single/product-1.jpg"><img
                                                src="img/product-single/product-1.jpg" alt=""></div>
                                        <div class="pt" data-imgbigurl="img/product-single/product-2.jpg"><img
                                                src="img/product-single/product-2.jpg" alt=""></div>
                                        <div class="pt" data-imgbigurl="img/product-single/product-3.jpg"><img
                                                src="img/product-single/product-3.jpg" alt=""></div>
                                        <div class="pt" data-imgbigurl="img/product-single/product-3.jpg"><img
                                                src="img/product-single/product-3.jpg" alt=""></div>
                                    </div>
                                </div> -->

                    </div>
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                <h3>{{ $MonProduits->designation }}</h3>
                                <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                            </div>
                            <div class="pd-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>(5)</span>
                            </div>
                            <div class="pd-desc">
                                <p>{{ $MonProduits->description }}</p>

                                <h4>{{ number_format($MonProduits->prix_prod, 0, ',', ' ') }} FCFA
                                    @if ($MonProduits->ancien_prix != $MonProduits->prix_prod)
                                        <span>{{ number_format($MonProduits->ancien_prix, 0, ',', ' ') }} FCFA</span>
                                    @endif
                                </h4>
                            </div>

                            @if ($MonProduits->qte_prod > 0)
                                <!-- Si la quantité du produit est suppérieur à 0 -->

                                <div class="quantity">
                                    <div class="pro-qty">
                                        <span class="dec qtybtn">-</span>
                                        <input class="prod_qt" type="text" value="1">
                                        <span class="inc qtybtn">+</span>
                                    </div>
                                    <button id="cartBtn" class="primary-btn pd-cart prod_id"
                                        value="{{ $MonProduits->id }}">Ajouter au panier</button>
                                </div>
                            @else
                                <div class="quantity">
                                    <button class="primary-btn pd-cart no_stock" disabled="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-patch-exclamation" viewBox="0 0 16 16">
                                            <path
                                                d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z" />
                                            <path
                                                d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z" />
                                        </svg>
                                        En rupture de stock
                                    </button>
                                </div>
                            @endif


                            <ul class="pd-tags">
                                <li><span>CATEGORIES</span>: {{ $MesCategories->lib_cat }}</li>
                                <li><span>TAGS</span> : Aucun Tags
                                    <!-- Récupérer les tags -->
                                </li>
                            </ul>
                            <div class="pd-share">
                                <div class="p-code">
                                    <!-- Récupérer le sku du produit ? Sku : 00012 -->
                                </div>
                                <div class="pd-social">
                                    <a href="#"><i class="ti-facebook"></i></a>
                                    <a href="#"><i class="ti-twitter-alt"></i></a>
                                    <a href="#"><i class="ti-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-tab">
                    <div class="tab-item">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-3" role="tab">AVIS DES CLIENTS</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                <div class="product-content">
                                    <div class="row">
                                        <div class="col-lg-7">

                                            <h5>Carcactéristique</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                aliquip ex ea commodo consequat. Duis aute irure dolor in </p>
                                        </div>
                                        <div class="col-lg-5">
                                            <img src="img/product-single/tab-desc.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                <div class="specification-table">
                                    <table>
                                        <tr>
                                            <td class="p-catagory">Évaluation des clients</td>
                                            <td>
                                                <div class="pd-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <span>(5)</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Prix</td>
                                            <td>
                                                <div class="p-price">
                                                    {{ number_format($MonProduits->prix_prod, 0, ',', ' ') }} FCFA
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="p-catagory">Disponibilité</td>
                                            <td>
                                                <div class="p-stock">{{ $MonProduits->qte_prod }} en stock</div>
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                                    <td class="p-catagory">Poids</td>
                                                    <td>
                                                        <div class="p-weight">{{$MonProduits->caracteristique ? $MonProduits->caracteristique->poids: 'none'}}</div>
                                                    </td>
                                                </tr> --}}


                                        <tr>
                                            <td class="p-catagory">Boutique</td>
                                            <td>
                                                <div class="p-code">Skinny Thé</div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <!-- Pour les Commentaire -->
                            <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                <div class="customer-review-option">
                                    <h4>2 Commentaires</h4>
                                    <div class="comment-option">
                                        <div class="co-item">
                                            <div class="avatar-text">
                                                <div class="at-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <h5>Brandon Kelley <span>27 Aug 2019</span></h5>
                                                <div class="at-reply">Nice !</div>
                                            </div>
                                        </div>
                                        <div class="co-item">
                                            <div class="avatar-text">
                                                <div class="at-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <h5>Roy Banks <span>27 Aug 2019</span></h5>
                                                <div class="at-reply">Nice !</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="leave-comment">
                                        <h4>Laissez un commentaire
                                        </h4>
                                        <form action="#" class="comment-form">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="Nom">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="Email">
                                                </div>
                                                <div class="col-lg-12">
                                                    <textarea placeholder="Messages"></textarea>
                                                    <button type="submit" class="site-btn">Envoyer</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!------------- Pour les Commentaire Fin ------------->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>



    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Produits connexes</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ asset('fashi/img/products/product-1.jpg') }}" alt="">
                            <div class="sale">Sale</div>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Aperçu rapide</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Coat</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $14.00
                                <span>$35.00</span>
                            </div>
                        </div>
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
