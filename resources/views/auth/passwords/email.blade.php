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
                <div class="row">
                    <!-- Middle Content Area -->
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <!--  Form -->
                        <div class="main-signin-header">
                            <h2>@lang('theme.reset password')</h2>
                            <h4>@lang('theme.please enter') @lang('theme.your email address')</h4>

                            @include('msg.status')

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email">@lang('theme.email address')</label>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="@lang('theme.please enter') @lang('theme.email address')" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-orange btn-block">
                                    @lang('theme.send password reset link')
                                </button>

                            </form>
                        </div>
                        <div class="main-signup-footer mg-t-20">
                            <p>@lang('theme.forget it,') <a href="{{route('login')}}"> @lang('theme.send me back,') </a> @lang('theme.to the sign in screen').</p>
                        </div>                        <!-- Form -->
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    </div>
                {{--<div class="col-md-7  col-md-pull-5  col-xs-12 col-sm-6">--}}
                {{--<div class="heading-panel">--}}
                {{--<h3 class="main-title text-left">--}}
                {{--Sign In to your account--}}
                {{--</h3>--}}
                {{--</div>--}}
                {{--<div class="content-info">--}}
                {{--<div class="features">--}}
                {{--<div class="features-icons">--}}
                {{--<img src="images/icons/chat.png" alt="img">--}}
                {{--</div>--}}
                {{--<div class="features-text">--}}
                {{--<h3>Chat & Messaging</h3>--}}
                {{--<p>--}}
                {{--Access your chats and account info from any device.--}}
                {{--</p>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="features">--}}
                {{--<div class="features-icons">--}}
                {{--<img src="images/icons/panel.png" alt="img">--}}
                {{--</div>--}}
                {{--<div class="features-text">--}}
                {{--<h3>User Dashboard</h3>--}}
                {{--<p>--}}
                {{--Maintain a wishlist by saving your favourite items.--}}
                {{--</p>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<span class="arrowsign hidden-sm hidden-xs"><img src="{{asset('images/arrow.png')}}" alt="" ></span>--}}
                {{--</div>--}}
                {{--</div>--}}
                <!-- Middle Content Area  End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Main Container End -->
        </section>

        <!-- =-=-=-=-=-=-= Ads أرشيف End =-=-=-=-=-=-= -->
        <!-- =-=-=-=-=-=-= Ads أرشيف End =-=-=-=-=-=-= -->
    </div>
@endsection
@push('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

        @if ($errors->any())
        @foreach ($errors->all() as $error)
        @if($loop->first)
        swal("Error!", "{{ $error }}",'error');
        @endif
                @break;
        {{'alert("ss");'}}
        @endforeach

        @endif
        @if (session('status'))
        swal("Success!", "{{ session('status') }}",'success');
        @endif
    </script>

@endpush