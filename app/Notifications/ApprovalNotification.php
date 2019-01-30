<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Team;
use QrCode;
use App;

class ApprovalNotification extends Notification
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
        $url = url('/asistencia/'.$this->team->code);
        return (new MailMessage)
            ->subject('Solicitud aprobada')
            ->from(App::environment('MAIL_USERNAME'), 'hackpuebla@gmail.com')
            ->greeting('¡Felicidades!')
            ->line('Tu solicitud de registro al Hack Puebla 2019 ha sido aprobada.')
            ->line('Nos vemos el 29 de marzo del presente año a las 9:00 am.')
            ->line('Este es tu pase de entrada al evento.')
            ->line('<img style="display:block;" alt="Qr" title="Qr" src="data:image/png;base64,'.base64_encode(QrCode::format('png')->size(500)->generate($url)).'" />')
            ->line('Recuerda que todos los miembros del equipo deben llevar una identificación oficial el día del evento, así como tu poliza de seguro de gastos médicos mayores vigente.')  
            ->line('Por favor, atento a la información que posteamos en <a href="https://www.facebook.com/SAITCPuebla/">Facebook</a>.')           
            ->line('¡Gracias!')
            ->salutation('Nos vemos, Hack Puebla 2019');
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
