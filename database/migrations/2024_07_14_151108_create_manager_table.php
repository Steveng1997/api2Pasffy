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
        Schema::create('manager', function (Blueprint $table) {
            $table->id();
            $table->integer('drink');
            $table->integer('drinkTherapist');
            $table->integer('fixeDay');
            $table->integer('others');
            $table->integer('service');
            $table->integer('tabacco');
            $table->integer('tip');
            $table->integer('vitamin');
            $table->datetimes();
            // $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manager');
    }
};
