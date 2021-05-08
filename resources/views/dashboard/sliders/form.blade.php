<!-- row -->
<div class="row row-sm">
    <div class="col-lg-8 col-xl-8 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">sliders</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>
            <div class="card-description pt-0">
                @csrf
                <div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label>title ar</label>
        <input type="text" name="title_ar" class="form-control" placeholder="slider title ar" value="{{$slider->title_ar??old('title_ar')}}">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label>title en</label>
        <input type="text" name="title_en" class="form-control" placeholder="slider title en" value="{{$slider->title_en??old('title_en')}}">
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
    <label>description ar</label>
    <textarea name="description_ar" class="form-control for-description">{{$slider->description_ar??old('description_ar')}}</textarea>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
    <label>description en</label>
    <textarea name="description_en" class="form-control for-description">{{$slider->description_en??old('description_en')}}</textarea>
</div>
</div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="container">
           <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="image_label">Slider Image <small>greater than(H: 550 X W: 800)</small></label>
                <!--3party-->
                   <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                        </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="slider_image" value="{{$slider->slider_image??old('slider_image')}}">
                    </div>
                <img id="holder" style="margin-top:15px;max-height:100px;" src="{{$slider->slider_image??old('slider_image')}}">
                <!--3party-->
                </div>
        </div>
        </div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label>url</label>
        <input type="text" name="url" class="form-control" placeholder="url" value="{{$slider->url??old('url')}}">
    </div>
</div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>order_is</label>
            <input type="number" name="order_is" class="form-control" placeholder="order_is" value="{{$slider->order_is??old('order_is')}}">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="checkbox">
            <div class="custom-checkbox custom-control">
                <input type="hidden" name="published" value="0">
                <input type="checkbox" name="published" value="1" {{ $slider->published??old('published') ? 'checked' : '' }} data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                <label for="checkbox-2" class="custom-control-label mt-1">published</label>
            </div>
        </div>
    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">save</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- row -->
@section('js')
    <script>
        var route_prefix = "/filemanager";
    </script>

    <!-- CKEditor init -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
        $('.for-description').ckeditor({
            height: 200,
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        });
    </script>
    <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script>
//        var route_prefix = "/filemanager";
        $('#lfm').filemanager('image', {prefix: route_prefix});
        // $('#lfm').filemanager('file', {prefix: route_prefix});
    </script>

@endsection