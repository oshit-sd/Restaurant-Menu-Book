<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserNotification extends Notification
{
    use Queueable;
    protected $userNotify;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userNotify)
    {
        $this->userNotify = $userNotify;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {
        return [
            'userNotify' => $this->userNotify,
        ];
    }
}
