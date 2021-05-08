        <!--slider_images -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            @for($i=1;$i < count($slider_images);$i++)
                <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>

            @endfor
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" style="max-height: {{get_setting('slider_height')}}rem;min-height: {{get_setting('slider_height')}}rem;" >
@foreach($slider_images as  $slider)
                <div class="item @if($loop->first)active @endif">
                    <a href="{{route('sliders.show',$slider->id)}}"><img src="{{url($slider->slider_image)}}" alt="{{$slider->title}}" style="width:100%;"></a>
                    <div class="carousel-caption">
                        <h3>{{$slider->title}}</h3>
                        {{--<p>{{$slider->description}}</p>--}}
                    </div>
                </div>
@endforeach

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
        <!--slider_images -->