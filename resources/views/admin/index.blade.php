@extends('admin.layouts.admin-main')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">Commandes
                                {{-- <div class="dropdown d-inline">
                                    <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#"
                                        id="orders-month">Août</a>
                                    <ul class="dropdown-menu dropdown-menu-sm">
                                        <li class="dropdown-title">Selectionner le mois</li>
                                        <li><a href="#" class="dropdown-item">Janvier</a></li>
                                        <li><a href="#" class="dropdown-item">Février</a></li>
                                        <li><a href="#" class="dropdown-item">Mars</a></li>
                                        <li><a href="#" class="dropdown-item">Avril</a></li>
                                        <li><a href="#" class="dropdown-item">Mai</a></li>
                                        <li><a href="#" class="dropdown-item">Juin</a></li>
                                        <li><a href="#" class="dropdown-item">Juillet</a></li>
                                        <li><a href="#" class="dropdown-item active">Août</a></li>
                                        <li><a href="#" class="dropdown-item">Septembre</a></li>
                                        <li><a href="#" class="dropdown-item">Octobre</a></li>
                                        <li><a href="#" class="dropdown-item">Novembre</a></li>
                                        <li><a href="#" class="dropdown-item">Décembre</a></li>
                                    </ul>
                                </div> --}}
                            </div>

                            @php
                                $total = 0;
                                $vente = 0;
                            @endphp

                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $commandesEncours->count() }}</div>
                                    <div class="card-stats-item-label">Attente</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $commandes->count() }}</div>
                                    <div class="card-stats-item-label">Livraison</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $commandesValidé->count() }}</div>
                                    <div class="card-stats-item-label">Terminé</div>
                                </div>
                                @forelse ($produitcommande as $solde)
                                    @php
                                        $total += $solde->qte_cmd * $solde->prix_prod_actuel;
                                        $vente += $solde->qte_cmd;
                                    @endphp
                                @empty
                                    @php
                                        $total = 0;
                                        $vente = 0;
                                    @endphp
                                @endforelse
                            </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-archive"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total des commandes</h4>
                            </div>
                            <div class="card-body">
                                {{ $commandes->count() }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">
                                Revenus (FCFA)
                            </div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $total }}</div>
                                    <div class="card-stats-item-label">Sur commande</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $vente }}</div>
                                    <div class="card-stats-item-label">Portefeuille</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $total-$vente }}</div>
                                    <div class="card-stats-item-label">Différence</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Solde</h4>
                            </div>
                            <div class="card-body">
                                {{ $total }} FCFA
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-chart">
                            <canvas id="sales-chart" height="80"></canvas>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Ventes</h4>
                            </div>
                            <div class="card-body">
                                {{ $vente }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                 Top 5 des produits ->
                <div class="col-lg-5">
                    <div class="card gradient-bottom">
                        <div class="card-header">
                            <h4>Top 5 des produits</h4>
                            {{-- <div class="card-header-action dropdown">
                                <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
                                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <li class="dropdown-title">Select Period</li>
                                    <li><a href="#" class="dropdown-item">Today</a></li>
                                    <li><a href="#" class="dropdown-item">Week</a></li>
                                    <li><a href="#" class="dropdown-item active">Month</a></li>
                                    <li><a href="#" class="dropdown-item">This Year</a></li>
                                </ul>
                            </div> --}}
                        </div>
                        <div class="card-body" id="top-5-scroll">
                            <ul class="list-unstyled list-unstyled-border">
                                @foreach ($top5Produits as $produit)
                                    <li class="media">
                                        <img class="mr-3 rounded" width="55"
                                            src="{{ asset('stisla/assets/img/products/product-3-50.png') }}"
                                            alt="product">
                                        <div class="media-body">
                                            <div class="float-right">
                                                <div class="font-weight-600 text-muted text-small">86 Sales</div>
                                            </div>
                                            <div class="media-title">{{ $produit->designation }}</div>
                                            <div class="mt-1">
                                                <div class="budget-price">
                                                    <div class="budget-price-square bg-primary" data-width="64%"></div>
                                                    <div class="budget-price-label">
                                                        {{ number_format($produit->prix_prod, 0, ',', ' ') }} FCFA</div>
                                                </div>
                                                <div class="budget-price">
                                                    <div class="budget-price-square bg-danger" data-width="43%"></div>
                                                    <div class="budget-price-label">
                                                        {{ number_format($produit->prix_prod, 0, ',', ' ') }} FCFA</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer pt-3 d-flex justify-content-center">
                            <div class="budget-price justify-content-center">
                                <div class="budget-price-square bg-primary" data-width="20"></div>
                                <div class="budget-price-label">Prix de vente</div>
                            </div>
                            <div class="budget-price justify-content-center">
                                <div class="budget-price-square bg-danger" data-width="20"></div>
                                <div class="budget-price-label">Prix d'achat</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- les meilleurs produits ->
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>Meilleurs Produits</h4>
                        </div>
                        <div class="card-body">
                            <div class="owl-carousel owl-theme best-products-div" id="products-carousel">
                                @foreach ($meilleursProduits as $produit)
                                    <div>
                                        <div class="product-item pb-3">
                                            <div class="product-image">
                                                <img alt="image"
                                                    src="{{ asset('stisla/assets/img/products/product-4-50.png') }}"
                                                    class="img-fluid">
                                            </div>
                                            <div class="product-details">
                                                <div class="product-name">{{ $produit->designation }}</div>
                                                <div class="product-review">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="text-muted text-small">67 Sales</div>
                                                <div class="product-cta">
                                                    <a href="#" class="btn btn-primary">Détails</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
                                                                                                                                                                                                                                                                               
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Actualité des commandes</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.pages.commandes') }}" class="btn btn-danger">Voir plus <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Client</th>
                                            <th>Statut</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (empty($commandes))
                                            <tr>
                                                <td colspan="5">Aucune commande pour le moment.</td>
                                            </tr>
                                        @else
                                            @foreach ($commandes as $commande)
                                                <tr>
                                                    <td><a href="#">{{ $commande->code_cmd }}</a></td>
                                                    <td class="font-weight-600">{{ $commande->id_client }}</td>
                                                    <td>
                                                        <button disabled="true" class="btn btn-danger" >
                                                            En cours
                                                        </button>
                                                    </td>
                                                    <td>{{ $commande->date_cmd }}</td>
                                                    <td>
                                                        <button
                                                            onclick="window.location.replace('/dashboard/commandes/edit/{{ $commande->id }}')"
                                                            class="btn btn-primary actions-btn"><i class="fa fa-edit"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-hero">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="far fa-question-circle"></i>
                            </div>
                            <h4>{{ $besoins->count() }}</h4>
                            <div class="card-description">Besoins des clients</div>
                        </div>
                        <div class="card-body p-0">
                            <div class="tickets-list">
                                <!-- Chargement des besoins -->
                                @foreach ($besoins as $besoin)
                                    <a href="#" class="ticket-item">
                                        <div class="ticket-title">
                                            <h4>{{ $besoin->titre }}</h4>
                                        </div>
                                        <div class="ticket-info">
                                            <div>Laila Tazkiah</div>
                                            <div class="bullet"></div>
                                            <div class="text-primary">1 min ago</div>
                                        </div>
                                    </a>
                                @endforeach
                                @if (!empty($besoins))
                                    <a href="features-tickets.html" class="ticket-item ticket-more">
                                        Voir tout <i class="fas fa-chevron-right"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
