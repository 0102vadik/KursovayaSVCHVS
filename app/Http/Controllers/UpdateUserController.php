<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateUserController extends Controller
{
    public function updateUser(Request $request){
       $userBDModel = new User();

        $userBDModel->where('id',Auth::user()->id)->update(['fullName' => $request->fullName]);
        $userBDModel->where('id',Auth::user()->id)->update(['email' => $request->email]);
        $userBDModel->where('id',Auth::user()->id)->update(['address' => $request->address]);
        $userBDModel->where('id',Auth::user()->id)->update(['city' => $request->city]);
        $userBDModel->where('id',Auth::user()->id)->update(['country' => $request->country]);

        return redirect(route('settings'));
    }
}
