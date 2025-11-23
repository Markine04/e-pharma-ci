@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Date Pharmacie Gardes</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Tableau de bord</li>
                        <li class="breadcrumb-item active">Date Pharmacie Gardes</li>
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
                        <h4>Date Pharmacie Gardes
                            <div class="ml-8" style="float: right">
                                <a data-url="{{ route('datephciegardes.create') }}" class="btn btn-primary text-white"
                                    data-bs-toggle="modal" data-ajax-popup="true" data-size="md"
                                    data-title="Ajouter une Date Pharmacie Garde">
                                    <i class="si si-note" style="font-size: 15px;"></i>Ajouter une
                                    Date Pharmacie Garde</a>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive theme-scrollbar">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Date debut</th>
                                        <th>Date fin</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datePhcieGarde as $items)
                                        <tr>
                                            <td>{{ date('d-m-Y', strtotime($items->date_debut)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($items->date_fin)) }}</td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit">
                                                        <a data-url="{{ route('datephciegardes.edit', ['id' => $items->idatephciegardes]) }}"
                                                            data-bs-toggle="modal" data-ajax-popup="true" data-size="md"
                                                            data-title="Modifier cette Date Pharmacie Garde"
                                                            style="cursor: pointer;"><i class="icon-pencil-alt"
                                                                style="font-size: 22px;"></i></a>
                                                    </li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <li class="delete">
                                                        <a data-url="{{ route('datephciegardes.delete', ['id' => $items->idatephciegardes]) }}"
                                                            data-bs-toggle="modal" data-ajax-popup="true" data-size="md"
                                                            data-title="Supprimer cette Date Pharmacie Garde"
                                                            style="cursor: pointer;"><i class="icon-trash"
                                                                style="font-size: 22px;"></i></a>
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
<script>
    $(document).ready(function() {
        $('#basic-1').DataTable({
            "ordering": false,
        });

    });

    // new DataTable('#basic-1', {
    //     ordering: false
    // });
</script>
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection
