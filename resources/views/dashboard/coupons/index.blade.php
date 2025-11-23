@extends('layout.master')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Bordered Table -->
        <div class="card">
            <div class="me-auto container mt-5">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <h4>Coupons
                            <div class="ml-8" style="float: right">
                                <a href="{{ route('pharmacies.create') }}" class="btn btn-primary">Ajouter une
                                    coupon</a>
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
                                <th>Codes</th>
                                <th>Montant Reduct.</th>
                                <th>nbre utilisateur</th>
                                <th>Usage limite</th>
                                <th>date de validite</th>
                                <th>Statuts</th>
                                <th>Date enreg.</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $items)
                                <tr>
                                    <td>
                                        {{ $items->code }}
                                    </td>
                                    <td>
                                        {{-- {{ $items->montant_reduit }} --}}
                                    </td>
                                    <td>
                                        {{-- @if ($items->nbre_utilisateur == 0)
                                            <span class="badge bg-label-danger me-1">0</span> --}}
                                    </td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td>
                                        
                                    </td>
                                    <td></td>
                                    
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
            {!! $coupons->links('pagination::bootstrap-5') !!}
        </nav>

    </div>
    <!-- / Content -->
@endsection
