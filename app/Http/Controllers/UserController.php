<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Show edit user profile form with currently authenticated user
     * 
     * @return View
     */

    public function edit()
    {
        return view('user.edit', ['user' => auth()->user()]);
    }


    /**
     * Show selected User
     * - with datas : User - $user; String - $status; Recent 5 posts by User - $posts
     * @todo Friend section
     * @param User $user
     * @return View
     */
    public function show(User $user)
    {
        $status = '';

        //Returns all the friends id in array who sent request to auth()->user()
        $friendRequests = auth()->user()->friendRequests()->pluck('friend_id')->toArray();
        //Returns all the friends id in array
        $myFriends = auth()->user()->myFriends()->pluck('friend_id')->toArray();
        //Returns all the friends id in array who i have sent requests
        $sentRequests = auth()->user()->sentRequests()->pluck('user_id')->toArray();

        if (in_array($user->id, $friendRequests)) {
            $status = 'user_requested';
        } elseif (in_array($user->id, $myFriends)) {
            $status = 'my_friend';
        } elseif (in_array($user->id, $sentRequests)) {
            $status = 'friend_requested';
        }

        return view('user.profile', [
            'user' => $user,
            'status' => $status,
            'posts' => Post::latest()->where('user_id', $user->id)->limit(5)->get(),
        ]);
    }


    /**
     * Store user function / register
     * Log in user if success
     * @param StoreUserRequest $request
     * @return Redirect
     */
    public function store(StoreUserRequest $request)
    {
        //Validation
        $formFields = $request->validated();

        //File upload
        if ($request->hasFile('file')) {
            $formFields['user_img_path'] = $request->file('file')->hashName();
            // dd($formFields['user_img_path']);
            // $formFields['user_img_path'] = $request->file('user_img')->store('profile/','public');
        }
        // Bcrypt password
        $formFields['password'] = bcrypt($formFields['password']);
        //Store user in db
        $user = User::create($formFields);

        //File upload || catching created user id
        if ($request->hasFile('file')) {
            $request->file('file')->store('profile/user-' . $user->id . '/', 'public');
        }

        //Log in user
        auth()->login($user);
        // redirect to homepage
        return to_route('/')->with('message', 'Refistered and logged in successfully');
    }

    /**
     * Update user profile datas
     *
     * @param UpdateUserRequest $request
     * @return Redirect
     */
    public function update(UpdateUserRequest $request)
    {
        //Define current user
        $user = auth()->user();
        //Validation
        $formFields = $request->validated();


        //File upload
        if ($request->hasFile('file')) {
            $request->file('file')->store('profile/user-' . auth()->user()->id . '/', 'public');
            $formFields['user_img_path'] = $request->file('file')->hashName();
        }
        // Bcrypt password
        $formFields['password'] =
         (!is_null($request->password)) ? bcrypt($formFields['password']) : bcrypt($formFields['current_password']);
        // if(!is_null($request->password)) {
        //     $formFields['password'] = bcrypt($formFields['password']);
        // } else {
        //     $formFields['password'] = bcrypt($formFields['password']);            
        // }
        // Update user
        $user->update($formFields);
        //Redirect back
        return to_route('user.edit', auth()->user()->id)->with('message', 'Updated successfully');
    }

    //Delete user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/')->with('message', 'Profile deleted successfully');
    }

    // List posts by user id
    public function listPosts(User $user)
    {
        return view('user.posts', [
            'posts' => Post::latest()->where('user_id', $user->id)->simplePaginate(10),
            'user' => $user
        ]);
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
