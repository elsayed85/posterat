<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Slider extends Component
{
 public $slider_images;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(\App\Models\Slider $slider)
    {
        $this->slider_images = $slider->slider_images();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.slider');
    }
}
