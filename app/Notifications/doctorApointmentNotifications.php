<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class doctorApointmentNotifications extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

     public $user_information,$apointment;

    public function __construct($user,$apointment)
    {
        $this->user_information = $user;
        $this->apointment=$apointment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            "nofication"=>"new user has book an an apointment",
             "user"=>$this->user_information,
             "apointment"=>$this->apointment

        ];
    }
}
