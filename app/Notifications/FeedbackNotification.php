<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FeedbackNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($insfname,$inslname,$patientid,$patientfname,$patientlname)
    {
      $this->insfname = $insfname;
        $this->inslname = $inslname;
        $this->patientid = $patientid;
        $this->patientfname = $patientfname;
        $this->patientlname = $patientlname;
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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'insfname'=>$this->insfname,
            'inslname'=>$this->inslname,
            'patientid' => $this->patientid,
            'patientfname'=>$this->patientfname,
            'patientlname'=>$this->patientlname,
        ];
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
