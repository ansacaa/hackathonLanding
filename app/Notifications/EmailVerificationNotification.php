<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Team;

class EmailVerificationNotification extends Notification
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
        return (new MailMessage)
            ->greeting('¡Hola!')
            ->line('Los orgaizadores del Hack Puebla 2019 te damos la bienvenida.')
            ->line('Recuerda estar al pendiente de información que publiquemos en <a href="https://www.facebook.com/SAITCPuebla/">Facebook</a>.')
            ->line('Para terminar tu solicitud de registro, por favor da click en botón de abjo. Una vez verificado tu correo, podremos aprobar tu solicitud.')
            ->action('Verificar correo', route('teams.confirm', $this->team->code))
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
