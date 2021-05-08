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
                                    <label>name</label> <span class="tx-medium">{{$page->name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>coordinate</label> <span class="tx-medium">{{$page->coordinate}}</span>
                                </div>
                            </div>
                        </div>
              
                      
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>show</label> <span class="tx-medium">{{$page->show?'yes':'no'}}</span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>updated at</label> <span class="tx-medium">{{$page->updated_at}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="media mb-0">
                            <div class="media-body">
                                <div>
                                    <label>created at</label> <span class="tx-medium">{{$page->created_at}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>