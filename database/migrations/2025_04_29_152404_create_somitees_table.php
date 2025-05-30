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
        Schema::create('somitees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('branch_id');
            $table->unsignedInteger('day_id');
            $table->string('somitee_day');
            $table->date('date');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('somitees');
    }
};
