<!DOCTYPE html>
<html lang="@if(config('app.locale')=='en'){{'en'}}@else{{'ar'}}@endif">
<head>
@include('frontend.layouts.parts.header')
</head>
<body {{config('app.locale')=='ar'?'class="rtl"':''}}>
<!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- =-=-=-=-=-=-= Color Switcher =-=-=-=-=-=-= -->
@include('frontend.layouts.parts.color-switcher')
<!-- =-=-=-=-=-=-= Dark Header =-=-=-=-=-=-= -->
<!-- Top Bar -->
@include('frontend.layouts.parts.top-bar')
<!-- Top Bar End -->
<!-- Header -->
@include('frontend.layouts.parts.main-header')
<div class="main-menu">
    <!-- Navigation Bar -->
   @include('frontend.layouts.parts.navbar-mega')
</div>
<div class="clearfix"></div>
<!-- =-=-=-=-=-=-= Dark Header End =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Advertizing Section =-=-=-=-=-=-= -->
@include('frontend.layouts.parts.advertizing')
    <!-- =-=-=-=-=-=-= Advertizing Section =-=-=-=-=-=-= -->
    <!-- Main Section -->
    <section class="custom-padding gray">
        <!-- Main Container -->
    @include('frontend.layouts.parts.main-container')
        <!-- Main Container End -->
    </section>
    <!-- Main Section -->
    <!-- =-=-=-=-=-=-= Featured Ads =-=-=-=-=-=-= -->
    @include('frontend.layouts.parts.featured-ads')
    <!-- =-=-=-=-=-=-= Featured Ads End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Statistics Counter =-=-=-=-=-=-= -->
    @include('frontend.layouts.parts.statistics')
    <!-- /.funfacts -->
    <!-- =-=-=-=-=-=-= Statistics Counter End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Blog Section =-=-=-=-=-=-= -->
    @include('frontend.layouts.parts.blog')
    <!-- =-=-=-=-=-=-= Blog Section End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Featured Ad Parallex =-=-=-=-=-=-= -->
    @include('frontend.layouts.parts.premium-offer')
    <!-- =-=-=-=-=-=-= Featured Ad Parallex End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
    @include('frontend.layouts.parts.footer')
    <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
</div>
<!-- Post Ad Sticky -->
<!-- <a href="#" class="sticky-post-button">
         <span class="sell-icons">
         <i class="flaticon-technology-19"></i>
         </span>
    <h4>SELL</h4>
</a> -->
<!-- Back To Top -->
<a href="#0" class="cd-top">Top</a>
<!-- =-=-=-=-=-=-= FOOTER SCRIPTS =-=-=-=-=-=-= -->
@include('frontend.layouts.parts.footer-scripts')
</body>
</html>