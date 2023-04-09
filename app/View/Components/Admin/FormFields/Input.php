<?php

namespace App\View\Components\Admin\FormFields;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $type;
    public $label;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label = 'Заголовок поля', $type = 'text')
    {
        $this->label = $label;;
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form-fields.input');
    }
}
