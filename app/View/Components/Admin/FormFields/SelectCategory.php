<?php

namespace App\View\Components\Admin\FormFields;

use Illuminate\View\Component;

class SelectCategory extends Component
{
    public $name;
    public $datacategory;
    public $title;
    public $mydata;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $title, $datacategory = [], $mydata = [])
    {
       $this->name = $name;
       $this->datacategory = $datacategory;
       $this->title = $title;
       $this->mydata = $mydata;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form-fields.select-category');
    }
}
