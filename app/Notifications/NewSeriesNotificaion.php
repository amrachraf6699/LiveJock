<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewSeriesNotificaion extends Notification
{
    use Queueable;

    public $series;

    /**
     * Create a new notification instance.
     */
    public function __construct($series)
    {
        $this->series = $series;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return
        [
            'image' => $this->series->cover_url,
            'title' => "We've just released a new series!",
            'description' => 'Checkout ' . $this->series->name . ' now at LiveJock - The Best Streaming Platform!',
            'data' =>
            [
                'id' => $this->series->slug,
                'type' => 'series'
            ]
        ];
    }
}
