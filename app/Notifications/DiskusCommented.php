<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DiskusCommented extends Notification
{
    use Queueable;

    private $comment;

  
    public function __construct($comment)
    {
        $this->comment = $comment;
    }


    public function via($notifiable)
    {
        // dd($notifiable);
        return ['database'];
    }

   


    public function toArray($notifiable)
    {
        return [
            'username' => $this->comment->user->username,
            'diskus_user_id' => $this->comment->diskus->user_id,
            'isi' => $this->comment->isi,
            'comment_id' => $this->comment->id
        ];
    }
}
