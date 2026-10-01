<?php

namespace App\Notifications;

use App\Models\Workshop;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateWorkshop extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public Workshop $workshop,
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
            ->subject('Workshop aktualisiert: ' . $this->workshop->name)
            ->greeting('Hallo ' . $notifiable->name . ',')
            ->line('Der Workshop „' . $this->workshop->name . '“, bei dem du angemeldet bist, wurde aktualisiert.')
            ->action('Änderungen ansehen', route('workshops.show', $this->workshop));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message'     => 'Der Workshop „' . $this->workshop->name . '“ wurde aktualisiert.',
            'workshop_id' => $this->workshop->id,
        ];
    }
}
