<footer class="footer-area">
    <!--Footer Upper-->
    <div class="footer-content">
        <div class="container">
            <div class="row clearfix">
                <!--Two 4th column-->
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-sm-6 col-xs-12 column">
                                <!-- Info Widget -->
                                <div class="widget">
                                    <div class="heading-panel">
                                        <h3 class="main-title text-left"> @lang('theme.download app')</h3>
                                    </div>
                                    {{--<div class="logo"> <img alt="" src="{{asset(trans('theme.path').'/images/logo-1.png')}}"> </div>--}}
                                    <br>
                                    <ul>
                                        <li><a href=""><img src="{{asset(trans('theme.path').'/images/appstore.png')}}" class="grow"></a> </li>
                                        <li><a href=""><img src="{{asset(trans('theme.path').'/images/googleplay.png')}}" class="grow"></a> </li>
                                    </ul>
                                </div>
                                <!-- Info Widget Exit -->
                        </div>
                        <!--Footer Column-->
                    </div>
                </div>
                <!--Two 4th column End-->
                <!--Two 4th column-->
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="row clearfix">
                        <!--Footer Column-->
                        <div class="col-lg-6 col-sm-6 col-xs-12 column">
                            <div class="footer-widget about-widget">
                                <div class="heading-panel">
                                    <h3 class="main-title text-left">@lang('theme.follow us')</h3>
                                </div>
                                {{--<div class="logo">--}}
                                    {{--<a href="{{url('/')}}"><img alt="" class="img-responsive" src="{{asset(trans('theme.path').'/images/logo-1.png')}}"></a>--}}
                                {{--</div>--}}
                                <br>
                                <div class="clearfix">
                                    <a href="{{get_setting('facebook_link')}}"><img src="{{asset('main/social/facebook-icon.png')}}" class="social grow"></a>
                                    <a href="{{get_setting('twitter_link')}}"><img src="{{asset('main/social/twitter-icon.png')}}" class="social grow"></a>
                                    <a href="{{get_setting('instegram_link')}}"><img src="{{asset('main/social/instagram-icon.png')}}" class="social grow"></a>
                                    <a href="{{get_setting('linkedin_link')}}"><img src="{{asset('main/social/linkedin-icon.png')}}" class="social grow"></a>
                                    <a href="{{get_setting('youtube_link')}}"><img src="{{asset('main/social/youtube-icon.png')}}" class="social grow"></a>
                                    <a href="{{get_setting('tiktok_link')}}"><img src="{{asset('main/social/tiktok-icon.png')}}" class="social grow"></a>
                                </div>
                            </div>
                        </div>
                        <!--Footer Column-->
                        <div class="col-lg-6 col-sm-6 col-xs-12 column">
                            <div class="footer-widget links-widget">
                                <div class="heading-panel">
                                    <h3 class="main-title text-left"> @lang('theme.quick links')</h3>
                                </div>
                                <ul>
                                    <li><a href="{{url('/')}}">@lang('theme.home page')</a></li>
                                @foreach($pages as $page)
                                    <li><a href="{{route('pages.show',$page->id)}}">{{$page->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Two 4th column End-->
            </div>
        </div>
    </div>
    <!--Footer Bottom-->
    <div class="footer-copyright">
        <div class="container clearfix">
            <!--Copyright-->
            <div class="copyright text-center">@lang('theme.copyright') {{get_setting('site_year')}} © @lang('theme.website created by') <a href="{{get_setting('site_designedurl')}}" target="_blank">{{get_setting('site_designedby')}}</a>  @lang('theme.all rights reserved')</div>
@lang('theme.supports languages')            <a href="{{route('language','en')}}">@lang('theme.english')</a> - <a href="{{route('language','ar')}}">@lang('theme.arabic')</a>
        </div>
    </div>
</footer>
<!-- Post Ad Sticky -->
<!--<a href="#" class="sticky-post-button">
         <span class="sell-icons">
         <i class="flaticon-technology-19"></i>
         </span>
    <h4>@lang('theme.sell')</h4>
</a>-->
<a href="#0" class="cd-top">@lang('theme.top')</a>