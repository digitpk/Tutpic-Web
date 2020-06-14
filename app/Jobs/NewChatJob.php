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

            $append_msg = '            <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-12">
                                                <strong style="font-size: 12px" class="text-info">New Session</strong>
                                                <div >
                                                    <p style="font-size: 10px">click for join new session</p>
                                                </div>
                                                <small class="text-warning">27.11.2015, 15:00</small>

                                            </div>
                                        </div>';
            $message = UserNotification::create([
                'message' => $append_msg,
                'user_id' => $user->id,
                'url'=>$this->data['url']
            ]);
            event(new NewNotificationEvent($message));

        }
    }
}
