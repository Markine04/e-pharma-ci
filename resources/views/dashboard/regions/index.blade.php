@extends('dashboard.layout-dashboard.master')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">


        <!-- Bordered Table -->
        <div class="card">
            <div class="navbar-nav me-auto container mt-5">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <h4>Regions
                            <div class="ml-8" style="float: right">
                                <a href="{{ route('regions.create') }}" class="btn btn-primary">Ajouter une regions</a>
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
                                <th>Districtes</th>
                                <th>Capitals</th>
                                <th>Statuts</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($regions as $items)
                                <tr>
                                    <td>{{ $items->name }}</td>
                                    <td>
                                        {{ $items->district }}
                                    </td>
                                    <td>{{ $items->capital }}</td>
                                    <td><span class="badge bg-label-primary me-1">Active</span></td>
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
                    {{-- {!! $regiregionsons->links() !!} --}}
                </div>
            </div>
        </div>
        <!--/ Bordered Table --><br>

        <nav aria-label="Page navigation" class="mt-3">
            {!! $regions->links('pagination::bootstrap-5') !!}
        </nav>

        {{-- <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">{{ $regions->links() }}</li>
            </ul>
        </nav> --}}


        <!--/ Bordered Table -->


    </div>
    <!-- / Content -->
@endsection

{{-- <h1>Bienvenue</h1> --}}
