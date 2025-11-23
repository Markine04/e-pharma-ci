@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Commandes</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Tableau de bord</li>
                        <li class="breadcrumb-item active">Commandes</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Commandes
                            {{-- <div class="ml-8" style="float: right">
                                <a href="{{ route('ordonnances.create') }}" class="btn btn-primary">Ajouter une
                                    Ordonnance</a>
                            </div> --}}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive theme-scrollbar">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Images</th>
                                        <th>Telephones</th>
                                        <th>Produits</th>
                                        <th>Quantités</th>
                                        <th>Montant</th>
                                        <th>Statuts</th>
                                        <th>Date enreg.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($commandes as $items)
                                        <tr>
                                            <td>
                                                <a
                                                    href="{{ route('commandes.image', ['id' => $items->produit_id]) }}"target="_blank">
                                                    <img src="{{ asset('storage/produits/' . str_replace('"', '', str_replace('["', '', explode(',', DB::table('medicaments')->where('idmedicament', $items->produit_id)->get()[0]->images)[0]))) }}"
                                                        alt="{{ DB::table('medicaments')->where('idmedicament', $items->produit_id)->value('nom') }}"
                                                        width="90px" height="70px">
                                                </a>
                                            </td>
                                            <td>{{ DB::table('users')->where('id', $items->user_id)->value('number') }}</td>
                                            <td>{{ DB::table('medicaments')->where('idmedicament', $items->produit_id)->value('nom') }}
                                                <br>
                                                Dosage:
                                                {{ DB::table('medicaments')->where('idmedicament', $items->produit_id)->value('dosage') }}
                                            </td>

                                            <td>
                                                {{ $items->quantite }} x {{ $items->prix_unitaire }}
                                            </td>
                                            <td>{{ $items->prix_unitaire * $items->quantite }}</td>

                                            <td>
                                                @switch($items->statut)
                                                    @case('en_attente')
                                                        <form
                                                            action="{{ route('commandes.traiter', ['id' => $items->idcommande, 'statut' => 'en_attente']) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning me-1"><i class="si si-note"
                                                                    style="font-size: 15px;"></i> En attente
                                                                de traitement </button>
                                                        </form>
                                                    @break

                                                    @case('en_traitement')
                                                        <form
                                                            action="{{ route('commandes.traiter', ['id' => $items->idcommande, 'statut' => 'en_traitement']) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-secondary me-1"><i class="si si-note"
                                                                    style="font-size: 15px;"></i> En cours
                                                                de traitement </button>
                                                        </form>
                                                    @break

                                                    @case('expediee')
                                                        <form
                                                            action="{{ route('commandes.traiter', ['id' => $items->idcommande, 'statut' => 'expediee']) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success me-1">En cours de livraison</button>
                                                        </form>
                                                    @break

                                                    @case('livree')
                                                        <form
                                                            action="{{ route('commandes.traiter', ['id' => $items->idcommande, 'statut' => 'livree']) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-info me-1">Livrée</button>
                                                        </form>
                                                    @break

                                                    @case('payee')
                                                        <form
                                                            action="{{ route('commandes.traiter', ['id' => $items->idcommande, 'statut' => 'payee']) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success me-1">Livré</button>
                                                        </form>
                                                    @break

                                                    {{-- @case('annulee')

                                            <form action="{{route('commandes.traiter',['id'=>$items->idcommande, 'statut'=>'livree'])}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger me-1" style="cursor: pointer;">Annulée</button>
                                            </form>
                                            @break --}}
                                                    @case('expediee')
                                                        <i class="si si-note" style="font-size: 15px;"></i>
                                                        <span class="btn btn-success me-1"> Prèt à livrer
                                                        </span>
                                                    @break

                                                    @default
                                                @endswitch

                                            </td>

                                            <td>{{ date('d-m-Y H:s:i', strtotime($items->created_at)) }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                             </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Zero Configuration  Ends-->
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection
