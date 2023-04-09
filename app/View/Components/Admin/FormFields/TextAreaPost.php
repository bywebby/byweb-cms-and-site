<?php

namespace App\View\Components\Admin\FormFields;

use Illuminate\View\Component;

class TextAreaPost extends Component
{

    public $label;
    public $name;
    public $rows;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $rows = 3)
    {
       $this->label = $label;
       $this->name = $name;
       $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form-fields.text-area-post');
    }
}
