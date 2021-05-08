@extends('frontend.layouts.single-category')
@section('content')
    <!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
    <!-- Small Breadcrumb -->
    {{--<div class="small-breadcrumb">--}}
        {{--<div class="container">--}}
            {{--<div class=" breadcrumb-link">--}}
                {{--<ul>--}}
                    {{--<li><a href="{{url('/')}}">@lang('theme.home page')</a></li>--}}
                    {{--<li><a class="active" href="#">@lang('theme.packages')</a></li>--}}
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
                        <!-- Sorting Filters End-->
                        <div class="clearfix"></div>
                        <!-- Ads Archive -->
                        <div class="posts-masonry">

                            <div class="col-md-12 col-xs-12 col-sm-12 user-archives">
                                @if(isset($balance_packages) && count($balance_packages))
                                    <form action="{{route('packages.store')}}" method="POST">
                                   @csrf
                                    @foreach($balance_packages as $balance_package)
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                                <div style="color:#fff;display:block;padding: 10px;background-color: orange;border-radius: 12px;width: 50%;">
                                                <label class="control-label">{{$balance_package->title}}</label>
                                                <h3>{{$balance_package->description}}</h3>
                                                <div>
                                                    <ul>
                                                        <li>
                                                            <input style="transform: scale(1.5);" tabindex="{{$i++}}" type="radio" id="minimal-radio-{{$i++}}" value="{{$balance_package->id}}" name="balance_package" data-price="{{$balance_package->price}}" @if($loop->first) checked @endif>
                                                            <label for="minimal-radio-{{$i++}}">{{$balance_package->price}}  </label>  @lang('theme.currency')
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <br>
                                        @endforeach

                                        <div class="col-sm-3 mg-t-20 mg-sm-t-0">
                                            <input class="form-control" id="coupon" name="coupon" type="text" placeholder="coupon"><br>
                                            <label class="main-content-label tx-11 tx-medium tx-gray-600"> <a id="apply" class="btn btn-info">@lang('theme.apply coupon')</a> </label>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" style="padding-bottom: 20px;padding-top: 20px;">
                                            <input type="text" id="total" placeholder="total" readonly>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <input type="submit" class="btn btn-theme" value="{{trans('theme.next')}}">
                                        </div>
                                        </div>
                                    </form>
                                    @endif
                            </div>
                        </div>
                        <!-- Ads Archive End -->
                        <div class="clearfix"></div>

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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var price = $('input[name="balance_package"]:checked').attr("data-price");
    $("#total").val( price);
$('input[name="balance_package"]')
    .change(function(){ // bind a function to the change event
         price = $('input[name="balance_package"]:checked').attr("data-price");
        $("#total").val( price);
    });

    $("#apply").click(function () {

var coupon = $("#coupon").val();
    //e.preventDefault();
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
    type: "POST",
    url: '{{route('coupons.store')}}',
    data: 'code='+coupon,
    success: function(data)
    {
    if(data.msg ) {
//        alert(data.msg);
        if(data.validate){
        swal("Success!", data.msg,'success');
        }else{
        swal("Error!", data.msg,'error');
        }
        if(data.discount_value > 0){
            if(data.discount_type === 'percent'){
                $("#total").val(parseFloat(price - (price * data.discount_value/100)).toFixed(2));
            }else{
                $("#total").val(parseFloat(price - data.discount_value).toFixed(2));
            }
        }else{
            $("#total").val(price);
        }
    }
    },
    error: function (xhr) {
    if (xhr.status == 401) {
    window.location.href ='{{route('login')}}';
    }
    alert(xhr.status);
    }

    });
    });
    @if (session('status'))
    swal("Error!", "{{ session('status') }}",'error');
    @endif
</script>
@endpush