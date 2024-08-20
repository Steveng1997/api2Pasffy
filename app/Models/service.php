<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'service';

    protected $fillable = [
        'bizuManager',
        'bizuDriverTaxi',
        'bizuFloor1',
        'bizuFloor2',
        'bizuTherapist',
        'cardManager',
        'cardDriverTaxi',
        'cardFloor1',
        'cardFloor2',
        'cardTherapist',
        'cashManager',
        'cashDriverTaxi',
        'cashFloor1',
        'cashFloor2',
        'cashTherapist',
        'closing',
        'client',
        'createdBy',
        'created_at',
        'dateStart',
        'dateEnd',
        'drink',
        'drinkTherapist',
        'exit',
        'idClosing',
        'idLiquidatedManager',
        'idLiquidatedTherapist',
        'idManager',
        'idTherapist',
        'minutes',
        'modifiedBy',
        'note',
        'numberManager',
        'numberTaxi',
        'numberFloor1',
        'numberFloor2',
        'numberTherapist',
        'others',
        'payment',
        'screen',
        'service',
        'tabacco',
        'taxi',
        'tip',
        'totalService',
        'transactionManager',
        'transactionDriverTaxi',
        'transactionFloor1',
        'transactionFloor2',
        'transactionTherapist',
        'updated_at',
        'valueBizuManager',
        'valueBizuTherapist',
        'valueBizum',
        'valueEfectManager',
        'valueEfectTherapist',
        'valueCash',
        'valueFloor1Bizum',
        'valueFloor1Cash',
        'valueFloor1Card',
        'valueFloor1Transaction',
        'valueFloor2Bizum',
        'valueFloor2Cash',
        'valueFloor2Card',
        'valueFloor2Transaction',
        'valueCardManager',
        'valueCardTherapist',
        'valueCard',
        'valueTransaction',
        'valueTransactionManager',
        'valueTransactionTherapist',
        'vitamin'
    ];
}
