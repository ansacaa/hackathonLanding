<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Team;
use QRCode;
use Illuminate\Support\Facades\Storage;

class ApprovalConfirmationNotification extends Notification
{
    use Queueable;

    protected $team;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Team $team)
    {
        $this->team = $team;
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
        Storage::put('codes/'.$this->team->code.'.png' ,QRCode::text(url('/asistencia/'.$this->team->code))->png());
        return (new MailMessage)
            ->greeting('¡Hola!')
            ->line('.')
            ->line('Recuerda estar al pendiente de información que publiquemos en nuestras redes sociales.')
            ->line('Para terminar tu solicitud de registro, por favor da click en botón de abjo. Una vez verificado tu correo, podremos aprobar tu solicitud.')
            ->line('<img src="'.$this->team->code.'.png"></img>')
            ->line('Cuando tu solicitud sea aprobada, recibirás un correo confirmación, este correo será tu ticket de entrada al evento.')           
            ->line('¡Gracias!')
            ->salutation('Nos vemos,');
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
