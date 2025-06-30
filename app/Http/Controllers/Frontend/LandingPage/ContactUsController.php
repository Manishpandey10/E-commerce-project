<?php

namespace App\Http\Controllers\Frontend\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){
        return view('frontend.contactUs');
    }
    public function submit(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'description'=>'required'

        ],
    [
        'name.required'=>'Name field is required.',
        'email.required'=>'Email field is required.',
        'description.required'=>'Message field is required.'
    ]); 

    $newMessage = new ContactUs();
    $newMessage->name = $request->name;
    $newMessage->email = $request->email;
    $newMessage->description = $request->description;

    // dd($newMessage);
    $newMessage->save();
    return redirect()->back()->with('submitMessage',"Your message has been sent.");

    }
}
