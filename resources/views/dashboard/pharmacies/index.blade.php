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
                                <a href="{{ route('pharmacies-gardes.index') }}" class="btn btn-secondary">Programme des
                                    pharmacies de gardes</a> &nbsp;&nbsp;
                            
                                <a data-url="{{ route('pharmacies.create') }}" class="btn btn-primary text-white"
                                    data-bs-toggle="modal" data-ajax-popup="true" data-size="lg"
                                    data-title="Ajouter une pharmacie">
                                    <i class="si si-note" style="font-size: 15px;"></i>Ajouter une
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
                                <th>Quartiers</th>
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
                                                <a class="dropdown-item" href="{{route('pharmacies.edit',['id'=>$items->idpharmacie])}}"><i
                                                        class="icon-base bx bx-edit-alt me-1" style='color:rgba(0, 119, 255, 0.637);'></i> Modifier</a>
                                                <a data-url="{{ route('pharmacies.delete', ['id' => $items->idpharmacie]) }}"
                                                    class="dropdown-item" data-bs-toggle="modal"
                                                    data-ajax-popup="true" data-size="md"
                                                    data-title="supprimer cette pharmacie" style="cursor: pointer"><i
                                                        class="icon-base bx bx-trash me-1" style="cursor: pointer; color:red;"></i> Supprimer</a>
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
                                        {{ DB::table('communes')->where('idcommune', $items->commune_id)->get()[0]->name }}
                                    </td>

                                    @if ($items->quartier_id == null)
                                        <td></td>
                                    @else
                                        <td>
                                            {{ DB::table('quartiers')->where('idquartier', $items->quartier_id)->get()[0]->nom }}
                                        </td>
                                    @endif

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
            {!! $pharmacies->links('pagination::bootstrap-5') !!}
        </nav>

    </div>
    <!-- / Content -->
@endsection

{{-- <h1>Bienvenue</h1> --}}
