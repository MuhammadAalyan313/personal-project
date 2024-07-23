<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'title',
        'company',
        'phone',
        'message',
        'lead_source',
        'lead_status',
        'email',
        'address',
        'user_id',
        'assigned_to',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function assignedTo(){
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
