@extends('dashboard.layout-dashboard.master')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">


        <!-- Bordered Table -->
        <div class="card">
            <div class="me-auto container mt-5">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <h4>Assurances
                            <div class="ml-8" style="float: right">

                                <a data-url="{{ route('assurances.create') }}" class="btn btn-primary text-white"
                                    data-bs-toggle="modal" data-ajax-popup="true" data-size="md"
                                    data-title="Ajouter une assurance">
                                    <i class="si si-note" style="font-size: 15px;"></i>Ajouter une
                                    assurances</a>
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
                                <th>Libelles</th>
                                <th>Statuts</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assurances as $items)
                                <tr>
                                    <td>{{ $items->libelle }}</td>
                                    <td>
                                        @switch($items->statut)
                                            @case('1')
                                                <span class="badge bg-label-success me-1"> Activer
                                                </span>
                                            @break

                                            @case('2')
                                                <span class="badge bg-label-danger me-1"> Desactivé
                                                </span>
                                            @break

                                            @default
                                        @endswitch
                                        {{-- {{ DB::table('regions')->where('idregion', $items->region_id)->get()[0]->name }} --}}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="icon-base bx bx-edit-alt me-1"></i> Edit</a>
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
        <nav aria-label="Page navigation" class="mt-3">
            {!! $assurances->links('pagination::bootstrap-5') !!}
        </nav>

    </div>
    <!-- / Content -->
@endsection

{{-- <h1>Bienvenue</h1> --}}
