<?php

namespace App\View\Components\Admin\FormFields;

use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $name;
    public $title;
    public $datatype;



    public function __construct($name, $title, $datatype = [])
    {
        $this->name = $name;
        $this->title = $title;
        $this->datatype = $datatype;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form-fields.select');
    }
}
