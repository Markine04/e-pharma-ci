@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Paniers</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Tableau de bord</li>
                        <li class="breadcrumb-item active">Paniers</li>
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
                        <h4>Paniers
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
                                        <th>Actions</th>
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
                                    @foreach ($paniers as $items)
                                        <tr>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        {{-- <a class="dropdown-item"
                                                    href="{{ route('ordonnances.edit', ['id' => $items->id_ordonnance]) }}"><i
                                                        class="icon-base bx bx-edit-alt me-1"
                                                        style='color:rgba(0, 119, 255, 0.637);'></i> Modifier</a> --}}


                                                        <a class="dropdown-item" style="cursor: pointer;"
                                                            data-url="{{ route('commandes.delete', ['id' => $items->idpanier]) }}"
                                                            data-ajax-popup="true" data-size="md"
                                                            data-title="Supprimer l'ordonnance">
                                                            <i class="icon-base bx bx-trash me-1"
                                                                style='color:rgba(255, 0, 0, 0.637);'></i>
                                                            Supprimer
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a
                                                    href="{{ route('commandes.image', ['id' => $items->produit_id]) }}"target="_blank">
                                                    <img src="{{ asset('assets/images/produits/' . str_replace('"', '', str_replace('["', '', explode(',', DB::table('medicaments')->where('idmedicament', $items->produit_id)->get()[0]->images)[0]))) }}"
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
                                                {{ $items->quantite }}
                                            </td>
                                            <td>{{ $items->prix_unitaire }}</td>

                                            <td>

                                                @switch($items->statut)
                                                    @case('1')
                                                        <span class="badge rounded-pill badge-light-warning me-1"
                                                            style="cursor: pointer;"> En attente
                                                            de validation
                                                        </span>
                                                    @break

                                                    @case('2')
                                                        <span class="badge rounded-pill badge-light-success me-1"
                                                            >Produit Validé</span>
                                                    @break

                                                    @case('3')
                                                        <i class="si si-note" style="font-size: 15px;"></i>
                                                        <span class="badge rounded-pill badge-light-success me-1"> Prèt à livrer
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
