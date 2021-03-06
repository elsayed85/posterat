<div class="header">
    <div class="container">
        <div class="row">
            <!-- Logo -->
            <div class="col-md-3 col-sm-3 hidden-sm hidden-xs">
                <div class="logo">
                    <a href="index.html"><img alt="logo" src="{{asset(trans('theme.path').'/images/logo.png')}}"> </a>
                </div>
            </div>
            <!-- Category -->
            <div class="col-md-7 col-sm-9">
                <div class="col-md-3 col-sm-4 no-padding">
                    <select class="category form-control">
                        <option label="Select Option"></option>
                        <option value="0">Cars & Bikes</option>
                        <option value="1">Mobile Phones</option>
                        <option value="2">Home Appliances</option>
                        <option value="3">Clothing</option>
                        <option value="4">Human Resource</option>
                        <option value="5">Information Technology</option>
                        <option value="6">Marketing</option>
                        <option value="7">Others</option>
                        <option value="8">Sales</option>
                    </select>
                </div>
                <div class="col-md-9 col-sm-8 no-padding">
                    <div class="input-group">
                        <input type="text" placeholder="What Are You Looking For ?" class="form-control"> <span class="input-group-btn">
                        <button class="btn btn-default btn-rounded" type="button">@lang('theme.search')</button>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Post Button -->
            <div class="col-md-2 col-sm-3"> <a href="#" class="btn btn-orange btn-block btn-rounded">@lang('theme.post ad now') </a> <span class="free-flag visible-lg"></span> </div>
        </div>
    </div>
</div>