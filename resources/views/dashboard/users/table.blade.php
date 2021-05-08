<div class="row row-sm">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">users</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <!--                <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p>-->
            </div>
            <div class="card-body">
                <div class="table-responsive border-top userlist-table">
                    <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                        <thead>
                        <tr>
                            <th class="border-bottom-0">name</th>
                            {{--<th class="border-bottom-0">description</th>--}}
                            <th class="border-bottom-0">phone</th>
                            <th class="border-bottom-0">email</th>
                            <th class="border-bottom-0">verified at</th>
                            <th class="border-bottom-0">actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->full_name}}</td>
                                {{--<td>{{$user->description}}</td>--}}
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                                <td class="text-center">
                            <span class="label text-{{$user->email_verified_at!=NULL?'success':'muted'}} d-flex"><div class="dot-label {{$user->email_verified_at!=NULL?'bg-success':'bg-gray-300'}} ml-1"></div>
                                {{$user->email_verified_at!=NULL?'active':'inactive'}}
                            </span>
                                </td>
                                <td> <a href="{{ route('dashboard.users.show',$user->id) }}" class="btn btn-sm btn-primary">
                                        <i class="las la-search"></i>
                                    </a>
                                    <a href="{{ route('dashboard.users.edit',$user->id) }}" class="btn btn-sm btn-info"><i class="las la-pen"></i></a>
                                    @if($user->id != auth()->user()->id)
                                    <form action="{{ route('dashboard.users.destroy', $user->id)}}" method="post" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="las la-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$users->links()}}

            </div>
        </div>
    </div><!-- COL END -->
</div>
