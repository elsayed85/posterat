@extends('frontend.layouts.single-ad')
@section('content')
    <section class="section-padding error-page pattern-bgs gray ">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- Middle Content Area -->
                <div class="col-md-8 col-xs-12 col-sm-12">
                    <!-- إعلان واحد -->
                    <div class="single-ad">
                        <!-- Title -->
                        <div class="ad-box">
                            <h1>{{$ad->title}}</h1>
                            <div class="short-history">
                                <ul>
                                    <li>@lang('theme.since'): <b>{{$ad->since}}</b></li>
                                    <li>@lang('theme.category'): <b><a href="{{route('categories.show',$ad->category->id)}}">{{$ad->category->title}}</a></b></li>
                                    <li>@lang('theme.city'): <b>{{$ad->city->name}}</b></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Listing Slider  -->

                        <div class="flexslider single-page-slider">
                            <div class="flex-viewport">
                                <ul class="slides slide-main">
                                    <li class="flex-active-slide"><img alt="" src="{{asset($ad->image)}}" title="">
                                       </li>
                                @if(isset($ad->photos) && count($ad->photos))
                                    @foreach($ad->photos as $photo)
                                        <li><img alt="" src="{{asset($photo->url)}}" title="{{$ad->title}}"></li>
                                   @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <!-- Listing Slider Thumb -->
                        @if(isset($ad->photos) && count($ad->photos))
                            <div class="flexslider" id="carousels">
                                <div class="flex-viewport">
                                    <ul class="slides slide-thumbnail">
                                        <li class="flex-active-slide"><img alt="" draggable="false" src="{{asset($ad->image_thumb)}}"> </li>
                                    @foreach($ad->photos as $photo)
                                        <li><img alt="" draggable="false" src="{{asset($photo->url_thumb)}}"> </li>
                                        @endforeach
                                        <!-- items mirrored twice, total of 12 -->
                                    </ul>
                                </div>
                            </div>
                    @endif
                        @if($ad->sold == 1)
                            <div class="sold">
                                <img class="img-responsive" src="{{asset('theme/images/sold.png')}}" alt="">
                            </div>
                    @endif

                    <!-- حصة الإعلان  -->
                        <div class="ad-share text-center">
                            <button class="ad-box col-md-4 col-sm-4 col-xs-12"  onclick="doBookmark()"><i class="fa fa-bookmark  {{$ad->is_bookmarked()?'action_done':'action_pend'}}" id="save_ad"></i> <span class="hidetext is_saved">@lang('theme.save ad')</span></button>
                            <button class="ad-box col-md-4 col-sm-4 col-xs-12"><i class="fa fa-eye active"></i> <span class="hidetext">{{$ad->total_views}}</span></button>
                            <button class="ad-box col-md-4 col-sm-4 col-xs-12" onclick="doLike()"><i class="fa fa-heart {{$like?'action_done':'action_pend'}}" id="like"></i> <span class="hidetext total_likes">{{$ad->total_likes}}</span></button>
                        </div>
                        <div class="clearfix"></div>
                        <!-- Short Description  -->
                        <div class="ad-box">
                            <div class="short-features">
                                <!-- Heading Area -->
                            @if(is_array($ad->details))
                                <div class="heading-panel">
                                    <h3 class="main-title text-left">
                                @lang('theme.ad detail')
                                    </h3>
                                </div>
                                <br>
                                    @foreach($custom_inputs as $custom)

                                            @foreach($ad->details as $key => $value)
                                                @if($custom->input_name==$key)
                                                <div class="col-sm-3 col-md-3 col-xs-12 no-padding">
                                                    {{--<div class="custom-field">--}}
                                            {{--<div class="check-true" style=""></div>--}}
                                                    <div  class="col-sm-2 col-md-2 col-xs-6 no-padding">
{{--<img src="{{$custom->input_icon}}" class="input_icon" style="background-color:#fff;display:inline-block; max-width:30px;max-height:30px;border-radius: 50%;">--}}
<img src="{{$custom->input_icon}}" class="input_icon" style="background-color:#fff;display:block; max-width:35px;max-height:35px;border-radius: 50%;">
                                                    </div> <div  class="col-sm-10 col-md-10 col-xs-6">
                                                           <p>{{$custom->input_title}} @if($value!='' && $value !=0  && $custom->input_type != 'checkbox') : @endif</p>
@if($value!='' && $custom->input_type != 'checkbox')
                                                            <b>{!! $value !!}</b>
    @endif
                                                       </div>
                                        </div>
                                                {{--</div>--}}
                                            @endif
                                                @endforeach
                                    @endforeach
                                @endif
                            </div>
                            {{--<!-- Short Features  -->--}}
                            {{--<div class="desc-points">--}}
                            {{--</div>--}}
                            {{--<!-- Related Image  -->--}}
                            {{--<div class="ad-related-img">--}}
                                {{--<img src="{{asset(trans('theme.path').'/images/car-img1.png')}}" alt="" class="img-responsive center-block">--}}
                            {{--</div>--}}
                            <!-- Ad Specifications -->
                            <div class="specification">
                                <!-- Heading Area -->
                                <div class="heading-panel">
                                    <h3 class="main-title text-left">
                                        @lang('ad.description')
                                    </h3>
                                </div>
                       {{$ad->description}}
                            </div>
                            <div class="clearfix"></div>
                            <div class="ad-share text-center">
                                {{--<div data-toggle="modal" data-target=".share-ad" class="ad-box col-md-4 col-sm-4 col-xs-12">--}}
                                    {{--<i class="fa fa-share-alt"></i> <span class="hidetext">شارك</span>--}}
                                {{--</div>--}}

                                    <a class="ad-box col-md-4 col-sm-4 col-xs-12" href="#"  data-toggle="modal" data-target=".price-quote">
                                        <i class="fa fa-envelope active"></i> <span class="hidetext">{{trans('theme.contact with seller')}}</span>
                                    </a>

                                @if($ad->allow_contact && !$ad->via_message)
                                    <a class="ad-box col-md-4 col-sm-4 col-xs-12" href="tel:{{get_setting('pre_phone')}}{{$ad->phone}}"><i class="fa fa-phone active"></i> <span class="hidetext">{{trans('theme.call the seller')}}</span></a>
                                    @else
                                    <a class="ad-box col-md-4 col-sm-4 col-xs-12" href="#"><i class="fa fa-phone"></i> <span class="hidetext small">{{trans('theme.not via call')}}</span></a>
                                @endif
                                <div data-target=".report-quote" data-toggle="modal" class="ad-box col-md-4 col-sm-4 col-xs-12">
                                    <i class="fa fa-warning"></i> <span class="hidetext">@lang('theme.report abuse')</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- إعلان واحد End -->
                    <!-- Price Alert -->
                    <!-- Price Alert End -->
                    @if(count($related_ads))
                    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
                    <div class="grid-panel margin-top-30">
                        <div class="heading-panel">
                            <div class="col-xs-12 col-md-12 col-sm-12">
                                <h3 class="main-title text-left">
                                    @lang('theme.related ads')
                                </h3>
                            </div>
                        </div>
                        <!-- Ads Archive -->
                        <div class="posts-masonry">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <!-- Ads Listing -->
                               @foreach($related_ads as $related_ad)
                                    <div class="ads-list-archive">
                                    <!-- Image Block -->
                                    <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
                                        <!-- Img Block -->
                                        <div class="ad-archive-img">
                                            <a href="{{route('ads.show',$related_ad->id)}}">
{{--@if(get_setting('premium_ad_mark'))  <div class="ribbon popular"></div>  @endif--}}
                                                <img class="img-responsive" src="{{asset($related_ad->image)}}" alt="">
                                            </a>
                                        </div>
                                        <!-- Img Block -->
                                    </div>
                                    <!-- Ads Listing -->
                                    <div class="clearfix visible-xs-block"></div>
                                    <!-- Content Block -->
                                    <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
                                        <!-- Ad Desc -->
                                        <div class="ad-archive-desc">
                                            <!-- Price -->
                                            <div class="ad-price" style="font-size: small;">{{$related_ad->price}}</div>
                                            <!-- Title -->
                                            <h3>{{$related_ad->title}} </h3>
                                            <!-- Category -->
                                            <div class="category-title"> <span><a href="{{route('categories.show',$related_ad->category->id)}}">{{$related_ad->category->title}}</a></span> </div>
                                            <!-- Short Description -->
                                            <div class="clearfix visible-xs-block"></div>
                                            <p class="hidden-sm">{{Str::limit($related_ad->description, 50, $end='.......')}}</p>
                                            <!-- Ad Features -->
                                            {{--@include('frontend.ads.ads-inc.ad-info')--}}
                                            <!-- Ad History -->
                                            <div class="clearfix archive-history">
                                                <div class="last-updated">{{$related_ad->since}}</div>
                                                <div class="ad-meta"><a class="btn btn-success"> <i class="fa fa-heart-o"></i>  </a>  {{trans_choice('theme.likes',$related_ad->total_likes,['number'=>$related_ad->total_likes])}}</div>
                                                {{--<div class="ad-meta"> <a class="btn save-ad"><i class="fa fa-heart-o"></i> حفظ الإعلان.</a> <a class="btn btn-success"><i class="fa fa-phone"></i> تفاصيل.</a> </div>--}}

                                            </div>
                                        </div>
                                        <!-- Ad Desc End -->
                                    </div>
                                    <!-- Content Block End -->
                                </div>
                                   @endforeach

                            </div>
                        </div>
                    </div>
                    <!-- =-=-=-=-=-=-= Latest Ads End =-=-=-=-=-=-= -->
                    @endif
                </div>
                <!-- Right Sidebar -->
                <div class="col-md-4 col-xs-12 col-sm-12">
                    <!-- Sidebar Widgets -->
                    <div class="sidebar">
                        <!-- Contact info -->
                        <div class="contact white-bg">
                            <!-- Email Button trigger modal -->
                            <button class="btn-block btn-contact contactEmail" data-toggle="modal" data-target=".price-quote" >@lang('theme.via message')</button>
                            @if($ad->allow_contact && !$ad->via_message)
                                <button class="btn-block btn-contact contactWhatsapp" onclick="window.open('{{"https://wa.me/".get_setting('pre_phone').$ad->phone}}')">@lang('theme.via whatsapp')</button>
                                <button onclick="document.location='tel:{{get_setting('pre_phone')}}{{$ad->sub_phone}}'" class="btn-block btn-contact contactPhone number" data-last="{{$ad->phone}}" >{{get_setting('pre_phone')}}<span>{{$ad->sub_phone}}</span></button>
                            @else
                            {{--<button class="btn-block btn-contact contactPhone number" ><span><span class="small">@lang('theme.not via call')</span></span></button>--}}
                            @endif
                        </div>
                        <!-- Price info block -->
                        <div class="ad-listing-price">
                            <p  style="font-size: small;">{{$ad->price}}</p>
                        </div>
                        <!-- User Info -->
                        <div class="white-bg user-contact-info">
                            <div class="user-info-card">
                                <div class="user-photo col-md-4 col-sm-3  col-xs-4">
                                    @if(is_null($ad->user->photo_thumb))
                                        <img src="{{asset(trans('theme.path').'/images/users/9.jpg')}}" alt="">
                                    @else
                                        <img src="{{asset($ad->user->photo_thumb)}}" alt="">
                                        @endif
                                </div>
                                <div class="user-information no-padding col-md-8 col-sm-9 col-xs-8">
                                    <span class="user-name"><a class="hover-color" href="{{route('userads',$ad->user->id)}}">{{$ad->user->full_name}}</a></span>
                                    <div class="item-date">
                                        <span class="ad-pub">@lang('theme.member registered'): {{$ad->user->since}}</span><br>
                                        @if(get_setting('more_ads'))<a href="#user_id.ads" class="link">@lang('theme.more ads')</a>@endif
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="ad-listing-meta">
                                <ul>
                                    <li> @lang('ad.ad_id') <span class="color">{{$ad->id}}</span></li>
                                    <li> @lang('ad.type_is') <span class="color">{{trans('ad.'.$ad->type_is)}}</span></li>
                                    <li> @lang('ad.total_views') <span class="color">{{$ad->total_views}}</span></li>
                                    <li> @lang('ad.city_name') <span class="color">{{$ad->city->name}}</span></li>
                                    {{--<li>الفئات: <span class="color">{{$ad->mode}}</span></li>--}}
                                </ul>
                            </div>
                            <div id="itemMap" style="width: 100%; height: 370px; margin-bottom:5px;"></div>
                        </div>
                        <!-- إعلانات مميزة -->
                    {{--@include('frontend.ads.ads-inc.featured-ads')--}}
                        <!-- Recent Ads -->
                    {{--@include('frontend.ads.ads-inc.recent-ads')--}}
                        <!-- نصائح الأمان  -->
                      @if(get_setting('ad_advice'))
                            <div class="widget">
                                <div class="widget-heading">
                                    <h4 class="panel-title"><a>نصائح لسلامة الصفقة</a></h4>
                                </div>
                                <div class="widget-content saftey">
                                    <ol>
                                        <li>استخدام مكان آمن لتلبية البائع</li>
                                        <li>تجنب المعاملات النقدية</li>
                                        <li>حذار من العروض غير واقعية</li>
                                    </ol>
                                </div>
                            </div>
                          @endif
                    </div>
                    <!-- Sidebar Widgets End -->
                </div>
                <!-- Middle Content Area  End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!---------------------------------MODAL JS---------------------------->
    <!-- =-=-=-=-=-=-= Quote Modal =-=-=-=-=-=-= -->
    <div class="modal fade price-quote" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">@lang('theme.send message')</h3>
                </div>
                <div class="modal-body">
                    <div class="recent-ads">
                        <div class="recent-ads-list">
                            <div class="recent-ads-container">
                                <div class="recent-ads-list-image">
                                    <a href="#" class="recent-ads-list-image-inner">
                                        <img src="{{asset($ad->image)}}" alt="{{$ad->title}}">
                                    </a><!-- /.recent-ads-list-image-inner -->
                                </div>
                                <!-- /.recent-ads-list-image -->
                                <div class="recent-ads-list-content">
                                    <h3 class="recent-ads-list-title">
                                        <a href="#">{{$ad->title}}</a>
                                    </h3>
                                    <ul class="recent-ads-list-location">
                                        <li><a href="#">{{$ad->city->name}}</a>,</li>
                                    </ul>
                                    <div class="recent-ads-list-price" style="font-size: small;">
                                        {{$ad->price}}
                                    </div>
                                    <!-- /.recent-ads-list-price -->
                                </div>
                                <!-- /.recent-ads-list-content -->
                            </div>
                            <!-- /.recent-ads-container -->
                        </div>
                    </div>
                    <!-- content goes here -->
                 @auth
                        <form id="admessage" action="{{route('admessages.store')}}">
                        <div class="form-group  col-md-12  col-sm-12">
                            <label>@lang('theme.your name')</label>
                            <input type="text" class="form-control" value="{{auth()->user()->full_name}}" readonly>
                        </div>
                        {{--<div class="form-group  col-md-6  col-sm-6">--}}
                            {{--<label>@lang('theme.phone')</label>--}}
                            {{--<input type="phone" class="form-control" value="{{auth()->user()->phone}}">--}}
                        {{--</div>--}}
                        {{--<div class="form-group  col-md-12  col-sm-12">--}}
                            {{--<label>رقم الاتصال</label>--}}
                            {{--<input type="text" class="form-control" placeholder="رقم الاتصال">--}}
                        {{--</div>--}}
                        <div class="form-group  col-md-12  col-sm-12">
                            <label>@lang('theme.message')</label>
                            <textarea name="message" id="message" placeholder="@lang('theme.i would ask about')" rows="3" class="form-control">@lang('theme.i would ask about') {{$ad->title}}</textarea>
                        </div>
                        {{--<div class="col-md-12  col-sm-12"> <img src="{{asset(trans('theme.path').'/images/captcha.gif')}}" alt="" class="img-responsive"> </div>--}}
                        <div class="clearfix"></div>
                        <div class="col-md-12  col-sm-12 margin-bottom-20 margin-top-20">
                            <button type="submit" class="btn btn-theme btn-block">@lang('theme.send message')</button>
                        </div>
                    </form>
                    @else
                        <a href="{{route('login')}}">@lang('theme.please login')</a>
                        @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- =-=-=-=-=-=-= Share Modal =-=-=-=-=-=-= -->
    <div class="modal fade share-ad" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title">شارك</h3>
                </div>
                <div class="modal-body">
                    <div class="recent-ads">
                        <div class="recent-ads-list">
                            <div class="recent-ads-container">
                                <div class="recent-ads-list-image">
                                    <a href="#" class="recent-ads-list-image-inner">
                                        <img src="{{asset($ad->image)}}" alt="">
                                    </a><!-- /.recent-ads-list-image-inner -->
                                </div>
                                <!-- /.recent-ads-list-image -->
                                <div class="recent-ads-list-content">
                                    <h3 class="recent-ads-list-title">
                                        <a href="#">{{$ad->title}}</a>
                                    </h3>
                                    <ul class="recent-ads-list-location">
                                        <li>@lang('theme.since'): <b>{{$ad->since}}</b></li>
                                        <li>@lang('theme.category'): <b><a href="#">{{$ad->category->title}}</a></b></li>
                                        <li>@lang('theme.city'): <b>{{$ad->city->name}}</b></li>
                                    </ul>
                                    <div class="recent-ads-list-price"  style="font-size: small;">
                                        {{$ad->price}}
                                    </div>
                                    <!-- /.recent-ads-list-price -->
                                </div>
                                <!-- /.recent-ads-list-content -->
                            </div>
                            <!-- /.recent-ads-container -->
                        </div>
                    </div>
                    <h3>{{$ad->title}}</h3>
                    <p>{{Str::limit($ad->description, 50, $end='.......')}}</p>
                    <h3><a href="{{route('ads.show',$ad->id)}}">{{route('ads.show',$ad->id)}}</a> </h3>
                    <p><a href="{{config('app.url')}}">{{get_setting('site_designedby')}}</a></p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-fb btn-md" href="https://www.facebook.com/sharer/sharer.php?u={{route('ads.show',$ad->id)}}" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a class="btn btn-twitter btn-md"  href="http://twitter.com/share?url={{route('ads.show',$ad->id)}}&text={{$ad->title}}" target="_blank"><i class="fa fa-twitter"></i></a>

                    {{--<a class="btn btn-gplus btn-md"><i class="fa fa-google-plus"></i></a>--}}
                </div>
            </div>
        </div>
    </div>

    <!-- =-=-=-=-=-=-= تقرير الإعلان Modal =-=-=-=-=-=-= -->
    <div class="modal fade report-quote" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title">لماذا تقوم بالتبليغ عن هذا الإعلان؟</h3>
                </div>
                <div class="modal-body">
                    <!-- content goes here -->
                    @auth
                    <form id="adabuses">
                        <div class="skin-minimal">
                            <div class="form-group col-md-6 col-sm-6">
                                <ul class="list">
                                    <li >
                                        <input type="radio" id="spam" name="reason" value="spam">
                                        <label for="spam">@lang('theme.spam')</label>
                                    </li>
                                    <li>
                                        <input  type="radio" id="duplicated" name="reason" value="duplicated">
                                        <label for="duplicated">@lang('theme.duplicated')</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group  col-md-6 col-sm-6">
                                <ul class="list">
                                    <li >
                                        <input  type="radio" id="offensive" name="reason" value="offensive">
                                        <label for="offensive">@lang('theme.offensive')</label>
                                    </li>
                                    <li>
                                        <input  type="radio" id="expired" name="reason" value="expired" checked>
                                        <label for="expired">@lang('theme.expired')</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group  col-md-12 col-sm-12">
                            <label>@lang('theme.your comment')</label>
                            <textarea name="comment" id="comment" placeholder="@lang('theme.write abuse')" rows="3" class="form-control">@lang('theme.write abuse reason')</textarea>
                        </div>
                        {{--<div class="col-md-12 col-sm-12"> <img src="{{asset(trans('theme.path').'/images/captcha.gif')}}" alt="" class="img-responsive"> </div>--}}
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12 margin-bottom-20 margin-top-20">
                            <button type="submit" class="btn btn-theme btn-block">@lang('theme.report')</button>
                        </div>
                    </form>
                    @else
                        <a href="{{route('login')}}">@lang('theme.please login')</a>
                        @endauth
                </div>
            </div>
        </div>
    </div>
@if(get_setting('sticky_ad_detail'))
    <!-- =-=-=-=-=-=-= Ad Detail Modal =-=-=-=-=-=-= -->
    <div class="sticky-ad-detail">
        <div class="container">
            <div class="col-md-7 col-sm-12 col-xs-12 no-padding">
                <div class="">
                    <h3>{{$ad->title}}</h3>
                    <div class="short-history">
                        <ul>
                            <li>@lang('theme.since'): <b>{{$ad->since}}</b></li>
                            <li>@lang('theme.category'): <b><a href="#">{{$ad->category->title}}</a></b></li>
                            <li>@lang('theme.city'): <b>{{$ad->city->name}}</b></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5  col-sm-12 col-xs-12 no-padding">
                <div class="pull-left row">
                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                        @if($ad->allow_contact && !$ad->via_message)
                            <a href="tel:{{get_setting('pre_phone')}}{{$ad->sub_phone}}" class="btn btn-block pull-left btn-phone number" data-last="{{$ad->phone}}"><i class="fa fa-phone"></i> {{get_setting('pre_phone')}}<span>{{$ad->sub_phone}}</span></a>
                        @else
                            <a href="javascript:void(0)" class="btn btn-block pull-left btn-phone number"><i class="fa fa-phone"></i><span><span class="small">@lang('theme.not via call')</span></span></a>
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                            <a data-toggle="modal" data-target=".price-quote"  href="javascript:void(0)" class="btn btn-block pull-left btn-message"><i class="icon-envelope"></i> @lang('theme.send message')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection

@push('js')


{{--<!-- For This Page Only -->--}}
@if( get_setting('map') && isset($ad->city->coordinate))
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCx_TTcc_0vwnwe4cIv54hN4DrXloFwfQI"></script>
@endif
<script type="text/javascript">
    (function($) {
            "use strict";
        /* ======= Show Number ======= */
        $('.number').click(function() {
            $(this).find('span').text( $(this).data('last') );
        });
@if( get_setting('map') &&isset($ad->city->coordinate))

/* ======= Ad Location ======= */
var  map ="";
var latlng = new google.maps.LatLng({{$ad->city->coordinate}});
var myOptions = {
zoom: 13,
center: latlng,
scrollwheel: false,
mapTypeId: google.maps.MapTypeId.ROADMAP,
size: new google.maps.Size(480,240)
}
map = new google.maps.Map(document.getElementById("itemMap"), myOptions);
var marker = new google.maps.Marker({
map: map,
position: latlng
});
@endif

@if(get_setting('sticky_ad_detail'))
/* ======= Ad Detail On Scroll ======= */
//caches a jQuery object containing the header element
var header = $(".sticky-ad-detail");
$(window).scroll(function() {
var scroll = $(window).scrollTop();
if (scroll >= 500) {
header.addClass("show-sticky-ad-detail");
} else {
header.removeClass("show-sticky-ad-detail");
}
});
    @endif
})(jQuery);
$(document).ready(function(){
    $("form#admessage").submit(function(event) {
        event.preventDefault();
        var ad_id = '{{$ad->id}}';
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
            success: function(data){
                $('form#admessage').html('{{trans('theme.done successfully')}}');
                },
            error: function (xhr) {
                if (xhr.status == 401) {
                    window.location.href ='{{route('login')}}';
                }
            }
        });
    });

    $("form#adabuses").submit(function(event) {
        event.preventDefault();
        var ad_id = '{{$ad->id}}';
        var reason = $("form#adabuses input[name='reason']:checked").val();

        var comment = $("#comment").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: '{{route('adabuses.store')}}',
            data: "ad_id=" + ad_id + "&reason=" + reason + "&comment=" + comment,
            success: function(data){
                $('form#adabuses').html('{{trans('theme.done successfully')}}');
            },
            error: function (xhr) {
                if (xhr.status == 401) {
                    window.location.href ='{{route('login')}}';
                }
            }
        });
    });
});
function doBookmark() {
        //e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: '{{route('bookmarks.store')}}',
            data: 'ad_id={{$ad->id}}',
            success: function(data)
            {
        if(data.msg > 0){
                    $(".is_saved").text('@lang('theme.ad saved')');
                    $("#save_ad").removeClass("action_pend").addClass("action_done");
                }else{
                    $(".is_saved").text('@lang('theme.save ad')');
                    $("#save_ad").removeClass("action_done").addClass("action_pend");
                }


            },
            error: function (xhr) {
                if (xhr.status == 401) {
                    window.location.href ='{{route('login')}}';
                }
            }
        });
    }
function doLike() {
        //e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: '{{route('likes.store')}}',
            data: 'ad_id={{$ad->id}}',
            success: function(data)
            {
               // alert(data.msg);

                var current = parseInt($(".total_likes").text());
                if(data.msg > 0){
                    $("#like").removeClass("action_pend").addClass("action_done");
                }else{
                    $("#like").removeClass("action_done").addClass("action_pend");
                }
                current = parseInt(current+data.msg);
                $(".total_likes").text(current)


            },
            error: function (xhr) {
                if (xhr.status == 401) {
                    window.location.href ='{{route('login')}}';
                }
            }

        });
    }


</script>
<style>
    .action_done{ color: #f58936 !important;}
    .small{ font-size: 0.7em !important; }
    .action_pend{
    color: #fff !important;    text-shadow: -1px 0 #F58936, 0 1px #F58936, 1px 0 #F58936, 0 -1px #F58936 !important;

    }

</style>
@endpush