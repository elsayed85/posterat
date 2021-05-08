@extends('frontend.layouts.single-category')
@section('content')
    <!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
    <!-- Small Breadcrumb -->
    {{--<div class="small-breadcrumb">--}}
        {{--<div class="container">--}}
            {{--<div class=" breadcrumb-link">--}}
                {{--<ul>--}}
                    {{--<li><a href="{{url('/')}}">@lang('theme.home page')</a></li>--}}
                    {{--<li><a class="active" href="#">إعلانات مفضلة</a></li>--}}
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
                <!-- الفئات -->
                    {{--<div class="widget">--}}
                        {{--<div class="widget-heading">--}}
                            {{--<h4 class="panel-title"><a>تغيير خطتك</a></h4>--}}
                        {{--</div>--}}
                        {{--<div class="widget-content">--}}
                            {{--<select class=" form-control">--}}
                                {{--<option label="Select Option"></option>--}}
                                {{--<option value="0">Free</option>--}}
                                {{--<option value="1">Premium</option>--}}
                                {{--<option value="2">Featured</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
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
                                                 إعلانات المفضلة
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
                                                    <a class="btn save-ad remove-bookmark" data-key="{{$ad->id}}"><i class="fa fa-minus-circle"></i> unfaourite</a>
                                                    <a class="btn btn-success"><i class="fa fa-eye"></i> تفاصيل</a>
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
        function getMySearch() {
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
        $(".remove-bookmark").click(function () {
            var hideme=$(this).parents('.ad-item');
            //e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '{{route('bookmarks.store')}}',
                data: 'ad_id='+$(this).attr("data-key"),
                success: function(data)
                {
                    if(data.msg =-1){
                        $(hideme).hide();
                       // console.log(-1);
                    }


                },
                error: function (xhr) {
                    if (xhr.status == 401) {
                        window.location.href ='{{route('login')}}';
                    }
                }
            });

        });
    </script>
@endpush