<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-layouts.admin.head-component />

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <x-layouts.admin.sidebar-component />
        <!--end sidebar wrapper -->
        <!--start header -->
        <x-layouts.admin.header-component />
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                {{ $slot }}
            </div>
        </div>
        <!--end page wrapper -->
        <x-layouts.admin.footer-component />
    </div>
    <!--end wrapper-->
    <x-layouts.admin.scripts-component />
</body>

</html>
