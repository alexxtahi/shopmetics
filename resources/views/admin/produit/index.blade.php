@extends('admin.layouts.admin-main')
@section('content')
<div class="main-content">
    <div class="section">
        <div class="card">
            <div class="card-header table-card-header">
                <h4>Liste des produits</h4>
                <div class="table-card-action-btn">
                    <a href="{{ route('admin.produits.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter un produit</a>
                    <a href="{{ route('admin.produits.etat') }}" class="btn btn-warning" style="margin-left: 10px"><i class="fa fa-print"></i> Imprimer</a>
                </div>
            </div>
            <div class="card-body">
                <!-- Message après opération -->
                @if (isset($result) && !empty($result))
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
                                <a href="{{ url('/dashboard/produits/edit/' . $produit->id) }}" class="btn btn-primary actions-btn"><i class="fa fa-edit"></i></a>
                                <a href="{{ url('/dashboard/produits/delete/' . $produit->id) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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
