@extends('frontend.layouts.single-category')
@section('content')
    <!-- Small Breadcrumb -->
    {{--<div class="small-breadcrumb" xmlns="">--}}
    {{--<div class="container">--}}
    {{--<div class=" breadcrumb-link">--}}
    {{--<ul>--}}
    {{--<li><a href="{{url('/')}}">@lang('theme.home page')</a></li>--}}
    {{--<li><a class="active" href="#">@lang('theme.my profile')</a></li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <!-- Small Breadcrumb -->
    <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <section class="section-padding error-page pattern-bg ">
        <!-- Main Container -->
        <div class="container">
            <div align="center">
                <a href="{{url('/')}}"><img alt="logo" src="{{asset(trans('theme.path').'/images/home/logo.png')}}" style="text-align: center;"></a>
            </div>
            <!-- Row -->
            <br>
            <br>
            <div class="row">
                <!-- Middle Content Area -->
                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
                </div>
                <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
                    <!--  Form -->
                        <div class="row justify-content-center">
                                    <div class="card-header">@lang('theme.verify your email address')</div>

                                    <div class="card-body">
                                        @if (session('resent'))
                                            <div class="alert alert-success" role="alert">
                                                @lang('theme.a fresh verification link has been sent to your email address.')
                                            </div>
                                        @endif

                                        @lang('theme.before proceeding, please check your email for a verification link.')
                                        @lang('theme.if you did not receive the email,')
                                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">@lang('theme.click here to request another')</button>.
                                        </form>
                                    </div>
                                </div>
                    <!-- Form -->
                </div>
                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>

    <!-- =-=-=-=-=-=-= Ads أرشيف End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Ads أرشيف End =-=-=-=-=-=-= -->
</div>
@endsection