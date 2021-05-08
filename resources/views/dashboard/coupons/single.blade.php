<div class="row row-sm">
    <div class="col-sm-12 col-lg-7 col-xl-8">
        <div class="">
            <a class="main-header-arrow" href="" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
            <div class="main-content-body main-content-body-contacts card custom-card">
                <div class="main-contact-info-body p-4">
                    <div class="media-list pb-0">
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>promo code</label> <span class="tx-medium">{{$coupon->promo_code}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>discount type</label> <span class="tx-medium">{{$coupon->discount_type}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>discount value</label> <span class="tx-medium">{{$coupon->discount_value}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>discount limit</label> <span class="tx-medium">{{$coupon->discount_limit}}</span>
                                </div>
                            </div>
                        </div>
                      
                        {{--<div class="media">--}}
                            {{--<div class="media-body">--}}
                                {{--<div>--}}
                                    {{--<label>user</label> <span class="tx-medium">{{$coupon->user->full_name}}</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>updated at</label> <span class="tx-medium">{{$coupon->updated_at}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="media mb-0">
                            <div class="media-body">
                                <div>
                                    <label>created at</label> <span class="tx-medium">{{$coupon->created_at}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>