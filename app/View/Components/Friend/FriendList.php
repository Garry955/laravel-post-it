<?php

namespace App\View\Components\Friend;

use App\Models\User;
use Illuminate\View\Component;

class FriendList extends Component
{
    public $friends;
    public $sentRequests;
    public $friendRequests;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public User $user)
    {
        $_friends = $user->getTotalUsersAttached() ?? null;
        if (!empty($_friends)) {
            foreach ($_friends as $friend) {
                if ($friend->pivot->status == 'accepted') {
                    $this->friends = collect($friend);
                } elseif ($friend->pivot->status == 'pending') {
                    if ($friend->pivot->user_id == auth()->user()->id) {
                        $this->sentRequests = collect(($friend));
                    } elseif ($friend->pivot->friend_id == auth()->user()->id) {
                        $this->friendRequests = collect($friend);
                    }
                }
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
        return view('friend.friend-list');
    }
}
