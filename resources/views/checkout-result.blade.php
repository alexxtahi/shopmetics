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
                        <a href="{{ route('boutique') }}">Commande</a>
                        <span>Résultat de la transaction</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row" style="margin-bottom: 150px;">
                {{-- Statut de la commande --}}
                <div class="col-lg-6">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <div class="checkout-result-icon-box">
                                @if ($status == 'ACCEPTED')
                                    <div class="checkout-result-icon"
                                        style="background-image: url('{{ asset('assets/img/check.png') }}');"></div>
                                    <div class="checkout-result-content">
                                        <h3 style="margin-bottom: 15px">Paiement réussi</h3>
                                        <a href="{{ route('boutique') }}" class="primary-btn">
                                            Continuer les achats
                                        </a>
                                    </div>
                                @elseif ($status == 'REFUSED')
                                    <div class="checkout-result-icon"
                                        style="background-image: url('{{ asset('assets/img/cancel.png') }}');">
                                    </div>
                                    <div class="checkout-result-content">
                                        <h3 style="margin-bottom: 15px">Transaction annulée</h3>
                                        <a href="{{ route('panier') }}" class="primary-btn">Revenir au panier</a>
                                    </div>
                                @elseif ($status == 'SERVER_ERROR')
                                    <div class="checkout-result-icon"
                                        style="background-image: url('{{ asset('assets/img/warning.png') }}');">
                                    </div>
                                    <div class="checkout-result-content">
                                        <h3 style="margin-bottom: 15px">Une erreur est survenue</h3>
                                        <a href="{{ route('panier') }}" class="primary-btn">Revenir au panier</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Résultat de la transac --}}
                <div class="col-lg-5 offset-lg-1">
                    <div class="contact-title">
                        @if ($status == 'ACCEPTED')
                            <h2 style="font-weight: 900">Félicitations !</h2>
                            <p> <strong> {{ $paymentMsg }}.</strong> </p>
                            <hr>
                            <ul>
                                <li>
                                    <h4>Montant</h4>
                                    <p>{{ $amount . ' ' . $currency }}</p>
                                </li>
                                <li>
                                    <h4>Moyen de paiement</h4>
                                    <p>{{ $paymentMethod }}</p>
                                </li>
                            </ul>
                        @elseif ($status == 'REFUSED')
                            <h2 style="font-weight: 900">Echec de paiement</h2>
                            <p> <strong> {{ $paymentMsg }}.</strong> </p>
                            <hr>
                            <p>
                                Il y'a plusieurs raisons causant un échec de paiement: <br>
                                - Le montant de la transaction est incorrect<br>
                                - Le solde sur votre compte est insuffisant<br>
                                - Le numéro de carte de crédit est incorrect<br>
                                - Le numéro de carte de crédit est expiré<br>
                                et bien d'autres raisons...
                            </p>
                            <p>
                                Nous vous invitons à vérifier les informations de votre compte et réessayer.
                            </p>
                        @elseif ($status == 'SERVER_ERROR')
                            <h2 style="font-weight: 900">Erreur...</h2>
                            <p> <strong> {{ $paymentMsg }}.</strong> </p>
                            <hr>
                            <p>
                                Notre équipe d'administration a été informée de cette erreur et nous la règlerons dans
                                les plus brefs délais.
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- Contact du vendeur --}}
                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Nous Contacter</h4>
                        <p>
                            Nous sommes ravi de la confiance que vous nous accordez.
                            Vous pouvez nous contacter par téléphone ou par email pour toute question.
                        </p>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-instagram"></i>
                            </div>
                            <div class="ci-text">
                                <span>Instagram:</span>
                                <p>skinnythe_12</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Téléphone:</span>
                                <p>+4915110100130</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p>info@skinnythe.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Laisser un message --}}
                <div class="col-lg-6 offset-lg-1">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Laisser un message</h4>
                            <p>
                                Nous prendons toutes les précautions pour vous garantir la sécurité de vos informations.
                            </p>
                            <form action="#" class="comment-form" method="POST">
                                @csrf @method('POST')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input required name="nom_complet" type="text"
                                            placeholder="Votre nom complet">
                                    </div>
                                    <div class="col-lg-6">
                                        <input required name="email" type="email" placeholder="Votre adresse mail">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea required name="message" placeholder="Votre message"></textarea>
                                        <button type="submit" class="site-btn">Envoyer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Contact Section End -->



    <!-- Footer Section -->
    @include('includes.footer')
    <!-- Js Plugins -->
    @include('includes.js')


    <script>
        paypal.Buttons({

            // Sets up the transaction when a payment button is clicked
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '0.01' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                        }
                    }]
                });
            },


            style: {

                layout: 'vertical',
                color: 'gold',
                shape: 'rect',
                label: 'paypal'
            },

            // Finalize the transaction after payer approval
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction ' + transaction.status + ': ' + transaction.id +
                        '\n\nSee console for all available details');

                    // When ready to go live, remove the alert and show a success message within this page. For example:
                    // var element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }

        }).render('#paypal-button-container');
    </script>


</body>

</html>
