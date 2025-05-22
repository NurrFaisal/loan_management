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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('somitee_id');
            $table->unsignedInteger('member_id');
            $table->unsignedInteger('day_id');
            $table->bigInteger('loan_amount');
            $table->tinyInteger('interest');
            $table->bigInteger('total_loan');
            $table->string('type');
            $table->integer('installment');
            $table->integer('installment_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
