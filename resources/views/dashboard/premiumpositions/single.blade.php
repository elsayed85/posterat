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
                                    <label>category deep</label> <span class="tx-medium">{{$premiumposition->category_deep}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>max ads</label> <span class="tx-medium">{{$premiumposition->max_ads}}</span>
                                </div>
                            </div>
                        </div>

                        {{--<div class="media">--}}
                            {{--<div class="media-body">--}}
                                {{--<div>--}}
                                    {{--<label>user id</label> <span class="tx-medium">{{$premiumposition->user->full_name??''}}</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>updated at</label> <span class="tx-medium">{{$premiumposition->updated_at}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="media mb-0">
                            <div class="media-body">
                                <div>
                                    <label>created at</label> <span class="tx-medium">{{$premiumposition->created_at}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>