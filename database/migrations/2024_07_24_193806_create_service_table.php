<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service', function (Blueprint $table) {
            $table->id();
            $table->boolean('bizuManager');
            $table->boolean('bizuDriverTaxi');
            $table->boolean('bizuFloor1');
            $table->boolean('bizuFloor2');
            $table->boolean('bizuTherapist');
            $table->boolean('cardManager');
            $table->boolean('cardDriverTaxi');
            $table->boolean('cardFloor1');
            $table->boolean('cardFloor2');
            $table->boolean('cardTherapist');
            $table->boolean('cashManager');
            $table->boolean('cashDriverTaxi');
            $table->boolean('cashFloor1');
            $table->boolean('cashFloor2');
            $table->boolean('cashTherapist');
            $table->boolean('closing');
            $table->string('client')->nullable(true);
            $table->string('company');
            $table->string('createdBy');
            $table->bigInteger('currentDate');
            $table->dateTime('dateStart');
            $table->dateTime('dateEnd');
            $table->dateTime('dateToday');
            $table->decimal('drink', 8, 3);
            $table->decimal('drinkTherapist', 8, 3);
            $table->boolean('edit');
            $table->string('exit')->nullable(true);
            $table->string('idClosing')->nullable(true);
            $table->string('idManag')->nullable(true);
            $table->string('idTherap')->nullable(true);
            $table->boolean('liquidatedManager');
            $table->boolean('liquidatedTherapist');
            $table->string('manager');
            $table->integer('minutes')->nullable(true);
            $table->string('modifiedBy')->nullable(true);
            $table->string('note')->nullable(true);
            $table->decimal('numberManager', 8, 3);
            $table->decimal('numberTaxi', 8, 3);
            $table->decimal('numberFloor1', 8, 3);
            $table->decimal('numberFloor2', 8, 3);
            $table->decimal('numberTherapist', 8, 3);
            $table->decimal('others', 8, 3);
            $table->string('payment');
            $table->string('screen')->nullable(true);
            $table->decimal('service', 8, 3);
            $table->decimal('tabacco', 8, 3);
            $table->decimal('taxi', 8, 3);
            $table->string('therapist');
            $table->decimal('tip', 8, 3);
            $table->decimal('totalService', 8, 3);
            $table->boolean('transactionManager');
            $table->boolean('transactionDriverTaxi');
            $table->boolean('transactionFloor1');
            $table->boolean('transactionFloor2');
            $table->boolean('transactionTherapist');
            $table->string('uniqueId');
            $table->decimal('valueBizuManager', 8, 3);
            $table->decimal('valueBizuTherapist', 8, 3);
            $table->decimal('valueBizum', 8, 3);
            $table->decimal('valueEfectManager', 8, 3);
            $table->decimal('valueEfectTherapist', 8, 3);
            $table->decimal('valueCash', 8, 3);
            $table->decimal('valueFloor1Bizum', 8, 3);
            $table->decimal('valueFloor1Cash', 8, 3);
            $table->decimal('valueFloor1Card', 8, 3);
            $table->decimal('valueFloor1Transaction', 8, 3);
            $table->decimal('valueFloor2Bizum', 8, 3);
            $table->decimal('valueFloor2Cash', 8, 3);
            $table->decimal('valueFloor2Card', 8, 3);
            $table->decimal('valueFloor2Transaction', 8, 3);
            $table->decimal('valueCardManager', 8, 3);
            $table->decimal('valueCardTherapist', 8, 3);
            $table->decimal('valueCard', 8, 3);
            $table->decimal('valueTransaction', 8, 3);
            $table->decimal('valueTransactionManager', 8, 3);
            $table->decimal('valueTransactionTherapist', 8, 3);
            $table->decimal('vitamin', 8, 3);
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};
