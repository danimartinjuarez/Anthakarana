<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'total_people',
        'sub_people',
        'description',
        'image',
        'date',
        'start_hour',
    ];
}
