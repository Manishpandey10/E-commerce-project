<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
       
    public function frontSignup(){
        return view('users.auth.frontSignup');
    }

    
    public function register(Request $request){
        $request->validate([
            'username' => 'required',
            "email" => "required|email|unique:users,email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.com$/",
            "password" => "required|min:6|confirmed",
            "password_confirmation" => "required",
            "profileimage" => 'required|image|mimes:jpg,jpeg,png'
        ],[
            'username.required'=>'User Name* field is required.',
            'email.required'=>'Email Address* field is required.',
            'password.required'=>'Password field is required.',
            'password_confirmation.required'=>'Confirm Password field is required.',
            'profileimage.required'=>'Upload Profile Picture field is required.',
        ]);

        $newUser = new User();
        $newUser->name = $request->username;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->image = $request->file('profileimage')->store('profileImage', 'public');

        // dd($newUser);
        $newUser->save();

        return redirect()->route('front.login')->with('UserRegistered', 'You are registered. Login to continue')->withInput();

    }
}
