<?php

namespace App\View\Components\Admin\Buttons;

use Illuminate\View\Component;

class BtnRoute extends Component
{

    public $route;
    public $title;
    public $btnClass;



    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $route, $btnClass = 'btn btn-primary mb-3')
    {
        $this->title = $title;
        $this->route = $route;
        $this->btnClass = $btnClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.buttons.btn-route');
    }
}
