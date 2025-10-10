@extends('dashboard.layout-dashboard.master')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">


        <!-- Bordered Table -->
        <div class="card">
            <div class="me-auto container mt-5">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
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
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
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
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a data-url="{{ route('quartiers.edit', ['id' => $items->idquartier]) }}"
                                                    class="dropdown-item" data-bs-toggle="modal"
                                                    data-ajax-popup="true" data-size="md"
                                                    data-title="modifier ce quartier" style="cursor: pointer"><i
                                                        class="icon-base bx bx-edit-alt me-1 text-blue" style="cursor: pointer; color:blue;"></i> Modifier</a>

                                                <a data-url="{{ route('quartiers.delete', ['id' => $items->idquartier]) }}"
                                                    class="dropdown-item" data-bs-toggle="modal"
                                                    data-ajax-popup="true" data-size="md"
                                                    data-title="supprimer ce quartier" style="cursor: pointer"><i
                                                        class="icon-base bx bx-trash me-1" style="cursor: pointer; color:red;"></i> Supprimer</a>
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
            {!! $quartiers->links('pagination::bootstrap-5') !!}
        </nav>

    </div>
    <!-- / Content -->
@endsection

{{-- <h1>Bienvenue</h1> --}}
