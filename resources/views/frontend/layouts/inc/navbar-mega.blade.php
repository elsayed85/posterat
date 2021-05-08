<nav id="menu-1" class="mega-menu">
    <!-- menu list items container -->
    <section class="menu-list-items">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">


                    <!-- menu logo -->
                    {{--<ul class="menu-logo">--}}
                        {{--<li>--}}
                            {{--<a href="{{url('/')}}"><img src="{{asset(trans('theme.path').'/images/logo-1.png')}}" alt="logo"> </a>--}}

                        {{--</li>--}}
                    {{--</ul>--}}


                    <!-- menu links -->
                    <ul class="menu-links">

                        {{--@include('frontend.layouts.inc.menu-links')--}}
                        <div class="d-flex align-items-end flex-column" style="height: 1rem;">
                            <small class="text-muted font-italic p-2" style="color: #fff;">@lang('theme.quick access')</small>
                        </div>
                    @foreach($menu_categories as $menu_category)
                            <li><a href="{{route('categories.show',$menu_category->id)}}">{{$menu_category->title}}</a></li>
                        @endforeach
                    </ul>
                    <ul class="menu-search-bar hidden">
                        <li>
                            <a href="{{route('ads.create')}}" class="btn btn-light btn-rounded"> <!--<i class="fa fa-plus" aria-hidden="true"></i>--> @lang('theme.post ad now')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</nav>