<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DropzoneUploadImages extends Component
{
    public $setting;

    public function __construct($setting)
    {
        $this->setting['maxFiles'] =$setting['maxFiles']?? 10;
        $this->setting['maxFilesize'] =$setting['maxFilesize']?? 2;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.dropzone-upload-images');
    }
}
