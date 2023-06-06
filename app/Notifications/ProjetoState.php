<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Console\View\Components\Line;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;

/* The `class ProjetoState extends Notification` is defining a custom notification class named
`ProjetoState` that extends the `Notification` class provided by Laravel. This custom notification
class is used to send notifications to users via email when the state of a project changes. It
contains methods for defining the delivery channels, the email message, and the array representation
of the notification. */
class ProjetoState extends Notification
{
    use Queueable;

    public $estado;
    public $projeto;
    public $tipo;

    /**
     * Create a new notification instance.
     */
    /**
     * This is a constructor function in PHP that initializes the values of three properties of an
     * object.
     * 
     * @param projeto It is a variable that represents the project associated with an instance of this
     * class. It could be a string or an object representing a project.
     * @param estado "estado" is a parameter that represents the state or status of something. It could
     * refer to the current condition or situation of an object, process, or system. In the context of
     * the code snippet, it is being assigned a value during the construction of an object along with
     * the "projeto"
     * @param tipo The "tipo" parameter is a variable that represents the type of the object being
     * constructed. It could be a string, integer, or any other data type depending on the context of
     * the code.
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
    /**
     * This PHP function returns an array with the string 'mail' as its only element.
     * 
     * @param notifiable The `` parameter is an object that represents the recipient of a
     * notification. It can be any object that implements the `Illuminate\Notifications\Notifiable`
     * interface, which includes a `routeNotificationFor()` method that returns the recipient's contact
     * information (e.g. email address, phone number,
     * 
     * @return array An array containing the string "mail" is being returned.
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    /**
     * This function sends an email message with different content based on the type of project update.
     * 
     * @param notifiable The "notifiable" parameter is an object that represents the recipient of the
     * email notification. It could be a user, a customer, or any other entity that needs to receive
     * the notification. The object should implement the "Illuminate\Notifications\Notifiable" trait,
     * which provides methods for sending notifications.
     * 
     * @return MailMessage A MailMessage object is being returned.
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
