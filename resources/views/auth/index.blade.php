@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Utilisateurs</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Tableau de bord</li>
                        <li class="breadcrumb-item active">Utilisateurs</li>
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
                        <h4>Utilisateurs
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive theme-scrollbar">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Telephone</th>
                                        <th>Communes</th>
                                        <th>Type Assurance</th>
                                        <th>Opt</th>
                                        <th>Statuts</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $items)
                                        <tr>
                                            <td>
                                                <span>{{ $items->number }}</span>
                                            </td>
                                            <td>
                                                @if ($items->id_commune != null)
                                                    {{ DB::table('communes')->where('idcommune', $items->id_commune)->get()[0]->name }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($items->assurance_id != null)
                                                    {{ DB::table('assurances')->where('id_assurance', $items->assurance_id)->get()[0]->libelle_carte }}
                                                @endif
                                            </td>
                                            <td>
                                                <span>{{ $items->otp }}</span>
                                            </td>
                                            <td>
                                                @switch($items->otp_valid)
                                                    @case('2')
                                                        <span class="badge rounded-pill badge-light-success me-1">Active</span>
                                                    @break

                                                    @case('1')
                                                        <span class="badge rounded-pill badge-light-secondary me-1">Désactivé</span>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                            <td>
                                                <ul class="action">
                                                    <li class="show"> <a
                                                            data-url="{{ route('assurance.cartAssurance', ['id' => $items->id]) }}"
                                                            class="dropdown-item" data-bs-toggle="modal"
                                                            data-ajax-popup="true" data-size="lg"
                                                            data-title="voir les cartes assurance" style="cursor: pointer"><i
                                                                class="icon-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li class="edit"> <a href="#"><i
                                                                class="icon-pencil-alt"></i></a></li>
                                                    <li class="delete"><a href="#"><i class="icon-trash"></i></a>
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
