<div class="user-profile">
    <a href="{{route('profile')}}"><img src="{{auth()->user()->photo_thumb}}" style="width:90%;"></a>
    <div class="profile-detail">
        <h6>{{auth()->user()->full_name??''}}</h6>
        <ul class="contact-details">
            <li>
                <i class="fa fa-map-marker"></i>{{auth()->user()->full_name}}
            </li>
            <li>
                <i class="fa fa-envelope"></i>{{auth()->user()->email}}
            </li>
            <li>
                <i class="fa fa-phone"></i> ({{get_setting('pre_phone')}}) {{auth()->user()->phone}}
            </li>
        </ul>
    </div>
    <ul>
        <li {!!  (Route::currentRouteName() == 'profile') ? 'class="active"' : '' !!}><a href="{{route('profile')}}">@lang('theme.my profile')</a></li>
        <li {!!  (Route::currentRouteName() == 'myphoto') ? 'class="active"' : '' !!}><a href="{{route('myphoto')}}">@lang('theme.my profile photo')</a></li>
        <li {!!  (Route::currentRouteName() == 'favourite') ? 'class="active"' : '' !!}><a href="{{route('favourite')}}">@lang('theme.my bookmarks') <!--<span class="badge">15</span>--></a></li>
        <li {!!  (Route::currentRouteName() == 'myads') ? 'class="active"' : '' !!}><a href="{{route('myads')}}">@lang('theme.my ads') </a></li>
        <li {!!  (Route::currentRouteName() == 'mysaved') ? 'class="active"' : '' !!}><a href="{{route('mysaved')}}">@lang('theme.my saved') </a></li>
        <li {!!  (Route::currentRouteName() == 'packages.index') ? 'class="active"' : '' !!}><a href="{{route('packages.index')}}">@lang('theme.packages') </a></li>
        <li {!!  (Route::currentRouteName() == 'packages.current') ? 'class="active"' : '' !!}><a href="{{route('package.current')}}">@lang('theme.my package') </a></li>
        <li {!!  (Route::currentRouteName() == 'messages.index') ? 'class="active"' : '' !!}><a href="{{route('admessages.index')}}">@lang('theme.my inbox')</a></li>
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
</div>