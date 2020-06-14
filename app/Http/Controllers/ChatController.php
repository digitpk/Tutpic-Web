<?php

namespace App\Http\Controllers;

use App\Events\NewMessageEvent;
use App\Events\NewNotificationEvent;
use App\Jobs\NewChatJob;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\Level;
use App\Models\Subject;
use App\Models\UserNotification;
use App\Traits\ImageResize;
use App\User;
use Illuminate\Http\Request;
use Mail;

class ChatController extends Controller
{
    use ImageResize;

    const VIEW = 'chat';
    const URL = 'chat';

    public function index()
    {
        $is_teacher = auth()->user()->isTeacher();
        $is_student = auth()->user()->isStudent();
        $chats = Chat::when($is_teacher, function ($q) {
            $q->where('teacher_id', auth()->id());
        })
            ->when($is_student, function ($q) {
                $q->where('student_id', auth()->id());
            })
            ->latest()
            ->get();
        return view(self::VIEW . '.index', [
            'records' => $chats,
            'url' => self::URL,
        ]);
    }

    public function create()
    {


        return view(self::VIEW . '.create', [
            'subjects' => Subject::active()
                ->get(),
            'levels' => Level::active()
                ->get(),

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
            ->whereHas('levels', function ($q) use ($level_id) {
                $q->where('level_id', $level_id);
            })
            ->whereHas('subjects', function ($q) use ($subject_id) {
                $q->where('subject_id', $subject_id);
            })
            ->get();

        $url = 'chat/' . base64_encode($chat->id);


        $data = [
            'url' => $url,
        ];


        dispatch(new NewChatJob($teachers, $data,$chat));

        return redirect($url)->with('success', 'We are looking for best teacher');
    }

    public function show(Request $request, $id)
    {
        $id = base64_decode($id);
        $chat = Chat::find($id);
        $notification = UserNotification::find(base64_decode($request->notification_id));
            if ($notification){
                $notification->update([
                    'is_read'=>true
                ]);
            }

        if ($chat) {
            if ($chat->teacher_id == auth()->id() || $chat->student_id == auth()->id()) {
                return view('chat.show', [
                    'chat' => $chat,
                    'url' => url(self::URL),
                ]);
            }
            if (!$chat->teacher_id && auth()->user()->isTeacher()) {
                $chat->teacher_id = auth()->id();
                $chat->save();
                return redirect('chat/' . base64_encode($id));
            }
        }
        abort(404);
    }

    public function update(Request $request, $id)
    {
        $image_name = '';
        $video_name = '';
        $image_path = '_images/chats';
        $video_path = '_videos';
        $image = $request->file('image');
        $video = $request->file('video');
        if ($image) {
            $image_sizes = [
                [
                    150, 150
                ]
            ];
            $image_name = $this->resizeImageReturnName($image, $image_path . '/thumbnail/', $image_sizes);
            $image->move($image_path . '/original', $image_name);
        }

        if ($video) {
            $video_name = rand(100, 10000) . '-' . time() . '-' . auth()->id() . '.' . $video->extension();
            $video->move($video_path, $video_name);
        }

        $message = ChatMessage::create([
            'chat_id' => $id,
            'user_id' => auth()->id(),
            'description' => $request->description,
            'image' => $image_name,
            'video' => $video_name,
        ]);

        $chat = $message->chat;

        $data = [
            'receiver_id' => $chat->student_id == auth()->id() ? $chat->teacher_id : $chat->student_id,
            'sender_id' => auth()->id(),
            'chat_id' => $id,
            'description' => $message->description ?: '',
            'video' => $message->getVideo(),
            'image' => [
                $message->getImageThumbnail(),
                $message->getImageOriginal()
            ],
        ];


        event(new NewMessageEvent($data));

        return view(self::VIEW . '.partials.message', [
            'message' => $message
        ]);

    }

    public function destroy($id)
    {
        //
    }

    public function closed($id)
    {

        Chat::find($id)->update([
            'is_active' => 0
        ]);

        return back();

    }
}
