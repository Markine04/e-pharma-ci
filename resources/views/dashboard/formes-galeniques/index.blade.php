    @extends('dashboard.layouts.master')
    @section('content')
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Forme Galeniques</h3>
                        <p class="text-subtitle text-muted">Liste des Forme Galeniques</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Forme Galeniques</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Bordered Table -->
            <section class="section">
                <div class="card">
                    <div class="me-auto container mt-5">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <h4>
                                    {{-- Forme Galeniques --}}
                                    <div class="ml-8" style="float: right">

                                        <a data-url="{{ route('formegaleniques.create') }}"
                                            class="btn btn-primary text-white" data-bs-toggle="modal" data-ajax-popup="true"
                                            data-size="md" data-title="Ajouter une forme galeniques">
                                            <i class="si si-note" style="font-size: 15px;"></i>Ajouter une
                                            forme galeniques</a>
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
                                    @foreach ($formesGaleniques as $items)
                                        <tr>
                                            <td>{{ $items->libelle }}</td>
                                            <td>
                                                @switch($items->statut)
                                                {{-- badge bg-primary --}}
                                                    @case('1')
                                                        <span class="badge bg-light-success me-1"> Activer
                                                        </span>
                                                    @break

                                                    @case('2')
                                                        <span class="badge bg-light-danger me-1"> Desactivé
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
                                                        <a data-url="{{ route('formegaleniques.edit', ['id' => $items->id_formegalenique]) }}"
                                                            class="dropdown-item" data-bs-toggle="modal"
                                                            data-ajax-popup="true" data-size="md"
                                                            data-title="modifier cette forme galeniques"
                                                            style="cursor: pointer"><i
                                                                class="icon-base bx bx-edit-alt me-1 text-blue"
                                                                style="cursor: pointer; color:blue;"></i> Modifier</a>

                                                        <a data-url="{{ route('formegaleniques.delete', ['id' => $items->id_formegalenique]) }}"
                                                            class="dropdown-item" data-bs-toggle="modal"
                                                            data-ajax-popup="true" data-size="md"
                                                            data-title="modifier cette forme galeniques"
                                                            style="cursor: pointer"><i class="icon-base bx bx-trash me-1"
                                                                style="cursor: pointer; color:red;"></i> Supprimer</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation" class="mt-3">
                    {!! $formesGaleniques->links('pagination::bootstrap-5') !!}
                </nav>
                        </div>
                    </div>
                </div>
                <!--/ Bordered Table -->
                
            </section>
        </div>
        <!-- / Content -->
    @endsection

    {{-- <h1>Bienvenue</h1> --}}
