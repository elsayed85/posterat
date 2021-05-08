<div class="row row-sm">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">coupons</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <!--                <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p>-->
            </div>
            <div class="card-body">
                <div class="table-responsive border-top userlist-table">
                    <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                        <thead>
                        <tr>
                           
                            {{--<th class="border-bottom-0">description</th>--}}
                            <th class="border-bottom-0">promo code</th>
                            <th class="border-bottom-0">discount type</th>
                            <th class="border-bottom-0">discount value</th>
                            {{--<th class="border-bottom-0">discount limit</th>--}}
                            <th class="border-bottom-0">status</th>
                            <th class="border-bottom-0">start date</th>
                            <th class="border-bottom-0">end date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $coupon)
                            <tr>
                                <td>{{$coupon->promo_code}}</td>
                                <td>{{$coupon->discount_type}}</td>
                                <td>{{$coupon->discount_value}}</td>
                                {{--<td>{{$coupon->discount_limit}}</td>--}}
                                <td class="text-center">
                            <span class="label text-{{$coupon->active?'success':'muted'}} d-flex"><div class="dot-label {{$coupon->active?'bg-success':'bg-gray-300'}} ml-1"></div>
                                {{$coupon->active?'active':'unactive'}}
                            </span>
                                </td>
                                <td>{{$coupon->start_date}}</td>
                                <td>{{$coupon->end_date}}</td>


                                <td> <a href="{{ route('dashboard.coupons.show',$coupon->id) }}" class="btn btn-sm btn-primary">
                                    <i class="las la-search"></i>
                                </a>
                                <a href="{{ route('dashboard.coupons.edit',$coupon->id) }}" class="btn btn-sm btn-info"><i class="las la-pen"></i></a>
                                <form action="{{ route('dashboard.coupons.destroy', $coupon->id)}}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="las la-trash"></i></button>
                                </form>
                            </td>
                               
                            </tr>


                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$coupons->links()}}


            </div>
        </div>
    </div><!-- COL END -->
</div>
