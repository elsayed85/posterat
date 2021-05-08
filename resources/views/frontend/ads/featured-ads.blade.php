<section class="custom-padding">
    <!-- Main Container -->
    <div class="container">
        <!-- Row -->
        <div class="row">
            <!-- Heading Area -->
            <div class="heading-panel">
                <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                    <!-- Main Title -->
                    <h1>@lang('theme.featured ads listing',['start'=>'<span class="heading-color">','end'=>'</span>']) </h1>
                    <!-- Short Description -->
                    {{--<p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo eu, his dico ut debet consectetuer.</p>--}}
                </div>
            </div>
            <!-- Middle Content Box -->
            <div class="col-md-12 col-xs-12 col-sm-12">
                <!-- Row -->
                <div class="row">
                    <!--ad block-->
                @foreach($ads as $ad)
                    <!-- Listing Ad Grid -->
                    <div class="col-md-4 col-sm-6 col-xs-12 clearfix">
                        <div class="white category-grid-box-1 ">
                            <!-- Image Box -->
                            {{--<div class="image"> <img alt="Tour Package" src="{{asset(trans('theme.path').'/images/posting/car-4.jpg')}}" class="img-responsive"> </div>--}}
                            <div class="image" style="max-height: 15em;min-height: 15em;">
                                <a title="{{$ad->title}}" href="{{route('ads.show',$ad->id)}}">
                                    <img alt="{{$ad->title}}" src="{{asset($ad->image)}}" class="img-responsive" style="max-height:10em;"></a>
                            </div>
                            @if(get_setting('premium_ad_mark'))
                            <div class="featured-ribbon">
                                <span class="ad-status">{{$ad->premium==1?'featured':''}}  </span>
                            </div>
                            @endif
                            <!-- Short Description -->
                            <div class="short-description-1">
                                <!-- Category Title -->
                                <div class="category-title"> <span><a href="{{route('categories.show',$ad->category->id)}}">{{$ad->category->title}}</a></span> </div>
                                <!-- Ad Title -->
                                <h3>
                                    <a title="{{$ad->title}}" href="{{route('ads.show',$ad->id)}}">{{$ad->title}}</a>
                                </h3>
                                <!-- Location -->
                                <p class="location"><i class="fa fa-map-marker"></i> {{$ad->city->name}}</p>
                                <!-- Rating -->
                                <div class="rating">
                                    <i class="fa fa-heart"></i> <span class="rating-count">({{$ad->total_likes}})</span>
                                </div>
                                <!-- Price --><span class="ad-price">{{$ad->price}}</span>
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

                </div>

            </div>
            <!-- Middle Content Box End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Main Container End -->
</section>