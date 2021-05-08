@section('css')
    <link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
@endsection
<!-- row -->
<div class="row row-sm">
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">premium positions</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>
            <div class="card-body pt-0">
                        @csrf

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>	category deep</label>
                                    <select class="form-control select2-no-search" name="category_deep">
                                        @for($i=1;$i<7;$i++)
                                        <option label="Deep - {{$i}}" value="{{$i}}" {{ (  old('category_deep',$premiumposition->category_deep??'') == $i) ? 'selected' : '' }}>
                                            {{$i}}
                                        </option>
                                       @endfor
                                    </select>                           
                                     </div>
                            </div>

                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>max ads</label>
                                            <input type="number" name="max_ads" class="form-control" placeholder="max ads" value="{{$premiumposition->max_ads??old('max_ads')}}" required>
                                        </div>
                                     </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <input type="hidden" name="active" value="1">

                            <button type="submit" class="btn btn-primary">save</button>
                        </div>
                        </div>


            </div>
        </div>
    </div>
<!-- row -->