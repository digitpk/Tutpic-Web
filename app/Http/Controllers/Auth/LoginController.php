<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Jobs\ResetPasswordJob;
use App\PasswordReset;
use App\User;
use Carbon\Carbon;
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

        $user = User::where('email', $email)->first();

        $data = [
            'email' => $email,
            'password' => $request->password,
        ];

        if ($user) {
            if (auth()->attempt($data, true)) {
                if (auth()->user()->isStudent() || auth()->user()->isTeacher()) {
                    return redirect('account');
                }
                if (auth()->user()->isAdmin()) {
                    return redirect('dashboard');
                }
                $redirect_url = session('redirect_url') ?: 'account';
                return redirect($redirect_url);
            } else {
                return back()->with(['warning' => 'Incorrect Detail', 'email' => $email]);
            }
        }
        return back()->with(['warning' => 'Incorrect Detail', 'email' => $email]);

    }


    public function show($id)
    {
        //
    }


    public function authAccount()
    {
        return view('auth.account');
    }

    public function verifyMail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }

        $subject = 'to reset the password';
        $view = 'mail.reset.index';
        $url = "reset-password-auth?token={$user->remember_token}&user_id={$user->id}";

        dispatch(new ResetPasswordJob($user, $subject, $view, $url));

        return redirect('login')->with('success', trans('A reset link has been sent to your email address.'));

    }

    public function checkUser(Request $request)
    {

        $user = User::where('id', $request->user_id)
            ->where('remember_token', $request->token)->first();
        if ($user) {
            return view('auth.reset-password', ['user' => $user]);
        } else {
            return redirect('login');
        }


    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6',
            'confirm_password' => 'same:password'
        ]);
        $password = $request->password;
        $user = User::where('id', $request->user_id)->first();

        // Redirect the user back if the email is invalid
        //if () return redirect()->back()->withErrors(['email' => 'Email not found']);

        $update = User::updated([
            'password' => $request->password
        ]);

        Auth()->login($user);

        return redirect('account');
        //Send Email Reset Success Email
//        if ($update) {
//            $subject = 'Password of your account is Rest successfully';
//            $view = 'mail.reset.index';
//            $url = "active?token={$user->remember_token}&user_id={$user->id}";
//
//            dispatch(new ResetPasswordJob($user, $subject, $view, $url));
//            return redirect('/');
//        } else {
//            return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
//        }

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
            return redirect('account');

        } else {
            $newUser = User::create([
                'email' => $user->email,
                'name' => $user->name,
                'role_id' => 3,
                'password' => bcrypt($user->id),
                'remember_token' => Str::random(25)

            ]);
            auth()->login($newUser);
            return redirect('account');
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
            return redirect('account');

        } else {
            $newUser = User::create([
                'email' => $user->email,
                'name' => $user->name,
                'role_id' => 3,
                'password' => bcrypt($user->id),
                'remember_token' => Str::random(25)


            ]);
            auth()->login($newUser);

            return redirect('account');
        }

    }

}
