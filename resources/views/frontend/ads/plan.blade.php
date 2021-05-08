@extends('frontend.layouts.single-category')
@section('content')
    <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
    <div class="main-content-area clearfix"><!--?????????-->
        <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
        <section class="section-padding  gray">
            <!-- Main Container -->
            <div class="container">
                <!-- Row -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- end post-padding -->
                        <div class="post-ad-form extra-padding postdetails">
                            <div class="heading-panel">
                                <h3 class="main-title text-left">
الدفع                                </h3>
                            </div>         notwork
                            <form action="{{route('plan.pay',$ad->id)}}" method="post" class="submit-form" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Ad Type  -->
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                            <label class="control-label"><small>عادي</small></label>
                                            <div class="skin-minimal">
                            <input type="checkbox" name="standard" id="standard" checked disabled>
                            <label  for="minimal-radio-1">عادي </label>
                                                <input type="hidden" name="featured" value="0">
                                                <input type="checkbox" name="featured" id="featured" value="1" checked>
                            <label  for="minimal-radio-1">مميز </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="plans">
                                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                            <label class="control-label"><small> خطط عرض </small>   إضافية </label>
                                            <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">

                                                <input type="text" id="total" placeholder="total" readonly>
                                            </div>
                                            <div class="skin-minimal">
                                                <ul class="list">
                                                    @foreach($parent_cats as $cat)
                                                        {{--{{dump($cat->title)}}--}}
                                                        {{--{{dd($parent_cats)}}--}}

                                                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                                            {{$cat->deep}} - {{$cat->title}}
@if($cat->premium_ads_is) {{--1--}}
                @if($cat->premium_ads_num >= $cat->premiumPosition->max_ads) {{--2--}}
        <div class="row warning">
        القسم وصل للحد الاقصى من الاعلانات
        </div>
                                                            @else {{--2--}}
                @if($cat->has('premiumPositionDays') && $cat->premiumPositionDays->count()) {{--3--}}
                    <div class="row">
                        <ul>
                            @foreach($cat->premiumPositionDays as $plan)
                                <li>
                                    <input type="radio" name="plan" value="{{implode('_',[$plan->id,$cat->id])}}" data-price="{{$plan->days_cost}}">{{$plan->days}} يوم
                                    <label  for="plan"> {{$plan->days_cost}} {{trans('theme.currency')}}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else <div class="row warning">لا توجد خطط مدفوعة حالياً</div>   @endif {{--3--}}
                                                            @endif {{--2--}}
@else {{--1--}}
 <div  class="row warning"> هذا القسم غير مفعل للاعلانات الغير مدفوعة </div>
@endif {{--1--}}
                                                        </div>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col-sm-3 mg-t-20 mg-sm-t-0">
                                                <input class="form-control" id="coupon" name="coupon" type="text" placeholder="coupon">
                                                <label class="main-content-label tx-11 tx-medium tx-gray-600"><a id="apply" class="btn btn-info">@lang('theme.apply coupon')</a> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Ad Condition  -->
                   <!-- end row -->
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            </div>
            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                <button class="btn btn-next">@lang('theme.next')</button>
            </div>
            </div>

                                </form>

                        </div>
                        <!-- end post-ad-form-->
                    </div>
                    <!-- end col -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Main Container End -->
        </section>
        <!-- =-=-=-=-=-=-= Ads أرشيف End =-=-=-=-=-=-= -->
    </div>
    <!-- Main Content Area End -->
@endsection
@push('js')
    <!-- JS -->
        <script type="text/javascript">

     $('#featured').change(function(){
         console.log(5);
         $('#plans').fadeToggle();

     });
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var price = $('input[name="plan"]:checked').attr("data-price");
        $("#total").val( price);
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
                        if(data.discount > 0){
                            $("#total").val(price - data.discount);
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