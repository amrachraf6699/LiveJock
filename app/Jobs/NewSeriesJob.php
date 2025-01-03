<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\NewSeriesNotificaion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewSeriesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $series;

    /**
     * Create a new job instance.
     */
    public function __construct($series)
    {
        $this->series = $series;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        User::chunk(30, function ($users) {
            foreach ($users as $user) {
                $user->notify(new NewSeriesNotificaion($this->series));
            }
        });
    }
}
