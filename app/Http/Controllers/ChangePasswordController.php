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
            "title" => $title,
        ]);
    }

    public function UpdatePass(ChangePasswordRequest $request)
    {
        // return dd($request);
        $old_pass = auth()->user()->password;
        $user_id = auth()->user()->id;

        if(Hash::check($request -> input('old_password'), $old_pass)){

            if(Hash::check($request -> input('password'), $old_pass)){
                return redirect()->back()->with('Failed', 'Password tidak boleh sama');

            } else {
                $user = User::find($user_id);
                $user-> password = Hash::make($request->input('password'));
                $user-> save();
                return redirect()->back()->with('Success', 'Password telah diubah');
            }

        }else{
            return redirect()->back()->with('Failed', 'Password salah!');
        }
    }

}
