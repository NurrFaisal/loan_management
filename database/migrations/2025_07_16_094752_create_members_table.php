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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nid')->unique();
            $table->string('phone')->unique();
            $table->string('address');
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('somitee_id');
            $table->foreign('somitee_id')->references('id')->on('somitees')->onDelete('cascade');
            $table->unsignedBigInteger('day_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};