<?php

namespace App\Observers;

use App\Models\Lead;
use App\Notifications\LeadNotify;

class LeadObserver
{
    
    public function created(Lead $lead)
    {
        if ($lead->assigned_to) {
            $user = $lead->assignedTo;
            $user->notify(new LeadNotify($lead));
        }
    }
}
