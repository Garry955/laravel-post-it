<?php

namespace App\View\Components\Home;

use App\Models\Post;
use Illuminate\View\Component;

class Posts extends Component
{

    public $posts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->posts = Post::latest()->with('user')->simplePaginate(30);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('home.posts');
    }
}
