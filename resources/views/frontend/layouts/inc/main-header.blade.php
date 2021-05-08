<div class="header">
    <div class="">
        <div class="row">
        <!-- Logo -->
            <div class="col-md-2">

                <div class="logo"  style="margin-top: -20px;padding-{{trans('theme.float')}}: 100px;">
                    <a href="{{url('/')}}"><img alt="logo" src="{{asset(trans('theme.path').'/images/home/logo.png')}}" style="width: 75px;height: 75px;"></a>
                </div>
            </div>
                <div class="col-md-3" style="margin-top:18px;">
                @if(auth()->check())
                    {{--<div   style="padding-right: 12px;display: inline-block;">--}}
                        <ul class="listnone" style="padding-right: 12px;display: inline-block;">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-profile-male" aria-hidden="true"></i> {{auth()->user()->first_name}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('profile')}}">@lang('theme.my profile')</a></li>
                                    <li><a href="{{route('myads')}}">@lang('theme.my ads')</a></li>
                                    <li><a href="{{route('packages.index')}}">@lang('theme.packages')</a></li>
                                    <li><a href="{{route('favourite')}}">@lang('theme.my bookmarks')</a></li>
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
                    {{--</div>--}}
                @else

                    <a style="padding-right: 12px;" href="{{route('login')}}"><i class="fa fa-sign-in"></i> @lang('theme.login')</a>
                    <a style="padding-right: 12px;" href="{{route('register')}}"><i class="fa fa-unlock" aria-hidden="true"></i> @lang('theme.register')</a>

                @endif

                @if(App::getLocale() =='ar')
                    <a style="padding-right: 12px;" href="{{route('language','en')}}">@lang('theme.english')</a>
                @else
                    <a style="padding-right: 12px;" href="{{route('language','ar')}}">@lang('theme.arabic')</a>
                @endif




            </div>
            <div class="col-md-6 no-padding searcharea">
                <form action="{{route('search')}}" method="GET" role="search">
                    <div class="col-md-1 no-padding">
                        <div class="btn btn-orange badbtn">&nbsp;</div>
                    </div>
                    <div class="col-md-3 no-padding">
                    {{--<div class="col-md-5 col-sm-3 no-padding">--}}
                      <select name="category_search" class="category form-control">
                        <option label="@lang('theme.select option')"></option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($category->id == old('category_search')) selected @endif>{{$category->title}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-md-6 no-padding">
                    <div class="input-group">
                    <input type="text" name="ad_search" value="{{old('ad_search')}}" placeholder="@lang('theme.search here')" class="form-control searchm">
                    <span class="input-group-btn btnm">
                                {{--<input type="submit" class="btn btn-default search-bordered" value="@lang('theme.search')">--}}
                        <button type="submit"  class="btn btn-orange search-bordered" ><i class="fa fa-search"></i></button>

                        </span>
                    </div>
                    </div>
                </form>
                <div class="col-md-2">
                    <a href="{{route('ads.create')}}" class="btn btn-orange" style="border-radius: 15px;text-align: center;">@lang('theme.post ad now')</a> <!--<span class="free-flag visible-lg"></span>-->

                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>