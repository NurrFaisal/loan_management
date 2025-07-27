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
        Schema::table('loans', function (Blueprint $table) {
            // Add new fields
            $table->decimal('interest', 5, 2)->after('loan_amount');
            $table->decimal('total_payable', 10, 2)->after('interest');
            $table->enum('loan_type', ['Weekly', 'Monthly'])->after('total_payable');
            $table->decimal('installment', 10, 2)->after('loan_type');
            
            // Drop old fields
            $table->dropColumn(['loan_purpose', 'day_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loans', function (Blueprint $table) {
            // Reverse the changes
            $table->dropColumn(['interest', 'total_payable', 'loan_type', 'installment']);
            $table->string('loan_purpose')->after('loan_amount');
            $table->unsignedBigInteger('day_id')->after('status');
        });
    }
};
