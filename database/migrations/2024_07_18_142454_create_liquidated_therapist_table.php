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
        Schema::create('liquidatedTherapist', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount');
            $table->string('company');
            $table->integer('currentDate');
            $table->dateTime('dateStart');
            $table->dateTime('dateEnd');
            $table->string('idTherap');
            $table->string('manager');
            $table->string('payment');
            $table->string('therapist');
            $table->integer('treatment');
            $table->string('uniqueId');
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liquidatedTherapist');
    }
};
