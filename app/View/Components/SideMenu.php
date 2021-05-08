<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SideMenu extends Component
{
    public $categories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
//    public function __construct(\App\Models\Category $category)
//    {
//        $this->categories = $category->with('children')->where('parent',NULL)->orWhere('parent',0)->orderBy('order_is')->get();
//    }

    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.side-menu3');
    }
}
