@extends('dashboard.layout-dashboard.master')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <style>
            /* Style pour l'image miniature */
            .thumbnail {
                width: 200px;
                cursor: pointer;
                transition: transform 0.2s;
            }

            .thumbnail:hover {
                transform: scale(1.05);
            }

            /* Style pour la version agrandie */
            #fullImage {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: contain;
                background: rgba(0, 0, 0, 0.8);
                cursor: zoom-out;
            }
        </style>

        <!-- Bordered Table -->
        <div class="card">
            <div class="me-auto container mt-5">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <h4>Ordonnances
                            <div class="ml-8" style="float: right">
                                <a href="{{ route('pharmacies.create') }}" class="btn btn-primary">Ajouter une
                                    Ordonnance</a>
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
                                <th>Actions</th>
                                <th>Images</th>
                                <th>Libelles</th>
                                <th>Adresses</th>
                                <th>Telephones</th>
                                <th>Communes</th>
                                <th>Statuts</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ordonnances as $items)
                                <tr>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('ordonnances.edit', ['id' => $items->id_ordonannce]) }}"><i
                                                        class="icon-base bx bx-edit-alt me-1"
                                                        style='color:rgba(0, 119, 255, 0.637);'></i> Modifier</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="icon-base bx bx-trash me-1"
                                                        style='color:rgba(255, 0, 0, 0.637);'></i> Supprimer</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <img class="thumbnail"
                                            src="{{ asset('/storage/ordonnances-clients/' . $items->image) }}"
                                            alt="{{ $items->id_client }}" width="20px" height="50px"
                                            onclick="agrandirImage()">


                                        <!-- Image agrandie (cachée initialement) -->
                                        <img id="fullImage" onclick="reduireImage()"
                                            src="{{ asset('/storage/ordonnances-clients/' . $items->image) }}">
                                    </td>
                                    <td>{{ $items->id_client }}</td>
                                    <td>
                                        {{ $items->id_client }}
                                    </td>
                                    <td>{{ $items->id_client }}</td>
                                    <td>

                                    </td>
                                    <td><span class="badge bg-label-primary me-1">Active</span></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Bordered Table -->
        <nav aria-label="Page navigation" class="mt-3">
            {!! $ordonnances->links('pagination::bootstrap-5') !!}
        </nav>

    </div>
    <!-- / Content -->
@endsection

<script>
    function agrandirImage() {
        document.getElementById("fullImage").style.display = "block";
    }

    function reduireImage() {
        document.getElementById("fullImage").style.display = "none";
    }
</script>
