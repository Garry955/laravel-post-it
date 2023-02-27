<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class FileInput extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $labelText ="", public string $id="file" , public string $name = "file", public string $type="file", public bool $errorable = true)
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
        return view('form.file-input');
    }
}
