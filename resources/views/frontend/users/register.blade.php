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
                        <!-- Row -->
                        <div class="row">
                            <!-- Middle Content Area -->
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <!--  Form -->
                                <div class="form-grid">
                                    <div class="main-signup-header">
                                        <h2 class="text-primary">{{ __('Register') }}</h2>
                                        <h5 class="font-weight-normal mb-4">It's free to signup and only takes a minute.</h5>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                                <div class="col-md-6">
                                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                                    @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                                <div class="col-md-6">
                                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                                    @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                                <div class="col-md-6">
                                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>

                                                <div class="col-md-6">
                                                    <input id="bio" type="text" class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{ old('bio') }}" autocomplete="bio">

                                                    @error('bio')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkbox">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="hidden" name="agree" value="0">
                                                        <input type="checkbox" name="agree" value="1"  data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2" required>
                                                        <label for="checkbox-2" class="custom-control-label mt-1">agree terms & conditions</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-main-primary btn-block">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        {{--<div class="form-group">--}}
                                        {{--<label>Firstname &amp; Lastname</label> <input class="form-control" placeholder="Enter your firstname and lastname" type="text">--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                        {{--<label>Email</label> <input class="form-control" placeholder="Enter your email" type="text">--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                        {{--<label>Password</label> <input class="form-control" placeholder="Enter your password" type="password">--}}
                                        {{--</div><button class="btn btn-main-primary btn-block">Create Account</button>--}}
                                        {{--<div class="row row-xs">--}}
                                        {{--<div class="col-sm-6">--}}
                                        {{--<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-6 mg-t-10 mg-sm-t-0">--}}
                                        {{--<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</form>--}}
                                        <div class="main-signup-footer mt-5">
                                            <p>Already have an account? <a href="{{ route('login')}}">Sign In</a></p>
                                        </div>
                                    </div>
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
