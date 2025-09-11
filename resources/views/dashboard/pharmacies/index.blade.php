@extends('dashboard.layout-dashboard.master')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">


        <!-- Bordered Table -->
        <div class="card">
            <div class="me-auto container mt-5">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <h4>Pharmacies
                            <div class="ml-8" style="float: right">
                                <a href="{{ route('pharmacies.create') }}" class="btn btn-primary">Ajouter une
                                    pharmacie</a>
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
                            @foreach ($pharmacies as $items)
                                <tr>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('pharmacies.edit',['id'=>$items->id])}}"><i
                                                        class="icon-base bx bx-edit-alt me-1" style='color:rgba(0, 119, 255, 0.637);'></i> Modifier</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="icon-base bx bx-trash me-1" style='color:rgba(255, 0, 0, 0.637);'></i> Supprimer</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="{{asset('pharmacies/'.$items->images)}}" alt="{{ $items->name }}" width="90px" height="70px">
                                        
                                    </td>
                                    <td>{{ $items->name }}</td>
                                    <td>
                                        {{ $items->address }}
                                    </td>
                                    <td>{{ $items->phone }}</td>
                                    <td>
                                        {{ DB::table('communes')->where('id', $items->commune_id)->get()[0]->name }}

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
            {!! $pharmacies->links('pagination::bootstrap-5') !!}
        </nav>

    </div>
    <!-- / Content -->
@endsection

{{-- <h1>Bienvenue</h1> --}}
