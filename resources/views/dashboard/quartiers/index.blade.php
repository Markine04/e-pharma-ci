@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Quartiers</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Tableau de bord</li>
                        <li class="breadcrumb-item active">Quartiers</li>
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
                        <h4>Quartiers
                            <div class="ml-8" style="float: right">
                                <a data-url="{{ route('quartiers.create') }}" class="btn btn-primary text-white"
                                    data-bs-toggle="modal" data-ajax-popup="true" data-size="md"
                                    data-title="Ajouter un quartier">
                                    <i class="si si-note" style="font-size: 15px;"></i>Ajouter un
                                    quartier</a>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive theme-scrollbar">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Libelles</th>
                                        <th>Communes</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quartiers as $items)
                                        <tr>
                                            <td>{{ $items->nom }}</td>
                                            <td>
                                                {{ DB::table('communes')->where('idcommune', $items->id_commune)->get()[0]->name }}
                                            </td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"> <a
                                                            data-url="{{ route('quartiers.edit', ['id' => $items->idquartier]) }}"
                                                            class="dropdown-item" data-bs-toggle="modal"
                                                            data-ajax-popup="true" data-size="md"
                                                            data-title="Modifier ce quartier" style="cursor: pointer">
                                                                <i class="icon-pencil-alt"></i></a>
                                                    </li>
                                                    <li class="delete"><a
                                                            data-url="{{ route('quartiers.delete', ['id' => $items->idquartier]) }}"
                                                            class="dropdown-item" data-bs-toggle="modal"
                                                            data-url="{{ route('quartiers.delete', ['id' => $items->idquartier]) }}"data-bs-toggle="modal"
                                                            data-ajax-popup="true" data-size="md"
                                                            data-title="Supprimer ce quartier" style="cursor: pointer"><i
                                                                class="icon-trash"></i></a>
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
