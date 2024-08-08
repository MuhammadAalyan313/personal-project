<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AcceptOrDeclineNotify extends Notification
{
    use Queueable;

    // protected $lead;
    // protected $status;

    public function __construct($lead, $status)
    {
    //     $this->lead = $lead;
    //     $this->status = $status;
    }

    public function via($notifiable)
    {
        return ['database']; // You can add 'mail', 'slack', etc. if needed
    }

    public function toArray($notifiable)
    {
        return [
            // 'id' => $this->lead->id,
            // 'status' => $this->status,
        ];
    }
}
