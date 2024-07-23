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
        Schema::create('liquidatedManager', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->string('company');
            $table->integer('currentDate');
            $table->integer('dateStart');
            $table->string('dateEnd');
            $table->integer('fixeDay');
            $table->boolean('manager');
            $table->string('therapist');
            $table->integer('treatment');
            $table->string('uniqueId');
            $table->integer('idManag');
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liquidatedManager');
    }
};
