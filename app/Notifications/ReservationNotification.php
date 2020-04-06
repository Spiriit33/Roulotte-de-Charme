<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Reservation;

class ReservationNotification extends Notification
{
    use Queueable;
    private $reservation;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
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
        $dateDebut = date('j/m/Y',strtotime($this->reservation->date_debut));
        $dateFin = date('j/m/Y',strtotime($this->reservation->date_fin));
        return (new MailMessage)
                    ->greeting('Bonjour')
                    ->line('Une nouvellle réservation à été effectué.')
                    ->action('Voir la reservation', route('manage_reservations'))
                    ->line('Du '.$dateDebut.' au '.$dateFin.'');
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
