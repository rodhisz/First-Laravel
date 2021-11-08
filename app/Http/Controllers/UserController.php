<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function table()
    {
        $title = "List User";
        $i = 1;
        $user = User::all();
        return view('user.content.table',[
            'user' => $user,
            'title' => $title,
            'i' => $i,
        ]);
    }

    public function Product()
    {
        $title = "List Product";
        $i = 1;
        $user = User::all();
        return view('user.content.product',[
            'user' => $user,
            'title' => $title,
            'i' => $i,
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Profile";
        $user = User::all();
        $userCount = User::where('role','User')->count();
        return view('user.content.index',[
            'user' => $user,
            'userCount' => $userCount,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $title = "My Profile";
        $user = User::where('username', $username)->first();
        return view('user.content.show',[
            'user'      => $user,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $title = "Edit Profile";
        $user = User::where('username', $username)->first();
        return view('user.content.edit',[
            'user'      => $user,
            "title"     => $title,
        ]);

        return redirect()->route('user.content')->with(['success' => 'data berhasil terupdate']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        // return ddd($request);
        $title = "My Profile";

        if(empty($request->file('image'))){
            $user = User::where('username', $username)->first();
            $user->update([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'number_phone'  => $request->number_phone,
            'address'       => $request->address,
            ]);
            return view('user.content.show',[
                'user'      => $user,
                'title'     => $title,
            ]);
        }
        else{
            $user = User::where('username', $username)->first();
            Storage::delete($user->image);
            $user->update([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'number_phone'  => $request->number_phone,
            'address'       => $request->address,
            'image'         => $request->file('image')->store('image.user'),
            ]);
            return view('user.content.show',[
                'user'      => $user,
                'title'     => $title,
            ]);

            return redirect()->route('user.content')->with(['success' => 'data berhasil terupdate']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
