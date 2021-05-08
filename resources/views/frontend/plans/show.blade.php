@extends('frontend.layouts.single-category')
@section('content')
    <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
    <div class="main-content-area clearfix">
        <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
        <section class="section-padding  gray">
            <!-- Main Container -->
            <div class="container">
                <!-- Row -->
                <div class="row">
                    <div class="col-md-12">
                <form action="{{route('plan.publish',$ad->id)}}" method="post" class="submit-form" enctype="multipart/form-data">
                            @csrf
                        <!-- end post-padding -->
                        <div class="post-ad-form extra-padding postdetails">
                            <div class="col-md-12">
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                <div class="heading-panel">
                                <h3 class="main-title text-left">
                                  @lang('theme.publishing plans')
                                    </h3>
                                </div>
                                </div>
                            </div>

                                    <!-- Ad Type  -->
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                            {{--<label class="control-label"><small>@lang('theme.regular')</small></label>--}}
                                            {{--<div class="skin-minimal">--}}
                                                {{--<label class="switch">--}}
                            {{--<input type="checkbox" name="standard" id="standard" checked disabled>--}}
                                                    {{--<span class="slider round"></span>--}}
                                                {{--</label>--}}

                            <label  for="minimal-radio-1">@lang('theme.regular') </label>
                                                <input type="hidden" name="featured" value="0">
                                                <label class="switch">
                                                    <input type="checkbox" name="featured" id="featured" value="1" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                                <label  for="minimal-radio-1">@lang('theme.featured') </label>
                                            </div>
                                        </div>

                                  @if(isset($parent_cats) && count($parent_cats))
                                    <div class="row" id="plans">
                                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                            <label class="control-label"><small> @lang('theme.display')</small>   @lang('theme.additional plans') </label>
                                            <div>
                                                <ul class="list">
                                                    @foreach($parent_cats as $cat)
                                                        {{--{{dump($cat->title)}}--}}
                                                        {{--{{dd($parent_cats)}}--}}
        @if($cat->premium_ads_is && $cat->premium_ads_num <= $cat->premiumPosition->max_ads && $cat->has('premiumPositionDays') && $cat->premiumPositionDays->count()) {{--all--}}
                                                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                                            {{--{{$cat->deep}} - --}} <li>{{$cat->title}}</li>
@if($cat->premium_ads_is) {{--1--}}
                @if($cat->premium_ads_num >= $cat->premiumPosition->max_ads) {{--2--}}
        <div class="row warning">
{{--@lang('theme.category is reach to maximum ads')--}}
        </div>
                                                            @else {{--2--}}
                @if($cat->has('premiumPositionDays') && $cat->premiumPositionDays->count()) {{--3--}}
                    <div class="row">
                        <ul>
                            @foreach($cat->premiumPositionDays as $plan)
                                <li style="display:inline-block;padding-left: 10px;background-color: orange;border-radius: 12px;width: 150px;">
                                    <input style="transform: scale(1.5);" type="radio" name="plan" value="{{implode('_',[$plan->id,$cat->id])}}"  data-price="{{$plan->days_cost}}">
                                    &nbsp;&nbsp;&nbsp;&nbsp;{{$plan->days}}  @lang('theme.day') <label  for="plan" style="padding: 5px;"> &nbsp;&nbsp;&nbsp;&nbsp; {{$plan->days_cost}} &nbsp;&nbsp; {{trans('theme.currency')}}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                {{--@else <div class="row warning">@lang('theme.not found any paid plan now')</div>  --}}
                                                            @endif {{--3--}}
                                                            @endif {{--2--}}
{{--@else --}}{{--1--}}{{--<div  class="row warning"> @lang('theme.category is not active for ads') </div>--}}
@endif {{--1--}}
                                                        </div>
                                                        @endif {{--all--}}
                                                    @endforeach
                                                </ul>
                                            </div>

                                                <p>@lang('theme.do you have a promotional coupon?')</p>
                                                <div class="col-md-6 col-lg-3 col-xs-12 col-sm-12" style="padding-bottom: 50px;">

                                                    <input class="form-control" id="coupon" name="coupon" type="text" placeholder="@lang('theme.coupon')">
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12" style="padding-bottom: 50px;">
                                                  <a id="apply" class="btn btn-info">@lang('theme.apply coupon')</a>
                                              </div>
                                            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                                <label>@lang('theme.the price you will pay:')
                                                <input type="text" id="total" placeholder=""  style="text-decoration: none;border-style:none;width:5rem" readonly>@lang('theme.currency')
                                                </label> </div>
                                        </div>
                                    </div>
                                    @endif
                                    <!-- Ad Condition  -->
                   <!-- end row -->
        <input type="hidden" name="ad_id" value="{{$ad->id}}">


        <div class="row">
            <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                <a href="{{route('ads.edit',['ad'=>$ad->id,'step'=>3])}}" class="btn btn-theme pull-right">@lang('theme.back')</a>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                <button class="btn btn-block btn-next">@lang('theme.next')</button>
            </div>
            <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                {{--<a href="{{route('ads.create')}}" class="btn btn-theme pull-right">@lang('theme.back')</a>--}}
            </div>
        </div>
                        </div>
                                </form>

                        </div>
                        <!-- end post-ad-form-->
                    </div>
                    <!-- end col -->
                </div>
                <!-- Row End -->
        </section>
    </div>
    <!-- Main Container End -->
        <!-- =-=-=-=-=-=-= Ads أرشيف End =-=-=-=-=-=-= -->
    </div>
    <!-- Main Content Area End -->
@endsection
@push('js')
    <!-- JS -->
        <script type="text/javascript">
            $('#plans').show();
     $('#featured').change(function(){
         console.log(5);
         $('#plans').fadeToggle();

     });
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var price = $('input[name="plan"]:checked').attr("data-price");
        $("#total").val( price);
        console.log(20);
        $('input[name="plan"]')
            .change(function(){ // bind a function to the change event
                price = $('input[name="plan"]:checked').attr("data-price");
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
    </script>
@endpush