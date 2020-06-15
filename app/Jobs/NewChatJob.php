<?php

namespace App\Jobs;

use App\Events\NewNotificationEvent;
use App\Models\UserNotification;
use App\Notifications\NewChatNotify;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewChatJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $users;
    public $data;
    public $chat;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($users, $data, $chat)
    {
        $this->users = $users;
        $this->data = $data;
        $this->chat = $chat;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->users as $user) {
            $user->notify(new NewChatNotify($this->data));

            $append_msg = '<strong>New Session</strong>
<br>
                                                <small>' . date('d-m-y H:i', strtotime($this->chat->created_at)) . '</small>';
            $message = UserNotification::create([
                'message' => $append_msg,
                'user_id' => $user->id,
                'url' => $this->data['url']
            ]);

            event(new NewNotificationEvent($message));

        }
    }
}
