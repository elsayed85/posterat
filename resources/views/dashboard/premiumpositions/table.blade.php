<div class="row row-sm">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">premium positions</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <!--                <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p>-->
            </div>
            <div class="card-body">
                <div class="table-responsive border-top userlist-table">
                    <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                        <thead>
                        <tr>
                            <th class="border-bottom-0">category deep</th>
                            <th class="border-bottom-0">max ads</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($premiumpositions as $premiumposition)
                            <tr>
                                <td>{{$premiumposition->category_deep}}</td>
                                <td>{{$premiumposition->max_ads}}</td>
                                <td> <a href="{{ route('dashboard.premiumpositions.show',$premiumposition->id) }}" class="btn btn-sm btn-primary">
                                    <i class="las la-search"></i>
                                </a>
                                <a href="{{ route('dashboard.premiumpositions.edit',$premiumposition->id) }}" class="btn btn-sm btn-info"><i class="las la-pen"></i></a>
                                <form action="{{ route('dashboard.premiumpositions.destroy', $premiumposition->id)}}" method="post" style="display: inline;">
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
                {{$premiumpositions->links()}}


            </div>
        </div>
    </div><!-- COL END -->
</div>
