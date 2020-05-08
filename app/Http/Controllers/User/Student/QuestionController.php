<?php

namespace App\Http\Controllers\User\Student;

use App\Events\NewChatEvent;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\Level;
use App\Models\Subject;
use App\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    const VIEW = 'users.chat';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(self::VIEW . '.index', [
            'chats' => Chat::authStudent()->get()
        ]);
    }


    public function create()
    {
        return view(self::VIEW . '.create', [
            'subjects' => Subject::active()
                ->get(),
            'levels' => Level::active()
                ->get()
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'question' => 'required',
            'level' => 'required',
            'subject' => 'required',
        ], [
            'level.required' => 'The Class field is required.'
        ]);

        $level_id = $request->level;
        $subject_id = $request->subject;

        $chat = Chat::create([
            'student_id' => auth()->id(),
            'level_id' => $level_id,
            'subject_id' => $subject_id,
        ]);

        ChatMessage::create([
            'chat_id' => $chat->id,
            'user_id' => auth()->id(),
            'description' => $request->question,
        ]);

        $teachers = User::teachers()
//            ->whereHas('levels', function ($q) use ($level_id) {
//                $q->where('level_id', $level_id);
//            })
//            ->whereHas('subjects', function ($q) use ($subject_id) {
//                $q->where('subject_id', $subject_id);
//            })
//            ->randam()
            ->get();

        $url = 'chat/' . base64_encode($chat->id);

        foreach ($teachers as $teacher) {
            $data = [
                'teacher_id' => $teacher->id,
                'chat_id' => base64_encode($chat->id),
            ];
            event(new NewChatEvent($data));
        }

        return redirect($url)->with('success', 'We are looking for best teacher');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data = [
            'teacher_id' => '3',
            'chat_id' => $id,
        ];

        event(new NewChatEvent($data));

        $id = base64_decode($id);

        $chat = Chat::find($id);

        if ($chat) {
            if ($chat->student_id == auth()->id()) {
                return view('chat.show', [
                    'chat' => $chat
                ]);
            }
        }

        abort(404);
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
