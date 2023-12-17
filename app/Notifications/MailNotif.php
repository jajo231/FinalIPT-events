<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MailNotif extends Notification
{
    use Queueable;
    private $mailNotif;

    /**
     * Create a new notification instance.
     */
    public function __construct($mailNotif)
    {
        $this->mailNotif = $mailNotif;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
        {
            return (new MailMessage)
            ->subject('Event Details')
            ->greeting('Hello!')
            ->line('Event Information!')
            ->line('Event Name: ' . $this->mailNotif['eventName'])
            ->line('Date: ' . $this->mailNotif['eventDate'])
            ->line('Location: ' . $this->mailNotif['eventLocation'])
            ->line('Guest: ' . $this->mailNotif['eventGuest'])
            ->line('Type: ' . $this->mailNotif['eventType'])
            ->line('Description: ' . $this->mailNotif['eventDescription'])
            ->line($this->mailNotif['thankyou']);
        }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
