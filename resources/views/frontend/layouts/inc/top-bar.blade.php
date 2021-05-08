@if(1==12)
    <div class="header-top">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">


                <!-- Header Top Left -->
                <div class="header-top-left col-md-8 col-sm-6 col-xs-12">
                    {{--<p><i class="fa fa-phone"></i>Call us +49 1234 5678 9</p>--}}
                    {{--<p><i class="fa fa-caret-right"></i><a href="#">Support</a></p>--}}
{{--{{dump($pages)}}--}}
                    @if(get_setting('pages_top_menu'))
                    @foreach($pages as $page)
                      <p><a href="{!! $page->type_is=='page'?route('pages.show',$page->id):$page->url!!}">{{$page->title}}</a></p>
                    @endforeach
                    @endif
                    @if(auth()->check())
                    <ul class="listnone">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-profile-male" aria-hidden="true"></i> {{auth()->user()->first_name}} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('profile')}}">ملف تعريفي للمستخدم</a></li>
                                <li><a href="{{route('myads')}}">إعلانات نشطة</a></li>
                                <li><a href="{{route('packages.index')}}">باقات</a></li>
                                <li><a href="{{route('favourite')}}">إعلانات المفضلة</a></li>
                                <li><a href="{{route('admessages.index')}}">@lang('theme.inbox')</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        @lang('theme.logout')
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                        @else
                    <ul class="listnone">
                        <li><a href="{{route('login')}}"><i class="fa fa-sign-in"></i> @lang('theme.login')</a></li>
                        <li><a href="{{route('register')}}"><i class="fa fa-unlock" aria-hidden="true"></i> @lang('theme.register')</a></li>
                    </ul>
                    @endif
                </div>
                <!-- Header Top Right Social -->

                {{--<div class="header-right col-md-4 col-sm-6 col-xs-12 ">--}}
                    {{--<div class="pull-right flip">--}}

                    {{--</div>--}}
                {{--</div>--}}

                <div class="header-top-right col-md-4 col-sm-6 col-xs-12 hidden-xs">
                    @if(App::getLocale() =='ar')
                        <a href="{{route('language','en')}}">@lang('theme.english')</a>
                    @else
                        <a href="{{route('language','ar')}}">@lang('theme.arabic')</a>
                    @endif
                    {{--<ul class="listnone">--}}
                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe" aria-hidden="true"></i> @lang('theme.language') <span class="caret"></span></a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a href="{{route('language','en')}}">@lang('theme.english')</a></li>--}}
                            {{--<li><a href="{{route('language','ar')}}">@lang('theme.arabic')</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                </div>
                <!-- Header Top Right Social -->
                {{--<div class="header-right col-md-4 col-sm-6 col-xs-12 hidden-xs">--}}
                    {{--<div class="header-social pull-right">--}}
                        {{--<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>--}}
                        {{--<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>--}}
                        {{--<a href="#" class="dribbble"><i class="fa fa-dribbble"></i></a>--}}
                        {{--<a href="#" class="vimeo"><i class="fa fa-vimeo"></i></a>--}}
                        {{--<a href="#" class="google"><i class="fa fa-google"></i></a>--}}
                        {{--<a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a>--}}
                        {{--<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
</div>
    @endif