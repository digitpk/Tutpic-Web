<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

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

    public function store(LoginRequest $request)
    {
        $email = $request->email;

        $data = [
            'email' => $email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $redirect_url = session('redirect_url') ?: '/';
            return redirect($redirect_url);
        }

        return back()->with(['warning' => 'Incorrect Detail', 'email' => $email]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('login')->with('success', 'Logout');
    }
}
