<div class="row row-sm">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">sliders</h4>
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
                            <th class="border-bottom-0">description</th>
                            <th class="border-bottom-0">show</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td>{{$slider->title}}</td>
                                <td>{{Str::limit($slider->description, 10, $end='.......')}}</td>
                                <td class="text-center">
                            <span class="label text-{{$slider->published?'success':'muted'}} d-flex"><div class="dot-label {{$slider->show?'bg-success':'bg-gray-300'}} ml-1"></div>
                                {{$slider->published?'show':'hidden'}}
                            </span>
                                </td>
                                <td> <a href="{{ route('dashboard.sliders.show',$slider->id) }}" class="btn btn-sm btn-primary">
                                        <i class="las la-search"></i>
                                    </a>
                                    <a href="{{ route('dashboard.sliders.edit',$slider->id) }}" class="btn btn-sm btn-info"><i class="las la-pen"></i></a>
                                    <form action="{{ route('dashboard.sliders.destroy', $slider->id)}}" method="post" style="display: inline;">
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
                {{$sliders->links()}}

            </div>
        </div>
    </div><!-- COL END -->
</div>
