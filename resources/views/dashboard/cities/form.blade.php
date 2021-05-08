<!-- row -->
<div class="row row-sm">
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">cities</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>
            <div class="card-body pt-0">
                @csrf
                <div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label>name ar</label>
        <input type="text" name="name_ar" class="form-control" placeholder="city name" value="{{$city->name_ar??old('name_ar')}}">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label>name en</label>
        <input type="text" name="name_en" class="form-control" placeholder="city name" value="{{$city->name_en??old('name_en')}}">
    </div>
</div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>coordinate</label>
            <input type="text" name="coordinate" class="form-control" placeholder="coordinate" value="{{$city->coordinate??old('coordinate')}}">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="checkbox">
            <div class="custom-checkbox custom-control">
                <input type="hidden" name="published" value="0">
                <input type="checkbox" name="published" value="1" {{ $city->published??old('published') ? 'checked' : '' }} data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                <label for="checkbox-2" class="custom-control-label mt-1">show</label>
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