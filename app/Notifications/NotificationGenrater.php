<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
use App\Models\User;
class NotificationGenrater extends Notification 
{
    use Queueable;
    private $dataTest;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->dataTest=$data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
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
            'message'=> $this->dataTest,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
        'TotalNotification' => User::find($notifiable->id)->unreadNotifications->count(),
        'notification' => $this->dataTest,
        ]);
    }
    
}
