<?php

namespace App\View\Components\User;

use Illuminate\View\Component;

class FriendController extends Component
{

    public string $status = '';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $user)
    {

        if (auth()->user()) {
            //Returns all the friends id in array who sent request to auth()->user()
            $friendRequests = auth()->user()->friendRequests()->pluck('user_id')->toArray();
            //Returns all the friends id in array
            $myFriends = auth()->user()->myFriends();
            //Returns all the friends id in array who i have sent requests
            $sentRequests = auth()->user()->sentRequests()->pluck('friend_id')->toArray();

            if (in_array($user->id, $friendRequests)) {
                $this->status = 'user_requested';
            } elseif (in_array($user->id, $myFriends)) {
                $this->status = 'my_friend';
            } elseif (in_array($user->id, $sentRequests)) {
                $this->status = 'friend_requested';
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('user.friend-controller');
    }
}
