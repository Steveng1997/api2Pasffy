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
            $table->bigInteger('currentDate');
            $table->dateTime('dateStart')->nullable(true);
            $table->dateTime('dateEnd')->nullable(true);
            $table->string('idTherap');
            $table->string('manager')->nullable(true);
            $table->string('payment')->nullable(true);
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
