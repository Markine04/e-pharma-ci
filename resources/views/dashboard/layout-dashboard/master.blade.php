<!DOCTYPE html>

<html lang="en" class="layout-menu-fixed layout-compact" data-assets-path="{{asset('dashboards/assets/')}}"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('dashboards/assets/vendor/fonts/iconify-icons.css')}}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="{{asset('dashboards/assets/vendor/css/core.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboards/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{asset('dashboards/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- endbuild -->

    <link rel="stylesheet" href="{{asset('dashboards/assets/vendor/libs/apex-charts/apex-charts.css')}}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('dashboards/assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="{{asset('dashboards/assets/js/config.js')}}"></script>
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

    <!-- Core JS -->

    <script src="{{asset('dashboards/assets/vendor/libs/jquery/jquery.js')}}"></script>

    <script src="{{asset('dashboards/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('dashboards/assets/vendor/js/bootstrap.js')}}"></script>

    <script src="{{asset('dashboards/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('dashboards/assets/vendor/js/menu.js')}}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('dashboards/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->

    <script src="{{asset('dashboards/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('dashboards/assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
