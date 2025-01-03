<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\NewChildNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewChildJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $child;

    /**
     * Create a new job instance.
     */
    public function __construct($child)
    {
        $this->child = $child;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        User::chunk(30, function ($users) {
            foreach ($users as $user) {
                $user->notify(new NewChildNotification($this->child));
            }
        });
    }
}
