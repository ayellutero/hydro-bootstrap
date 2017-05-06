<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User; 

class UpcomingMaintenance extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, $maintenanceDate, $station, $id)
    {
        //
        $this->user = $user; 
        $this->maintenanceDate = $maintenanceDate;
        $this->station = $station;
        $this->id = $id;
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
                    ->subject('Upcoming Hydromet Station Maintenance')
                    ->line('The this is to remind you of the upcoming maintenance for the Hydromet station '.$this->station.' due on '.\Carbon\Carbon::parse($this->maintenanceDate)->format('M d, Y').'.')
                    ->line('If maintenance has already been done, please confirm by clicking the button below.')
                    ->action('Confirm Schedule', url('confirmSchedule', $this->id));
                    //  ->line('Thank you for using our application!');
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
