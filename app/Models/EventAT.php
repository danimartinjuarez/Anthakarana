<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAT extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'people',
        'description',
        'image',
    ];
}
