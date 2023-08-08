<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('title')</title>

    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ asset('') }}vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="{{ asset('') }}css/vendors/simplebar.css">
    <link href="{{ asset('') }}css/style.css" rel="stylesheet">
    <link href="{{ asset('') }}css/examples.css" rel="stylesheet">
    <link href="{{ asset('') }}vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/dataTables.bootstrap5.min.css') }}">
    <script src="{{ asset('datatable/jquery-3.7.0.js') }}"></script>
</head>

<body>
    <x-sidebar></x-sidebar>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button"
                    onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <svg class="icon icon-lg">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                    </svg>
                </button><a class="header-brand d-md-none" href="#">
                    <svg width="118" height="46" alt="CoreUI Logo">
                        <use xlink:href="assets/brand/coreui.svg#full"></use>
                    </svg></a>

                <ul class="header-nav ms-auto">
                </ul>
                <ul class="header-nav ms-3">
                    <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#"
                            role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md"> <img class="avatar-img" src="{{ asset('images/user.png') }}"
                                    alt="user@email.com"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">{{ Str::upper(Auth::user()->name) }}</div>
                            </div>
                            <a class="dropdown-item"href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                </svg> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>


        </header>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                @yield('content')
            </div>
        </div>
        <x-footer />
    </div>
    @include('sweetalert::alert')
    <script src="{{ asset('') }}vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="{{ asset('') }}vendors/simplebar/js/simplebar.min.js"></script>
    <script src="{{ asset('') }}vendors/chart.js/js/chart.min.js"></script>
    <script src="{{ asset('') }}vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="{{ asset('') }}vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="{{ asset('') }}js/main.js"></script>
    <script src="{{ asset('datatable/query.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        new DataTable('#data');
    </script>
</body>

</html>
