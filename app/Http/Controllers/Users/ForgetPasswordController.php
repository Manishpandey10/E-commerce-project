<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    public function index(){
        return view('users.auth.changePassword');
    }
    public function changePassword(){
        
    }
}
