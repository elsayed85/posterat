@extends('frontend.layouts.single-category')
@section('content')
    <!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
    <!-- Small Breadcrumb -->
    {{--<div class="small-breadcrumb">--}}
        {{--<div class="container">--}}
            {{--<div class=" breadcrumb-link">--}}
                {{--<ul>--}}
                    {{--<li><a href="{{url('/')}}">@lang('theme.home page')</a></li>--}}
                    {{--<li><a class="active" href="#">@lang('theme.my package')</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <section class="section-padding gray">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- Middle Content Area -->
                <div class="col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar">
                    <!-- Sidebar Widgets -->
                @include('frontend.users.inc._sidebar')
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <!-- Row -->
                    <div class="profile-section margin-bottom-20">
                        <div class="profile-tabs">
                            <ul class="nav nav-justified nav-tabs">
                                <li class="active"><a href="#profile" data-toggle="tab">@lang('theme.my package')</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="profile-edit tab-pane fade in active" id="profile">
                                    <dl class="dl-horizontal">
                                        @if(isset($current_package))
                                            {{--@lang('theme.already have package')--}}
                                            <dt><strong>@lang('theme.paid balance charge')</strong></dt>
                                            <dd>{{$current_package->paid_balance_charge}}</dd>
                                            <dt><strong>@lang('theme.price')</strong><dt>
                                            <dd>{{$current_package->price}}</dd>
                                            <dt><strong>@lang('theme.discount value')</strong></dt>
                                            <dd>{{$current_package->discount_value}}</dd>
                                            <dt><strong>@lang('theme.total price')</strong></dt>
                                            <dd>{{$current_package->total_price}}</dd>
                                            <dt><strong>@lang('theme.expires at')</strong></dt>
                                            <dd>{{$current_package->expires_at}}</dd>

                                            {{--<p>paid balance current:{{$current_package->paid_balance_current}}</p>--}}
                                            {{--<p>promo_code:{{$current_package->promo_code}}</p>--}}
                                       @else
                                            @lang('theme.not found any data')
                                        @endif

                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Middle Content Area  End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads أرشيف End =-=-=-=-=-=-= -->
</div>
@endsection