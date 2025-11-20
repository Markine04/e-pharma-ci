    @extends('dashboard.layouts.master')
    @section('content')
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Medicaments</h3>
                        <p class="text-subtitle text-muted">Liste des Medicaments</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Medicaments</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Bordered Table -->
            <section class="section" id="dropdown-variations">
                <div class="card">
                    <div class="navbar-nav me-auto container mt-5">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <h4>
                                    {{-- Medicaments --}}
                                    <div class="ml-8" style="float: right">
                                        <a href="{{ route('medicaments.create') }}" class="btn btn-primary">Ajouter un
                                            medicament
                                        </a>
                                    </div>

                                </h4>
                            </div>
                        </div>
                    </div>
                    <p></p>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="ml-4" style="float: right">
                                    <div class="form-group"></div>
                                    <label>Rechercher:</label>
                                    <input type="text" name="recherche" class="form-control" placeholder="Recherche..."
                                        style="width: auto; display: inline;">
                                    <a href="#" class="btn btn-primary"><i class="bi bi-search"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Libelle</th>
                                        <th>Dosage</th>
                                        <th>Forme Galenique</th>
                                        <th>Categories</th>
                                        <th>Ordonnances</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicaments as $items)
                                        <tr>
                                            <td>
                                                <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                                                    @foreach (json_decode($items->images) as $image)
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                            title="Lilian Fuller">
                                                            <img src="{{ asset('assets/images/produits/' . $image) }}"
                                                                alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                {{-- <i class="icon-base bx bxl-angular icon-md text-danger me-4"></i> --}}
                                                <span>{{ $items->nom }}</span>
                                            </td>
                                            <td>{{ $items->dosage }}</td>
                                            <td>
                                                {{ DB::table('forme_galeniques')->where('id_formegalenique', $items->forme_galenique)->get()[0]->libelle }}
                                            </td>
                                            <td>
                                                @foreach (json_decode($items->categorie_id) as $categori)
                                                    {{ DB::table('categories')->where('idcategorie', $categori)->get()[0]->libelle }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @switch($items->besoin_ordonnance)
                                                    @case('1')
                                                        <span class="badge bg-light-danger me-1">Besoin d'ordonnance</span>
                                                    @break

                                                    @case('0')
                                                        <span class="badge bg-light-success me-1">Pas besoin d'ordonnance</span>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                            {{-- <td><span class="badge bg-label-primary me-1">Active</span></td> --}}

                                            {{-- <td></td> --}}
                                            <td>
                                                <div class="btn-group dropup dropdown-icon-wrapper me-1 mb-1">
                                            {{-- <button type="button" class="btn btn-primary">
                                                Icons
                                            </button> --}}
                                            <button type="button"
                                                class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-wifi dropdown-icon"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <span class="dropdown-item">
                                                    <i class="bi bi-wifi-off"></i>
                                                </span>
                                                <span class="dropdown-item">
                                                    <i class="bi bis-volume"></i>
                                                </span>
                                                <span class="dropdown-item">
                                                    <i class="bi bis-volume-full"></i>
                                                </span>
                                                <span class="dropdown-item">
                                                    <i class="bi bi-bell"></i>
                                                </span>
                                                <span class="dropdown-item">
                                                    <i class="bi bi-bell-off"></i>
                                                </span>
                                                <span class="dropdown-item">
                                                    <i class="bi bi-phone"></i>
                                                </span>
                                            </div>
                                        </div>
                                                {{-- <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bi bi-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="icon-base bx bx-edit-alt me-1"></i> Edit</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="icon-base bx bx-trash me-1"></i> Delete</a>
                                                    </div>
                                                </div> --}}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation" class="mt-3">
                                {!! $medicaments->links('pagination::bootstrap-5') !!}
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Bordered Table -->



        </div>
        <!-- / Content -->
    @endsection

    {{-- <h1>Bienvenue</h1> --}}
