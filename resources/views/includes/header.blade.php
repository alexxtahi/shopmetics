<header class="header-section">

    <!-- Message après opération -->
    @if (isset($previous_result['welcome_text']) && !empty($previous_result['welcome_text']))
        <div class="alert alert-success text-center" role="alert">
            {{ $previous_result['welcome_text'] }}
        </div>
    @endif

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
                @if (Auth::check())
                    <!-- Si l'utilisateur est connecté -->
                    <!-- Formulaire de déconnexion -->
                    <form method="POST" action="{{ route('logout') }}" class="login-panel logout-btn">
                        @csrf
                        <a class="logout-btn" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fa fa-sign-out"></i> Se déconnecter
                        </a>
                    </form>
                    <a href="#" class="login-panel"><i class="fa fa-user"></i>Bonjour, {{ Auth::user()->nom }}
                        !</a>
                @else
                    <a href="{{ route('login') }}" class="login-panel"><i class="fa fa-user"></i>Connexion</a>
                @endif
                <div class="lan-selector">
                </div>
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
                <!-- Barre de recherche -->
                @include('partials.search')
                <!-- Fin Barre de recherche -->
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <!-- Si l'admin est connecté -->
                        @if (Auth::check() && (Auth::user()->role == 'Admin' || Auth::user()->role == 'Dev'))
                            <li class="heart-icon">
                                <a href="{{ route('dashboard') }}" data-toggle="tooltip" title="Tableau de bord">
                                    <i class="icon_toolbox_alt"></i>
                                    <!-- <span>1</span> -->
                                </a>
                            </li>
                        @endif
                        <li class="heart-icon">
                            <a href="#" data-toggle="tooltip" title="Mes favoris">
                                <i class="icon_heart_alt"></i>
                                <!-- <span>1</span> -->
                            </a>
                        </li>
                        <li class="cart-icon">
                            <a href="{{ route('panier') }}" data-toggle="tooltip" title="Panier">
                                <i class="icon_bag_alt"></i>
                                @if (Auth::check())
                                    <span>{{ $nombre_prod }}</span>
                                @endif
                            </a>
                        </li>
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
                    <!-- Bouton Accueil -->
                    <li><a href="#">Collection</a>
                        <ul class="dropdown">
                            <li><a href="#">Beauté</a></li>
                            <li><a href="#">Hygiène</a></li>
                            <li><a href="#">Santé</a></li>
                        </ul>
                    </li>
                    <!-- Bouton Blog -->
                    <li @if ($view_name == 'blog') class="active" @endif>
                        <a href="{{ route('blog') }}">Blog</a>
                    </li>
                    <!-- Bouton Contact -->
                    <li @if ($view_name == 'contact') class="active" @endif>
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li><a href="#">Pages</a>
                        <ul class="dropdown">
                            <!-- Affichage du bouton dashboard si l'utilisateur connecté est un Admin -->
                            @if (Auth::check())
                                <li><a href="#">Mon compte</a></li>
                                @if (Auth::user()->role == 'Administrateur' || Auth::user()->role == 'Dev')
                                    <li><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                                @endif
                            @else
                                <li><a href="{{ route('register') }}">Inscription</a></li>
                                <li><a href="{{ route('login') }}">Connexion</a></li>
                            @endif
                            <li><a href="{{ route('panier') }}">Panier</a></li>
                            <li><a href="{{ route('faq') }}">F.A.Q</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
