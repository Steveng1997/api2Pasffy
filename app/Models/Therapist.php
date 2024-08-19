<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    use HasFactory;

    protected $table = 'therapist';

    protected $fillable = [
        'active',
        'dateEnds',
        'drink',
        'drinkTherapist',
        'exit',
        'id_admin',
        'minutes',
        'therapist',
        'others',
        'service',
        'tabacco',
        'tip',
        'vitamin'
    ];
}
