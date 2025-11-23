<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Application d'achats de produits pharmaceutiques en ligne et consultation des pharmacies de garde">
    <meta name="keywords" content="Application d'achats de produits pharmaceutiques en ligne et consultation des pharmacies de garde">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('fronts/assets/logo/logoSiha.png')}}" type="image/x-icon">
    <meta name="description" content="Application d'achats de produits pharmaceutiques en ligne et consultation des pharmacies de garde" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('fronts/assets/logo/logoSiha.png')}}" />


    <title>{{ config('app.name', 'Laravel') }} | Login</title><link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
@include('others.others_layout.css')
  </head>
  <body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"> </div>
      <div class="dot"></div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        @yield('others_content')
    </div>
    @include('others.others_layout.script')
  </body>
</html>