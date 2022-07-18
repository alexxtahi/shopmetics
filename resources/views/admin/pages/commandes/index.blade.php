@extends('admin.layouts.admin-main')
@section('content')
    <div class="main-content">
        <div class="section">
            <div class="card">
                <div class="card-header table-card-header">
                    <h4>Liste des commandes</h4>
                    <div class="table-card-action-btn">
                        <a href="{{ route('admin.pages.commandes.etat') }}" target="_blank" class="btn btn-warning"
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
                                <th scope="col">Code</th>
                                <th scope="col">Date</th>
                                <th scope="col">Statut</th>
                                <th scope="col">No. Client</th>
                                <th scope="col">Moyen de paiement</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commandes->sortBy('statut_cmd') as $commande)
                                <tr>

                                    <td>{{ $commande->id }}</td>
                                    <td>{{ $commande->code_cmd }}</td>
                                    <td>{{ $commande->date_cmd }}</td>
                                    <td>
                                        @php
                                            $temp = $commande->statut_cmd 
                                        @endphp

                                        @if ($temp == "validé" )
                                            <button 
                                                disabled="true" class="btn btn-success" >
                                                {{ $commande->statut_cmd }}
                                            </button>
                                        @else
                                            <button disabled="true" class="btn btn-danger">
                                               {{ $commande->statut_cmd }}
                                            </button> 
                                        @endif

                                    </td>
                                    <td>{{ $commande->id_client }}</td>
                                    <td>{{ $commande->id_myen_paiement }}</td>
                                    <td class="no-wrap-line">
                                        {{-- Bouton Modifier --}}
                                        <button
                                            onclick="window.location.replace('/dashboard/commandes/edit/{{ $commande->id }}')"
                                            class="btn btn-primary actions-btn"><i class="fa fa-edit"></i>
                                        </button>

                                        {{-- Bouton Supprimer --}}

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
