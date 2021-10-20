@extends('admin.layouts.admin-main')
@section('content')
<div class="main-content">
    <div class="section">
        <div class="card">
            <div class="card-header">
                <h4>Liste des produits</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Code</th>
                            <th scope="col">Désignation</th>
                            <th scope="col">Catégorie</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Qté</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $produit->code_prod }}</td>
                            <td>{{ $produit->designation }}</td>
                            <td>{{ $produit->lib_cat }}</td>
                            <td style="white-space: nowrap;">{{ number_format($produit->prix_prod, 0, ',', ' ') }}</td>
                            <td>{{ $produit->qte_prod }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
