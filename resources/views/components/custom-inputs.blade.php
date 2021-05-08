<div>
    <br>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
    {{--{{dd($custom_inputs)}}--}}
    {{--    //{{mp($custom_inputs)}}--}}
    @foreach($custom_inputs as  $input)
        <div class="col-xs-12 col-sm-12 col-md-4">
            @if($input->input_type == 'checkbox' && $input->show)
                {{--<div class="checkbox">--}}
                    {{--<div class="custom-checkbox custom-control">--}}
                        {{--<input type="hidden" name="{{$input->input_name}}" value="0">--}}
                        {{--<label class="switch">--}}
                            {{--<input type="checkbox" name="{{$input->input_name}}" value="{{$input->default_value??$input->input_title??1}}" {{ old($input->input_name,$input->default_value??'') ? 'checked' : '' }} data-checkboxes="mygroup" class="custom-control-input" id="{{$input->input_name}}" {{$input->required?'required':''}}>--}}
                            {{--<span class="slider round"></span>--}}
                        {{--</label>--}}
                        {{--<label for="{{$input->input_name}}" class="custom-control-label mt-1">--}}
                            {{--@if(isset($input->input_icon))--}}
                                {{--<img src="{{$input->input_icon}}" class="input_icon" style="display: inline;">--}}
                            {{--@endif--}}
                            {{--{{$input->input_title}}--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{-- --}}
                {{--<div class="checkbox">--}}
                    {{--<div class="custom-field">--}}
                        {{--<div class="check-true" style=""></div>--}}
                    {{--<div class="custom-checkbox custom-control">--}}
                        {{--<input type="hidden" name="{{$input->input_name}}" value="0">--}}
                        {{--<label class="switch">--}}
                            {{--<input type="checkbox" name="{{$input->input_name}}" value="{{$input->default_value??$input->input_title??1}}" {{ old($input->input_name,$input->default_value??'') ? 'checked' : '' }} data-checkboxes="mygroup" class="custom-control-input" id="{{$input->input_name}}" {{$input->required?'required':''}}>--}}
                            {{--<span class="slider round"></span>--}}
                        {{--</label>--}}
                        {{--<label for="{{$input->input_name}}" class="custom-control-label mt-1">--}}
                            {{--@if(isset($input->input_icon))--}}
                                {{--<img src="{{$custom->input_icon}}" class="input_icon" style="display: inline; max-width:3em;max-height:3em;">--}}
                            {{--@endif--}}
                            {{--{{$input->input_title}}--}}
                        {{--</label>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="me">
                    <div class="custom-field-in">
                        <div class="check-false" style=""></div>
                        <input type="hidden" name="{{$input->input_name}}" value="0">
                        <input type="checkbox" style="display: none;" name="{{$input->input_name}}" value="{{$input->default_value??$input->input_title??1}}" {{ old($input->input_name,$input->default_value??'') ? 'checked' : '' }} data-checkboxes="mygroup" class="custom-control-input" id="{{$input->input_name}}" {{$input->required?'required':''}}>
                        <img src="{{$input->input_icon}}" class="input_icon" style="background-color:#fff;display:inline-block; max-width:30px;max-height:30px;border-radius: 50%;">
                        &nbsp;&nbsp; {{$input->input_title}}

                    </div>
                </div>
            @elseif($input->input_type == 'text')
                <div class="form-group">
                    <label>
                        @if(isset($input->input_icon))
                            <img src="{{$input->input_icon}}" class="input_icon" style="display: inline;">
                        @endif
                        {{$input->input_title}}
                    </label>
                    <input type="text" name="{{$input->input_name}}" class="form-control" placeholder="{{$input->input_title}}" value="{{old($input->input_name,$input->default_value??'')}}" {{$input->required?'required':''}}>
                </div>
            @elseif($input->input_type == 'select')
                {{--{{dd($input->input_options)}}--}}
                    {{--<div class="check-true" style=""></div>--}}
                <div class="form-group">
                    {{--<div class="col-xs-6 col-sm-6 col-md-6">--}}
                    <label>
                        @if(isset($input->input_icon))
                            <img src="{{$input->input_icon}}" class="input_icon" style="display: inline;">
                        @endif
                            {{$input->input_title}}
                    </label>
                    {{--</div>--}}
                    {{--<div class="col-xs-6 col-sm-6 col-md-6">--}}
                    <select class="form-control select2-no-search" name="{{$input->input_name}}" {{$input->required?'required':''}} style="display: inline;">
                       <option value="0">@lang('theme.please choose')</option>
                        @foreach($input->input_options as $key => $value )
                            <option label="" value="{{$key}}" {{ ( old($input->input_name,$input->default_value??'') == $key  ) ? 'selected' : '' }}>
                                {{$value[App::getLocale()]}}
                            </option>
                        @endforeach
                    </select>
                    {{--</div>--}}
        </div>
            @elseif($input->input_type == 'textarea')
                <div class="form-group">
                    <div class="col-xs-3 col-sm-3 col-md-4">
                    <label>
                        @if(isset($input->input_icon))
                            <img src="{{$input->input_icon}}" class="input_icon" style="display: inline;">
                        @endif
                        {{$input->input_title}}
                    </label>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-8">
                    <textarea class="form-control" style="height:150px" name="{{$input->input_name}}" placeholder="{{$input->input_title}}" {{$input->required?'required':''}}>{{$input->default_value??old($input->input_name)}}</textarea>
                    </div>
                </div>


            @endif
        </div>
    @endforeach
</div>