<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
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
            if (Auth::user()->role_id == 1) {
                return redirect()->route('admin.dashboard')->with('welcomeAdmin', "welcome to your dashboard Admin.");
            } else {
                Auth::logout();
                return redirect()->back()->with('AdminError', "Access Denied. You are not an admin!!");
            }
        }
        return redirect()->back()->with("userError", "Invalid credentials, Please enter correct details!!");
    }
    public function logout()
    {
        Auth::logout();
        // return redirect()->route('admin.login')->with('logoutMessage', "You've been logged out!. Please log in again to continue.");
        return redirect()->route('admin.login')->with('logoutMessage', "You've been logged out!. Please log in again to continue.");
    }
}
