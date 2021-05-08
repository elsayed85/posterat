<!DOCTYPE html>
<html lang="@if(config('app.locale')=='en'){{'en'}}@else{{'ar'}}@endif">
<head>
    @include('frontend.layouts.inc.header')
</head>
<body {{config('app.locale')=='ar'?'class="rtl"':''}}>
<!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
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
@include('frontend.layouts.inc.advertizing')
<!-- =-=-=-=-=-=-= Advertizing Section =-=-=-=-=-=-= -->
    <!-- Main Section -->
    <section class="custom-padding gray">
        <!-- Main Container -->
    {{--@include('frontend.layouts.inc.main-container')--}}
    <!-- Main Container End -->
    </section>
    <!-- Main Section -->
    <!-- =-=-=-=-=-=-= Featured Ads =-=-=-=-=-=-= -->
@include('frontend.layouts.inc.featured-ads')
<!-- =-=-=-=-=-=-= Featured Ads End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Statistics Counter =-=-=-=-=-=-= -->
@include('frontend.layouts.inc.statistics')
<!-- /.funfacts -->
    <!-- =-=-=-=-=-=-= Statistics Counter End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Blog Section =-=-=-=-=-=-= -->
@include('frontend.layouts.inc.blog')
<!-- =-=-=-=-=-=-= Blog Section End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Featured Ad Parallex =-=-=-=-=-=-= -->
@include('frontend.layouts.inc.premium-offer')
<!-- =-=-=-=-=-=-= Featured Ad Parallex End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
@include('frontend.layouts.inc.footer')
<!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
</div>
<!-- Post Ad Sticky -->
<!--<a href="#" class="sticky-post-button">
         <span class="sell-icons">
         <i class="flaticon-technology-19"></i>
         </span>
    <h4>SELL</h4>
</a> -->
<!-- Back To Top -->
<a href="#0" class="cd-top">Top</a>
<!-- =-=-=-=-=-=-= FOOTER SCRIPTS =-=-=-=-=-=-= -->
@include('frontend.layouts.inc.footer-scripts')
</body>
</html>