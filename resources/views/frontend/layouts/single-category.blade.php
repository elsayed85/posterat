<!DOCTYPE html>
<html lang="@lang('theme.lang_code')">
<head>
    @include('frontend.layouts.inc.header')
    @stack('css')
</head>
<body @lang('theme.class')>
<!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
@includeWhen(get_setting('preloader'),'frontend.layouts.inc.preloader')
<!-- =-=-=-=-=-=-= Color Switcher =-=-=-=-=-=-= -->
@includeWhen(get_setting('theme_switcher'),'frontend.layouts.inc.color-switcher')
<!-- =-=-=-=-=-=-= Dark Header =-=-=-=-=-=-= -->
<!-- Top Bar -->
@include('frontend.layouts.inc.top-bar')
<!-- Top Bar End -->
<!-- Header -->
@include('frontend.layouts.inc.main-header')
<div class="main-menu">
    <!-- Navigation Bar -->
    @include('frontend.layouts.inc.navbar-mega')
</div>
<div class="clearfix"></div>
<!-- =-=-=-=-=-=-= Dark Header End =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Advertizing Section =-=-=-=-=-=-= -->
{{--@include('frontend.layouts.inc.advertizing')--}}
<!-- =-=-=-=-=-=-= Advertizing Section =-=-=-=-=-=-= -->

<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
@yield('content')
<!-- =-=-=-=-=-=-= Ads أرشيف End =-=-=-=-=-=-= -->
    @include('frontend.layouts.inc.footer-dark2')

</div>



    @include('frontend.layouts.inc.footer-scripts')
@stack('js')

</body>
</html>