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
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Email or Phone</label>
                                        </div>
                                        <input id="email" placeholder="Enter your phone or email" type="text" class="form-control @error('email') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input id="password" placeholder="Enter your password"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                &nbsp;&nbsp;&nbsp;&nbsp; {{ __('Remember Me') }} &nbsp;&nbsp;&nbsp;&nbsp;
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-theme btn-lg btn-block">
                                            {{ __('Login') }}
                                        </button>


                                        <!--  <div class="row row-xs">
                                             <div class="col-sm-6">
                                                 <button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
                                             </div>
                                             <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                 <button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
                                             </div>
                                         </div> -->
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
