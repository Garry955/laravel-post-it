<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    //Show login form
    public function login() {
        return view('auth.login');
    }
    
    // Show Register create form
    public function register() {
        return view('auth.register');
    }


    // Authenticate user
    public function authenticate(Request $request) {
        //Validate fields
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //Attempt user login
        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You have been logged in');
        }
        //Show error attempt failed, only after password input
        return back()->withErrors(['password' => 'Invalid credentials'])->onlyInput('password');
    }


    // Logout user
    public function logout(Request $request) {
        //Logout user
        auth()->logout();
        //Reset session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //Redirect
        return redirect('/')->with('message', 'You have been logged out');
    }
}
