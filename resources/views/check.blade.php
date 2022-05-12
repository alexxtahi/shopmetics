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
                        <a href="{{ route('panier') }}">Panier</a>
                        <span>Commande</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            {{-- <form action="{{ route('payment') }}" method="POST" class="checkout-form">
                @csrf @method('POST') --}}
            <form class="checkout-form">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Détails sur la facturation</h4>
                        {{-- Nom & Prénom --}}
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="nom">Nom <span>*</span></label>
                                <input required type="text" name="nom" id="nom" value="{{ $user_info->nom }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="prenom">Prenom <span>*</span></label>
                                <input required type="text" name="prenom" id="prenom"
                                    value="{{ $user_info->prenom }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="pays">Pays <span>*</span></label>
                                <input required type="text" name="pays" id="pays" value="Côte d'ivoire"
                                    placeholder="Ex: Côte d'ivoire">
                            </div>
                            <div class="col-lg-12">
                                <label for="ville">Ville <span>*</span></label>
                                <input required type="text" name="ville" id="ville" value="Abidjan">
                            </div>
                        </div>
                        {{-- Email & Téléphone --}}
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="email">Email <span>*</span></label>
                                <input required type="email" name="email" id="email" value="{{ $user_info->email }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="telephone">Téléphone <span>*</span></label>
                                <input required type="text" name="telephone" id="telephone" value="0584649825"
                                    placeholder="Ex: +225 0102030405">
                                {{-- value="{{ $user_info->contact }}" placeholder="Ex: +225 0102030405"> --}}
                            </div>
                        </div>
                        {{-- Adresse & Code postal --}}
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="adresse">Adresse <span>*</span></label>
                                <input required type="text" name="adresse" id="adresse" value="Yopougon, Cité verte"
                                    placeholder="Ex: Cocody, Riviera 2" class="street-first">
                            </div>
                            <div class="col-lg-6">
                                <label for="code_postal">Code postal</label>
                                <input type="text" id="code_postal">
                            </div>

                        </div>

                    </div>
                    {{-- Volet droit --}}
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Votre commande</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Produit<span>Total</span></li>

                                    @php
                                        $total = 0;
                                    @endphp

                                    @forelse ($cart as $item)
                                        <li class="fw-normal">
                                            {{ $item->produits->designation }} x {{ $item->qt_prod }}
                                            <span>
                                                {{ number_format($item->produits->prix_prod * $item->qt_prod, 0, ',', ' ') }}
                                                FCFA
                                            </span>
                                        </li>
                                        @php
                                            $total += $item->produits->prix_prod * $item->qt_prod;
                                        @endphp
                                    @empty
                                        <p>Aucun produit</p>
                                    @endforelse

                                    <!--<li class="fw-normal">Subtotal <span>{ number_format($total, 0, ',', ' ') }} FCFA (HT)</span></li>-->
                                    <li class="total-price">Total <span>{{ number_format($total, 0, ',', ' ') }}
                                            FCFA (TTC)</span></li>
                                </ul>
                                <!--<div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Cheque Payment
                                            <input type="checkbox" id="pc-check">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Paypal
                                            <input type="checkbox" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>-->
                                {{-- Bouton de paiement --}}
                                {{-- {{ $paymentForm['btn'] }} --}}
                                {{-- Champ caché du montant total --}}
                                <input type="hidden" name="montant_total" value="{{ $total }}">
                                <div class="order-btn">
                                    <button class="site-btn place-btn custom-pay-btn">
                                        Passer la commande
                                    </button>
                                    <div class="paiement" id="paypal-button-container"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->



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
