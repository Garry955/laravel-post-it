<?php

namespace App\View\Components\Friend;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class FriendList extends Component
{
    public Collection $friends, $friendRequests, $sentRequests;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public User $user)
    {
        // dd($user->friends()->get(),auth()->user()->id);
        $this->friends = $user->friends()?->get();
        //Returns all the Users who is friends with User $user
        // $this->friends = $this->user->friends();
        // $this->friends = User::whereIn('id', $this->user->myFriends())?->get($this->fields);
        //Check if selected user is the auth()->user() before getting data
        if (auth()->user()->id === $user->id) {
            //Returns all the Users who sent request to User $user
            $this->friendRequests = $user->friendRequests()?->get();
            //Returns all the Users who User $user received request from
            $this->sentRequests = $user->sentRequests()?->get();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('friend.friend-list');
    }
}
