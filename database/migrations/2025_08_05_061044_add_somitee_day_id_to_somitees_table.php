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
        Schema::table('somitees', function (Blueprint $table) {
            $table->unsignedBigInteger('somitee_day_id')->nullable()->after('description');
            $table->foreign('somitee_day_id')->references('id')->on('somitee_days')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('somitees', function (Blueprint $table) {
            $table->dropForeign(['somitee_day_id']);
            $table->dropColumn('somitee_day_id');
        });
    }
};
