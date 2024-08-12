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
            $table->decimal('amount');
            $table->bigInteger('currentDate');
            $table->dateTime('dateStart')->nullable(true);
            $table->dateTime('dateEnd')->nullable(true);
            $table->integer('fixeDay')->nullable(true);
            $table->string('idManag')->nullable(true);
            $table->string('manager')->nullable(true);
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
        Schema::dropIfExists('liquidatedManager');
    }
};
