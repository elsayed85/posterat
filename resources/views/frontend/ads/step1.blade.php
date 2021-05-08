@extends('frontend.layouts.single-category')
@push('css')
    <link href="{{asset(trans('theme.path').'/css/jquery.tagsinput.min.css')}}" rel="stylesheet">
@endpush
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
                                  @lang('theme.create ad')
                                </h3>
                            </div>

                            <p class="lead">{{get_setting('create_ad_step1')}}</p>
                            <form action="{{route('ads.store')}}" method="post" class="submit-form" enctype="multipart/form-data">
                                @csrf
                                <!-- Title  -->
                                <div class="row">
                                    <!-- Category  -->
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <label class="control-label">@lang('theme.category') <small>@lang('theme.choose a proper category for your ad')</small></label>
                                        <select class="category form-control" name="category_id" id="category">
                                            <option value="0" selected>@lang('theme.select category')</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                        <div id="sub1" style="display: none;">
                                            <select class="category form-control" name="subcategory[]" id="subcategory1">
                                                <option value="0" selected>@lang('theme.select category')</option>

                                            </select>
                                        </div><div id="sub2" style="display: none;">
                                            <select class="category form-control" name="subcategory[]" id="subcategory2">
                                                <option value="0" selected>@lang('theme.select category')</option>

                                            </select>
                                        </div>
                                        <div id="sub3" style="display: none;">
                                            <select class="category form-control" name="subcategory[]" id="subcategory3">
                                                <option value="0" selected>@lang('theme.select category')</option>

                                            </select>
                                        </div>
                                        <div id="sub4" style="display: none;">
                                            <select class="category form-control" name="subcategory[]" id="subcategory4">
                                                <option value="0" selected>@lang('theme.select category')</option>

                                            </select>
                                        </div>
                                        <div id="sub5" style="display: none;">
                                            <select class="category form-control" name="subcategory[]" id="subcategory5">
                                                <option value="0" selected>@lang('theme.select category')</option>

                                            </select>
                                        </div>
                                        <div id="sub6" style="display: none;">
                                            <select class="category form-control" name="subcategory[]" id="subcategory6">
                                                <option value="0" selected>@lang('theme.select category')</option>

                                            </select>
                                        </div>
                                    </div>
                                    <!-- Category -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <label class="control-label">@lang('theme.city')</label>
                                        {{--<label class="control-label">مدينة <small>اختيار المكان لإعلانك</small></label>--}}
                                        <select class="form-control" name="city_id">
                                            <option value="0" selected>@lang('theme.select city')</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}" @if($city->id ==$ad->city->id) selected @endif>{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                        <label class="control-label">@lang('theme.ad title')</label>
                                        <input type="text" name="title" class="form-control" placeholder="{{trans('theme.enter')}} {{trans('theme.a proper ad title')}}" value="{{$ad->title}}">
                                        {{--@error('title')--}}
                                        {{--<div class="alert alert-danger">{{ $message }}</div>--}}
                                        {{--@enderror--}}
                                    </div>
                                </div>
                                <!-- Ad Condition  -->
                                <!-- end row -->
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                        <label class="control-label">@lang('theme.display') <small>@lang('theme.price')</small></label>

                                        <div class="skin-minimal">
                                            <div id="cost" @if($ad->cost_hide=='1') style="display: none;" @endif>
                                            <input type="number" name="cost">
                                            <label for="price"> {{trans('theme.currency')}}</label>
                                            </div>
                                            </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                        <ul><li> @lang('theme.i prefer customers to contact me for the price.')</li></ul>
                                    <input type="hidden" name="cost_hide" value="0">
                                    <label class="switch">
                                        <input type="checkbox" name="cost_hide" value="1" id="cost_hide" @if($ad->cost_hide=='1') checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                    <label  for="ask">@lang('theme.contact with seller')</label>
                                </div>
                                </div>
                                <!-- end row -->
                                <div class="row">
                                    <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                                        {{--<a href="{{route('ads.create')}}" class="btn btn-theme pull-right">@lang('theme.back')</a>--}}
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <button class="btn btn-block btn-next">@lang('theme.next')</button>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                                        {{--<a href="{{route('ads.create')}}" class="btn btn-theme pull-right">@lang('theme.back')</a>--}}
                                    </div>
                                </div>
                                <input type="hidden" name="step" value="1">
                                <input type="hidden" name="ad_id" value="{{$ad->id}}">


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
//        $('#cost_hide').on('checked',function () {
//            $('#cost').fadeToggle();
//
//        });
        $('#cost_hide').change(function(){
            console.log(3);
                $('#cost').fadeToggle();

        });


        $(document).ready(function () {

            $('#sub1').hide(); $('#sub2').hide(); $('#sub3').hide();
            $('#category').on('change',function(e) {
                $('#sub1').hide();    $('#sub2').hide(); $('#sub3').hide();
                var cat_id = e.target.value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({

                    url:'{{ route('subcat') }}',
                    type:"POST",
                    data: {
                        id: cat_id
                    },

                    success:function (data) {
                        console.log(1);
                        console.log(data.subcategories);
                        $('#subcategory1').empty();
                        if(data.subcategories.length){
                            $('#sub1').show();

                            $.each(data.subcategories,function(index,subcategory){
                                $('#subcategory1').append('<option value="'+subcategory.id+'">'+subcategory.title+'</option>');
                            });
                            $('#subcategory1').append('<option label="{{trans('theme.select option')}}" value="0" selected>{{trans('theme.select option')}}</option>');
                        }else{
                            $('#sub2').hide();$('#sub3').hide();
                        }

                    }
                })
            });
            $('#subcategory1').on('change',function(e) {
                $('#sub2').hide(); $('#sub3').hide();
                var cat_id = e.target.value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({

                    url:'{{ route('subcat') }}',
                    type:"POST",
                    data: {
                        id: cat_id
                    },

                    success:function (data) {
                        console.log(2);
                        $('#subcategory2').empty();
                        if(data.subcategories.length){
                            $('#sub2').show();

                            $.each(data.subcategories,function(index,subcategory){
                                $('#subcategory2').append('<option value="'+subcategory.id+'">'+subcategory.title+'</option>');
                            });
                            $('#subcategory2').append('<option label="{{trans('theme.select option')}}" value="0" selected>{{trans('theme.select option')}}</option>');
                        }else{
                            $('#sub2').hide();
                        }


                    }
                })
            });

            $('#subcategory2').on('change',function(e) {
                $('#sub3').hide();
                var cat_id = e.target.value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({

                    url:'{{ route('subcat') }}',
                    type:"POST",
                    data: {
                        id: cat_id
                    },

                    success:function (data) {
                        console.log(3);
                        $('#subcategory3').empty();
                        if(data.subcategories.length){
                            $('#sub3').show();
                            $.each(data.subcategories,function(index,subcategory){

                                $('#subcategory3').append('<option value="'+subcategory.id+'">'+subcategory.title+'</option>');
                            });
                            $('#subcategory3').append('<option label="{{trans('theme.select option')}}" value="0" selected>{{trans('theme.select option')}}</option>');
                        }else{
                            $('#sub3').hide();
                        }


                    }
                })
            });

            $('#subcategory3').on('change',function(e) {
                $('#sub4').hide();
                var cat_id = e.target.value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({

                    url:'{{ route('subcat') }}',
                    type:"POST",
                    data: {
                        id: cat_id
                    },

                    success:function (data) {
                        console.log(4);
                        $('#subcategory4').empty();
                        if(data.subcategories.length){
                            $('#sub4').show();
                            $.each(data.subcategories,function(index,subcategory){

                                $('#subcategory4').append('<option value="'+subcategory.id+'">'+subcategory.title+'</option>');
                            });
                            $('#subcategory4').append('<option label="{{trans('theme.select option')}}" value="0" selected>{{trans('theme.select option')}}</option>');
                        }else{
                            $('#sub4').hide();
                        }


                    }
                })
            });
            $('#subcategory4').on('change',function(e) {
                $('#sub5').hide();
                var cat_id = e.target.value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({

                    url:'{{ route('subcat') }}',
                    type:"POST",
                    data: {
                        id: cat_id
                    },

                    success:function (data) {
                        console.log(5);
                        $('#subcategory5').empty();
                        if(data.subcategories.length){
                            $('#sub5').show();
                            $.each(data.subcategories,function(index,subcategory){

                                $('#subcategory5').append('<option value="'+subcategory.id+'">'+subcategory.title+'</option>');
                            });
                            $('#subcategory5').append('<option label="{{trans('theme.select option')}}" value="0" selected>{{trans('theme.select option')}}</option>');
                        }else{
                            $('#sub5').hide();
                        }


                    }
                })
            });

            $('#subcategory5').on('change',function(e) {
                $('#sub6').hide();
                var cat_id = e.target.value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({

                    url:'{{ route('subcat') }}',
                    type:"POST",
                    data: {
                        id: cat_id
                    },

                    success:function (data) {
                        console.log(6);
                        $('#subcategory6').empty();
                        if(data.subcategories.length){
                            $('#sub6').show();
                            $.each(data.subcategories,function(index,subcategory){

                                $('#subcategory6').append('<option value="'+subcategory.id+'">'+subcategory.title+'</option>');
                            });
                            $('#subcategory6').append('<option label="{{trans('theme.select option')}}" value="0" selected>{{trans('theme.select option')}}</option>');
                        }else{
                            $('#sub6').hide();
                        }


                    }
                })
            });
        });

</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
@if ($errors->any())
    @foreach ($errors->all() as $error)
    @if($loop->first)
        @if($errors->has('category_id'))
swal("Error!", "{{trans('validate.required').' '.trans('validate.field').' '.trans('theme.category').'. '.trans('theme.select category')}}",'error');
@elseif($errors->has('city_id'))
swal("Error!", "{{trans('validate.required').' '.trans('validate.field').' '.trans('theme.city').'. '.trans('theme.select city')}}",'error');
@elseif($errors->has('title'))
swal("Error!", "{{trans('validate.required').' '.trans('validate.field').' '.trans('theme.title').'. '.trans('theme.title')}}",'error');

@endif
@endif
            @break;
    @endforeach

    @endif
    @if (session('status'))
    swal("{{ strtoupper(session('type')) }}!", "{{ session('status') }}","{{ session('type') }}");
@endif
</script>
@endpush
