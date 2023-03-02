<?php

namespace App\View\Components\User;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Portfolio extends Component
{

    public  $posts;
    public $user;
    public array $tabs = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->tabs = ['Posts','Details'];
        $this->posts = auth()->user()->post()->latest()->get();
        $this->user = auth()->user();

        // foreach($this->items['posts'] as $k => $v) {
        //     dd($v);
        // }
        // $this->tabs = Arr::flatten(Arr::pluck($this->items,'tab'));
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
