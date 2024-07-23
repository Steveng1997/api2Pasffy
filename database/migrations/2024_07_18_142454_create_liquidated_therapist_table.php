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
            $table->string('amount');
            $table->string('company');
            $table->integer('currentDate');
            $table->integer('dateStart');
            $table->string('dateEnd');
            $table->boolean('manager');
            $table->integer('payment');
            $table->string('therapist');
            $table->integer('treatment');
            $table->string('uniqueId');
            $table->integer('idTherap');
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
