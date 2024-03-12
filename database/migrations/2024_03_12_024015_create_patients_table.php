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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
         $table->string('FirstName');
              $table->string('LastName');
        $table->date('DateOfBirth');
        $table->string('Gender');
        $table->string('PhoneNumber');
        $table->string('Email');
        $table->string('Diagnosis');
        $table->string('Adress');
        $table->string('Photo')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
