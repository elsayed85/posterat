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
                <!-- الفئات -->
                    {{--<div class="widget">--}}
                        {{--<div class="widget-heading">--}}
                            {{--<h4 class="panel-title"><a>تغيير خطتك</a></h4>--}}
                        {{--</div>--}}
                        {{--<div class="widget-content">--}}
                            {{--<select class=" form-control">--}}
                                {{--<option label="Select Option"></option>--}}
                                {{--<option value="0">Free</option>--}}
                                {{--<option value="1">Premium</option>--}}
                                {{--<option value="2">Featured</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <!-- Row -->
                    <div class="profile-section margin-bottom-20">
                        <div class="profile-tabs">
                            <ul class="nav nav-justified nav-tabs">
                                <li class="active"><a href="#profile" data-toggle="tab">@lang('theme.my profile')</a></li>
                                <li><a href="#edit" data-toggle="tab">@lang('theme.edit') @lang('theme.my profile')</a></li>
                                {{--<li><a href="#payment" data-toggle="tab">إعداد خطة</a></li>--}}
                                {{--<li><a href="#settings" data-toggle="tab">إعدادات الإشعار</a></li>--}}
                            </ul>
                            <div class="tab-content">
                                <div class="profile-edit tab-pane fade in active" id="profile">
                                    <dl class="dl-horizontal">
                                        <dt><strong>@lang('theme.first name')</strong></dt>
                                        <dd>
                                            {{$user->first_name}}
                                        </dd>
                                        <dt><strong>@lang('theme.last name')</strong></dt>
                                        <dd>
                                            {{$user->last_name}}
                                        </dd>

                                        <dt><strong>@lang('theme.email address')</strong></dt>
                                        <dd>
                                            {{$user->email}}
                                        </dd>
                                        <dt><strong>@lang('theme.phone')</strong></dt>
                                        <dd>
                                            {{$user->phone}}
                                        </dd>
                                        <dt><strong>@lang('theme.whatsapp') </strong></dt>
                                        <dd>
                                            {{$user->whatsapp}}
                                        </dd>
                                        <dt><strong>@lang('theme.usual balance')</strong></dt>
                                        <dd>
                                            {{$user->usual_balance}}
                                        </dd>
                                        <dt><strong>@lang('theme.expired/renew')</strong></dt>
                                        <dd>
                                            {{$user->usual_expired_at}}
                                        </dd>
                                        <dt><strong>@lang('theme.paid balance') </strong></dt>
                                        <dd>
                                            {{$user->paid_balance}}
                                        </dd>
                                        <dt><strong>@lang('theme.expired at') </strong></dt>
                                        <dd>
                                            {{$user->paid_expired_at}}
                                        </dd>
                                        <dt><strong>@lang('theme.points') </strong></dt>
                                        <dd>
                                            {{$user->points}}
                                        </dd>
                                        <dt><strong> @lang('theme.bio') </strong></dt>
                                        <dd>
                                            {{$user->bio}}
                                        </dd>
                                    </dl>
                                </div>
                                <div class="profile-edit tab-pane fade" id="edit">
                                    <div class="clearfix"></div>
                                    <form role="form" autocomplete="off" action="{{route('profile.update')}}" method="post">
                                        {{--{{ method_field('patch') }}--}}
                                        @csrf

                                        <input name="id" value="{{$user->id}}" type="hidden">

                                        <div class="form-group">
                                            <label for="FullName">@lang('theme.first name')</label>
                                            <input type="text" value="{{$user->first_name}}" id="first_name" name="first_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="FullName">@lang('theme.last name')</label>
                                            <input type="text" value="{{$user->last_name}}" id="last_name" name="last_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Email">@lang('theme.email address')</label>
                                            <input type="email" value="{{$user->email}}" id="email" name="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Username">@lang('theme.phone')</label>
                                            <input type="text" value="{{$user->phone}}" id="phone" name="phone" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Username">@lang('theme.whatsapp')</label>
                                            <input type="text" value="{{$user->whatsapp}}" id="whatsapp" name="whatsapp" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Password">@lang('theme.password')</label>
                                            <input type="password" placeholder="8 - 15 Characters" id="password" name="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="RePassword">@lang('theme.re-password')</label>
                                            <input type="password" placeholder="8 - 15 Characters" id="confirm_password" name="password_confirmation" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="AboutMe">@lang('theme.bio')</label>
                                            <textarea id="bio" name="bio" class="form-control">{{$user->bio}}</textarea>
                                        </div>
                                        <button class="btn btn-warning waves-effect waves-light w-md" type="submit">@lang('theme.save changes')</button>
                                    </form>

                                </div>
                                {{--<div class="profile-edit tab-pane fade" id="payment">--}}
                                    {{--<h2 class="heading-md">Manage your Package Settings</h2>--}}
                                    {{--<p>Below are the payment options for your account.</p>--}}
                                    {{--<br>--}}
                                    {{--<form action="#" id="sky-form" class="sky-form" novalidate>--}}
                                        {{--<!--Checkout-Form-->--}}
                                        {{--<dl class="dl-horizontal">--}}
                                            {{--<dt><strong>Current Plan</strong></dt>--}}
                                            {{--<dd>--}}
                                                {{--Premium--}}
                                            {{--</dd>--}}
                                            {{--<dt><strong>Expiration Date </strong></dt>--}}
                                            {{--<dd>--}}
                                                {{--2nd January 2017--}}
                                            {{--</dd>--}}
                                        {{--</dl>--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-sm-12 col-md-12 margin-bottom-20">--}}
                                                {{--<label>حدد خطة You Want To Change<span class="color-red">*</span></label>--}}
                                                {{--<select class="form-control">--}}
                                                    {{--<option value="0">Free</option>--}}
                                                    {{--<option value="1">Premium</option>--}}
                                                    {{--<option value="2">Advanced</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<button class="btn btn-sm btn-default" type="button">Cancel</button>--}}
                                        {{--<button type="submit" class="btn btn-sm btn-theme">Save Changes</button>--}}
                                        {{--<!--End Checkout-Form-->--}}
                                    {{--</form>--}}
                                {{--</div>--}}
                                {{--<div class="profile-edit tab-pane fade" id="settings">--}}
                                    {{--<h2 class="heading-md">Manage your Notifications.</h2>--}}
                                    {{--<p>Below are the notifications you may manage.</p>--}}
                                    {{--<br>--}}
                                    {{--<form>--}}
                                        {{--<div class="skin-minimal">--}}
                                            {{--<ul class="list">--}}
                                                {{--<li>--}}
                                                    {{--<input  type="checkbox" id="minimal-checkbox-1">--}}
                                                    {{--<label for="minimal-checkbox-1">Send me email notification when Ad is processed</label>--}}
                                                {{--</li>--}}
                                                {{--<li>--}}
                                                    {{--<input  type="checkbox" id="minimal-checkbox-2">--}}
                                                    {{--<label for="minimal-checkbox-2">Send me email notification when user comment</label>--}}
                                                {{--</li>--}}
                                                {{--<li>--}}
                                                    {{--<input  type="checkbox" id="minimal-checkbox-3">--}}
                                                    {{--<label for="minimal-checkbox-3">Send me email notification for the latest update</label>--}}
                                                {{--</li>--}}
                                                {{--<li>--}}
                                                    {{--<input  type="checkbox" id="minimal-checkbox-4">--}}
                                                    {{--<label for="minimal-checkbox-4"> Receive our monthly newsletter</label>--}}
                                                {{--</li>--}}
                                                {{--<li>--}}
                                                    {{--<input  type="checkbox" id="minimal-checkbox-5">--}}
                                                    {{--<label for="minimal-checkbox-5">Email notification</label>--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="button-group margin-top-20">--}}
                                            {{--<button class="btn btn-sm btn-default" type="button">Reset</button>--}}
                                            {{--<button type="submit" class="btn btn-sm btn-theme">Save Changes</button>--}}
                                        {{--</div>--}}
                                    {{--</form>--}}
                                {{--</div>--}}
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
