@push('css')
@endpush
    <ul class="ramymenu">
        @foreach($categories as $category)
            <li><a href="{{route('categories.show',$category->id)}}">
                    @if($category->icon =='')
                        <img alt="{{$category->title}}" src="{{asset(trans('theme.path').'/images/logo.png')}}" style="width: 1.8rem;height: 1.8rem;">
                    @else
                    <img alt="" src="{{url($category->icon)}}" style="width: 2rem;height: 2rem;">
                    @endif
                        {{$category->title}}
                </a>
                @if($category->children->count())
            <div class="ramymegadrop">
                @foreach($category->children as $son)
                <div class="ramycol">
                    <h3><a href="{{route('categories.show',$son->id)}}" class="font-bold">{{$son->title}}</a></h3>

                    @if($son->children->count())
                        <ul>
                        @foreach($son->children as $grandson)
                            <li><a href="{{route('categories.show',$grandson->id)}}" class="font-bold">{{$grandson->title}}</a></li>
                        @endforeach
                        </ul>
                    @endif
                </div>
                @endforeach
            </div>
                @endif
            </li>
        @endforeach
    </ul>