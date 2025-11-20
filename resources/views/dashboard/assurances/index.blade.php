@extends('dashboard.layouts.master')
@section('content')
    <!-- Content -->
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Assurances</h3>
                        <p class="text-subtitle text-muted">Liste des assurances</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Assurances</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Bordered Table -->

            <div class="card">
                <div class="me-auto container mt-5">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <h4>Assurances
                                <div class="ml-8" style="float: right">

                                    <a data-ajax-popup="true" data-size="md" data-title="Ajouter une assurance"
                                        data-url="{{ route('assurances.create') }}" role="button"
                                        class="btn btn-primary text-white"><i class="bi bi-plus"
                                            ></i> <span> Ajouter une assurances</span>
                                        </a>

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
                                                    <span class="badge bg-success me-1"> Activer
                                                    </span>
                                                @break

                                                @case('2')
                                                    <span class="badge bg-danger me-1"> Desactivé
                                                    </span>
                                                @break

                                                @default
                                            @endswitch
                                            {{-- {{ DB::table('regions')->where('idregion', $items->region_id)->get()[0]->name }} --}}
                                        </td>
                                        <td>
                                            <div class="dropdown text-center" style="display: flex; gap: 10px">
                                                <a href="" class="sidebar-link">
                                                    <i class="bi bi-pencil-fill" style="color: blue"></i></a>
                                                &nbsp;&nbsp;
                                                <a href="" class="sidebar-link">
                                                    <i class="bi bi-trash-fill" style="color: red"></i></a>

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
