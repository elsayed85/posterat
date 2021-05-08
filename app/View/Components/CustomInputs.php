<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CustomInputs extends Component
{
    public $custom_inputs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        $this->custom_inputs = $inputs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.custom-inputs');
    }
}
