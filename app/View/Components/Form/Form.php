<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $id, public string $route, public string $enctype = 'multipart/form-data', public string $method = 'POST')
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
        return view('form.form');
    }
}
