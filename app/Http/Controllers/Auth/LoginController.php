<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    public function index(Request $request)
    {
        if (auth()->check())
            return redirect('/');

        if (!strpos(url()->previous(), 'login'))
            session(['redirect_url' => url()->previous()]);


        return view('auth.login');
    }

    public function create()
    {
        //
    }

    public function roleLogin()
    {
        return view('auth.role');
    }

    public function userRole(Request $request)
    {
        $userRole = $request->role;
        return $userRole;

    }


    public function store(LoginRequest $request)
    {
        $email = $request->email;

        $data = [
            'email' => $email,
            'password' => $request->password
        ];


        if (auth()->attempt($data) && (bool)auth()->user()->verified_at_now == true) {
            $redirect_url = session('redirect_url') ?: '/';
            return redirect($redirect_url);
        }

        return back()->with(['warning' => 'Incorrect Detail', 'email' => $email]);

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('login')->with('success', 'Logout');
    }

    public function redirectToProvider1()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function handleProviderCallback1()
    {

        $user = Socialite::driver('facebook')->stateless()->user();
        $db_user = User::where('email', $user->email)->first();

        if ($db_user) {
            auth()->login($db_user);
            return redirect('/');

        } else {
            $newUser = User::create([
                'email' => $user->email,
                'name' => $user->name,
                'role_id' => 3,
                'password' => bcrypt($user->id),
                'remember_token' => Str::random(25)

            ]);
            auth()->login($newUser);
            return redirect('/');
        }
    }


    public function redirectToProvider2()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleProviderCallback2()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $db_user = User::where('email', $user->email)->first();

        if ($db_user) {
            auth()->login($db_user);
            return redirect('/');

        } else {
            $newUser = User::create([
                'email' => $user->email,
                'name' => $user->name,
                'role_id' => 3,
                'password' => bcrypt($user->id),
                'remember_token' => Str::random(25)


            ]);
            auth()->login($newUser);

            return redirect('/');
        }

    }

}
