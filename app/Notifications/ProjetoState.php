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
    public $tipo;

    /**
     * Create a new notification instance.
     */
    public function __construct($projeto, $estado, $tipo)
    {
        $this->projeto = $projeto;
        $this->estado = $estado;
        $this->tipo = $tipo;
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
        $tipo = $this->tipo;
        $nome = DB::table('projetos')->where('id', $this->projeto)->value('nome');
        $state = DB::table('estado')->where('id', $this->estado)->value('estado');
        if($tipo == 1){
        return (new MailMessage)
                    ->subject('Estado do Projeto Alterado')
                    ->greeting('Olá!')
                    ->line('Vimos por este meio informar que o projeto '.$nome.' passou para o estado ' .$state. ".")
                    
                    ->line('Cumprimentos,')
                    ->line('SCES')

                    ->salutation('Para mais informações contacte o nosso suporte em support@ufp.pt');
        }
        else if($tipo == 2){
            return (new MailMessage)
            ->subject('Resultado da Aprovação do Projeto')
            ->greeting('Olá!')
            ->line('Vimos por este meio informar que o projeto '.$nome.' passou para o estado ' .$state. ".")
            ->line('O projeto foi também aprovado com recomendação. Parabéns!')
            ->line('Cumprimentos,')
            ->line('SCES')

            ->salutation('Para mais informações contacte o nosso suporte em support@ufp.pt');
        }
        else if($tipo == 3){
            return (new MailMessage)
            ->subject('Resultado da aprovação do Projeto')
            ->greeting('Olá!')
            ->line('Vimos por este meio informar que o projeto '.$nome.' foi aprovado e passou para o estado ' .$state. ".")
            ->line('O projeto foi aprovado sem recomendação.')
            ->line('Cumprimentos,')
            ->line('SCES')

            ->salutation('Para mais informações contacte o nosso suporte em support@ufp.pt');
        }
        else if($tipo == 4){
            return (new MailMessage)
            ->subject('Resultado da aprovação do Projeto')
            ->greeting('Olá!')
            ->line('Vimos por este meio informar que o projeto '.$nome.' foi aprovado e passou para o estado ' .$state. ".")
            ->line('Infelizmente, o projeto não foi aprovado pela nossa Direção Científica,')
            ->line('no entanto pode sempre iniciar outro projeto usando o menu formulário na aplicação.')
            ->line('Cumprimentos,')
            ->line('SCES')

            ->salutation('Para mais informações contacte o nosso suporte em support@ufp.pt');
        }
        else if($tipo == 5){
            return (new MailMessage)
            ->subject('Estado do Projeto Alterado')
            ->greeting('Olá!')
            ->line('Vimos por este meio informar que o projeto '.$nome.' passou para o estado ' .$state. ".")
            ->line('Foi selecionado um novo relator para o projeto, pode verificar dentro da aplicação.')
            
            ->line('Cumprimentos,')
            ->line('SCES')

            ->salutation('Para mais informações contacte o nosso suporte em support@ufp.pt');
        }
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
