<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'event_photo',
    ];
}