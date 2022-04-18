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
                        <a href="{{ route('boutique') }}">Vérification</a>
                        <span>Panier</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form id="{{ $paymentForm['name'] }}" name="{{ $paymentForm['name'] }}"
                action="{{ $paymentForm['action'] }}" method="POST" class="checkout-form">
                @csrf @method('POST')
                <div class="row">
                    <div class="col-lg-6">
                        @if (!Auth::check())
                            <div class="checkout-content">
                                <a href="#" class="content-btn">Connectez vous </a>
                            </div>
                        @endif

                        <h4>Détails sur la facturation</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">Nom<span>*</span></label>
                                <input type="text" id="fir" value="{{ $user_info->nom }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Prenom<span>*</span></label>
                                <input type="text" id="last" value="{{ $user_info->prenom }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun-name">Nom de l'entreprise</label>
                                <input type="text" id="cun-name" value="SkinnyThé" disabled='true'
                                    style="font-weight:bold;">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Pays<span>*</span></label>
                                <input type="text" id="cun">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Adresse de la rue<span>*</span></label>
                                <input type="text" id="street" class="street-first">
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">Code postal</label>
                                <input type="text" id="zip">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Ville<span>*</span></label>
                                <input type="text" id="town">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email<span>*</span></label>
                                <input type="text" id="email" value="{{ $user_info->email }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Téléphone<span>*</span></label>
                                <input type="text" id="phone" value="{{ $user_info->contact }}">
                            </div>
                            @if (!Auth::check())
                                <div class="col-lg-12">
                                    <div class="create-item">
                                        <label for="acc-create">
                                            Create an account?
                                            <input type="checkbox" id="acc-create">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            @endif
                            {{-- Adding payment hidden fields --}}
                            <?= $paymentForm['fields'] ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Votre commande</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Produit <span>Total</span></li>

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
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn custom-pay-btn">Passer la
                                        commande</button>
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
