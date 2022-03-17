@extends('admin.layouts.admin-main')
@section('content')
    <div class="main-content">
        <div class="section">
            <div class="card">
                <div class="card-header table-card-header">
                    <h4>Liste des clients</h4>
                    <div class="table-card-action-btn">
                        <a href="{{ route('admin.pages.clients.create') }}" class="btn btn-primary"><i
                                class="fas fa-plus"></i> Ajouter un client</a>
                        <a href="{{ route('admin.pages.clients.etat') }}" class="btn btn-warning"
                            style="margin-left: 10px"><i class="fa fa-print"></i> Imprimer</a>
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
                            <tr class="no-wrap-line">
                                <th scope="col">No.</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Email</th>
                                <th scope="col">Ville</th>
                                <th scope="col">Commune</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{ $clients->search($client) + 1 }}</th>
                                    <td>{{ $client->nom }}</td>
                                    <td>{{ $client->prenom }}</td>
                                    <td>{{ $client->contact }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->ville }}</td>
                                    <td>{{ $client->commune }}</td>
                                    <td class="no-wrap-line">
                                        {{-- Bouton Modifier --}}
                                        <button
                                            onclick="window.location.replace('/dashboard/clients/edit/{{ $client->id }}')"
                                            class="btn btn-primary actions-btn"><i class="fa fa-edit"></i>
                                        </button>
                                        {{-- Bouton Supprimer --}}
                                        <button class="btn btn-danger"
                                            data-confirm="Etes-vous sûr(e) ?|Voulez vous vraiment supprimer le client <strong>{{ $client->nom . ' ' . $client->prenom }}</strong> ?"
                                            data-confirm-yes="window.location.replace('/dashboard/clients/delete/{{ $client->id }}');">
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
