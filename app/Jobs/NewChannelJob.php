<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\NewChannelNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewChannelJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $channel;

    /**
     * Create a new job instance.
     */
    public function __construct($channel)
    {
        $this->channel = $channel;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        User::chunk(30, function ($users) {
            foreach ($users as $user) {
                $user->notify(new NewChannelNotification($this->channel));
            }
        });
    }
}
