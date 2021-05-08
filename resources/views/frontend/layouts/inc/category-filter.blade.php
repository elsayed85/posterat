
<!-- الفئات Panel -->
<div class="panel panel-default">
    <!-- Heading -->
    <div class="panel-heading" role="tab" id="headingOne">
        <!-- Title -->
        <h4 class="panel-title">
            @if(count($category->children))
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    @if($category->icon =='')
                        <img alt="{{$category->title}}" src="{{asset(trans('theme.path').'/images/logo.png')}}" style="width: 1.8rem;height: 1.8rem;">
                    @else
                        <img alt="{{$category->title}}" src="{{url($category->icon)}}" style="width: 1.8rem;height: 1.8rem;">
                    @endif
                    <i class="more-less glyphicon glyphicon-plus"></i>
                {{--@lang('theme.categories')--}}
                    {{$category->title}}
            </a>
                @else
               <a role="button"> {{$category->title}}</a>
            @endif
        </h4>
        <!-- Title End -->
    </div>
    <!-- Content -->
    @if(count($category->children))
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body categories">
            <ul>
                @foreach($category->children as $child)
                <li><a href="{{route('categories.show',$child->id)}}">{{$child->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
</div>
<!-- الفئات Panel End -->
{{--<!-- Brands Panel -->--}}
{{--<div class="panel panel-default">--}}
    {{--<!-- Heading -->--}}
    {{--<div class="panel-heading" role="tab" id="headingTwo">--}}
        {{--<h4 class="panel-title">--}}
            {{--<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">--}}
                {{--<i class="more-less glyphicon glyphicon-plus"></i>--}}
                {{--العلامات التجارية--}}
            {{--</a>--}}
        {{--</h4>--}}
    {{--</div>--}}
    {{--<!-- Content -->--}}
    {{--<div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">--}}
        {{--<div class="panel-body">--}}
            {{--<!-- Search -->--}}
            {{--<div class="search-widget">--}}
                {{--<input placeholder="search" type="text">--}}
                {{--<button type="submit"><i class="fa fa-search"></i></button>--}}
            {{--</div>--}}
            {{--<!-- Brands List -->--}}
            {{--<div class="skin-minimal">--}}
                {{--<ul class="list">--}}
                    {{--<li>--}}
                        {{--<input  type="checkbox" id="minimal-checkbox-1">--}}
                        {{--<label for="minimal-checkbox-1">جميع العلامات التجارية</label>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<input  type="checkbox" id="minimal-checkbox-2">--}}
                        {{--<label for="minimal-checkbox-2">سامسونج</label>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<input  type="checkbox" id="minimal-checkbox-3">--}}
                        {{--<label for="minimal-checkbox-3">تفاحة</label>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<input  type="checkbox" id="minimal-checkbox-4">--}}
                        {{--<label for="minimal-checkbox-4">نوكيا</label>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<input  type="checkbox" id="minimal-checkbox-5">--}}
                        {{--<label for="minimal-checkbox-5">سوني</label>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<input  type="checkbox" id="minimal-checkbox-6">--}}
                        {{--<label for="minimal-checkbox-6">بلاك بيري</label>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<input  type="checkbox" id="minimal-checkbox-7">--}}
                        {{--<label for="minimal-checkbox-7">HTC</label>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<input  type="checkbox" id="minimal-checkbox-8">--}}
                        {{--<label for="minimal-checkbox-8">موتورولا</label>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<!-- Brands List End -->--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!-- Brands Panel End -->--}}
{{--<!-- Condition Panel -->--}}
{{--<div class="panel panel-default">--}}
    {{--<!-- Heading -->--}}
    {{--<div class="panel-heading" role="tab" id="headingThree">--}}
        {{--<h4 class="panel-title">--}}
            {{--<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
                {{--<i class="more-less glyphicon glyphicon-plus"></i>--}}
                {{--شرط--}}
            {{--</a>--}}
        {{--</h4>--}}
    {{--</div>--}}
    {{--<!-- Content -->--}}
    {{--<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">--}}
        {{--<div class="panel-body">--}}
            {{--<div class="skin-minimal">--}}
                {{--<ul class="list">--}}
                    {{--<li>--}}
                        {{--<input tabindex="7" type="radio" id="minimal-radio-1" name="minimal-radio">--}}
                        {{--<label for="minimal-radio-1">جديد</label>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<input tabindex="8" type="radio" id="minimal-radio-2" name="minimal-radio" checked>--}}
                        {{--<label for="minimal-radio-2">مستعمل</label>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!-- Condition Panel End -->--}}
{{--<!-- التسعير Panel -->--}}
{{--<div class="panel panel-default">--}}
    {{--<!-- Heading -->--}}
    {{--<div class="panel-heading" role="tab" id="headingfour">--}}
        {{--<h4 class="panel-title">--}}
            {{--<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">--}}
                {{--<i class="more-less glyphicon glyphicon-plus"></i>--}}
                {{--السعر--}}
            {{--</a>--}}
        {{--</h4>--}}
    {{--</div>--}}
    {{--<!-- Content -->--}}
    {{--<div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">--}}
        {{--<div class="panel-body">--}}
            {{--<span class="price-slider-value">Price ($) <span id="price-min"></span> - <span id="price-max"></span></span>--}}
            {{--<div id="price-slider"></div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!-- التسعير Panel End -->--}}