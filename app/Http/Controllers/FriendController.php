<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{

    /**
     * Returns list view of the selected user friends
     *
     * @param User $user
     * @return View
     */
    public function listFriends(User $user)
    {
        // dd($user->friends());
        return view('friend.index', [
            'user' => $user
        ]);
    }

    /**
     * Sync the auth()->user()->id to the given User::id without detaching if anything else exists
     * Allows to send multiple request from the User
     *
     * @param User $user
     * @return Redirect
     */
    public function sendFriendRequest(User $user)
    {
        auth()->user()->friends()->syncWithoutDetaching($user->id);

        return redirect()->back()->with('message', 'Friend request to ' . $user->name . ' sent');
    }

    /**
     * Rejects and detaches the existing relation in the Friend pivot table
     *
     * @param User $user
     * @return Redirect
     */
    public function rejectFriendRequest(User $user)
    {
        $user->friends()->detach(auth()->user()->id);

        return redirect()->back()->with('message', 'Friend request from ' . $user->name . ' has been cancelled');
    }

    /**
     * Accepts and updates existing pivot status to accepted
     * Executes the current date time to the friends_since field
     *
     * @param User $user
     * @return redirect
     */
    public function acceptFriendRequest(User $user)
    {
        $user->friends()->updateExistingPivot(auth()->user()->id, [
            'status' => 'accepted',
            'friends_since' => now()->toDateString(),
        ]);

        // $user->friends()->sync([auth()->id() => [
        //     'status' => 'accepted',
        //     'friends_since' => now()->toDateString(),
        // ]]);

        return redirect()->back()->with('message', 'You are now friends with' . $user->name);
    }

    /**
     * Detaches the given User::id from the auth()user()->id and opposite
     *
     * @param User $user
     * @return redirect
     */
    public function unFriendUser(User $user)
    {
        auth()->user()->friends()->detach($user->id);

        $user->friends()->detach(auth()->id());

        return redirect()->back()->with('message', 'Removed' . $user->name . 'from friend list');
    }

    /**
     * Detaches the give User::id from auth()->user()->id
     *
     * @param User $user
     * @return Redirect
     */
    public function cancelRequest(User $user)
    {
        auth()->user()->friends()->detach($user->id);
        return redirect()->back()->with('message', 'Friend request to ' . $user->name . 'removed');
    }
}
