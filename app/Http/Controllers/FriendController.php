<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{    // NEEW:::::::::::::::::::::::::::::::::

    //Inserts relation to friends table where friend_id is auth()->user()->id and user_id is the requested user
    public function sendFriendRequest(User $user) {
        $user->friends()->sync(auth()->id());

        return redirect()->back()->with('message', 'Friend request to '. $user->name . ' sent');
    }
    
    public function rejectFriendRequest(User $user) {
        auth()->user()->friends()->detach($user->id);
        
        return redirect()->back()->with('message', 'Friend request from '. $user->name . ' has been cancelled');
    }
    
    public function acceptFriendRequest(User $user) {
        auth()->user()->friends()->updateExistingPivot($user->id, [
            'status' => 'accepted',
            'friends_since' => now()->toDateString(),
        ]);
        
        $user->friends()->sync([auth()->id() => [
            'status' => 'accepted',
            'friends_since' => now()->toDateString(),
        ]]);
        
        return redirect()->back()->with('message', 'You are now friends with'. $user->name);
    }

    public function unFriendUser(User $user) {
        auth()->user()->friends()->detach($user->id);
        
        $user->friends()->detach(auth()->id());
        
        return redirect()->back()->with('message', 'Removed'. $user->name . 'from friend list');
        
        dd($user);
    }
    
    public function cancelRequest(User $user)
    {
        $user->friends()->detach(auth()->id());
        return redirect()->back()->with('message', 'Friend request to '. $user->name . 'removed');
    }
}

//Common routes:
//index - show all listings
//show - show single listing
//create - show form to create new listing
//store - store new listing
//edit - show form to edit listing
//update - update listing
//destroy - delete listing
