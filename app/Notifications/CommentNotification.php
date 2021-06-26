<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Comment;

class notificationComment extends Notification
{
    use Queueable;

    public $comment;

    
    public function __construct(Comment $comment,$title)
    {
        $this->comment = $comment;
        $this->title = $title;
    }

    
    public function via($notifiable)
    {
        return ['database'];
    }

  
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

   
    public function toArray($notifiable)
    {
        return [
            "user_id"=> $this->comment->user_id,
            "post_id"=> $this->comment->post_id,
            "title"=> $this->title,
        ];
    }
}
