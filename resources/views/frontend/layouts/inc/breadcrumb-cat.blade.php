<div class="bread-2 page-header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-5 col-xs-12">
                <div class="header-page">
                    <h1>@lang('theme.details')</h1>
                </div>
            </div>
            <div class="col-md-4 col-sm-7 col-xs-12">
                <div class="small-breadcrumb">
                    <div class=" breadcrumb-link">
                        <ul>
                        <li><a href="{{route('categories.index')}}">@lang('theme.categories')</a></li>
                        @if(isset($parent_cats) && is_array($parent_cats))
                        @foreach($parent_cats as  $cat)
                        <li><a href="{{route('categories.show',$cat->id)}}">{{$cat->title}}</a></li>
                        @endforeach
                        @endif
                        @if(isset($category->title))
                        <li><a class="active" href="#">{{$category->title}}</a></li>
                        <li><a class="active" href="#">@lang('theme.category ads')</a></li>
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
