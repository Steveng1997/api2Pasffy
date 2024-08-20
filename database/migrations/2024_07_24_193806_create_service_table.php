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
            $table->id('idService');
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
            $table->string('createdBy')->nullable(true);
            $table->dateTime('dateStart');
            $table->dateTime('dateEnd');
            $table->decimal('drink', 8, 2);
            $table->decimal('drinkTherapist', 8, 2);
            $table->string('exit')->nullable(true);
            $table->bigInteger('idClosing')->nullable(true);
            $table->foreignId('idLiquidatedManager')->constrained(table: 'liquidatedManager', indexName: 'id_liquitedManager')->nullable(true);
            $table->foreignId('idLiquidatedTherapist')->constrained(table: 'liquidatedTherapist', indexName: 'id_liquitedTherapist')->nullable(true);
            $table->foreignId('idManager')->constrained(table: 'users', indexName: 'id_manager');
            $table->foreignId('idTherapist')->constrained(table: 'therapist', indexName: 'id_therapist');
            $table->integer('minutes')->nullable(true);
            $table->foreignId('modifiedBy')->constrained(table: 'users', indexName: 'id_user')->nullable(true);
            $table->string('note')->nullable(true);
            $table->decimal('numberManager', 8, 2);
            $table->decimal('numberTaxi', 8, 2);
            $table->decimal('numberFloor1', 8, 2);
            $table->decimal('numberFloor2', 8, 2);
            $table->decimal('numberTherapist', 8, 2);
            $table->decimal('others', 8, 2);
            $table->string('payment');
            $table->string('screen')->nullable(true);
            $table->decimal('service', 8, 2);
            $table->decimal('tabacco', 8, 2);
            $table->decimal('taxi', 8, 2);
            $table->decimal('tip', 8, 2);
            $table->decimal('totalService', 8, 2);
            $table->boolean('transactionManager');
            $table->boolean('transactionDriverTaxi');
            $table->boolean('transactionFloor1');
            $table->boolean('transactionFloor2');
            $table->boolean('transactionTherapist');
            $table->decimal('valueBizuManager', 8, 2);
            $table->decimal('valueBizuTherapist', 8, 2);
            $table->decimal('valueBizum', 8, 2);
            $table->decimal('valueEfectManager', 8, 2);
            $table->decimal('valueEfectTherapist', 8, 2);
            $table->decimal('valueCash', 8, 2);
            $table->decimal('valueFloor1Bizum', 8, 2);
            $table->decimal('valueFloor1Cash', 8, 2);
            $table->decimal('valueFloor1Card', 8, 2);
            $table->decimal('valueFloor1Transaction', 8, 2);
            $table->decimal('valueFloor2Bizum', 8, 2);
            $table->decimal('valueFloor2Cash', 8, 2);
            $table->decimal('valueFloor2Card', 8, 2);
            $table->decimal('valueFloor2Transaction', 8, 2);
            $table->decimal('valueCardManager', 8, 2);
            $table->decimal('valueCardTherapist', 8, 2);
            $table->decimal('valueCard', 8, 2);
            $table->decimal('valueTransaction', 8, 2);
            $table->decimal('valueTransactionManager', 8, 2);
            $table->decimal('valueTransactionTherapist', 8, 2);
            $table->decimal('vitamin', 8, 2);
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
