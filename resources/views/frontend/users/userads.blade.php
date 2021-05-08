@extends('frontend.layouts.single-category')
@section('content')
    <!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
    <!-- Small Breadcrumb -->
    {{--@includeWhen(get_setting('breadcrumb'),'frontend.layouts.inc.breadcrumb-cat')--}}
    <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
    @includeWhen(get_setting('popular_categories'),'frontend.layouts.inc.popular-categories')
    <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
    <div class="main-content-area clearfix">
        <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
        <section class="section-padding gray">
            <!-- Main Container -->
            <div class="container">
                <!-- Row -->
                <div class="row">
                    <h3>@lang('theme.view ads'): {{$full_name}}</h3>
                    <!-- Middle Content Area -->
                    @if(isset($ads) && count($ads))
                        <!--ad block-->
                        @foreach($ads as $ad)
                            <!-- Listing Ad Grid -->
                                <div class="col-md-3 col-sm-3 col-xs-12 clearfix">
                                    <div class="white category-grid-box-1 ">
                                        <!-- Image Box -->
                                        {{--<div class="image"> <img alt="Tour Package" src="{{asset(trans('theme.path').'/images/posting/car-4.jpg')}}" class="img-responsive"> </div>--}}
                                        <div class="image">

                                            <a title="{{$ad->title}}" href="{{route('ads.show',$ad->id)}}"><img alt="{{$ad->title}}" src="{{asset($ad->image)}}" class="img-responsive" style="max-height:{{get_setting('ad_image_height',15)}}em;min-height:{{get_setting('ad_image_height',15)}}em;"></a>
                                        </div>
                                        <!-- Short Description -->
                                        <div class="short-description-1">
                                            <!-- Category Title -->
                                            <div class="category-title"> <span><a href="{{route('categories.show',$ad->category->id)}}">{{$ad->category->title}}</a></span> </div>
                                            <!-- Ad Title -->
                                            <h3>
                                                <a title="{{$ad->title}}" href="{{route('ads.show',$ad->id)}}">{{Str::limit($ad->title,15,$end='..')}}</a>
                                            </h3>
                                            <!-- Location -->
                                            <p class="location"><i class="fa fa-map-marker"></i> {{$ad->city->name}}</p>
                                            <!-- Rating -->
                                            <div class="rating">
                                                <i class="fa fa-heart"></i> <span class="rating-count">({{$ad->total_likes}})</span>
                                            </div>
                                            <!-- Price --><span class="ad-price" style="font-size: small;">{{$ad->price}}</span>
                                        </div>
                                        <!-- Ad Meta Stats -->
                                        <div class="ad-info-1">
                                            <ul>
                                                <li> <i class="fa fa-eye"></i><a href="#">{{$ad->total_views}}</a> </li>
                                                <li> <i class="fa fa-clock-o"></i>{{$ad->since}} </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                        <!--ad block-->
                        @endif

                    <!-- Middle Content Area  End -->

                </div>
            {{$ads->links()}}
            <!-- Row End -->
            </div>
            <!-- Main Container End -->
        </section>
        <!-- =-=-=-=-=-=-= Ads أرشيف End =-=-=-=-=-=-= -->
    </div>
    <!-- Main Content Area End -->
@endsection