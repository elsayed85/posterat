<!-- row -->
<div class="row row-sm">
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">adabuses</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>
            <div class="card-description pt-0">
                @csrf
                <div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label>title ar</label>
        <input type="text" name="title_ar" class="form-control" placeholder="adabuse title ar" value="{{$adabuse->title_ar??old('title_ar')}}">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label>title en</label>
        <input type="text" name="title_en" class="form-control" placeholder="adabuse title en" value="{{$adabuse->title_en??old('title_en')}}">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label>description ar</label>
        <input type="text" name="description_ar" class="form-control" placeholder="adabuse description ar" value="{{$adabuse->description_ar??old('description_ar')}}">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label>description en</label>
        <input type="text" name="description_en" class="form-control" placeholder="adabuse description en" value="{{$adabuse->description_en??old('description_en')}}">
    </div>
</div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>adabuse_image</label>
                            <input type="text" name="adabuse_image" class="form-control" placeholder="adabuse_image" value="{{$adabuse->adabuse_image??old('adabuse_image')}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>url</label>
                            <input type="text" name="url" class="form-control" placeholder="url" value="{{$adabuse->url??old('url')}}">
                        </div>
                    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>order_is</label>
            <input type="number" name="order_is" class="form-control" placeholder="order_is" value="{{$adabuse->order_is??old('order_is')}}">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="checkbox">
            <div class="custom-checkbox custom-control">
                <input type="hidden" name="published" value="0">
                <input type="checkbox" name="published" value="1" {{ $adabuse->published??old('published') ? 'checked' : '' }} data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
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