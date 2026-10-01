<?php

namespace App\Notifications;

use App\Models\Workshop;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscribeWorkshop extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public Workshop $workshop,
        public User     $user,
    ) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Neue Anmeldung zu ' . $this->workshop->name)
            ->greeting('Hallo ' . $notifiable->name . ',')
            ->line($this->user->name . ' hat sich für „' . $this->workshop->name . '“ angemeldet.')
            ->action('Workshop ansehen', route('workshops.show', $this->workshop));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => $this->user->name . ' hat sich für „' . $this->workshop->name . '“ angemeldet.',
            'workshop_id' => $this->workshop->id,
        ];
    }
}
