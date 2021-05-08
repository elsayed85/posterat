<div class="col-md-8 col-md-push-4 col-lg-8 col-sx-12 white-bg">
    <!-- Row -->
    {{----}}
    <div class="row">
    @if(isset($premium_ads) && count($premium_ads))
        <!--ad block-->
        @foreach($premium_ads as $ad)
            <!-- Listing Ad Grid -->
                <div class="col-md-6 col-sm-6 col-xs-12 clearfix">
                    <div class="white category-grid-box-1 ">
                        <!-- Image Box -->
                        {{--<div class="image"> <img alt="Tour Package" src="{{asset(trans('theme.path').'/images/posting/car-4.jpg')}}" class="img-responsive"> </div>--}}
                        <div class="image">

                            <a title="{{$ad->title}}" href="{{route('ads.show',$ad->id)}}"><img alt="{{$ad->title}}" src="{{asset($ad->image)}}" class="img-responsive" style="max-height:{{get_setting('ad_image_height',15)}}em;min-height:{{get_setting('ad_image_height',15)}}em;"></a>
                        </div>
                        @if(get_setting('premium_ad_mark'))
                            <div class="featured-ribbon">
                                <span class="ad-status">{{trans('theme.featured')}}  </span>
                            </div>
                    @endif
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
    </div>

{{----}}
<!-- Row End -->
  <div class="row">
    @if(isset($normal_ads) && count($normal_ads))
        <!--ad block-->
        @foreach($normal_ads as $ad)
            <!-- Listing Ad Grid -->
                <div class="col-md-6 col-sm-6 col-xs-12 clearfix">
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
    </div>

</div>
