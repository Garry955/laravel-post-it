<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class RadioInput extends Component
{

    public array $options =  [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $name, public string $values, public string $labelText = "", public bool $errorable = true)
    {
        $this->options = explode(',',$values);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('form.radio-input');
    }
}
