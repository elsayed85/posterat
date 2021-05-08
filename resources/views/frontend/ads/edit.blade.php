@extends('frontend.layouts.single-category')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
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
                            <p class="lead">{{get_setting('pre_create_ad_step1')}}</p>
                            @if(!$ad->image || request('step') =='2')
                                <div class="row">
                            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <h4>@lang('theme.main image')</h4>
                                <label class="control-label">@lang('theme.please choose image',['start'=>'<small>','end'=>'</small>'])  @lang('theme.good for ad') </label>
                                <form method="post" action="{{route('ads.upload.main_image')}}" enctype="multipart/form-data"
                                      class="dropzone" id="dropzone1">
                                    @csrf
                                    <input type="hidden" name="ad_id" value="{{$ad->id}}">
                                </form>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <h4>@lang('theme.additional images')</h4>
                                <label class="control-label">@lang('theme.please choose') <small>@lang('theme.additional images') </small> 1 - 10</label>

                                <form method="post" action="{{route('ads.upload.images')}}" enctype="multipart/form-data"
                                      class="dropzone" id="dropzone2">
                                    @csrf
                                    <input type="hidden" name="ad_id" value="{{$ad->id}}">
                                </form>
                            </div>
                                </div>
<br>
<br>
<br>
                                <div class="row">
                                    <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                                        <a href="{{route('ads.create',['step'=>1])}}" class="btn btn-theme pull-right">@lang('theme.back')</a>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <a href="{{route('ads.edit',['ad'=>$ad->id,'step'=>3])}}" class="btn btn-block btn-next">@lang('theme.next')</a>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                                        {{--<a href="{{route('ads.create')}}" class="btn btn-theme pull-right">@lang('theme.back')</a>--}}
                                    </div>
                                </div>
                            @elseif(!$ad->image || request('step') =='3')
                                <form action="{{route('ads.update',$ad->id)}}" method="post" class="submit-form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                              <x-custom-inputs :inputs="$custom_inputs" />

                                <!-- Ad Description  -->
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                                            <label class="control-label">@lang('theme.ad description')</label>
                                            <textarea  name="description" id="editor1" rows="12" class="form-control " placeholder="">{{$ad->description}}</textarea>
                                            <div id="count">
                                                <span id="current_count">{{strlen($ad->description)}}</span>
                                                <span id="maximum_count">/ 1000</span>
                                            </div>
                                            @lang('theme.you must type 16 character at least')
                                            {{--@error('description')--}}
                                            {{--<div class="alert alert-danger">{{ $message }}</div>--}}
                                            {{--@enderror--}}

                                        </div>
                                    </div>
                                    <!-- end row -->
                                    <!-- Ad Type  -->
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                            <label class="control-label">@lang('theme.ad type') <small>@lang('theme.ad type detail')</small></label>
                                            <div class="skin-minimal">
                                                <ul class="list">
                                                    <li>
                                                        <input tabindex="7" type="radio" id="minimal-radio-1" name="type_is" value="personal" @if($ad->type_is == 'personal') checked @endif required>
                                                        <label  for="minimal-radio-1">@lang('theme.personal') </label>
                                                    </li>
                                                    <li>
                                                        <input tabindex="8" type="radio" id="minimal-radio-2" name="type_is" value="business"  @if($ad->type_is == 'business') checked @endif required>
                                                        <label for="minimal-radio-2">@lang('theme.company')</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Ad Condition  -->

                                    <!-- end row -->
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                            <label class="control-label">{{trans('theme.setting')}} <small> {{trans('theme.contact')}}</small></label>
                                                <ul class="list">
                                                    <li>
                                                        <input type="hidden" name="via_message" value="0">
                                                        <label class="switch">
                                                            <input type="checkbox" name="via_message" value="1" @if($ad->via_message == '1') checked @endif>
                                                            <span class="slider round"></span>
                                                        </label>
                                                        <label  for="new">{{trans('ad.via_message')}}</label>
                                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="@lang('theme.option_note1')">
                                                      <button class="btn btn-primary" style="pointer-events: none;" type="button" disabled>@lang('theme.help')</button>
                                                    </span>

                                                    </li>
                                                    <li>
                                                        <input type="hidden" name="disturb_hours" value="0">
                                                        <label class="switch">
                                                            <input type="checkbox" name="disturb_hours" value="1" id="disturb_hours" @if($ad->disturb_hours==1) checked @endif>
                                                            <span class="slider round"></span>
                                                        </label>
                                                        <label for="used">{{trans('ad.disturb_hours')}}</label>
                                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="@lang('theme.option_note2')">
                                                      <button class="btn btn-primary" style="pointer-events: none;" type="button" disabled>@lang('theme.help')</button class="btn btn-primary">
                                                    </span>
                                                    </li>
                                                </ul>
                                                    <div id="disturb_hours_on" @if($ad->disturb_hours == 0) style="display: none;" @endif>
                                                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                                            <label for="disturb_hours_from"> {{trans('theme.from')}}</label>
                                                            <input type="time" name="disturb_hours_from" class="disturb_hours" value="{{$ad->disturb_hours_from}}">
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                                            <label for="disturb_hours_to"> {{trans('theme.to')}}</label>
                                                            <input type="time" name="disturb_hours_to" class="disturb_hours" value="{{$ad->disturb_hours_to}}">
                                                        </div>
                                                    </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                                            <a href="{{route('ads.edit',['ad'=>$ad->id,'step'=>'2'])}}" class="btn btn-theme pull-right">@lang('theme.back')</a>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                            <button class="btn btn-block btn-next">@lang('theme.next')</button>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                                            {{--<a href="{{route('ads.create')}}" class="btn btn-theme pull-right">@lang('theme.back')</a>--}}
                                        </div>
                                    </div>

                                </form>

                            @endif
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
        <script type="text/javascript">
            $('textarea').keyup(function() {
                var characterCount = $(this).val().length,
                    current_count = $('#current_count'),
                    maximum_count = $('#maximum_count'),
                    count = $('#count');
                current_count.text(characterCount);
            });

            //$('#disturb_hours_on').fadeOut();
            $('#disturb_hours').change(function(){
                console.log(10);

                $('#disturb_hours_on').fadeToggle();
                if($('#disturb_hours').prop('checked')){
                    $('.disturb_hours').prop('required',true);
                }else{
                    $('.disturb_hours').prop('required',false);
                }
            });
        Dropzone.options.dropzone1 =
            {
                maxFiles: 1,
                maxFilesize: 2,
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return file.name;
                },
                paramName:"main_image",
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 50000,
                removedfile: function(file)
                {
                    var name = file.upload.filename;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{ route('image_delete') }}',
                        data: {filename: name},
                        success: function (data){
                            console.log("File has been successfully removed!!");
                        },
                        error: function(e) {
                            console.log(e);
                        }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },
                init: function() {
                    this.on("sending", function(file, xhr, formData) {
                        // Will send the filesize along with the file as POST data.
                        formData.append("ad_id", formData.ad_id);
                    });

                    this.on("maxfilesexceeded", function(file){
                        this.removeFile(file);
                        alert("File Limit exceeded!","error");
                    });
                    this.on("addedfile", function(file) { if(this.files.length<=this.maxFiles-1){
                        this.enqueueFile(file);} this.processQueue();
                    });

                            @if(isset($ad->image) && file_exists($ad->image))

                            @php

                                $pathinfo = pathinfo(asset($ad->image));
                                                $photo_name = $pathinfo['filename'].'.'.$pathinfo['extension'];

                            @endphp

                    var file = {
                            upload:{
                                filename: "{{asset($ad->image)}}",
                                size: "{{@filesize($ad->image)}}",
                                type: 'image/jpeg',
                                status: Dropzone.ADDED,
                                url: "{{asset($ad->image_thumb)}}"
                            }
                        };
                    // Call the default addedfile event handler
                    this.emit("addedfile", file);

                    // And optionally show the thumbnail of the file:
                    this.emit("thumbnail", file, "{{asset($ad->image_thumb)}}");

                    this.files.push(file);



                    @endif

                },
                success: function(file, response)
                {
                    console.log(response);
                },
                error: function(file, response)
                {
                    return false;
                }
            };
        Dropzone.options.dropzone2 =
            {
                maxFiles: 10,
                maxFilesize: 2,
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return file.name;
                },
                paramName:"images",
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 50000,
                removedfile: function(file)
                {
                    var name = file.upload.filename;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{ route('image_delete') }}',
                        data: {filename: name},
                        success: function (data){
                            console.log("File has been successfully removed!!");
                        },
                        error: function(e) {
                            console.log(e);
                        }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },
                init: function() {
                    var  counter = 1;
                    this.on("sending", function(file, xhr, formData) {
                        formData.append("ad_id", formData.ad_id);
                        formData.append("order_is", counter++);

                    });

                    this.on("maxfilesexceeded", function(file){
                        this.removeFile(file);
                        alert("File Limit exceeded!","error");
                    });
                    this.on("addedfile", function(file) { if(this.files.length<=(this.maxFiles-1)){
                        this.enqueueFile(file);} this.processQueue();
                    });
                    @if(isset($ad->photos) && count($ad->photos))
@foreach($ad->photos as $ad_photo)
@php

    $pathinfo = pathinfo(asset($ad_photo->url));
                    $photo_name = $pathinfo['filename'].'.'.$pathinfo['extension'];

@endphp

                    var file = {
                        upload:{
                        filename: "{{asset($ad_photo->url)}}",
                        size: "{{@filesize($ad_photo->url)}}",
                        type: 'image/jpeg',
                        status: Dropzone.ADDED,
                        url: "{{asset($ad_photo->url_thumb)}}"
                    }
                    };
                    // Call the default addedfile event handler
                    this.emit("addedfile", file);

                    // And optionally show the thumbnail of the file:
                    this.emit("thumbnail", file, "{{asset($ad_photo->url_thumb)}}");

                    this.files.push(file);


                @endforeach

                    @endif

                },
                success: function(file, response)
                {
                    console.log(response);
                },
                error: function(file, response)
                {
                    return false;
                }
            };
        (jQuery);
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        @if($loop->first)
        @if($errors->has('description'))
        swal("Error!", "{{trans('validate.required').' '.trans('validate.field').' '.trans('theme.ad description').'. '}}",'error');
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

    <script type="text/javascript">

        //$('#disturb_hours_on').fadeOut();
        //    $('.me').onclick(function(){
        //        console.log(10);
        //        if ($(this).is(":checked")) {
        //
        //        if($(this).prop('checked')){
        //            $('.disturb_hours').prop('required',true);
        //        }else{
        //            $('.disturb_hours').prop('required',false);
        //        }
        //    });
        $(".me").click(function () {
            console.log(1);
//            $('.check-false',this).removeClass('check-false').addClass('check-true');
////            $(this).addClass('custom-field');
//            $('.custom-field-in',this).removeClass('custom-field-in').addClass('custom-field');

            if( $(this).find(".custom-control-input").prop('checked')){
                $(this).find(".custom-control-input").prop('checked',false);
            }else{
                $(this).find(".custom-control-input").prop('checked',true);
            }
            if ($(this).find(".custom-control-input").is(":checked")) {
                $('.check-false',this).removeClass('check-false').addClass('check-true');
                $('.custom-field-in',this).removeClass('custom-field-in').addClass('custom-field');
            } else {
                $('.check-true',this).removeClass('check-rue').addClass('check-false');
                $('.custom-field',this).removeClass('custom-field').addClass('custom-field-in');
            }
        });

    </script>
@endpush