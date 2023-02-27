<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="{{asset('admin-lte/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-lte/dist/css/adminlte.css')}}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <style>
        @if(theme('theme')=='dark')
            .dark-mode,.dark-mode .content-wrapper,.dark-mode .dropdown-menu{
            --tw-bg-opacity: 1;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
        }
        @endif
    </style>
</head>
<body
    class="font-sans antialiased hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<x-banner/>


@livewire('navigation-menu')
@livewire('sidebar')
<div class="content-wrapper">

    <!-- Page Heading -->
    @if (isset($header))
        <div class="content-header">
            <div class="container-fluid">
                {{ $header }}
            </div>
        </div>
@endif

<!-- Page Content -->
    <main class="content">
        {{ $slot }}
    </main>

    <!-- Control Sidebar -->
    <aside class="control-sidebar " style="background-color: inherit">
        <!-- Control sidebar content goes here -->
    </aside>

</div>

@stack('modals')

@livewireScripts

<!-- jQuery -->
<script src="{{asset('admin-lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin-lte/plugins/chart.js/Chart.min.js')}}"></script>

<script src="{{asset('admin-lte/dist/js/adminlte.js')}}"></script>
<script src="{{asset('admin-lte/dist/js/demo.js')}}"></script>
<script src="{{asset('admin-lte/dist/js/pages/dashboard2.js')}}"></script>

</body>
</html>
