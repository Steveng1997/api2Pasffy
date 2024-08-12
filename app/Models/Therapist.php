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
        'dateEnd',
        'drink',
        'drinkTherapist',
        'exit',
        'minutes',
        'name',
        'others',
        'service',
        'tabacco',
        'tip',
        'vitamin'
    ];
}
