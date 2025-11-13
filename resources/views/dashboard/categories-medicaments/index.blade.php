@extends('dashboard.layout-dashboard.master')
@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    {{-- <script>
        $(document).ready(function () {
            $('#example').DataTable({
            paging: false,
            searching: false,
            info: false,
            pagingType: "full_numbers",
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                // info: "",
                // topStart: 'pageLength',
                ordering: false,
                // pagingType: "full_numbers",

                layout: {
                    // topStart: 'pageLength',
                    topEnd: 'search',
                    bottomStart: 'info',
                    bottomEnd: 'paging',

                }
            });
        });
    </script>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Bordered Table -->
        <div class="card">
            <div class="navbar-nav me-auto container mt-5">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <h4>Catégories medicaments
                            <div class="ml-8" style="float: right">
                                <a data-url="{{ route('categoriemedicaments.create') }}" class="btn btn-primary text-white"
                                    data-bs-toggle="modal" data-ajax-popup="true" data-size="md"
                                    data-title="Ajouter une categories">
                                    <i class="si si-note" style="font-size: 15px;"></i>Ajouter une
                                    categorie</a>
                            </div>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="cell-border table table-bordered" aria-label="Page navigation">
                        <thead>
                            <tr>
                                <th>Images</th>
                                <th>Libelle</th>
                                <th>Description</th>
                                <th>Statuts</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $items)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/assets/images/categories/' . $items->image) }}" width="50px"
                                            height="50px" alt={{ $items->libelle }} />

                                    </td>
                                    <td>{{ $items->libelle }}</td>
                                    <td>{{ $items->description }}</td>
                                    <td>
                                        @switch($items->statut)
                                            @case('1')
                                                <span class="badge bg-label-success me-1">Active</span>
                                            @break

                                            @case('0')
                                                <span class="badge bg-label-secondary me-1">Désactivé</span>
                                            @break

                                            @default
                                        @endswitch
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" data-url="{{ route('categoriemedicaments.edit', ['id'=>$items->idcategorie]) }}"data-bs-toggle="modal"
                                                    data-ajax-popup="true" data-size="md"
                                                    data-title="modifier cette categorie" style="cursor: pointer">
                                                    <i class="icon-base bx bx-edit-alt me-1"></i> Modifier</a>

                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="icon-base bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Bordered Table -->
        {{-- <nav aria-label="Page navigation" class="mt-3">
            {!! $categories->links('pagination::bootstrap-5') !!}
        </nav> --}}

    </div>
    <!-- / Content -->
@endsection


{{-- <script>
    $(document).ready(function () {
            $('#example').DataTable();
        });
</script> --}}
