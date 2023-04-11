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
        Schema::create('employee_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('address');
            $table->string('postal_code');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('indonesia_village_id')->nullable();
            $table->unsignedBigInteger('employee_id');
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('indonesia_village_id')->references('id')->on('indonesia_villages')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_addresses');
    }
};
