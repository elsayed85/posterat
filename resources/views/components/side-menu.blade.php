            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 sidebar">
                <div class="side-menu ">
                    <nav class="yamm megamenu-horizontal">
                        <ul class="nav">
                @foreach($categories as $category)
                                <li class="dropdown menu-item">
                                    <a href="{{route('categories.show',$category->id)}}" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon fa fa-laptop" aria-hidden="true"></i>{{$category->title}}</a>

                        @if($category->children->count())
                                        <ul class="dropdown-menu mega-menu-left"  style="min-width: 100rem;">
                                            <li class="yamm-content">
                                                <div class="row">
                                        @foreach($category->children as $son)
                                                        <div class="col-sm-3 col-xs-6 col-md-3">
                                                            <ul class="links list-unstyled">
                                                            <li><a href="{{route('categories.show',$son->id)}}" class="font-bold">{{$son->title}}</a></li>
                                                    @if($son->children->count())
                                                        @foreach($son->children as $grandson)
                                                            <li><a href="{{route('categories.show',$grandson->id)}}">{{$grandson->title}} </a></li>
                                                        @endforeach
                                                    @endif
                                                            </ul>
                                                        </div>
                                                @endforeach
                                                    <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- /.yamm-content -->
                            </ul>
                    @endif
                    <!-- /.dropdown-menu -->
                    </li>
                    <!-- /.menu-item -->

                @endforeach
            </ul>
            <!-- /.nav -->
        </nav>
    </div>
</div>