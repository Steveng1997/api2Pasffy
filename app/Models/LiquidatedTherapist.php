<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiquidatedTherapist extends Model
{
    use HasFactory;

    protected $table = 'liquidatedtherapist';

    protected $fillable = [
        'amount',
        'company',
        'currentDate',
        'dateStart',
        'dateEnd',
        'idTherap',
        'manager',
        'payment',
        'therapist',
        'treatment',
        'uniqueId',
    ];
}
