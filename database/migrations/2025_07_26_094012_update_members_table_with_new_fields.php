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
        Schema::table('members', function (Blueprint $table) {
            // Drop unique constraints first
            $table->dropUnique(['phone']);
            
            // Add new fields
            $table->string('father_husband_name')->after('name');
            $table->enum('gender', ['male', 'female', 'other'])->after('father_husband_name');
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active')->after('photo');
            $table->decimal('admission_fee', 10, 2)->after('address');
            
            // Modify existing fields
            $table->text('address')->change();
            
            // Drop day_id column if it exists
            if (Schema::hasColumn('members', 'day_id')) {
                $table->dropColumn('day_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            // Reverse the changes
            $table->dropColumn(['father_husband_name', 'gender', 'status', 'admission_fee']);
            $table->string('address')->change();
            $table->string('phone')->unique()->change();
            $table->unsignedBigInteger('day_id')->nullable();
        });
    }
};
