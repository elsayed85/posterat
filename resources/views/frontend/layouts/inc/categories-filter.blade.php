<!-- الفئات Panel -->
<div class="panel panel-default">
    <!-- Heading -->
    @foreach($categories as $category)
        <div class="panel-heading" role="tab" id="heading{{$category->id}}">
            <!-- Title -->
            <h4 class="panel-title">
                @if(count($category->children))
                    <a href="{{route('categories.show',$category->id)}}">
                        <i role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$category->id}}" aria-expanded="true" aria-controls="collapse{{$category->id}}" class="more-less glyphicon glyphicon-plus"></i>
                        {{--@lang('theme.categories')--}}
                        {{$category->title}}
                    </a>
                @else
                    <a role="button" href="{{route('categories.show',$category->id)}}"> {{$category->title}}</a>
                @endif
            </h4>
            <!-- Title End -->
        </div>
        <!-- Content -->
        @if(count($category->children))
            <div id="collapse{{$category->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$category->id}}">
                <div class="panel-body categories">
                    <ul>
                        @foreach($category->children as $child)
                            <li><a href="{{route('categories.show',$child->id)}}">{{$child->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    @endforeach
</div>