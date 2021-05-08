@section('css')
    <link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
@endsection
<!-- row -->
<div class="row row-sm">
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">premium position days</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>
            <div class="card-body pt-0">
                        @csrf

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>	category deep</label>
                                    <select class="form-control select2-no-search" name="category_deep">
                                        @for($i=1;$i<7;$i++)
                                        <option label="Deep - {{$i}}" value="{{$i}}" {{ (  old('category_deep',$premiumpositionday->category_deep??'') == $i) ? 'selected' : '' }}>
                                            {{$i}}
                                        </option>
                                       @endfor
                                    </select>                           
                                     </div>
                            </div>

                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>days</label>
                                            <input type="number" name="days" class="form-control" placeholder="days" value="{{$premiumpositionday->days??old('days')}}" required>
                                        </div>
                                     </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>days cost</label>
                        <input type="number" name="days_cost" min="1" step=".01" class="form-control" placeholder="days cost" value="{{$premiumpositionday->days_cost??old('days_cost')}}" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="checkbox">
                        <div class="custom-checkbox custom-control">
                            <input type="hidden" name="published" value="0">
                            <input type="checkbox" name="published" value="1" {{ $premiumpositionday->published??old('published') ? 'checked' : '' }} data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
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
<!-- row -->