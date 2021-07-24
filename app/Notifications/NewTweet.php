<?php

namespace App\Notifications;

use App\Models\Tweet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewTweet extends Notification
{
    use Queueable;

    /**
     * @var Tweet
     */
    private $tweet;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Tweet $tweet)
    {
        //
        $this->tweet = $tweet;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'username' => $this->tweet->user->username,
            'avatar' => $this->tweet->user->avatar,
            'tweet' => $this->tweet->body,
            'image' => $this->tweet->image ? $this->tweet->image : '' ,
            'time' =>$this->tweet->created_at->diffForHumans()
        ];
    }
}
