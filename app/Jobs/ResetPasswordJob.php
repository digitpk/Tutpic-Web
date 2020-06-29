<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
class ResetPasswordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $user;
    public $subject;
    public $view;
    public $url;

    public function __construct($user,$subject,$view,$url)
    {
        $this->user= $user;
        $this->subject= $subject;
        $this->view= $view;
        $this->url= $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->user;
        Mail::send($this->view,['url'=>$this->url,'user'=>$user],function ($message) use($user) {
            $message->to($user->email);
            $message->subject($this->subject);
        });
    }
}
