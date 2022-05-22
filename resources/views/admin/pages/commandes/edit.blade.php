@extends('admin.layouts.admin-main')
@section('content')
<div class="main-content">
    <div class="section">
        <div class="card">
            <!-- En tête -->
            <div class="card-header table-card-header">
                <h4>Validation de la commande</h4>
                <div class="table-card-action-btn">
                    <a href="{{ route('admin.pages.commandes') }}" class="btn btn-danger"><i class="fas fa-angle-left"></i> Revenir</a>
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
                                <a href="{{ route('admin.pages.commandes') }}">Cliquez ici</a> pour revenir à la liste.
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
                <form action="{{ url('/dashboard/commandes/update/' . $commandes->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <!-- identifiant -->
                            <label for="code_prod">Identifiant </label>
                            <input type="text" class="form-control" value="{{$commandes->id}}" disabled="true" >
                        </div>
                        <!-- Code -->
                        <div class="form-group col-md-3">
                            <label for="code_prod">Code</label>
                            <input type="text" class="form-control" id="code_prod" value="{{$commandes->code_cmd}}" disabled="true">
                        </div>
                        <!-- Statut -->
                        <div class="form-group col-md-6">
                            @php
                                $status = "" ;
                                if ($commandes->statut_cmd == "validé"){
                                    $status = "en cours" ;
                                }
                                else{
                                    $status = "validé" ;
                                }
                            @endphp
                            <label for="designation">Statut</label>
                            <!--<input type="text" class="form-control" id="designation" name="designation"  value="{{$commandes->statut_cmd}}" >-->
                            <select class="form-control" id="exampleFormControlSelect1" name="state">
                                <option>{{$commandes->statut_cmd}}</option>
                                <option>
                                {{$status}}
                                </option>
 
                              </select>
                        </div>
                        
                    </div>

                </form>
                <div class="card-body">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr class="no-wrap-line">
                                <th scope="col">No.</th>
                                <th scope="col">Image</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Montant</th>
                            </tr>
                        </thead>

                        <tbody>
                          
                           
                            
                        </tbody>

                    </table>
                   
                    <!-- Actions -->
                    <div class="form-row form-footer">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Valider</button>
                        <button type="reset" class="btn btn-danger" style="margin-left: 10px;"><i class="fas fa-eraser"></i> Effacer</button>
                    </div>
               

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
