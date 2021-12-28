<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class EmailChangeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        protected string $userId
    ) {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(AnonymousNotifiable $notifiable)
    {
        return (new MailMessage)
                    ->line('We are attempting to verify your new email address. This email will expire in 60 min.')
                    ->action('Confirm Email Address', $this->verifyRoute($notifiable))
                    ->line('Once you have successfully verified the new email, you\'ll be taken back to the dashboard.');
    }

    protected function verifyRoute(AnonymousNotifiable $notifiable)
    {
        return URL::temporarySignedRoute(
            'settings.email.verify',
            now()->addHour(),
            [
                'id' => $this->userId,
                'email' => $notifiable->routes['mail'],
            ]
        );
    }
}
