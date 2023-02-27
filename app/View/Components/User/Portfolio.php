<?php

namespace App\View\Components\User;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Portfolio extends Component
{

    public  $posts;
    public $images;
    public $user;
    public array $tabs = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->tabs = ['images','posts','card'];
        $this->posts = auth()->user()->post()->latest()->get();
        $this->images = auth()->user()->post()->latest()->get()->toArray();
        $this->user = auth()->user()->toArray();

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
