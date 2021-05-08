<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function show($id)
    {
        $single_slider = Slider::where('id',$id)->where('published',1)->firstOrFail();
        $slider_title = ($single_slider->title);
        $slider_description = ($single_slider->description);
        //dump($single_slider->title);
        return view('frontend.sliders.show',compact('slider_title','slider_description'));
    }

}
