<!DOCTYPE html>

<html lang="en" class="layout-menu-fixed layout-compact"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="" />
    <meta name="google-site-verification" content="MP-PsNpUqipjp3kGMsfBlaiG4M7cfoutiOaC2U1N_bc" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/logo/logoSiha.png')}}" />


    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    {{-- <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon/favicon.ico') }}"> --}}
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('dashboards/assets/vendor/fonts/iconify-icons.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="{{ asset('dashboards/assets/vendor/css/core.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/builds/css/select2.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('dashboards/assets/css/demo.css') }}" />
    

    {{-- Datatables --}}
    <link rel="stylesheet" href="{{ asset('dashboards/assets/datatables/css/dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboards/assets/datatables/css/dataTables.dateTime.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboards/assets/datatables/css/dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboards/assets/datatables/css/searchBuilder.dataTables.css') }}" />

    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <!-- Vendors CSS -->

    <link rel="stylesheet"
        href="{{ asset('dashboards/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- endbuild -->

    <link rel="stylesheet" href="{{ asset('dashboards/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    {{-- <script src="{{ asset('dashboards/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('dashboards/assets/js/config.js') }}"></script> --}}
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('dashboard.layout-dashboard.sidebar')
            <div class="layout-page">
                <!-- Navbar -->
                @include('dashboard.layout-dashboard.navbar')
                <div class="content-wrapper">
                    <!-- Content -->
                    @yield('content')
                    <!-- /Content -->

                    <!-- Footer -->
                    @include('dashboard.layout-dashboard.footer')
                    <!-- /Footer -->

                    <div class="content-backdrop fade"></div>

                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>

    </div>

    <!-- Message Modal -->
    <div class="modal fade bd-example-modal-lg" id="commonModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel"></h4>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>

    <!-- Core JS -->

    {{-- <script src="{{ asset('dashboards/assets/vendor/libs/jquery/jquery.js') }}"></script> --}}

    {{-- <script src="{{ asset('dashboards/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('dashboards/assets/vendor/js/bootstrap.js') }}"></script>

    <script src="{{ asset('dashboards/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('dashboards/assets/vendor/js/menu.js') }}"></script> --}}

    <!-- endbuild -->

    <!-- Vendors JS -->
    {{-- <script src="{{ asset('dashboards/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script> --}}

    <!-- Main JS -->

    <script src="{{ asset('dashboards/assets/js/main.js') }}"></script>

    <script src="{{ asset('dashboards/assets/builds/custom.js') }}"></script>

    <script src="{{ asset('assets/builds/custom.js') }}"></script>

    {{-- <script src="{{ asset('assets/builds/js/select2.js') }}"></script> --}}

    {{-- <script src="{{ asset('assets/builds/js/select2.min.js') }}"></script> --}}

    <script src="{{ asset('assets/builds/jquery-3.6.0.min.js') }}"></script>

    {{-- <script src="{{ asset('assets/builds/jquery.ui.min.js') }}"></script> --}}

    <!-- Page JS -->
    {{-- <script src="{{ asset('dashboards/assets/js/dashboards-analytics.js') }}"></script> --}}


    {{-- DataTables --}}
    {{-- <script src="{{ asset('dashboards/assets/datatables/js/dataTables.dateTime.min.js') }}"></script>
    <script src="{{ asset('dashboards/assets/datatables/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboards/assets/datatables/js/dataTables.js') }}"></script>
    <script src="{{ asset('dashboards/assets/datatables/js/dataTables.searchBuilder.js') }}"></script>
    <script src="{{ asset('dashboards/assets/datatables/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('dashboards/assets/datatables/js/searchBuilder.dataTables.js') }}"></script> --}}

    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script> --}}

    {{-- <script src="{{ asset('assets/builds/bootstrap-notify.min.js') }}"></script> --}}

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

    </script>
</body>

</html>
