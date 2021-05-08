<!-- row -->
<div class="row row-sm">
    <div class="col-lg-8 col-xl-8 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">pages</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>
            <div class="card-body pt-0">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>type</label>
            <select class="form-control select2-no-search" name="type_is">

                <option label="page" value="{{old('type_is',$page->type_is??'')}}" {{(old('type_is',$page->type_is??'') == 'page') ? 'selected' : '' }}>
                Page
                </option>

                <option label="link" value="{{old('type_is',$page->type_is??'')}}" {{(old('type_is',$page->type_is??'') == 'link') ? 'selected' : '' }}>
                Link
                </option>

                <option label="popup" value="{{old('type_is',$page->type_is??'')}}" {{(old('type_is',$page->type_is??'') == 'popup') ? 'selected' : '' }}>
                Popup
                </option>

            </select>
                        </div>
                    </div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label>title ar</label>
        <input type="text" name="title_ar" class="form-control" placeholder="page title ar" value="{{$page->title_ar??old('title_ar')}}" required>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label>title en</label>
        <input type="text" name="title_en" class="form-control" placeholder="page title en" value="{{$page->title_en??old('title_en')}}" required>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label>body ar</label>
       <textarea name="body_ar" class="form-control for-body">{{$page->body_ar??old('body_ar')}}</textarea>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label>body en</label>
        <textarea name="body_en" class="form-control for-body">{{$page->body_en??old('body_en')}}</textarea>
    </div>
</div>
                    {{--<div class="col-xs-12 col-sm-12 col-md-12">--}}
                        {{--<div class="form-group">--}}
                            {{--<label>image</label>--}}
                            {{--<input type="text" name="image" class="form-control" placeholder="image" value="{{$page->image??old('image')}}">--}}
                        {{--</div>--}}
                    {{--</div>--}}

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>order_is</label>
            <input type="number" name="order_is" class="form-control" placeholder="order_is" value="{{$page->order_is??old('order_is')}}">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="checkbox">
            <div class="custom-checkbox custom-control">
                <input type="hidden" name="published" value="0">
                <input type="checkbox" name="published" value="1" {{ $page->published??old('published') ? 'checked' : '' }} data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
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
        $('.for-body').ckeditor({
            height: 200,
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        });
    </script>
@endsection