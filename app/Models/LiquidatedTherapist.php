<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiquidatedTherapist extends Model
{
    use HasFactory;

    protected $table = 'liquidatedTherapist';

    protected $fillable = [
        'amount',
        'company',
        'currentDate',
        'dateStart',
        'dateEnd',
        'manager',
        'payment',
        'therapist',
        'treatment',
        'uniqueId',
        'idTherap'
    ];
}
