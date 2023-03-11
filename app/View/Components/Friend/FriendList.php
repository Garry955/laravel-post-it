<?php

namespace App\View\Components\Friend;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

class FriendList extends Component
{
    public array $friendsID;
    public $friends;
    public array $friendRequests;
    public array $sentRequests;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        if($user)
        {
            $user = auth()->user();
        }
        //Returns all the friends id in array
        // $this->friendsID = $user->myFriends();
        $this->friends = User::whereIn('id', $user->myFriends())?->get()->toArray();
        
        
        //Returns all the friends id in array who sent request to auth()->user()
        $this->friendRequests = User::whereIn('id', $user->friendRequests()->pluck('user_id')->toArray())?->get()->toArray(); 
        dd($this->friendRequests, auth()->user()->id);
        //Returns all the friends id in array who i have sent requests
        $this->sentRequests = $user->sentRequests()->pluck('user_id')->toArray();
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
