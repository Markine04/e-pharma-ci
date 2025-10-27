@extends('dashboard.layout-dashboard.master')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Bordered Table -->
        <div class="card">
            <div class="me-auto container mt-5">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <h4>Commandes
                            <div class="ml-8" style="float: right">
                                <a href="{{ route('pharmacies.create') }}" class="btn btn-primary">Ajouter une
                                    Commande</a>
                            </div>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
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
                            @foreach ($commandes as $items)
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
                                        <a href="{{ route('commandes.image', ['id' => $items->produit_id]) }}"
                                            target="_blank">
                                            <img src="{{ asset('assets/images/produits/' . DB::table('medicaments')->where('idmedicament', $items->produit_id)->value('images'))[0] }}"
                                                alt="{{ DB::table('medicaments')->where('idmedicament', $items->produit_id)->value('nom') }}" width="90px" height="70px">
                                        </a>
                                    </td>
                                    <td>{{ DB::table('users')->where('id', $items->user_id)->value('number') }}</td>
                                    <td>{{ DB::table('medicaments')->where('idmedicament', $items->produit_id)->value('nom') }} <br>
                                        Dosage: {{ DB::table('medicaments')->where('idmedicament', $items->produit_id)->value('dosage') }}</td>
                                    
                                    <td>
                                        {{ $items->quantite }}
                                    </td>
                                    <td>{{ $items->prix_unitaire }}</td>
                                    
                                    <td>

                                        {{-- @switch($items->statut)
                                            @case('1')
                                                <a data-url="{{ route('ordonnances.traiter', ['id' => $items->id_ordonnance]) }}"
                                                    data-ajax-popup="true" data-size="md" data-title="Traiter l'ordonnance">
                                                    <i class="si si-note" style="font-size: 15px;"></i>
                                                    <span class="badge bg-label-warning me-1" style="cursor: pointer;"> En attente
                                                        de traitement
                                                    </span>
                                                </a>
                                            @break

                                            @case('2')
                                                <a data-url="{{ route('ordonnances.traiter', ['id' => $items->id_ordonnance]) }}"
                                                    data-ajax-popup="true" data-size="md" data-title="Traiter l'ordonnance">
                                                    <i class="si si-note" style="font-size: 15px;"></i>
                                                    <span class="badge bg-label-primary me-1" style="cursor: pointer;"> En cours de
                                                        traitement
                                                    </span>
                                                </a>
                                            @break

                                            @case('3')
                                                <i class="si si-note" style="font-size: 15px;"></i>
                                                <span class="badge bg-label-success me-1"> Prèt à livrer
                                                </span>
                                            @break

                                            @default
                                        @endswitch --}}

                                    </td>

                                    <td>{{ date('d-m-Y H:s:i', strtotime($items->created_at)) }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Bordered Table -->
        <nav aria-label="Page navigation" class="mt-3">
            {!! $commandes->links('pagination::bootstrap-5') !!}
        </nav>

    </div>
    <!-- / Content -->
@endsection
