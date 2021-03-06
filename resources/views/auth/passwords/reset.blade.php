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
                        <div class="form-grid">
                            <h2>Welcome back!</h2>
                            <h4 class="text-left">{{ __('Reset Password') }}</h4>
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group text-left">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                    @enderror
                                </div>

                                <label for="password">{{ __('Password') }}</label>

                                <div class="form-group text-left">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group text-left">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" placeholder="Enter your password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <button class="btn ripple btn-main-primary btn-block" type="submit">
                                    {{ __('Reset Password') }}
                                </button>
                            </form>
                        </div>
                        <!-- Form -->
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

        <!-- =-=-=-=-=-=-= Ads ?????????? End =-=-=-=-=-=-= -->
        <!-- =-=-=-=-=-=-= Ads ?????????? End =-=-=-=-=-=-= -->
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
