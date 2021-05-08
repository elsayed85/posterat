<div class="row row-sm">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">custom fields</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <!--                <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p>-->
            </div>
            <div class="card-body">
                <div class="table-responsive border-top userlist-table">
                    <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                        <thead>
                        <tr>
                            {{--<th class="border-bottom-0">category</th>--}}
                            <th class="border-bottom-0">input title</th>
                            <th class="border-bottom-0">input name</th>
                            <th class="border-bottom-0">input type</th>
                            <th class="border-bottom-0">required</th>
                            <th class="border-bottom-0">show</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customfields as $customfield)
                            <tr>
                                {{--<td>{{$customfield->category->title}}</td>--}}
                                <td>{{$customfield->input_title}}</td>
                                <td>{{$customfield->input_name}}</td>
                                <td>{{$customfield->input_type}}</td>
                                <td class="text-center">
                            <span class="label text-{{$customfield->required?'success':'muted'}} d-flex">
                                <div class="dot-label {{$customfield->required?'bg-success':'bg-gray-300'}} ml-1"></div>
                                {{$customfield->required?'yes':'no'}}
                            </span>
                                </td>
                                <td class="text-center">
                            <span class="label text-{{$customfield->show?'success':'muted'}} d-flex">
                                <div class="dot-label {{$customfield->show?'bg-success':'bg-gray-300'}} ml-1"></div>
                                {{$customfield->show?'show':'hidden'}}
                            </span>
                                </td>
                                <td> <a href="{{ route('dashboard.customfields.show',$customfield->id) }}" class="btn btn-sm btn-primary">
                                        <i class="las la-search"></i>
                                    </a>
                                    <a href="{{ route('dashboard.customfields.edit',$customfield->id) }}" class="btn btn-sm btn-info"><i class="las la-pen"></i></a>
                                    <form action="{{ route('dashboard.customfields.destroy', $customfield->id)}}" method="post" style="display: inline;">
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
                {{$customfields->links()}}

            </div>
        </div>
    </div><!-- COL END -->
</div>
