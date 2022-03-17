@extends('admin.layouts.admin-main')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">Commandes -
                                <div class="dropdown d-inline">
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
                                </div>
                            </div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $commandes->count() }}</div>
                                    <div class="card-stats-item-label">Attente</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $commandes->count() }}</div>
                                    <div class="card-stats-item-label">Livraison</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $commandes->count() }}</div>
                                    <div class="card-stats-item-label">Terminé</div>
                                </div>
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
                        <div class="card-chart">
                            <canvas id="balance-chart" height="80"></canvas>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Solde</h4>
                            </div>
                            <div class="card-body">
                                0 FCFA
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
                                0
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Top 5 des produits -->
                <div class="col-lg-5">
                    <div class="card gradient-bottom">
                        <div class="card-header">
                            <h4>Top 5 des produits</h4>
                            <div class="card-header-action dropdown">
                                <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
                                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <li class="dropdown-title">Select Period</li>
                                    <li><a href="#" class="dropdown-item">Today</a></li>
                                    <li><a href="#" class="dropdown-item">Week</a></li>
                                    <li><a href="#" class="dropdown-item active">Month</a></li>
                                    <li><a href="#" class="dropdown-item">This Year</a></li>
                                </ul>
                            </div>
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
                <!-- les meilleurs produits -->
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
            </div>
            <!--
                                                                                                      <div class="row">
                                                                                                        <div class="col-md-6">
                                                                                                          <div class="card">
                                                                                                            <div class="card-header">
                                                                                                              <h4>Ventes par quartier</h4>
                                                                                                            </div>
                                                                                                            <div class="card-body">
                                                                                                              <div class="row">
                                                                                                                <div class="col-sm-6">
                                                                                                                  <div class="text-title mb-2">{{ date('F', strtotime('-1 month')) }}</div>
                                                                                                                  <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                                                                                                    <li class="media">
                                                                                                                      <img class="img-fluid mt-1 img-shadow" src="{{ asset('stisla/node_modules/flag-icon-css/flags/4x3/id.svg') }}" alt="image" width="40">
                                                                                                                      <div class="media-body ml-3">
                                                                                                                        <div class="media-title">Indonesia</div>
                                                                                                                        <div class="text-small text-muted">3,282 <i class="fas fa-caret-down text-danger"></i></div>
                                                                                                                      </div>
                                                                                                                    </li>
                                                                                                                    <li class="media">
                                                                                                                      <img class="img-fluid mt-1 img-shadow" src="{{ asset('stisla/node_modules/flag-icon-css/flags/4x3/my.svg') }}" alt="image" width="40">
                                                                                                                      <div class="media-body ml-3">
                                                                                                                        <div class="media-title">Malaysia</div>
                                                                                                                        <div class="text-small text-muted">2,976 <i class="fas fa-caret-down text-danger"></i></div>
                                                                                                                      </div>
                                                                                                                    </li>
                                                                                                                    <li class="media">
                                                                                                                      <img class="img-fluid mt-1 img-shadow" src="{{ asset('stisla/node_modules/flag-icon-css/flags/4x3/us.svg') }}" alt="image" width="40">
                                                                                                                      <div class="media-body ml-3">
                                                                                                                        <div class="media-title">United States</div>
                                                                                                                        <div class="text-small text-muted">1,576 <i class="fas fa-caret-up text-success"></i></div>
                                                                                                                      </div>
                                                                                                                    </li>
                                                                                                                  </ul>
                                                                                                                </div>
                                                                                                                <div class="col-sm-6 mt-sm-0 mt-4">
                                                                                                                  <div class="text-title mb-2">{{ date('F') }}</div>
                                                                                                                  <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                                                                                                    <li class="media">
                                                                                                                      <img class="img-fluid mt-1 img-shadow" src="{{ asset('stisla/node_modules/flag-icon-css/flags/4x3/id.svg') }}" alt="image" width="40">
                                                                                                                      <div class="media-body ml-3">
                                                                                                                        <div class="media-title">Indonesia</div>
                                                                                                                        <div class="text-small text-muted">3,486 <i class="fas fa-caret-up text-success"></i></div>
                                                                                                                      </div>
                                                                                                                    </li>
                                                                                                                    <li class="media">
                                                                                                                      <img class="img-fluid mt-1 img-shadow" src="{{ asset('stisla/node_modules/flag-icon-css/flags/4x3/ps.svg') }}" alt="image" width="40">
                                                                                                                      <div class="media-body ml-3">
                                                                                                                        <div class="media-title">Palestine</div>
                                                                                                                        <div class="text-small text-muted">3,182 <i class="fas fa-caret-up text-success"></i></div>
                                                                                                                      </div>
                                                                                                                    </li>
                                                                                                                    <li class="media">
                                                                                                                      <img class="img-fluid mt-1 img-shadow" src="{{ asset('stisla/node_modules/flag-icon-css/flags/4x3/de.svg') }}" alt="image" width="40">
                                                                                                                      <div class="media-body ml-3">
                                                                                                                        <div class="media-title">Germany</div>
                                                                                                                        <div class="text-small text-muted">2,317 <i class="fas fa-caret-down text-danger"></i></div>
                                                                                                                      </div>
                                                                                                                    </li>
                                                                                                                  </ul>
                                                                                                                </div>
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
                                <a href="#" class="btn btn-danger">Voir plus <i class="fas fa-chevron-right"></i></a>
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
                                                    <td class="font-weight-600">{{ $commande->nom_client }}</td>
                                                    @if ($commande->statut_cmd == 'En attente')
                                                        <td>
                                                            <div class="badge badge-warning">{{ $commande->statut_cmd }}
                                                            </div>
                                                        </td>
                                                    @elseif ($commande->statut_cmd == 'Terminée')
                                                        <td>
                                                            <div class="badge badge-success">{{ $commande->statut_cmd }}
                                                            </div>
                                                        </td>
                                                    @elseif ($commande->statut_cmd == 'Annulée')
                                                        <td>
                                                            <div class="badge badge-danger">{{ $commande->statut_cmd }}
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td>{{ $commande->date_cmd }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary">Détails</a>
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
