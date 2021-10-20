@extends('admin.layouts.admin-main')
@section('content')
<div class="main-content">
    <div class="section">
        <div class="card">
            <div class="card-header table-card-header">
                <h4>Liste des produits</h4>
                <div class="table-card-action-btn">
                    <a href="#" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter un produit</a>
                    <a href="#" class="btn btn-warning" style="margin-left: 10px"><i class="fa fa-print"></i> Imprimer</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped custom-table">
                    <thead>
                        <tr  class="no-wrap-line">
                            <th scope="col">No.</th>
                            <th scope="col">Code</th>
                            <th scope="col">Désignation</th>
                            <th scope="col">Catégorie</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Qté</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                        <tr>
                            <th scope="row">{{ $produits->search($produit) + 1 }}</th>
                            <td>{{ $produit->code_prod }}</td>
                            <td>{{ $produit->designation }}</td>
                            <td>{{ $produit->lib_cat }}</td>
                            <td class="no-wrap-line">{{ number_format($produit->prix_prod, 0, ',', ' ') }}</td>
                            <td>{{ $produit->qte_prod }}</td>
                            <td class="no-wrap-line">
                                <a href="#" class="btn btn-primary actions-btn"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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
