@extends('admin.layouts.admin-main')
@section('content')
    <div class="main-content" id="main-content">
        <div class="section">
            <div class="row">
                <!-- Formulaire d'ajout -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <!-- En tête -->
                        <div class="card-header table-card-header">
                            <h4>Ajouter un moyen de paiement</h4>
                            <!-- Actions -->
                            <div class="form-row form-footer">
                                <button form="add-form" type="submit" class="btn btn-primary">
                                    <i class="fas fa-check"></i> Valider
                                </button>
                                <button form="add-form" type="reset" class="btn btn-danger" style="margin-left: 10px;">
                                    <i class="fas fa-eraser"></i> Effacer
                                </button>
                            </div>
                        </div>
                        <!-- Corps -->
                        <div class="card-body">
                            <!-- Message après opération -->
                            @if (isset($result) && !empty($result) && $result['type'] === 'add-form')
                                @switch($result['state'])
                                    @case('success')
                                        <div class="alert alert-success" role="alert">
                                            {{ $result['message'] }}
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
                                @endswitch
                            @endif
                            <form id="add-form" action="{{ route('admin.pages.moyen-paiements.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <!-- Libelle -->
                                    <div class="form-group col-md-12">
                                        <label for="lib_moyen_paiement">Libellé *</label>
                                        <input type="text" class="form-control" id="lib_moyen_paiement"
                                            name="lib_moyen_paiement" placeholder="Libellé de la catégorie" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Formulaire de modification -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <!-- En tête -->
                        <div class="card-header table-card-header">
                            <h4>Modifier un moyen de paiement</h4>
                            <!-- Actions -->
                            <div class="form-row form-footer">
                                <button id="validate-btn" form="edit-form" type="submit" class="btn btn-primary" disabled><i
                                        class="fas fa-check"></i> Valider</button>
                                <button id="erase-btn" form="edit-form" type="reset" class="btn btn-danger"
                                    style="margin-left: 10px;" disabled><i class="fas fa-eraser"></i> Effacer</button>
                            </div>
                        </div>
                        <!-- Corps -->
                        <div class="card-body">
                            <!-- Message après opération -->
                            @if (isset($result) && !empty($result) && $result['type'] === 'edit-form')
                                @switch($result['state'])
                                    @case('success')
                                        <div class="alert alert-success" role="alert">
                                            {{ $result['message'] }}
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
                                @endswitch
                            @endif
                            <form id="edit-form" action="{{ url('/dashboard/categories/update/{lib_moyen_paiement}') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <!-- Ancien Libellé -->
                                    <div class="form-group col-md-6">
                                        <label for="old_lib_moyen_paiement">Ancien</label>
                                        <input type="text" class="form-control" id="old_lib_moyen_paiement"
                                            name="old_lib_moyen_paiement" placeholder="Ancien libellé" disabled required>
                                    </div>
                                    <!-- Nouveau libellé -->
                                    <div class="form-group col-md-6">
                                        <label for="new_lib_moyen_paiement">Nouveau</label>
                                        <input type="text" class="form-control" id="new_lib_moyen_paiement"
                                            name="new_lib_moyen_paiement" placeholder="Nouveau libellé" disabled required>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Liste des catégories -->
            <div class="card">
                <div class="card-header table-card-header">
                    <h4>Liste des catégories</h4>
                    <div class="table-card-action-btn">
                        <a href="{{ route('admin.pages.categories.etat') }}" class="btn btn-warning"><i
                                class="fa fa-print"></i> Imprimer</a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Message après opération -->
                    @if (isset($result) && !empty($result) && $result['type'] === 'table')
                        @switch($result['state'])
                            @case('success')
                                <div class="alert alert-success" role="alert">
                                    {{ $result['message'] }}
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
                        @endswitch
                    @endif
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr class="no-wrap-line">
                                <th class="text-center" style="width: 9.5%;" scope="col">No.</th>
                                <th scope="col">Catégorie</th>
                                <th class="text-center" style="width: 20%;" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $categorie)
                                <tr>
                                    <td>{{ $categories->search($categorie) + 1 }}</td>
                                    <td style="width: 100%;">{{ $categorie->lib_moyen_paiement }}</td>
                                    <td class="no-wrap-line">
                                        {{-- Bouton Modifier --}}
                                        <button onclick="launchEdit('{{ $categorie->lib_moyen_paiement }}')"
                                            class="btn btn-primary actions-btn">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        {{-- Bouton Supprimer --}}
                                        <button class="btn btn-danger"
                                            data-confirm="Etes-vous sûr(e) ?|Voulez vous vraiment supprimer la catégorie <strong>{{ $categorie->lib_moyen_paiement }}</strong> ?"
                                            data-confirm-yes="window.location.replace('/dashboard/categories/delete/{{ $categorie->id }}');">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
