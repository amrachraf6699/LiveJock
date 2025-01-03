<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisterNotification extends Notification
{
    use Queueable;

    public $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
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
            'image' => asset('storage/logo.png'),
            'title' => "Welcome to LiveJock!",
            'description' => "مرحبًا بك، " . $this->user->name . "! 🎉
            يسعدنا انضمامك إلى LiveJock، منصتك الترفيهية للاستمتاع بأحدث الأفلام واكتشاف العديد من المزايا المذهلة.
            ابدأ رحلتك الآن واستمتع بتجربة ترفيهية لا مثيل لها!",
            'data' => []
        ];
    }
}
