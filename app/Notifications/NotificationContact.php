<?php

namespace App\Notifications;

use App\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificationContact extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact=$contact;
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject($this->contact->subject)
                    ->from($this->contact->email,$this->contact->name)
                    ->greeting('Bonjour,')
                    ->line('Vous avez reçu un nouveau message.')
                    ->line('Sujet : '.$this->contact->objet.'')
                    ->line( $this->contact->messages()->first()->message)
                    ->action('Voir le message',route('show_contacts',['id'=>$this->contact->id]));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
