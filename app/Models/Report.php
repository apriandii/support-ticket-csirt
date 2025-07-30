<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'ticket_number',
        'name',
        'email',
        'phone',
        'help_topic',
        'issue_summary',
        'attachment',
        'status',
    ];
}
