<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-layouts.admin.head-component />



<body data-base-url="{{ route('dashboard') }}">
    <script src="{{ asset('assets/js/spinner.js') }}"></script>
    <div class="main-wrapper" id="app">

        <x-layouts.admin.sidebar-component />
        <div class="page-wrapper">
            <x-layouts.admin.header-component />

           {{ $slot }}
            <x-layouts.admin.footer-component />


        </div>
    </div>

    <x-layouts.admin.scripts-component />

   
</body>

</html>
