<?php

namespace App\View\Components\User;

use App\Models\User;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\Component;

class FriendController extends Component
{

    public string $status = '';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public User $user)
    {
        // I'll probably do this as a service provider property..
        $friends = auth()->user()->getTotalUsersAttached();

        if (auth()->user() && auth()->user()->id != $user->id && !empty($friends)) {
            foreach ($friends as $friend) {
                if ($friend->pivot->user_id == $user->id || $friend->pivot->friend_id == $user->id) {
                    if ($friend->pivot->status == 'accepted') {
                        $this->status = 'friend';
                    } elseif ($friend->pivot->status == 'pending') {
                        if ($friend->pivot->user_id == auth()->user()->id) {
                            $this->status = 'sent_request';
                        } elseif ($friend->pivot->friend_id == auth()->user()->id) {
                            $this->status = 'received_request';
                        }
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
        return view('user.friend-controller');
    }
}
