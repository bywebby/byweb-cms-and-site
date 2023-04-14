<?php

namespace App\View\Components\Admin\FormFields;

use Illuminate\View\Component;

class TextAreaPost extends Component
{

    public $label;
    public $name;
    public $rows;
    public $myData;

    /**
     * TextAreaPost constructor.
     * @param $label
     * @param $name
     * @param array $myData
     * @param int $rows
     */
    public function __construct($label, $name, $myData = [], $rows = 3)
    {
       $this->label = $label;
       $this->name = $name;
       $this->rows = $rows;
       $this->myData = $myData;
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
