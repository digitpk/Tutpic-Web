<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\TeacherRegisterRequest;
use App\Models\Level;
use Mail;
use App\Models\Subject;
use App\Models\TeacherLevel;
use App\Models\TeacherSubject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\DeclareDeclare;
use function GuzzleHttp\Psr7\str;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }

    public function teacherCreate()
    {
        return view('auth.register-teacher',[
            //'levels'=>Level::all(),
            //'subjects'=>Subject::all(),
        ]);
    }

    public function create()
    {

    }
    public function reset()
    {
        return view('auth.reset-password');
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
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'remember_token'=>Str::random(25)

        ]);

        Mail::send('mail.active.index',['url' =>"active?token={$user->remember_token}&user_id={$user->id}"],function ($message) use($user) {
            $message->to(  $user->email);
            $message->subject('to verfiy the account ');
        });

        return redirect('login')->with('success','Please check your email box for account activation');
    }

    public function active(Request $request)
    {
            $user_id = $request->user_id;

           $user= User::where('remember_token',$request->token)
                            ->where('id' ,$user_id)->first();

            if($user->role_id == 3)
            {
                $user->email_verified_at = now();
                $user->save();

                auth()->login($user);

                return redirect('chat/create')->with('success', 'Welcome, Start your success');
            }
            elseif($user->role_id == 2)
            {
                $user->email_verified_at = now();
                $user->save();

                auth()->login($user);

                return redirect('chat')->with('success', 'Welcome');
            }
            else{
                return redirect('login')->with('error', 'Your Email is not verified');
            }

    }

    public function storeTeacher(TeacherRegisterRequest $request)
    {
        $this->validateUniqueEmail($request);
        $user = User::create([
            'role_id' => 2,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'remember_token'=>Str::random(25)


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
        Mail::send('mail.active.index',['url' =>"active?token={$user->remember_token}&user_id={$user->id}"],function ($message) use($user) {
            $message->to(  $user->email);
            $message->subject('to verfiy the account ');
        });


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
