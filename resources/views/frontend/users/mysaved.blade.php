@extends('frontend.layouts.single-category')
@section('content')
    <!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
    <!-- Small Breadcrumb -->
    {{--<div class="small-breadcrumb">--}}
        {{--<div class="container">--}}
            {{--<div class=" breadcrumb-link">--}}
                {{--<ul>--}}
                    {{--<li><a href="{{url('/')}}">@lang('theme.home page')</a></li>--}}
                    {{--<li><a class="active" href="#">@lang('theme.my ads') </a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <section class="section-padding gray">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- Middle Content Area -->
                <div class="col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar">
                    <!-- Sidebar Widgets -->
                @include('frontend.users.inc._sidebar')
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <!-- Row -->
                    <div class="row">
                        <!-- Sorting Filters -->
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 heading">
                            <!-- Advertisement Panel -->
                            <div class="panel panel-default">
                                <div class="panel-heading" >
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <h4 class="panel-title">
                                            <a>
                                                @lang('theme.my saved')
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="col-md-8 col-sm-4 col-xs-4">
                                        <div class="search-widget pull-right flip">
                                            <input placeholder="search" type="text" id="myInput" onkeyup="myFunction()">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Advertisement Panel End -->
                        </div>
                        <!-- Sorting Filters End-->
                        <div class="clearfix"></div>
                        <!-- Ads Archive -->
                        <div class="posts-masonry">
                            <div class="col-md-12 col-xs-12 col-sm-12 user-archives" id="myUL">
                                @if(isset($ads))
                                    @foreach($ads as $ad)
                                <!-- Ads Listing -->
                                <div class="ads-list-archive ad-item">
                                    <!-- Image Block -->
                                    <div class="col-lg-3 col-md-3 col-sm-3 no-padding">
                                        <!-- Img Block -->
                                        <div class="ad-archive-img">
                                            <a href="{{route('ads.show',$ad->id)}}">
                                                <img src="{{asset($ad->image)}}" alt="">
                                            </a>
                                        </div>
                                        @if($ad->sold == 1)
                                            <div class="sold">
                                                <img class="img-responsive" src="{{asset('theme/images/sold.png')}}" alt="">
                                            </div>
                                        @endif
                                        <!-- Img Block -->
                                    </div>
                                    <!-- Ads Listing -->
                                    <div class="clearfix visible-xs-block"></div>
                                    <!-- Content Block -->
                                    <div class="col-lg-9 col-md-9 col-sm-9 no-padding">
                                        <!-- Ad Desc -->
                                        <div class="ad-archive-desc">
                                            <!-- Price -->
                                            <div class="ad-price" style="font-size: small;">{{$ad->price}}</div>
                                            <!-- Title -->
                                            <h3>{{Str::limit($ad->title, 50, $end='.......')}}</h3>
                                            <!-- Category -->
                                            <div class="category-title"> <span><a href="#">{{$ad->category->title}}</a></span> </div>
                                            <!-- Short Description -->
                                            <div class="clearfix visible-xs-block"></div>
                                            <!-- Ad Features -->
                                            <!-- Ad History -->
                                            <div class="clearfix archive-history">
                                                <div class="last-updated">{{$ad->since}}</div>
                                                <div class="ad-meta">
                                                    {{--<a class="btn save-ad remove-bookmark" data-key="{{$ad->id}}"><i class="fa fa-minus-circle"></i> unfaourite</a>--}}
                                                   @if($ad->published !=1) <a href="{{route('ads.edit',$ad->id)}}" class="btn btn-success"><i class="fa fa-eye"></i> @lang('theme.edit')</a> @endif
                                                    <a href="{{route('ads.show',$ad->id)}}" class="btn btn-success"><i class="fa fa-eye"></i> @lang('theme.details')</a>
                                                    <a href="{{route('ads.sold',$ad->id)}}" class="btn btn-warning"><i class="fa fa-handshake-o"></i> @lang('theme.sold')</a>
                                                    <a href="{{route('ads.archive',$ad->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> @lang('theme.delete')</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ad Desc End -->
                                    </div>
                                    <!-- Content Block End -->
                                </div>
                                    @endforeach
                                    @endif
                            </div>
                        </div>
                        <!-- Ads Archive End -->
                        <div class="clearfix"></div>
                        <!-- Pagination -->
                        {{--<div class="col-md-12 col-xs-12 col-sm-12">--}}
                            {{--<ul class="pagination pagination-lg">--}}
                                {{--<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>--}}
                                {{--<li><a href="#">1</a></li>--}}
                                {{--<li class="active"><a href="#">2</a></li>--}}
                                {{--<li><a href="#">3</a></li>--}}
                                {{--<li><a href="#">4</a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}

                        {{$ads->links()}}
                        <!-- Pagination End -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Middle Content Area  End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads أرشيف End =-=-=-=-=-=-= -->
</div>
@endsection
@push('js')
    <script>
        function myFunction() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toLowerCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByClassName("ad-item");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("h3")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }

    </script>
@endpush