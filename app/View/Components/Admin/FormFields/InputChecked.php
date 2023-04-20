<?php

namespace App\View\Components\Admin\Formfields;

use Illuminate\View\Component;

class InputChecked extends Component
{

    public $label;
    public $name;
    public $checked;


    /**
     * InputChecked constructor.
     * @param $label
     * @param $name
     * @param $checked
     */
    public function __construct($label, $name, $checked = 1)
    {
        $this->label = $label;
        $this->name = $name;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form-fields.input-checked');
    }
}
