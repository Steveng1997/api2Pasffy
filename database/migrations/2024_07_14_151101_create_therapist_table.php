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
        Schema::create('therapist', function (Blueprint $table) {
            $table->id();
            $table->boolean('active');
            $table->dateTime('dateEnds')->nullable(true);
            $table->integer('drink');
            $table->integer('drinkTherapist');
            $table->string('exit')->nullable(true);
            $table->foreignId('id_admin')->constrained(table: 'users', indexName: 'id_admin');
            $table->integer('minutes');
            $table->string('therapist');
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
        Schema::dropIfExists('therapist');
    }
};
