@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Pharmacies</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Tableau de bord</li>
                        <li class="breadcrumb-item active">Pharmacies</li>
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
                        <h4>Pharmacies

                            <div class="ml-8" style="float: right">
                                <a href="{{ route('pharmacies-gardes.index') }}" class="btn btn-secondary">Programme des
                                    pharmacies de gardes</a> &nbsp;&nbsp;

                                <a data-url="{{ route('pharmacies.create') }}" class="btn btn-primary text-white"
                                    data-bs-toggle="modal" data-ajax-popup="true" data-size="lg"
                                    data-title="Ajouter une pharmacie">
                                    <i class="si si-note" style="font-size: 15px;"></i>Ajouter une
                                    pharmacie</a>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive theme-scrollbar">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Actions</th>
                                        <th>Images</th>
                                        <th>Libelles</th>
                                        <th>Adresses</th>
                                        <th>Telephones</th>
                                        <th>Communes</th>
                                        <th>Quartiers</th>
                                        <th>Statuts</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pharmacies as $items)
                                        <tr>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"> <a class="dropdown-item"
                                                            data-url="{{ route('pharmacies.edit', ['id' => $items->idpharmacie]) }}"data-bs-toggle="modal"
                                                            data-ajax-popup="true" data-size="lg"
                                                            data-title="Modifier cette pharmacie" style="cursor: pointer"><i
                                                                class="icon-pencil-alt"></i></a>
                                                    </li>
                                                    <li class="delete"><a class="dropdown-item"
                                                            data-url="{{ route('pharmacies.delete', ['id' => $items->idpharmacie]) }}"data-bs-toggle="modal"
                                                            data-ajax-popup="true" data-size="md"
                                                            data-title="Supprimer cette pharmacie"
                                                            style="cursor: pointer"><i class="icon-trash"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                @if ($items->images == null)
                                                    <img src="{{ asset('assets/logo/logoSiha.png') }}"
                                                        alt="{{ $items->name }}" width="90px" height="70px">
                                                @else
                                                    <img src="{{ asset('storage/pharmacies/' . $items->images) }}"
                                                        alt="{{ $items->name }}" width="90px" height="70px">
                                                @endif

                                            </td>
                                            <td>{{ $items->name }}</td>
                                            <td>
                                                {{ $items->address }}
                                            </td>
                                            <td>{{ $items->phone }}</td>
                                            <td>
                                                {{ DB::table('communes')->where('idcommune', $items->commune_id)->get()[0]->name }}
                                            </td>

                                            @if ($items->quartier_id == null)
                                                <td></td>
                                            @else
                                                <td>
                                                    {{ DB::table('quartiers')->where('idquartier', $items->quartier_id)->get()[0]->nom }}
                                                </td>
                                            @endif

                                            <td>
                                                <span class="badge rounded-pill badge-light-primary me-1">Active</span>
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
