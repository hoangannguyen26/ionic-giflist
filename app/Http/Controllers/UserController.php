<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view('users.index');
    }
    public function update(Request $request) {
        if(trim($request->email) != trim($request->user()->email))
        {
            $this->validate(
                $request, 
                [
                	'email' => 'required|email|max:255|unique:tbl_user',
                ]
            );
        }
    	$user = $request->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->contact = $request->contact;
        $user->update();
        return redirect('/profile');
    }

    public function showChangePassword(){
        return view('users.password');
    }

    public function updatePassword(Request $request)
    {
        $this->validate(
            $request, 
            [
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'required|min:6',
            ]
        );
        $user = $request->user();
        if (!Hash::check(\Input::get('old_password'), $user->password)) {
            return redirect('/profile/password')
                ->withInput()
                ->withErrors(array('old_password' => Lang::get('attr.user.old_pwd_wrong')));
        } else {
            $user->password = bcrypt(\Input::get('password'));
            $user->update();
            return redirect('/profile/password')->with("message", Lang::get('attr.user.change_pwd_success'));
        }

    }
}
