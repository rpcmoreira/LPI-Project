<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Console\View\Components\Line;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class ProjetoState extends Notification
{
    use Queueable;

    public $estado;
    public $projeto;

    /**
     * Create a new notification instance.
     */
    public function __construct($projeto, $estado)
    {
        $this->projeto = $projeto;
        $this->estado = $estado;
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
    public function toMail(object $notifiable): MailMessage
    {
        $nome = DB::table('projetos')->where('id', $this->projeto)->value('nome');
        $state = DB::table('estado')->where('id', $this->estado)->value('estado');
        return (new MailMessage)
                    ->subject('Estado do Projeto Alterado')
                    ->greeting('Olá!')
                    ->line('Vimos por este meio informar que o projeto '.$nome.' passou para o estado ' .$state. ".")
                    
                    ->line('Cumprimentos,')
                    ->line('SCES')

                    ->salutation('Para mais informações contacte o nosso suporte em support@ufp.pt');
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
