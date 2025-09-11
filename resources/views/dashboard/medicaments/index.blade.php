@extends('dashboard.layout-dashboard.master')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        

        <!-- Bordered Table -->
        <div class="card">
            <div class="navbar-nav me-auto container mt-5">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <h4>Medicaments
                            <div class="ml-8" style="float: right">
                                <a href="{{ route('medicaments.create') }}" class="btn btn-primary">Ajouter un medicament
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
                                <th>Project</th>
                                <th>Client</th>
                                <th>Users</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <i class="icon-base bx bxl-angular icon-md text-danger me-4"></i>
                                    <span>Angular Project</span>
                                </td>
                                <td>Albert Cook</td>
                                <td>
                                    <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                            title="Lilian Fuller">
                                            <img src="../assets/img/avatars/2.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                            title="Sophia Wilkerson">
                                            <img src="../assets/img/avatars/3.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                            title="Christina Parker">
                                            <img src="../assets/img/avatars/4.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                    </ul>
                                </td>
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
                            <tr>
                                <td>
                                    <i class="icon-base bx bxl-react icon-md text-info me-4"></i> <span>React
                                        Project</span>
                                </td>
                                <td>Barry Hunter</td>
                                <td>
                                    <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                            title="Lilian Fuller">
                                            <img src="../assets/img/avatars/2.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                            title="Sophia Wilkerson">
                                            <img src="../assets/img/avatars/3.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                            title="Christina Parker">
                                            <img src="../assets/img/avatars/4.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                    </ul>
                                </td>
                                <td><span class="badge bg-label-success me-1">Completed</span></td>
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
                            <tr>
                                <td>
                                    <i class="icon-base bx bxl-vuejs icon-md text-success me-4"></i> <span>VueJs
                                        Project</span>
                                </td>
                                <td>Trevor Baker</td>
                                <td>
                                    <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                            title="Lilian Fuller">
                                            <img src="../assets/img/avatars/2.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                            title="Sophia Wilkerson">
                                            <img src="../assets/img/avatars/3.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                            title="Christina Parker">
                                            <img src="../assets/img/avatars/4.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                    </ul>
                                </td>
                                <td><span class="badge bg-label-info me-1">Scheduled</span></td>
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
                            <tr>
                                <td>
                                    <i class="icon-base bx bxl-bootstrap icon-md text-primary me-4"></i>
                                    <span>Bootstrap Project</span>
                                </td>
                                <td>Jerry Milton</td>
                                <td>
                                    <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                            title="Lilian Fuller">
                                            <img src="../assets/img/avatars/2.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                            title="Sophia Wilkerson">
                                            <img src="../assets/img/avatars/3.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                            title="Christina Parker">
                                            <img src="../assets/img/avatars/4.png" alt="Avatar"
                                                class="rounded-circle" />
                                        </li>
                                    </ul>
                                </td>
                                <td><span class="badge bg-label-warning me-1">Pending</span></td>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Bordered Table -->


    </div>
    <!-- / Content -->
@endsection

{{-- <h1>Bienvenue</h1> --}}