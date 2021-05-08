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
                        <!-- end post-padding -->
                        <div class="post-ad-form extra-padding postdetails">
                            <div class="heading-panel">
                                <h3 class="main-title text-left">
         notwork خطط النشر
                                </h3>
                            </div>
    <form action="{{route('plan.publish',$ad->id)}}" method="post" class="submit-form" a enctype="multipart/form-data">
                                    @csrf
                                    <!-- Ad Type  -->
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                            <label class="control-label"><small>عادي</small></label>
                                            <div class="skin-minimal">
                            <input type="checkbox" name="standard" id="standard" checked disabled>
                            <label  for="minimal-radio-1">عادي </label>
                                                <input type="hidden" name="featured" value="0">
                                                <input type="checkbox" name="featured" id="featured" checked>
                            <label  for="minimal-radio-1">مميز </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="plans">
                                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                            <label class="control-label"><small> خطط عرض </small>   إضافية </label>
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
                                    <input type="radio" name="plan" value="{{implode('_',[$plan->id,$cat->id])}}">{{$plan->days}} يوم
                                    <label  for="plan"> {{$plan->days_cost}} {{trans('theme.currency')}}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else <div class="row warning">لا توجد خطط مدفوعة حالياً</div>   @endif {{--3--}}
                                                            @endif {{--2--}}
@else {{--1--}}
<div  class="row warning">                                                                    هذا القسم غير مفعل للاعلانات الغير مدفوعة</div>
@endif {{--1--}}
                                                        </div>
                                                    @endforeach
                                                </ul>
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
@endpush
