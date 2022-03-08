<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MemberMissed extends Notification implements ShouldQueue
{
    use Queueable;

   // protected $member;
   
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->member = $member;
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
                    ->subject('Our Gym Misses You')
                    ->greeting('Hello,')
                    ->line("Just Wanted to check up on you we haven't see you in over a month now")
                    ->line('Hope you are well')
                    ->salutation('Best Regards , Sparta Gym :D');
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
