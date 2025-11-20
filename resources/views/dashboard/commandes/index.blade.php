    @extends('dashboard.layouts.master')
    @section('content')
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Commandes</h3>
                        <p class="text-subtitle text-muted">Liste des Commandes</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Commandes</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Bordered Table -->
            <section class="section">
                <!-- Bordered Table -->
                <div class="card">
                    <div class="me-auto container mt-5">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <h4>
                                    {{-- Commandes --}}
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
                                                            <button type="submit" class="btn btn-warning me-1"
                                                                style="cursor: pointer;"><i class="si si-note"
                                                                    style="font-size: 15px;"></i> En attente
                                                                de traitement </button>
                                                        </form>
                                                    @break

                                                    @case('en_traitement')
                                                        <form
                                                            action="{{ route('commandes.traiter', ['id' => $items->idcommande, 'statut' => 'en_traitement']) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-secondary me-1"
                                                                style="cursor: pointer;"><i class="si si-note"
                                                                    style="font-size: 15px;"></i> En cours
                                                                de traitement </button>
                                                        </form>
                                                    @break

                                                    @case('expediee')
                                                        <form
                                                            action="{{ route('commandes.traiter', ['id' => $items->idcommande, 'statut' => 'expediee']) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success me-1"
                                                                style="cursor: pointer;">En cours de livraison</button>
                                                        </form>
                                                    @break

                                                    @case('livree')
                                                        <form
                                                            action="{{ route('commandes.traiter', ['id' => $items->idcommande, 'statut' => 'livree']) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-info me-1"
                                                                style="cursor: pointer;">Livrée</button>
                                                        </form>
                                                    @break

                                                    @case('payee')
                                                        <form
                                                            action="{{ route('commandes.traiter', ['id' => $items->idcommande, 'statut' => 'payee']) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success me-1"
                                                                style="cursor: pointer;">Livré</button>
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
                <!--/ Bordered Table -->
                <nav aria-label="Page navigation" class="mt-3">
                    {!! $commandes->links('pagination::bootstrap-5') !!}
                </nav>
            </section>
        </div>
        <!-- / Content -->
    @endsection
