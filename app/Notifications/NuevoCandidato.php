<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vacante, $id_vacante)
    {
        $this->vacante = $vacante;
        $this->id_vacante = $id_vacante;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        /* $data = array();
        Mail::send('test', $data, function($message){
            $message->from('john@johndoe.com', 'John Doe');
            $message->to('Junamarcos.castro97@gmail.com', 'Marcos Castro');
            $message->subject('Asunto');

        });
        
       return back(); */
       $data = array();
        return (new MailMessage)
                ->view('test', $data);
                    /* ->line('Has recibido un nuevo candidato en tu vacante.')
                    ->line('La vacante es: '. $this->vacante)
                    ->action('Visita Devjos', url('/'))
                    ->line('Gracias por usar DevJovs'); */
    }


    //Notificaciones en la base de datos
    public function toDatabase($notifiable){
        return [
            'vacante' => $this->vacante,
            'id_vacante' => $this->id_vacante,
        ];
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
