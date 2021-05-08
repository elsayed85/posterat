<!-- row -->
<div class="row row-sm">
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">categories</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>
            <div class="card-body pt-0">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>title ar</label>
                                    <input type="text" name="title_ar" class="form-control" placeholder="title" value="{{$category->title_ar??old('title_ar')}}" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>title en</label>
                                    <input type="text" name="title_en" class="form-control" placeholder="title" value="{{$category->title_en??old('title_en')}}" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="container">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="image_label">Icon <small> less than(H: 20px X W: 20px)</small></label>
                                            <!--3party-->
                                            <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                        </a>
                        </span>
                                                <input id="thumbnail" class="form-control" type="text" name="icon" value="{{$slider->icon??old('icon')}}">
                                            </div>
                                            <img id="holder" style="margin-top:15px;max-height:100px;" src="{{$slider->icon??old('icon')}}">
                                            <!--3party-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>description ar</label>
                                    <textarea class="form-control" style="height:150px" name="description_ar" placeholder="description">{{$category->description_ar??old('description_ar')}}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>description en</label>
                                    <textarea class="form-control" style="height:150px" name="description_en" placeholder="description">{{$category->description_en??old('description_en')}}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>parent</label>
                                    <select class="form-control select2-no-search" name="parent">
                                        <option label="Choose one" value="1">
                                            is root
                                        </option>
                                        @if(isset($categories))
                                        @foreach($categories as $cat)
                                            <option label="{{$cat->title}}" value="{{$cat->id}}" {{ (  old('parent',$category->parent??'') == $cat->id ) ? 'selected' : '' }}>
                                                {{$cat->title}}
                                            </option>
                                        @endforeach                                    
                                    @endif
                                    </select>                           
                                     </div>
                            </div>
                            {{--<div class="col-xs-12 col-sm-12 col-md-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label>deep</label>--}}
                                    {{--<input type="text" name="deep" class="form-control" placeholder="deep" value="{{$category->deep??old('deep')}}">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="checkbox">
                                    <div class="custom-checkbox custom-control">
                                        <input type="hidden" name="published" value="0">
                                        <input type="checkbox" name="published" value="1" {{ $category->published??old('published') ? 'checked' : '' }} data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                        <label for="checkbox-2" class="custom-control-label mt-1">published</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="checkbox">
                                    <div class="custom-checkbox custom-control">
                                        <input type="hidden" name="is_menu" value="0">
                                        <input type="checkbox" name="is_menu" value="1" {{ $category->is_menu??old('is_menu') ? 'checked' : '' }} data-checkboxes="mygroup" class="custom-control-input" id="checkbox-3">
                                        <label for="checkbox-3" class="custom-control-label mt-1">on menu</label>
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
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
            var route_prefix = "/filemanager";
    $('#lfm').filemanager('image', {prefix: route_prefix});
    // $('#lfm').filemanager('file', {prefix: route_prefix});
</script>
@endsection