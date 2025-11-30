<!DOCTYPE html>
<html lang="en" @if (Route::currentRouteName()=='layout_rtl') dir="rtl" @endif>

<head>
    @include('layout.head')
    <!-- comman css-->
    @include('layout.css')
</head>

@switch(Route::currentRouteName())
    @case('dashboard')
        <body onload="startTime()">
        @break

    @case('box_layout')
        <body class="box-layout">
        @break

    @case('layout_rtl')
        <body class="rtl">
        @break

    @case('layout_dark')
        <body class="dark-only">
        @break

    @default
        <body>
@endswitch

    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif --}}

    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->

    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
    <!-- Loader ends-->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper compact-sidebar" id="pageWrapper">

        <!-- Page Header Start-->
        @include('layout.header')
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            <!-- Page Sidebar Start-->
            @include('layout.sidebar')
            <!-- Page Sidebar Ends-->

            
            <div class="page-body">
                @yield('main_content')
                <!-- Container-fluid Ends-->
            </div>

            <!-- footer start-->
            @include('layout.footer')

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
    {{-- scripts --}}
    @include('layout.script')
    {{--end scripts --}}

   <script>
@if(session('success'))
    $.notify({
        message: "{{ session('success') }}"
    },
        {
        type: 'success',
        allow_dismiss: true,
        placement: { from: 'top', align: 'right' },
        delay: 3000,
        timer: 500,
        z_index: 9999,
        animate: { enter: 'animated fadeInDown', exit: 'animated fadeOutUp' }
    });
@endif

@if(session('error'))
    $.notify({
        message: "{{ session('error') }}"
    },{
        type: 'danger',
        allow_dismiss: true,
        placement: { from: 'top', align: 'right' },
        delay: 3000,
        timer: 500,
        z_index: 9999,
        animate: { enter: 'animated fadeInDown', exit: 'animated fadeOutUp' }
    });
@endif

@if(session('warning'))
    $.notify({
        message: "{{ session('warning') }}"
    },{
        type: 'warning',
        allow_dismiss: true,
        placement: { from: 'top', align: 'right' },
        delay: 3000,
        timer: 500,
        z_index: 9999,
        animate: { enter: 'animated fadeInDown', exit: 'animated fadeOutUp' }
    });
@endif
</script>

</body>
</html>
