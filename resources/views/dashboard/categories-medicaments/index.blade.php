@extends('dashboard.layout-dashboard.master')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">


        <!-- Bordered Table -->
        <div class="card">
            <div class="navbar-nav me-auto container mt-5">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <h4>Catégories medicaments
                            <div class="ml-8" style="float: right">
                                <a href="{{ route('categoriemedicaments.create') }}" class="btn btn-primary">Ajouter une
                                    catégorie
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
                                    <td>
                                        <span>{{ $items->image }}</span>
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
            {!! $categories->links('pagination::bootstrap-5') !!}
        </nav>

    </div>
    <!-- / Content -->
@endsection

{{-- <h1>Bienvenue</h1> --}}
