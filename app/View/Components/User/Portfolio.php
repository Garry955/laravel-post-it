<?php

namespace App\View\Components\User;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Portfolio extends Component
{

    public  $posts;
    public array $tabs = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $user)
    {
        $this->tabs = ['Posts','Details'];
        $this->posts = $user->post()->latest()->simplePaginate(10);
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('user.portfolio');
    }
}
