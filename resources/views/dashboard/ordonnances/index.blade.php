@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Ordonnances</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Tableau de bord</li>
                        <li class="breadcrumb-item active">Ordonnances</li>
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
                        <h4>Ordonnances
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
                                        <th>Note</th>
                                        <th>Carte Assurance</th>
                                        <th>Communes</th>
                                        <th>Statuts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordonnances as $items)
                                        <tr>
                                            <td>
                                                <ul class="action">
                                                    <li class="show"> <a
                                                            data-url="{{ route('ordonnances.show_cartAssurance', ['id' => $items->id_ordonnance]) }}"
                                                            class="dropdown-item" data-bs-toggle="modal"
                                                            data-ajax-popup="true" data-size="md"
                                                            data-title="voir la carte assurance" style="cursor: pointer">
                                                            <i class="icon-eyes-alt"></i></a>
                                                    </li>
                                                    <li class="edit"> <a
                                                            data-url="{{ route('ordonnances.edit', ['id' => $items->id_ordonnance]) }}"
                                                            class="dropdown-item" data-bs-toggle="modal"
                                                            data-ajax-popup="true" data-size="md"
                                                            data-title="Modifier cet ordonnance" style="cursor: pointer">
                                                            <i class="icon-pencil-alt"></i></a>
                                                    </li>
                                                    <li class="delete"><a
                                                            data-url="{{ route('ordonnances.delete', ['id' => $items->id_ordonnance]) }}"data-bs-toggle="modal"
                                                            data-ajax-popup="true" data-size="md"
                                                            data-title="Supprimer cet ordonnance" style="cursor: pointer"><i
                                                                class="icon-trash"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                <a href="{{ route('ordonnances.image', ['id' => $items->id_ordonnance]) }}"
                                                    target="_blank">
                                                    <img src="{{ asset('storage/ordonnances-clients/' . $items->image) }}"
                                                        alt="{{ $items->id_client }}" width="90px" height="70px">
                                                </a>
                                            </td>
                                            <td>
                                                {{ DB::table('users')->where('id', $items->id_client)->get()[0]->number }}
                                            </td>

                                            <td>{{ $items->note }}</td>

                                            @php
                                                $comm = DB::table('users')->where('id', $items->id_client)->get()[0]
                                                    ->id_commune;

                                                    $cartAssurance = DB::table('users')->where('id', $items->id_client)
                                                        ->get()[0]->image_assurance;
       
                                            @endphp

                                            <td>
                                                @if ($items->cartAssurance == 1)
                                                    <a href="{{ route('ordonnances.cartAssurance', ['id' => $items->id_ordonnance]) }}"
                                                        target="_blank">
                                                        <img src="{{ asset('storage/cartAssurance/' . $cartAssurance) }}"
                                                            alt="{{ $items->id_client }}" width="90px" height="70px">
                                                    </a>
                                                @endif
                                            </td>

                                            <td>{{ DB::table('communes')->where('idcommune', $comm)->get()[0]->name }}</td>


                                            <td>

                                                @switch($items->statut)
                                                    @case('1')
                                                        <a data-url="{{ route('ordonnances.traiter', ['id' => $items->id_ordonnance]) }}"
                                                            data-ajax-popup="true" data-size="md" data-title="Traiter l'ordonnance">
                                                            <i class="si si-note" style="font-size: 15px;"></i>
                                                            <span class="badge rounded-pill badge-light-warning me-1"
                                                                style="cursor: pointer;"> En
                                                                attente
                                                                de traitement
                                                            </span>
                                                        </a>
                                                    @break

                                                    @case('2')
                                                        <a data-url="{{ route('ordonnances.traiter', ['id' => $items->id_ordonnance]) }}"
                                                            data-ajax-popup="true" data-size="md" data-title="Traiter l'ordonnance">
                                                            <i class="si si-note" style="font-size: 15px;"></i>
                                                            <span class="badge rounded-pill badge-light-primary me-1"
                                                                style="cursor: pointer;"> En
                                                                cours de
                                                                traitement
                                                            </span>
                                                        </a>
                                                    @break

                                                    @case('3')
                                                        <i class="si si-note" style="font-size: 15px;"></i>
                                                        <span class="badge rounded-pill badge-light-success me-1"> Prèt à livrer
                                                        </span>
                                                    @break

                                                    @default
                                                @endswitch

                                            </td>

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
