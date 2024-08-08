<?php

namespace App\Observers;
use App\Models\lead;
use App\Models\User;
use App\Notifications\acceptOrDeclineNotify;

class acceptOrDeclineObserver
{
    public function updated(Lead $lead)
    {
        // // Check if the status has changed to 'accepted'
        // if ($lead->isDirty('status') && $lead->status == 'accepted') {
        //     // Find the assigner (user) based on the 'assigned_to' field in the lead
        //     $assigner = User::find($lead->assigned_to);
            
        //     // Notify the assigner if the status is accepted
        //     dd($assigner);
        //     if ($assigner) {
        //         $assigner->notify(new AcceptOrDeclineNotify($lead, 'accepted'));
        //     }
        // }
    }
}
