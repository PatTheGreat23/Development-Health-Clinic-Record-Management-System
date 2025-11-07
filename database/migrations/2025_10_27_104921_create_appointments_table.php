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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->unsignedBigInteger('staff_id')->nullable();
            $table->date('date');
            $table->time('time')->nullable();
            $table->string('status')->default('Pending'); // Pending, Approved, Completed, Canceled
            $table->text('notes')->nullable();
            $table->timestamps();

        // Optional foreign keys (comment out if you don't have those tables yet)
        // $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        // $table->foreign('staff_id')->references('id')->on('users')->onDelete('set null');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
