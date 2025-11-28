@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Categories de Medicaments</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Tableau de bord</li>
                        <li class="breadcrumb-item active">Categories de Medicaments</li>
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
                        <h4>Categories de Medicaments
                            <div class="ml-8" style="float: right">
                                    <a data-url="{{ route('categoriemedicaments.create') }}"
                                            class="btn btn-primary text-white" data-bs-toggle="modal" data-ajax-popup="true"
                                            data-size="md" data-title="Ajouter une Categorie de Medicament">
                                            <i class="si si-note" style="font-size: 15px;"></i>Ajouter une
                                    Categorie de Medicament</a>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive theme-scrollbar">
                            <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Libelle</th>
                                    <th>Description</th> 
                                    <th>Afficher app</th>
                                    <th>Statuts</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $items)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/categories/' . $items->image) }}"
                                                width="50px" height="50px" alt={{ $items->libelle }} />

                                        </td>
                                        <td>{{ $items->libelle }}</td>
                                        <td>{{ $items->description }}</td>
                                        <td>
                                            @switch($items->show_app)
                                                @case('1')
                                                    <span class="badge rounded-pill badge-light-success me-1">Oui</span>
                                                @break

                                                @case('')
                                                    <span class="badge rounded-pill badge-light-secondary me-1">Non</span>
                                                @break

                                                @default
                                            @endswitch
                                        </td>
                                        <td>
                                            @switch($items->statut)
                                                @case('1')
                                                    <span class="badge rounded-pill badge-light-success me-1">Active</span>
                                                @break

                                                @case('0')
                                                    <span class="badge rounded-pill badge-light-secondary me-1">Désactivé</span>
                                                @break

                                                @default
                                            @endswitch
                                        </td>
                                        <td>
                                            <ul class="action">
                                                    <li class="edit"> <a class="dropdown-item"
                                                        data-url="{{ route('categoriemedicaments.edit', ['id' => $items->idcategorie]) }}"data-bs-toggle="modal"
                                                        data-ajax-popup="true" data-size="md"
                                                        data-title="Modifier cette categorie" style="cursor: pointer"><i
                                                                class="icon-pencil-alt"></i></a>
                                                            </li>
                                                    <li class="delete"><a class="dropdown-item"
                                                        data-url="{{ route('categoriemedicaments.delete', ['id' => $items->idcategorie]) }}"data-bs-toggle="modal"
                                                        data-ajax-popup="true" data-size="md"
                                                        data-title="Supprimer cette categorie" style="cursor: pointer"><i class="icon-trash"></i></a>
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
