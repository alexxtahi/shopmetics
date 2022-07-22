@extends('admin.layouts.admin-main')
@section('content')
    <div class="main-content">
        <div class="section">
            <div class="card">
                <!-- En tête -->
                <div class="card-header table-card-header">
                    <h4>Etat de la commande</h4>
                    {{-- <div class="table-card-action-btn">
                        <a href="{{ route('dashboard') }}" class="btn btn-danger"><i class="fas fa-angle-left"></i>
                            Revenir</a>
                    </div> --}}
                </div>
                <!-- Corps -->
                <div class="card-body">
                    <form action="{{ url('/dashboard/commandes/update/' . $commandes->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- Infos commande --}}
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <!-- Client -->
                                <label>Client</label>
                                <input type="text" class="form-control"
                                    value="{{ $commandes->nom_client . ' ' . $commandes->prenom_client }}"
                                    disabled="true">
                            </div>
                            <!-- Code -->
                            <div class="form-group col-md-3">
                                <label>Code</label>
                                <input type="text" class="form-control" id="code_prod"
                                    value="{{ $commandes->code_cmd }}" disabled="true">
                            </div>
                            <!-- Statut -->
                            <div class="form-group col-md-6">
                                <label for="etat_cmd">Statut</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="etat_cmd">
                                    @foreach ($etats_cmd as $etat)
                                        <option value="{{ $etat }}"
                                            {{ $commandes->statut_cmd == $etat ? 'selected' : '' }}>
                                            {{ $etat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- Produits commandés --}}
                        <div class="card-body">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr class="no-wrap-line">
                                        <th scope="col">No.</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Designation</th>
                                        <th class="text-center" scope="col">Prix</th>
                                        <th class="text-center" scope="col">Quantité</th>
                                        <th class="text-right" scope="col">Montant</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prix_prod_cmd as $index => $produit)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td><img src="{{ asset($produit->produits->img_prod) }}" alt="none"></td>
                                            <td>{{ $produit->produits->designation }}</td>
                                            <td class="text-center">{{ $produit->prix_prod_actuel }}</td>
                                            <td class="text-center">{{ $produit->qte_cmd }}</td>
                                            <td class="text-right">{{ $produit->prix_prod_actuel * $produit->qte_cmd }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Actions -->
                            <div class="form-row form-footer">
                                <button type="submit" class="btn btn-info">
                                    <i class="fas fa-check"></i> Valider
                                </button>

                                <a href="{{ route('dashboard') }}" class="btn btn-danger text-white"
                                    style="margin-left: 10px;">
                                    <i class="fas fa-arrow-left"></i> Annuler
                                </a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
