@extends('frontend.layouts.single-category')
@section('content')
    <!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
    <!-- Small Breadcrumb -->
    {{--<div class="small-breadcrumb">--}}
        {{--<div class="container">--}}
            {{--<div class=" breadcrumb-link">--}}
                {{--<ul>--}}
                    {{--<li><a href="{{url('/')}}">@lang('theme.home page')</a></li>--}}
                    {{--<li><a class="active" href="#">@lang('theme.inbox')</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="main-content-area clearfix">
        <!-- COURSE CONCERN -->
        <section class="section-padding gray">
            <div class="container">
                <div class="row">
                    <div class="message-body">
                        <div class="col-md-4 col-sm-5 col-xs-12">
                            <div class="message-inbox">
                                <div class="message-header">
                                    <h4>@lang('theme.inbox')</h4>
                                </div>
                                <ul class="message-history">
                                    @foreach($ad_messages as $ad_message)
                                    <!-- LIST ITEM -->
                                   {{--@if($loop->first)--}}
                                        {{--<li class="active">--}}
                                    {{--@else--}}
                                            {{--<li class="message-grid">--}}

                                        {{--@endif--}}
                                        <li class="message-grid">
                                        <a href="?ad_message={{$ad_message->ad->id}}">
                                            <div class="image">
                                                {{--<img src="images/users/1.jpg" alt="">--}}
                                            </div>
                                            <div class="user-name">
                                                <div class="author">
                                                    <span>{{$ad_message->first}}</span><div class="user-status"></div>
                                                </div>
                                                <p>{{Str::limit($ad_message->ad->title??'', 50, $end='.......')}}</p>
                                                {{--<div class="time">--}}
                                                    {{--<span>{{$ad_message->ad->since}}</span>--}}
                                                {{--</div>--}}
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8 clearfix col-sm-5 col-xs-12 message-content">
                            <div class="message-details">
                                @foreach($user_ad_messages as $user_ad_message)
                                        @if($loop->first)
                                <div class="author">
                                    <div class="image">
                                        {{--<img src="images/users/3.jpg" alt="">--}}
                                    </div>
                                    <span class="author-name">{{$user_ad_message->ad->user->full_name}}</span>
                                    {{--<em>{{$user_ad_message->ad->since}}</em>--}}
                                </div>
                                <h2>{{$user_ad_message->ad->title}}</h2>
                                        <ul class="messages">
                                        @endif
                    @if($user_ad_message->to_user_id == auth()->user()->id )
                                                <li class="friend-message clearfix">
                    @else
                                                <li class="my-message clearfix">
                                                    @endif
                                        {{--<figure class="profile-picture">--}}
                                            {{--<img src="images/users/1.jpg" class="img-circle" alt="الملف الشخصي Pic">--}}
                                        {{--</figure>--}}
                                        <div class="message">
                                            {{$user_ad_message->message}}
                                            <div class="time"><i class="fa fa-clock-o"></i> {{$user_ad_message->since??''}}</div>
                                        </div>
                                    </li>
                                        @if($loop->last)
                                        </ul>
                                         @endif
                                @endforeach
                                @if(count($ad_messages))
                                <div class="chat-form ">
                                    <form role="form" class="form-inline" id="admessage" action="{{route('admessages.store')}}">
                                        <div class="form-group">
                                            <input name="message" id="message" style="width: 100%" placeholder="Type a message here..." class="form-control" type="text">
                                        </div>
                                        <button class="btn btn-theme" type="submit">@lang('theme.send message')</button>
                                    </form>
                                </div>
                                @else
                                        <div class="chat-form">
                                           you don't have any message
                                        </div>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END / COURSE CONCERN -->
</div>
@endsection
@push('js')
<!-- For This Page Only -->
<script type="text/javascript" src="{{asset(trans('theme.path').'/js/perfect-scrollbar.min.js')}}"></script>
<script>
         (function($) {
        "use strict";
        $('.message-history').wrap('<div class="list-wrap"></div>');
        function scrollbar() {
            var $scrollbar = $('.message-inbox .list-wrap');
            $scrollbar.perfectScrollbar({
                maxScrollbarLength: 150,
            });
            $scrollbar.perfectScrollbar('update');
        }
        scrollbar();
        $('.messages').wrap('<div class="list-wraps"></div>');
        function scrollbar1() {
            var $scrollbar1 = $('.message-details .list-wraps');
            $scrollbar1.perfectScrollbar({
                maxScrollbarLength: 150,
            });
            $scrollbar1.perfectScrollbar('update');
        }
        scrollbar1();
    })(jQuery);
         $(document).ready(function() {
             $("form#admessage").submit(function (event) {
                 event.preventDefault();
                 var ad_id = '{{request('ad_message',$user_ad_messages[0]->ad_id??"")}}';
                 var message = $("#message").val();

                 $.ajaxSetup({
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                 });
                 $.ajax({
                     type: "POST",
                     url: '{{route('admessages.store')}}',
                     data: "ad_id=" + ad_id + "&message=" + message,
                     success: function (data) {
                         $('form#admessage').html('{{trans('theme.done successfully')}}');
                     },
                     error: function (xhr) {
                         if (xhr.status == 401) {
                             window.location.href = '{{route('login')}}';
                         }
                     }
                 });
             });

         });
</script>

@endpush