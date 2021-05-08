<?php

namespace App\View\Components;

use App\Models\Page;
use Illuminate\View\Component;

class Popup extends Component
{
    public $popup_title;
    public $popup_body;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $popup =  Page::where('published', 1)
            ->where('type_is', 'popup')
           ->latest()->first();
        if($popup) {
            $this->popup_title = $popup->title;
            $this->popup_body = $popup->body;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
     if(isset($this->popup_title)) {
         return view('components.popup');
     }
    }
}
