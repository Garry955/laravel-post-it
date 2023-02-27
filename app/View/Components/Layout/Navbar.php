<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class Navbar extends Component
{
    public array $navigationItems = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        if(auth()->user()) {
            $this->navigationItems = [
                ['label' => 'Home', 'href' => route('home')],
                ['label' => 'Profile', 'href' => route('user.profile')],
                ['label' => 'Posts', 'href' => route('post.create')],
                ['label' => 'Friends', 'href' => route('home')],
                ['label' => 'Logout', 'href' => route('logout')],
            ];
        } else {
            $this->navigationItems = [
                ['label' => 'Home', 'href' => route('home')],
                ['label' => 'Login', 'href' => route('login')],
                ['label' => 'Register', 'href' => route('register')]  
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layout.navbar');
    }
}
