@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Medicaments</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Tableau de bord</li>
                        <li class="breadcrumb-item active">Medicaments</li>
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

                        <h4>
                            Liste des medicaments
                            {{-- Medicaments --}}
                            <div class="ml-8" style="float: right">
                                <a href="{{ route('medicaments.create') }}" class="btn btn-primary">Ajouter un
                                    medicament
                                </a>
                            </div>

                        </h4>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive theme-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Libelle</th>
                                            <th>Dosage</th>
                                            <th>Forme Galenique</th>
                                            <th>Categories</th>
                                            <th>Ordonnances</th>
                                            {{-- <th>Status</th> --}}
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($medicaments as $items)
                                            <tr>
                                                <td>
                                                    <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                                                        @foreach (json_decode($items->images) as $image)
                                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                                title="{{ $items->nom }}">
                                                                <img src="{{ asset('storage/produits/' . $image) }}"
                                                                    alt="Avatar" class="rounded-circle" width="50px" height="45px" />
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    <span>{{ $items->nom }}</span>
                                                </td>
                                                <td>{{ $items->dosage }}</td>
                                                <td>
                                                    {{ DB::table('forme_galeniques')->where('id_formegalenique', $items->forme_galenique)->get()[0]->libelle }}
                                                </td>
                                                <td>
                                                    @foreach (json_decode($items->categorie_id) as $categori)
                                                        {{ DB::table('categories')->where('idcategorie', $categori)->get()[0]->libelle }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @switch($items->besoin_ordonnance)
                                                        @case('1')
                                                            <span class="badge rounded-pill badge-light-danger me-1">Besoin
                                                                d'ordonnance</span>
                                                        @break

                                                        @case('0')
                                                            <span class="badge rounded-pill badge-light-success">Pas besoin
                                                                d'ordonnance</span>
                                                        @break
                                                        @case('')
                                                            <span class="badge rounded-pill badge-light-success">Pas besoin
                                                                d'ordonnance</span>
                                                        @break

                                                        @default
                                                    @endswitch
                                                </td>
                                                <td>
                                                    <ul class="action">
                                                        <li class="edit"> <a href="{{route('medicaments.edit', ['id' => $items->idmedicament])}}"><i
                                                                    class="icon-pencil-alt" style="font-size: 25px"></i></a></li>
                                                        <li class="delete"><a href="#"><i class="icon-trash" style="font-size: 25px"></i></a>
                                                        </li>
                                                    </ul>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection
