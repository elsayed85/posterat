<div class="row row-sm">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">ads</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <!--                <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p>-->
            </div>
            <div class="card-body">
                <div class="table-responsive border-top userlist-table">
                    <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                        <thead>
                        <tr>
                            <th class="border-bottom-0">title</th>
                            <th class="border-bottom-0">category</th>
                            <th class="border-bottom-0">image</th>
                            <th class="border-bottom-0">published at</th>
                            <th class="border-bottom-0">published</th>
                            <th class="border-bottom-0">premium</th>
                            <th class="border-bottom-0">price</th>
                            <th class="border-bottom-0">actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ads as $ad)
                            <tr>
                                <td>{{Str::limit($ad->title, 50, $end='.......')}}</td>
                                <td><a href="#">{{$ad->category->title}}</a></td>
                                <td><img src="{{asset(''.$ad->image_thumb)}}" width="100px" height="100px" alt=""></td>
                                <td>{{$ad->published_at}}</td>
                                <td class="text-center">
                            <span class="label text-{{$ad->published==1?'success':'muted'}} d-flex"><div class="dot-label {{$ad->published==1?'bg-success':'bg-gray-300'}} ml-1"></div>
                                {{$ad->published==1?'active':'inactive'}}
                            </span>
                                </td>
                                <td class="text-center">
                            <span class="label text-{{$ad->premium==1?'success':'muted'}} d-flex"><div class="dot-label {{$ad->premium==1?'bg-success':'bg-gray-300'}} ml-1"></div>
                                {{$ad->premium==1?'active':'inactive'}}
                            </span>
                                </td>
                                <td>{{$ad->price}}</td>
                                <td>  <a href="{{route('dashboard.ads.show',$ad->id)}}" class="btn btn-success"><i class="fa fa-eye"></i> @lang('theme.details')</a>
                                    <a href="{{route('dashboard.ads.sold',$ad->id)}}" class="btn btn-warning"><i class="fa fa-handshake-o"></i> @lang('theme.sold')</a>
                                    <a href="{{route('dashboard.ads.archive',$ad->id)}}" class="btn btn-danger"><!--<i class="fa fa-trash"></i>-->{{$ad->archived==1?'archived':'archive'}}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$ads->links()}}

            </div>
        </div>
    </div><!-- COL END -->
</div>
