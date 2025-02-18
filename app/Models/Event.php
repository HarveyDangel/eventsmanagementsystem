<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'category',
        'venue',
        'image',
        'start_date',
        'end_date',
        'duration',
        'status',
        'comments',
        'user_id',
    ];
}
