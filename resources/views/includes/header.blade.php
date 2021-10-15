<header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        shopmetics@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +65 11.188.888
                    </div>
                </div>
                <div class="ht-right">
                    <a href="{{ route('login') }}" class="login-panel"><i class="fa fa-user"></i>Connexion</a>
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yu' data-image="{{ asset('fashi/img/flag-4.png') }}" data-imagecss="flag yu"
                                data-title="Français">Français</option>
                            <option value='yt' data-image="{{ asset('fashi/img/flag-1.jpg') }}" data-imagecss="flag yt"
                                data-title="English">English</option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <p class="logo-text">Shopmetics<span>.</span></p>
                            </a>
                        </div>
                    </div>
                    @include('partials.search')
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <!-- <span>1</span> -->
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="{{ route('panier') }}">
                                    <i class="icon_bag_alt"></i>
                                   <!--  <span>3</span> -->
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <!--
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="si-pic"><img src="{{ asset('fashi/img/select-product-1.jpg') }}" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="si-pic"><img src="{{ asset('fashi/img/select-product-2.jpg') }}" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    -->
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <!-- <h5>$120.00</h5> -->
                                    </div>
                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">Valider la commande</a>
                                    </div>
                                </div>
                            </li>
                            <!-- <li class="cart-price">$150.00</li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>Voir</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">Beauté</a></li>
                            <li><a href="#">Pommade</a></li>
                            <li><a href="#">Soins</a></li>
                            <li><a href="#">Huiles</a></li>
                            <li><a href="#">Santé</a></li>
                            <li><a href="#">Hygiène</a></li>
                            <li><a href="#">Savon</a></li>
                            <li><a href="#">Thé</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <!-- Bouton Accueil -->
                        <li @if ($view_name == 'home') class="active" @endif>
                            <a href="{{ route('home') }}">Acceuil</a>
                        </li>
                        <!-- Bouton Boutique -->
                        <li @if ($view_name == 'boutique') class="active" @endif>
                            <a href="{{ route('boutique') }}">Boutique</a>
                        </li>
                        <!-- Bouton Blog -->
                        <li @if ($view_name == 'blog') class="active" @endif>
                            <a href="{{ route('blog') }}">Blog</a>
                        </li>
                        <!-- Bouton Contact -->
                        <li @if ($view_name == 'contact') class="active" @endif>
                            <a href="{{ route('contact') }}">Contact</a>
                        </li>
                        <li><a href="{{ route('faq') }}">F.A.Q</a>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
