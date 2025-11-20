    @extends('dashboard.layouts.master')
    @section('content')
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Catégories medicaments</h3>
                        <p class="text-subtitle text-muted">Liste des catégories de medicaments</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Catégories medicaments</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Bordered Table -->
            <section class="section">
                <div class="card">
                    <div class="navbar-nav me-auto container mt-5">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                {{-- <h4>Catégories medicaments --}}
                                <div class="ml-8" style="float: right">
                                    <a data-url="{{ route('categoriemedicaments.create') }}"
                                        class="btn btn-primary text-white" data-bs-toggle="modal" data-ajax-popup="true"
                                        data-size="md" data-title="Ajouter une categories">
                                        <i class="si si-note" style="font-size: 15px;"></i>Ajouter une
                                        categorie</a>
                                </div>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
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
                                            <img src="{{ asset('/assets/images/categories/' . $items->image) }}"
                                                width="50px" height="50px" alt={{ $items->libelle }} />

                                        </td>
                                        <td>{{ $items->libelle }}</td>
                                        <td>{{ $items->description }}</td>
                                        <td>
                                            @switch($items->statut)
                                                @case('1')
                                                    <span class="badge bg-light-success me-1">Active</span>
                                                @break

                                                @case('0')
                                                    <span class="badge bg-light-secondary me-1">Désactivé</span>
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
                                                    <a class="dropdown-item"
                                                        data-url="{{ route('categoriemedicaments.edit', ['id' => $items->idcategorie]) }}"data-bs-toggle="modal"
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
                        <nav aria-label="Page navigation" class="mt-3">
                            {!! $categories->links('pagination::bootstrap-5') !!}
                        </nav>

                    </div>
                </div>
            </section>
            <!--/ Bordered Table -->


        </div>
        </div>

        <!-- / Content -->
    @endsection
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    {{-- <script>
    $(document).ready(function () {
            $('#example').DataTable();
        });
</script> --}}
