<div class="col-md-3 col-lg-3 col-xs-12 col-sm-12 sidebar">
    <div class="side-menu">
        <nav class="yamm megamenu-horizontal">
            <ul class="nav">
                <!-- /.menu-item -->
                @foreach($categories as $category)
                <li class="dropdown menu-item">

                    <a href="{{$category->id}}" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-laptop" aria-hidden="@if($category->children->count() > 0) true @else false @endif"></i>{{$category->title}}</a>
                    <!-- ================================== MEGAMENU VERTICAL ================================== -->
                    @if($category->children->count())
                        <ul class="dropdown-menu mega-menu-left">
                        <li class="yamm-content">
                            <div class="row">

                                <div class="col-xs-6 col-sm-6 col-lg-4">
                                    <ul>
                                        @foreach($category->children as $child)
                                        <li><a href="{{$child->id}}">{{$child->title}}</a></li>
                                            @if($loop->iteration % 10 == 0)
                                    </ul>
                                </div>
                                    <div class="col-xs-6 col-sm-6 col-lg-4">
                                        <ul>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                @endif
                <!-- /.dropdown-menu -->
                    <!-- ================================== MEGAMENU VERTICAL ================================== -->
                </li>
                <!-- /.menu-item -->
                    @endforeach
            </ul>
            <!-- /.nav -->
        </nav>
    </div>
</div>