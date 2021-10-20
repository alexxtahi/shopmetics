@extends('admin.layouts.admin-etat-basic')
@section('content')
<div class="section custom-section">
    <div class="row">
        <div class="card">
            <div class="card-header table-card-header">
                <h4>Liste des produits</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr class="no-wrap-line">
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
                            <th scope="row">{{ $produits->search($produit) + 1 }}</th>
                            <td>{{ $produit->code_prod }}</td>
                            <td>{{ $produit->designation }}</td>
                            <td>{{ $produit->lib_cat }}</td>
                            <td class="no-wrap-line">{{ number_format($produit->prix_prod, 0, ',', ' ') }}</td>
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

@section('script')
    <script>
        // Lancer l'impression de l'état
        imprimeEtat();
    </script>
@endsection
