<?php

namespace App\View\Components\Friend;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class FriendList extends Component
{
    public Collection $friends, $friendRequests, $sentRequests;
    public array $fields = ['id', 'name', 'email', 'city', 'user_img_path', 'gender'];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public User $user)
    {
        //Returns all the Users who is friends with User $user
        $this->friends = User::whereIn('id', $this->user->myFriends())?->get($this->fields);
        //Check if selected user is the auth()->user() before getting data
        if (auth()->user()->id === $this->user->id) {
            //Returns all the Users who sent request to User $user
            $this->friendRequests = User::whereIn('id', $this->user->friendRequests()->pluck('user_id')->toArray())?->get($this->fields);
            //Returns all the Users who User $user received request from
            $this->sentRequests = User::whereIn('id', $this->user->sentRequests()->pluck('friend_id')->toArray())?->get($this->fields);
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
