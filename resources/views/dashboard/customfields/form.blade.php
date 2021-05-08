@section('css')
    <!---Internal Input tags css-->
    <link href="{{URL::asset('assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
@stop
<!-- row -->
<div class="row row-sm">
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">custom fileds</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>
            <div class="card-body pt-0">
                @csrf
                <div class="row">
                    {{--<div class="col-xs-12 col-sm-12 col-md-12">--}}
                        {{--<div class="form-group">--}}
                            {{--<label>categories</label>--}}
                            {{--<select class="form-control select2-no-search" name="category_id">--}}
                                {{--@foreach($categories as $category)--}}
                                    {{--<option label="" value="{{$category->id}}" {{ (  old('category_id',$customfield->category_id??'') == $category->id ) ? 'selected' : '' }}>--}}
                                        {{--{{$category->title}}--}}
                                    {{--</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>input title ar</label>
                            <input type="text" name="input_title_ar" class="form-control" placeholder="customfield input title ar" value="{{$customfield->input_title_ar??old('input_title_ar')}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>input title en</label>
                            <input type="text" name="input_title_en" class="form-control" placeholder="customfield input title en" value="{{$customfield->input_title_en??old('input_title_en')}}">
                        </div>
                    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>input name</label>
            <input type="text" name="input_name" class="form-control" placeholder="input_name" value="{{$customfield->input_name??old('input_name')}}">
        </div>
    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>input type</label>
                            <select class="form-control select2-no-search" name="input_type"  id="input_type" onchange="return showDiv()">
                                @foreach($input_types as $input_type)
                                        <option label="{{$input_type}}" value="{{$input_type}}" {{ ( old('input_type',$customfield->input_type??'') == $input_type ) ? 'selected' : '' }}>
                                            {{$input_type}}
                                        </option>
                                 @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>default value</label>
                            <input type="text" name="default_value" class="form-control" placeholder="default_value" value="{{$customfield->default_value??old('default_value')}}">
                        </div>
                    </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="container">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="image_label">select Image</label>
                                <!--3party-->
<div class="input-group">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>
<input id="thumbnail" class="form-control" type="text" name="input_icon" value="{{$customfield->input_icon??old('input_icon')}}">
</div>
<img id="holder" style="margin-top:15px;max-height:100px;" src="{{$customfield->input_icon??old('input_icon')}}">
<!--3party-->
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>input order</label>
                            <input type="number" name="order_is" class="form-control" placeholder="order_is" value="{{$customfield->order_is??old('order_is')}}" size="20">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" id="input_options">
                        {{--<div class="form-group">--}}
                            {{--<label>input options</label>--}}
                            {{--<input type="text" name="input_options" data-role="tagsinput" value="{{ $customfield->input_options_str??old('input_options')}}" class="form-control" placeholder="input options comma">--}}
                        {{--</div>--}}
                        <div class="input_fields_wrap">
                            <button class="add_field_button btn btn-success">Add Fields</button>
@if(isset($customfield->input_options) && is_array($customfield->input_options))
                                @foreach($customfield->input_options as $input_option)
                                <div class="col-md-12">AR: <input type="text" name="mytext_ar[]" value="{{$input_option['ar']??''}}" size="20" style="display: inline-block;"> EN: <input type="text" name="mytext_en[]"  value="{{$input_option['en']??''}}" size="20" style="display: inline-block;"><a href="#" class="remove_field">Remove</a></div>
                       @endforeach
    @endif
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="checkbox">
                            <div class="custom-checkbox custom-control">
                                <input type="hidden" name="required" value="0">
                                <input type="checkbox" name="required" value="1" {{ $customfield->required??old('required') ? 'checked' : '' }} data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                <label for="checkbox-2" class="custom-control-label mt-1">required</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="checkbox">
                            <div class="custom-checkbox custom-control">
                                <input type="hidden" name="show" value="0">
                                <input type="checkbox" name="show" value="1" {{ $customfield->show??old('show') ? 'checked' : '' }} data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                <label for="checkbox-1" class="custom-control-label mt-1">show</label>
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
    <!-- Internal Input tags js-->
    {{--<script src="{{URL::asset('assets/plugins/inputtags/inputtags.js')}}"></script>--}}


    <script>
        $(document).ready(function() {
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="col-md-12">AR: <input type="text" name="mytext_ar[]" size="20" style="display: inline-block;"> EN: <input type="text" name="mytext_en[]" size="20" style="display: inline-block;"><a href="#" class="remove_field">Remove</a></div>'); //add input box
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
        function showDiv()
        {
            var select = document.getElementById('input_type');
            console.log(select);
            if (select.options[select.selectedIndex].value =='select'){
                document.getElementById('input_options').style.display ='block';

            }else {
                document.getElementById('input_options').style.display ='none';
            }

        }
        showDiv();
    </script>
    <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script>
        var route_prefix = "/filemanager";
        $('#lfm').filemanager('image', {prefix: route_prefix});
        // $('#lfm').filemanager('file', {prefix: route_prefix});
    </script>
@endsection
