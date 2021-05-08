<!-- row -->
<div class="row row-sm">
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">settings</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>
            <div class="card-body pt-0">
                @csrf
                <div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label>name</label>
        <input type="text" name="name" class="form-control" placeholder="setting name" value="{{$setting->name??old('name')}}" readonly required>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label>value</label>
        <input type="text" name="var" class="form-control" placeholder="setting name" value="{{$setting->var??old('var')}}" required>
    </div>
</div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>group</label>
            <input type="text" name="group" class="form-control" placeholder="group" value="{{$setting->group??old('group')}}">
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