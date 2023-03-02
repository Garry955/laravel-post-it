<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\If_;

class UserController extends Controller
{
    // Show edit profile form
    public function edit(User $user) {
        return view('user.edit', ['user' => $user]);
    }
    //Show single user profile
    public function show(User $user) {
        $status = '';

        //Returns all the friends id in array who sent request to auth()->user()
        $friendRequests = auth()->user()->friendRequests()->pluck('friend_id')->toArray();
        //Returns all the friends id in array
        $myFriends = auth()->user()->myFriends()->pluck('friend_id')->toArray();
        //Returns all the friends id in array who i have sent requests
        $sentRequests = auth()->user()->sentRequests()->pluck('user_id')->toArray();

        if(in_array($user->id,$friendRequests)) {
            $status = 'user_requested';
        } elseif(in_array($user->id, $myFriends)) {
            $status = 'my_friend';
        } elseif(in_array($user->id, $sentRequests)) {
            $status = 'friend_requested';
        }

        return view('user.profile', [
            'user' => $user,
            'status' => $status,
            'posts' => Post::latest()->where('user_id', $user->id)->limit(5)->get(),
        ]);
    }


    // Store user @database // Register
    public function store(Request $request) {
        //Validation
        $formFields = $request->validate([
            'name' => 'required|max:42',
            'username' => ['required',Rule::unique('users','username')],
            'file' => 'mimes:jpeg,png,jpg,gif',
            'gender' => 'required',
            'city' => 'required',
            'email' => ['required','email',Rule::unique('users','email')],
            'description' => 'max:420',
            'password' => 'required|min:8|max:42|confirmed'
        ]);
        //File upload
        if($request->hasFile('file')) {
            $formFields['user_img_path'] = $request->file('file')->hashName();
            // dd($formFields['user_img_path']);
            // $formFields['user_img_path'] = $request->file('user_img')->store('profile/','public');
        }
        // Bcrypt password
        $formFields['password'] = bcrypt($formFields['password']);
        //Store user in db
        $user = User::create($formFields);

        //File upload
        if($request->hasFile('file')) {
            $request->file('file')->store('profile/user-'. $user->id.'/','public');
        }

        //Log in user
        auth()->login($user);
        // redirect to homepage
        return to_route('home')->with('message', 'Refistered and logged in successfully');
    }

    //update user datas
    public function update(Request $request, User $user) {
        //Validation
        $formFields = $request->validate([
            'name' => 'required|max:42',
            'gender' => 'required',
            'username' => ['required', Rule::when($request->username != $user->username, Rule::unique('users','username'))],
            'city' => 'required',
            'email' => 'required|email',
            'description' => 'max:420',
            'password' => 'required|min:8|max:42|confirmed'
        ]);
        //File upload
        if($request->hasFile('user_img')) {
            $formFields['user_img_path'] = $request->file('user_img')->store('profile','public');
        } else {
            $formFields['user_img_path'] = $user->user_img_path;
        }
        // Bcrypt password
        $formFields['password'] = bcrypt($formFields['password']);
        // Update user
        $user->update($formFields);
        //Redirect back
        return redirect()->back()->with('message', 'Updated successfully');
    }
    
    //Delete user
    public function destroy(User $user) {
        $user->delete();
        return redirect('/')->with('message', 'Profile deleted successfully');
    }

   // List posts by user id
    public function listPosts(User $user) {
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
