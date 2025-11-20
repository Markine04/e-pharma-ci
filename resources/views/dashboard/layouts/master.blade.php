<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description"
        content="Application d'achats de produits pharmaceutiques en ligne et consultation des pharmacies de garde" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset_siha/assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('asset_siha/assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('asset_siha/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_siha/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_siha/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_siha/assets/vendors/simple-datatables/style.css') }}">

</head>

<body>

    <div id="app">
        @include('dashboard.layouts.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @yield('content')

            @include('dashboard.layouts.fooster')
        </div>

    </div>

    <div class="modal fade bd-example-modal-lg" id="commonModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel"></h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>

</body>
<script src="{{ asset('asset_siha/assets/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('asset_siha/assets/js/ma-modal.js') }}"></script>

<script src="{{ asset('asset_siha/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('asset_siha/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('asset_siha/assets/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('asset_siha/assets/vendors/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('asset_siha/assets/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('asset_siha/assets/js/main.js') }}"></script>


<script src="{{ asset('asset_siha/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>

<script src="{{ asset('asset_siha/assets/builds/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('asset_siha/assets/builds/jquery.ui.min.js') }}"></script>


</html>
