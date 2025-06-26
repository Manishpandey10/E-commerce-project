<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //for login and redirecting back to landing page eg for cart



// login handling for frontend page




    //to access the User dashboard related pages 
    public function index()
    {
        return view('users.auth.login');
    }
    public function verifyUser(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Please enter valid email',
                'password.required' => 'Password is required',
            ]
        );
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->role_id == 2) {
                return redirect()->route('users.dashboard')->with('welcomeUser', "welcome to your dashboard User.");
            } else if (Auth::user()->role_id = 1) {
                return redirect()->route('admin.dashboard')->with('welcomeUser', "welcome to your dashboard Admin.");
                // return redirect()->back()->with('UserError', "Access Denied. You are not an admin!!");
            }
        }
        return redirect()->back()->with("userError", "Invalid credentials, Please enter correct details!!");
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('landing.page')->with('logoutMessage', "You've been logged out!. Please log in again to continue.");
    }
}
