@extends('admin.layouts.admin-main')
@section('content')
    <div class="main-content">
        <div class="section">
            <div class="card">
                <!-- En tête -->
                <div class="card-header table-card-header">
                    <h4>Ajouter un client</h4>
                    <div class="table-card-action-btn">
                        <a href="{{ route('admin.pages.clients') }}" class="btn btn-danger"><i
                                class="fas fa-angle-left"></i> Revenir</a>
                    </div>
                </div>
                <!-- Corps -->
                <div class="card-body">
                    <!-- Message après opération -->
                    @if (isset($result) && !empty($result))
                        @switch($result['state'])
                            @case('success')
                                <div class="alert alert-success" role="alert">
                                    {{ $result['message'] }}
                                    <a href="{{ route('admin.pages.clients') }}">Cliquez ici</a> pour revenir à la liste.
                                </div>
                            @break

                            @case('warning')
                                <div class="alert alert-warning" role="alert">
                                    {{ $result['message'] }}
                                </div>
                            @break

                            @case('error')
                                <div class="alert alert-danger" role="alert">
                                    {{ $result['message'] }}
                                </div>
                            @break

                            @default
                            @break
                        @endswitch
                    @endif
                    <form action="{{ route('admin.pages.clients.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <!-- Nom -->
                            <div class="form-group col-md-6">
                                <label for="nom">Nom *</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom du client"
                                    required>
                            </div>
                            <!-- Prénom -->
                            <div class="form-group col-md-6">
                                <label for="prenom">Prénom *</label>
                                <input type="text" class="form-control" id="prenom" name="prenom"
                                    placeholder="Prénom du client" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <!-- Contact -->
                            <div class="form-group col-md-4">
                                <label for="contact">Contact</label>
                                <input type="tel" class="form-control" id="contact" name="contact"
                                    placeholder="Contact du client (Avec indicatif du pays)">
                            </div>
                            <!-- Adresse mail -->
                            <div class="form-group col-md-4">
                                <label for="email">Adresse mail *</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Adresse mail du client" required>
                            </div>
                            <!-- Mot de passe -->
                            <div class="form-group col-md-4">
                                <label for="password">Mot de passe *</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Mot de passe du client" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <!-- Ville -->
                            <div class="form-group col-md-6">
                                <label for="ville">Ville *</label>
                                <input type="text" class="form-control" id="ville" name="ville"
                                    placeholder="Ville du client" required>
                            </div>
                            <!-- Commune -->
                            <div class="form-group col-md-6">
                                <label for="commune">Commune *</label>
                                <input type="text" class="form-control" id="commune" name="commune"
                                    placeholder="Commune du client" required>
                            </div>
                        </div>
                        <!-- Actions -->
                        <div class="form-row form-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check"></i> Valider
                            </button>
                            <button type="reset" class="btn btn-danger" style="margin-left: 10px;">
                                <i class="fas fa-eraser"></i> Effacer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
