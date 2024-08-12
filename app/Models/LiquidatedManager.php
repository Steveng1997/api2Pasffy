<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiquidatedManager extends Model
{
    use HasFactory;

    protected $table = 'liquidatedManager';

    protected $fillable = [
        'amount',
        'currentDate',
        'dateStart',
        'dateEnd',
        'fixeDay',
        'idManag',
        'manager',
        'treatment',
        'uniqueId',
    ];
}
