<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-left">
                    <div class="footer-logo">
                        <a href="{{ route('home') }}">
                            <p class="logo-text footer-logo-text">Shopmetics<span>.</span></p>
                        </a>
                    </div>
                    <ul>
                        <li>Instagram: skinnythe_12</li>
                        <li>Téléphone: +4915110100130</li>
                        <li>Email: info@skinnythe.com</li>
                    </ul>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/Abidjan-BazarChic-105970801271700/"><i
                                class="fa fa-facebook"></i></a>
                        <a href="https://instagram.com/skinnythe_12?igshid=YmMyMTA2M2Y="><i
                                class="fa fa-instagram"></i></a>
                        <a href="sms: +4915110100130"><i class="fa fa-whatsapp"></i></a>
                        <a href="mailto: info@skinnythe.com"><i class="fa ti-email"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1">
                <div class="footer-widget">
                    <h5>Informations</h5>
                    <ul>
                        <li><a href="#">A propos de nous</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="#">Services</a></li>
                        {{-- <li><a href="{{ route('faq') }}">F.A.Q</a></li> --}}
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer-widget">
                    <h5>Mon compte</h5>
                    <ul>
                        <li><a href="{{ route('panier') }}">Panier</a></li>
                        <li><a href="{{ route('boutique') }}">Boutique</a></li>
                        <!-- On affiche [Mon compte] seulement si l'utilisateur est connecté -->
                        @if (Auth::check())
                            <li><a href="#">Mon compte</a></li>
                            <!-- On affiche [Tableau de bord] seulement si l'utilisateur est connecté -->
                            @if (Auth::user()->role == 'Administrateur' || Auth::user()->role == 'Dev')
                                <li><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                            @endif
                            <li>
                                <!-- Formulaire de déconnexion -->
                                <form method="POST" action="{{ route('logout') }}">

                                    @csrf
                                    <a href="" style="color: #b2b2b2;"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        Déconnexion
                                    </a>
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Connexion</a></li>
                            <li><a href="{{ route('register') }}">Inscription</a></li>
                        @endif
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
    {{-- <div class="copyright-reserved">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy; <strong>Shopmetics</strong> | Tous droits réservés | Designed <i
                            class="fa fa-heart-o" aria-hidden="true"></i> by XCODERS</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="payment-pic">
                        <img src="{{ asset('fashi/img/payment-method.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</footer>
