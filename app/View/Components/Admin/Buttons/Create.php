<?php

namespace App\View\Components\Admin\Buttons;

use Illuminate\View\Component;

class Create extends Component
{

    public $route;
    public $title;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route, $title)
    {

        $this->route = $route;
        $this->title = $title;


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.buttons.create');
    }
}
