<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\NewProgramNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewProgramJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $program;

    /**
     * Create a new job instance.
     */
    public function __construct($program)
    {
        $this->program = $program;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        User::chunk(30, function ($users) {
            foreach ($users as $user) {
                $user->notify(new NewProgramNotification($this->program));
            }
        });
    }
}
