@section('css')
    <link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
@endsection
<!-- row -->
<div class="row row-sm">
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">coupons</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>
            <div class="card-body pt-0">
                        @csrf

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>promo code</label>
                                    <input type="text" name="promo_code" class="form-control" placeholder="promo code" value="{{$coupon->promo_code??old('promo_code')}}" required>
                                </div>
                            </div>
                           
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>	Discount type</label>
                                    <select class="form-control select2-no-search" name="discount_type">
                                        <option label="percent" value="percent" {{ (  old('discount_type',$coupon->discount_type??'') == 'percent') ? 'selected' : '' }}>
                                            percent
                                        </option>
                                        <option label="value" value="value" {{ (  old('discount_type',$coupon->discount_type??'') == 'value') ? 'selected' : '' }}>
                                            value
                                        </option>
                                    </select>                           
                                     </div>
                            </div>
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>discount value</label>
                                            <input type="number" name="discount_value" class="form-control" placeholder="discount value" value="{{$coupon->discount_value??old('discount_value')}}" required>
                                        </div>
                                     </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>start date</label>
                                        <input type="text" name="start_date" id="start_date" class="form-control" placeholder="active from" value="{{$coupon->start_date??old('start_date')}}" required>
                                    </div>
                                </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>end date</label>
                                            <input type="text" name="end_date" id="end_date" class="form-control" placeholder="active to" value="{{$coupon->end_date??old('end_date')}}" required>
                                        </div>
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
@section('js')
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <script>
        // AmazeUI Datetimepicker
    $('#start_date').datetimepicker({
    format: 'yyyy-mm-dd hh:ii',
    autoclose: true
    });
        $('#end_date').datetimepicker({
            format: 'yyyy-mm-dd hh:ii',
            autoclose: true
        });
    </script>
@endsection