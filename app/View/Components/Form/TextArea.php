<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class TextArea extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $name ,public string $placeholder = '', public string $rows="5" ,public string $labelText= '', public $value = '', public bool $errorable = true)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('form.text-area');
    }
}
