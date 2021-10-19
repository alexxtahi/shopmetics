<footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="<?php echo e(route('home')); ?>">
                                <p class="logo-text footer-logo-text">Shopmetics<span>.</span></p>
                            </a>
                        </div>
                        <ul>
                            <li>Adresse: 60-49 Road 11378 New York</li>
                            <li>Téléhone: +225 XX XX XX XX XX</li>
                            <li>Email: shopmetics@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Informations</h5>
                        <ul>
                            <li><a href="#">A propos de nous</a></li>
                            <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="<?php echo e(route('faq')); ?>">F.A.Q</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Mon compte</h5>
                        <ul>
                            <li><a href="<?php echo e(route('panier')); ?>">Panier</a></li>
                            <li><a href="<?php echo e(route('boutique')); ?>">Boutique</a></li>
                            <!-- On affiche [Mon compte] seulement si l'utilisateur est connecté -->
                            <?php if(Auth::check()): ?>
                                <li><a href="#">Mon compte</a></li>
                                <!-- On affiche [Tableau de bord] seulement si l'utilisateur est connecté -->
                                <?php if(Auth::user()->role == "Administrateur" || Auth::user()->role == "Dev"): ?>
                                    <li><a href="<?php echo e(route('dashboard')); ?>">Tableau de bord</a></li>
                                <?php endif; ?>
                                <li> <!-- Formulaire de déconnexion -->
                                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                                        <?php echo method_field('POST'); ?>
                                        <?php echo csrf_field(); ?>
                                        <a href="" style="color: #b2b2b2;" onclick="event.preventDefault(); this.closest('form').submit();">
                                            Déconnexion
                                        </a>
                                    </form>
                                </li>
                            <?php else: ?>
                                <li><a href="<?php echo e(route('login')); ?>">Connexion</a></li>
                                <li><a href="<?php echo e(route('register')); ?>">Inscription</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Rejoinez notre Newsletter maintenant</h5>
                        <p>Recevez des mises à jour par e-mail sur notre dernière boutique et nos offres spéciales.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Entez votre email">
                            <button type="button">Souscrire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; <strong>Shopmetics</strong> | Tous droits réservés | Designed <i class="fa fa-heart-o" aria-hidden="true"></i> by XCODERS</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="<?php echo e(asset('fashi/img/payment-method.png')); ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php /**PATH C:\Users\bouad\Documents\GitHub\shopmetics\resources\views/includes/footer.blade.php ENDPATH**/ ?>