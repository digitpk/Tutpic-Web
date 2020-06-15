<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\TeacherRegisterRequest;
use App\Models\Level;
use App\Models\Subject;
use App\Models\TeacherLevel;
use App\Models\TeacherSubject;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }

    public function teacherCreate()
    {
        return view('auth.register-teacher',[
            'levels'=>Level::all(),
            'subjects'=>Subject::all(),
        ]);
    }

    public function create()
    {

    }

    public function validateUniqueEmail($request)
    {
        return $request->validate([
            'email' => 'required|unique:users'
        ]);
    }

    public function store(RegisterRequest $request)
    {
        $this->validateUniqueEmail($request);

        $user = User::create([
            'role_id' => 3,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        auth()->login($user);

        return redirect('chat/create')->with('success', 'Welcome, Start your success');
    }

    public function storeTeacher(TeacherRegisterRequest $request)
    {
        $this->validateUniqueEmail($request);
        $user = User::create([
            'role_id' => 2,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        foreach ($request->levels as $level) {
            TeacherLevel::create([
                'user_id'=>$user->id,
                'level_id'=>$level,
            ]);
        }

        foreach ($request->subjects as $subject) {
            TeacherSubject::create([
                'user_id'=>$user->id,
                'subject_id'=>$subject,
            ]);
        }

        auth()->login($user);

        return redirect('chat')->with('success', 'Welcome');

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

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
