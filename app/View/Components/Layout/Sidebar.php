<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class Sidebar extends Component
{
    public $user;
    public $posts;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        if(auth()->user()) {
            $this->user = auth()->user();
            $this->posts = auth()->user()->post()->latest()->limit(5)->get();
        }
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layout.sidebar');
    }
}
