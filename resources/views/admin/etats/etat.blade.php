@extends('admin.layouts.admin-etat-basic')
@section('content')
    <div class="section custom-section">
        <div class="row">
            <div class="card">
                <div class="card-header table-card-header">
                    <h4>Liste des {{ $title }}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr class="no-wrap-line">
                                <th scope="col">No.</th>
                                @foreach ($thead as $th)
                                    <th scope="col">{{ $th }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @include($tbody, [$records])
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
