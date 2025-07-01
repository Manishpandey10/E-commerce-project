<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function frontIndex()
    {
        return view('users.auth.frontLogin');
    }
    public function frontDashboard()
    {
        if (Auth::check()) {
            $user = Auth::user();
            // dd($user);
            if ($user->role_id == 2) {
                return redirect()->route('users.dashboard')->with('welcomeUser', "welcome to your dashboard User.");
            } else if ($user->role_id == 1) {
                return redirect()->route('admin.dashboard')->with('welcomeUser', "welcome to your dashboard Admin.");
            }
        } else {
            return redirect()->route('users.login')->with('AccessError', "You are not logged in!!");
        }
    }

    public function frontLogin(Request $request)
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
                return redirect()->route('landing.page');
            } else {
                Auth::logout();
                return redirect()->back()->with('UserError', "Access Denied. This is meant only for users, not for admins.");
            }
        }
        return redirect()->back()->with("userError", "Invalid credentials, Please enter correct details!!");
    }
    public function frontLogout()
    {
        Auth::logout();
        return redirect()->route('landing.page')->with('logoutMessage', "You've been logged out!. Please log in again to continue.");
    }
}
