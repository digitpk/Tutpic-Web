<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SecurityController extends Controller
{
    public function index(){
        return view ('auth.login');
    }

    public function login(Request $request){
        $request->validate([
           'email'=>'email|required',
           'password'=>'required'
        ]);
        $user = User::where('email', $request->email)
            ->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                auth()->login($user);
                return redirect('dashboard')->with('message','Log In Success');
            }
            else{
                return back()->with('message','Wrong Password');
            }
        }
        else{
            return back()->with('message','Wrong Credentials');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('login')->with('message', 'Logout successfully');
    }
}
