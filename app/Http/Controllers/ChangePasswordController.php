<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function change()
    {
        $title = "Change Password";
        return view('user.content.changepassword',[
            "title"     => $title,
        ]);
    }

    public function updatepass(ChangePasswordRequest $request)
    {
        // return dd($request);
        $old_pass = auth()->user()->password;

        if(Hash::check($request -> input('old_password'), $old_pass)){
            return redirect()->back()->with('Succses', 'Password benar');

        }else{
            return redirect()->back()->with('Failed', 'Password salah!');
        }
    }

}
