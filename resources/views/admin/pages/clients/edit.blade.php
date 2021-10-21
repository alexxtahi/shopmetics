@extends('admin.layouts.admin-main')
@section('content')
<div class="main-content">
    <div class="section">
        <div class="card">
            <!-- En tête -->
            <div class="card-header table-card-header">
                <h4>Informations un produit</h4>
                <div class="table-card-action-btn">
                    <a href="{{ route('admin.pages.produits') }}" class="btn btn-danger"><i class="fas fa-angle-left"></i> Revenir</a>
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
                                <a href="{{ route('admin.pages.produits') }}">Cliquez ici</a> pour revenir à la liste.
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
                <form action="{{ url('/dashboard/produits/update/' . $produit->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-row">
                        <!-- Code -->
                        <div class="form-group col-md-3">
                            <label for="code_prod">Code *</label>
                            <input type="text" class="form-control" id="code_prod" name="code_prod" placeholder="Code du produit" value="{{ $produit->code_prod }}" required>
                        </div>
                        <!-- Désignation -->
                        <div class="form-group col-md-6">
                            <label for="designation">Désignation *</label>
                            <input type="text" class="form-control" id="designation" name="designation" placeholder="Désignation du produit" value="{{ $produit->designation }}" required>
                        </div>
                        <!-- Prix -->
                        <div class="form-group col-md-3">
                            <label for="prix_prod">Prix *</label>
                            <input type="number" class="form-control" id="prix_prod" name="prix_prod" placeholder="Prix du produit" value="{{ $produit->prix_prod }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- Catégorie -->
                        <div class="form-group col-md-3">
                            <label for="id_cat">Catégorie *</label>
                            <select class="form-control" id="id_cat" name="id_cat" required>
                                <option value="">-- Choisir --</option>
                                <!-- Charger les catégories depuis la bd -->
                                @foreach ($categories as $categorie)
                                    @if ($categorie->id === $produit->id_cat)
                                        <option value="{{ $categorie->id }}" selected>{{ $categorie->lib_cat }}</option>
                                    @else
                                        <option value="{{ $categorie->id }}">{{ $categorie->lib_cat }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <!-- Quantité -->
                        <div class="form-group col-md-3">
                            <label for="qte_prod">Quantité</label>
                            <input type="number" class="form-control" id="qte_prod" name="qte_prod" placeholder="Quantité du produit" value="{{ $produit->qte_prod }}">
                        </div>
                        <!-- Image -->
                        <div class="form-group col-md-6">
                            <label for="img_prod">Image</label>
                            <input type="file" class="form-control" id="img_prod" name="img_prod" value="{{ $produit->img_prod }}">
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Donnez une description à votre produit ici">
                            {{ $produit->description }}
                        </textarea>
                    </div>
                    <!-- Actions -->
                    <div class="form-row form-footer">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Valider</button>
                        <button type="reset" class="btn btn-danger" style="margin-left: 10px;"><i class="fas fa-eraser"></i> Effacer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
