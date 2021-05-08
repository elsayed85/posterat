<!-- row -->
<div class="row row-sm">
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">users</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>
            <div class="card-body pt-0">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>first name</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="first_name" value="{{$user->first_name??old('first_name')}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>last name</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="last_name" value="{{$user->last_name??old('last_name')}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="phone" value="{{$user->phone??old('phone')}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>email</label>
                                    <input type="email" name="email" class="form-control" placeholder="email" value="{{$user->email??old('email')}}">
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