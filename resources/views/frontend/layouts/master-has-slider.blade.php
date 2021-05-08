<!DOCTYPE html>
<html lang="@lang('theme.lang_code')">
<head>
    @include('frontend.layouts.inc.header')
    @stack('css')
    {{--<script src="{{asset('custom/menu/js/modernizr.js')}}"></script> <!-- Modernizr -->--}}

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
{{--<div class="clearfix"></div>--}}
<!-- =-=-=-=-=-=-= Dark Header End =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Advertizing Section =-=-=-=-=-=-= -->
{{--@include('frontend.layouts.inc.advertizing')--}}
<!-- =-=-=-=-=-=-= Advertizing Section =-=-=-=-=-=-= -->
    {{--<!-- Main Section -->--}}
    {{--<section class="custom-padding gray">--}}
    <section class="custom-padding gray">
        <!-- Main Container -->
		{{--<div class="" style="border-color: #450cff;border-style: inset;">--}}
            <!-- Content Box -->
            <!-- Row -->
            <div class="row">
            {{--<div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 featured">--}}

            {{----}}
            {{--</div>--}}

            <!--down content here-->
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 featured">
                    {{--<div class="row">--}}
                    <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                        <x-side-menu :categories="$categories" />
                    </div>

                    <div class="col-md-9 col-lg-9 col-xs-12 col-sm-12">

                        <x-slider />
                    </div>
                {{--</div>--}}
                <!--down content here-->
                </div>

                <!-- Middle Content Box End -->
            </div>
                  {{--</div>--}}
		<!-- Main Container End -->


    </section>
@yield('content')
{{--<!-- Main Section -->--}}
{{--<!-- =-=-=-=-=-=-= Featured Ads =-=-=-=-=-=-= -->--}}
{{--@include('frontend.layouts.inc.featured-ads')--}}
{{--<!-- =-=-=-=-=-=-= Featured Ads End =-=-=-=-=-=-= -->--}}
{{--<!-- =-=-=-=-=-=-= Statistics Counter =-=-=-=-=-=-= -->--}}
{{--@include('frontend.layouts.inc.statistics')--}}
{{--<!-- /.funfacts -->--}}
{{--<!-- =-=-=-=-=-=-= Statistics Counter End =-=-=-=-=-=-= -->--}}
{{--<!-- =-=-=-=-=-=-= Blog Section =-=-=-=-=-=-= -->--}}
{{--@include('frontend.layouts.inc.blog')--}}
{{--<!-- =-=-=-=-=-=-= Blog Section End =-=-=-=-=-=-= -->--}}
{{--<!-- =-=-=-=-=-=-= Featured Ad Parallex =-=-=-=-=-=-= -->--}}
{{--@include('frontend.layouts.inc.premium-offer')--}}
{{--<!-- =-=-=-=-=-=-= Featured Ad Parallex End =-=-=-=-=-=-= -->--}}
<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
@include('frontend.layouts.inc.footer-dark2')
<!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
</div>

<!-- Back To Top -->
<x-popup />
<!-- =-=-=-=-=-=-= FOOTER SCRIPTS =-=-=-=-=-=-= -->
@include('frontend.layouts.inc.footer-scripts')
@stack('js')
</body>
</html>