@extends('dashboard.layout-dashboard.master')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        
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
                                <th>Note</th>
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
                                                    href="{{ route('ordonnances.edit', ['id' => $items->id_ordonnance]) }}"><i
                                                        class="icon-base bx bx-edit-alt me-1"
                                                        style='color:rgba(0, 119, 255, 0.637);'></i> Modifier</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="icon-base bx bx-trash me-1"
                                                        style='color:rgba(255, 0, 0, 0.637);'></i> Supprimer</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('ordonnances.image',['id'=>$items->id_ordonnance])}}" target="_blank">
                                        <img src="{{ asset('/storage/ordonnances-clients/' . $items->image) }}"
                                            alt="{{ $items->id_client }}" width="90px" height="70px">
                                        </a>
                                    </td>
                                    <td>{{ $items->note }}</td>
                                    <td>
                                        {{ $items->id_client }}
                                    </td>
                                    <td>{{ $items->id_client }}</td>
                                    <td>

                                    </td>
                                    @switch($items->statut)
                                        @case('1')
                                        <span class="badge bg-label-primary me-1">
                                            <a data-url="{{route('ordonnances.traiter',['id'=>$items->id_ordonnance])}}" data-ajax-popup="true" data-size="md"
                                            data-title="Traiter l'ordonnance">
                                            <i class="si si-note" style="font-size: 15px;"></i>
                                        </a>
                                        </span>
                                            
                                            @break

                                        @case('2')
                                        <span class="badge bg-label-primary me-1">Active</span>
                                            
                                            @break

                                        @case('3')
                                        <span class="badge bg-label-primary me-1">Active</span>
                                            
                                            @break
                                    
                                        @default
                                            
                                    @endswitch
                                    <td>
                                        
                                        
                                        
                                        <span class="badge bg-label-primary me-1">Active</span>
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
