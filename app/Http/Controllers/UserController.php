<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
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
     * 
     * @todo Friend section
     * @param User $user
     * @return View
     */
    public function show(User $user)
    {
        return view('user.profile', compact('user'));
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
        // Update user
        $user->update($formFields);
        //Redirect back
        return to_route('user.edit')->with('message', 'Updated successfully');
    }

    /**
     * Delete User $user
     *
     * @param User $user
     * @return Redirect
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/')->with('message', 'Profile deleted successfully');
    }
}
