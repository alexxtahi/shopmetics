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
                <?php if(Auth::check()): ?> <!-- Si l'utilisateur est connecté -->
                    <!-- Formulaire de déconnexion -->
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="login-panel logout-btn">
                        <?php echo method_field('POST'); ?>
                        <?php echo csrf_field(); ?>
                        <a href="" class="logout-btn" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fa fa-sign-out"></i> Se déconnecter
                        </a>
                    </form>
                    <a href="#" class="login-panel"><i class="fa fa-user"></i>Bonjour, <?php echo e(Auth::user()->nom); ?> !</a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="login-panel"><i class="fa fa-user"></i>Connexion</a>
                <?php endif; ?>
                <div class="lan-selector">
                </div>
                <div class="lan-selector">
                    <select class="language_drop" name="countries" id="countries" style="width:300px;">
                        <option value='yu' data-image="<?php echo e(asset('fashi/img/flag-4.png')); ?>" data-imagecss="flag yu"
                            data-title="Français">Français</option>
                        <option value='yt' data-image="<?php echo e(asset('fashi/img/flag-1.jpg')); ?>" data-imagecss="flag yt"
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
                        <a href="<?php echo e(route('home')); ?>">
                            <p class="logo-text">Shopmetics<span>.</span></p>
                        </a>
                    </div>
                </div>
                <!-- Barre de recherche -->
                <?php echo $__env->make('partials.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Fin Barre de recherche -->
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <!-- Si l'admin est connecté -->
                        <?php if(Auth::check() && (Auth::user()->role == "Administrateur" || Auth::user()->role == "Dev")): ?>
                            <li class="heart-icon">
                                <a href="<?php echo e(route('dashboard')); ?>">
                                    <i class="icon_toolbox_alt"></i>
                                    <!-- <span>1</span> -->
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="heart-icon">
                            <a href="#">
                                <i class="icon_heart_alt"></i>
                                <!-- <span>1</span> -->
                            </a>
                        </li>
                        <li class="cart-icon">
                            <a href="<?php echo e(route('panier')); ?>">
                                <i class="icon_bag_alt"></i>
                                <!--  <span>3</span> -->
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <!--
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="si-pic"><img src="<?php echo e(asset('fashi/img/select-product-1.jpg')); ?>" alt=""></td>
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
                                                <td class="si-pic"><img src="<?php echo e(asset('fashi/img/select-product-2.jpg')); ?>" alt=""></td>
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
                    <li <?php if($view_name == 'home'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(route('home')); ?>">Acceuil</a>
                    </li>
                    <!-- Bouton Boutique -->
                    <li <?php if($view_name == 'boutique'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(route('boutique')); ?>">Boutique</a>
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
                    <li <?php if($view_name == 'blog'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(route('blog')); ?>">Blog</a>
                    </li>
                    <!-- Bouton Contact -->
                    <li <?php if($view_name == 'contact'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(route('contact')); ?>">Contact</a>
                    </li>
                    <li><a href="#">Pages</a>
                        <ul class="dropdown">
                            <!-- Affichage du bouton dashboard si l'utilisateur connecté est un Admin -->
                            <?php if(Auth::check()): ?>
                                <li><a href="#">Mon compte</a></li>
                                <?php if(Auth::user()->role == "Administrateur" || Auth::user()->role == "Dev"): ?>
                                    <li><a href="<?php echo e(route('dashboard')); ?>">Tableau de bord</a></li>
                                <?php endif; ?>
                            <?php else: ?>
                                <li><a href="<?php echo e(route('register')); ?>">Inscription</a></li>
                                <li><a href="<?php echo e(route('login')); ?>">Connexion</a></li>
                            <?php endif; ?>
                            <li><a href="<?php echo e(route('panier')); ?>">Panier</a></li>
                            <li><a href="<?php echo e(route('faq')); ?>">F.A.Q</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<?php /**PATH C:\Users\bouad\Documents\GitHub\shopmetics\resources\views/includes/header.blade.php ENDPATH**/ ?>