@extends('frontend.layouts.single-category')
@section('content')
@includeWhen(get_setting('popular_categories'),'frontend.layouts.inc.popular-categories')
    <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
    <div class="main-content-area clearfix">
        <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
        <section class="section-padding gray">
            <!-- Main Container -->
            <div class="container">
                <!-- Row -->
                <div class="row">
                    <!-- Middle Content Area -->
                    @include('frontend.layouts.inc.featured-ads-category')
                    <!-- Middle Content Area  End -->
                    <!-- Left Sidebar -->
                    <div class="col-md-4 col-md-pull-8 col-sx-12">
                        <!-- Sidebar Widgets -->
                        <div class="sidebar">
                            <!-- Panel group -->
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                             @include('frontend.layouts.inc.categories-filter')
                                <!-- إعلانات مميزة Panel -->
                                @includeWhen(get_setting('last_ads_category'),'frontend.layouts.inc.special-ads')
                                <!-- إعلانات مميزة Panel End -->
                                <!-- Latest Ads Panel -->
                            @includeWhen(get_setting('special_ads_category'),'frontend.layouts.inc.latest-ads-panel')
                                <!-- Latest Ads Panel End -->
                            </div>
                            <!-- panel-group end -->
                        </div>
                        <!-- Sidebar Widgets End -->
                    </div>
                    <!-- Left Sidebar End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Main Container End -->
        </section>
        <!-- =-=-=-=-=-=-= Ads أرشيف End =-=-=-=-=-=-= -->
    </div>
    <!-- Main Content Area End -->
@endsection