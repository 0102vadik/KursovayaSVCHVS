<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request){
        $validateField = $request->validate([
            'login' => 'required',
            'password' => 'required',
            'fullName' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'company' => 'required',
            'object' => 'required'
        ]);
        if(User::where('login',$validateField['login'])->exists()){
           return redirect(route('user.registration'));
        }
        $user = User::create($validateField);
        if($user){
            Auth::login($user);
            return redirect(route('user.private'));
        }
        return redirect(route('user.login'));
    }
}
