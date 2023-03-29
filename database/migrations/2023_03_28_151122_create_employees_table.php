<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('email_personal')->nullable()->unique();
            $table->date('birthday')->nullable();
            $table->date('join_date')->nullable();
            $table->string('photo')->nullable()->unique();
            $table->string('employee_number')->unique();
            $table->enum('gender', ['female', 'male'])->default('male');
            $table->enum('active_status', ['no', 'yes'])->default('yes');
            $table->unsignedBigInteger('employee_level_id');
            $table->unsignedBigInteger('employee_position_id');
            $table->unsignedBigInteger('employee_supervisor_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('employee_level_id')->references('id')->on('employee_levels')->onDelete('cascade');
            $table->foreign('employee_position_id')->references('id')->on('employee_positions')->onDelete('cascade');
            $table->foreign('employee_supervisor_id')->references('id')->on('employees');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
