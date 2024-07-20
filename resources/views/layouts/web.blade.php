<!DOCTYPE html>
<html lang="en">
<x-web.head-component />

<body>
    <div class="boxed_wrapper">
        <x-web.top-header-component />
        <x-web.header-component />
        {{ $slot }}
        <x-web.footer-component />
        <!-- Scroll Top  -->
        <button class="scroll-top tran3s color2_bg"><span class="fa fa-angle-up"></span></button>
        <!-- preloader  -->
        <div class="preloader"></div>
        <x-web.scripts-component />
    </div>
</body>

</html>
