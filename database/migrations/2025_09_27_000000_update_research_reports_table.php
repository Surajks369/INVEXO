<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('research_reports', function (Blueprint $table) {
            // Remove old columns
            $table->dropColumn('report');
            
            // Add new columns
            $table->string('nse_code')->nullable();
            $table->enum('recommendation', ['buy', 'sell', 'hold'])->default('hold');
            $table->decimal('current_price', 10, 2)->nullable();
            $table->decimal('target_price', 10, 2)->nullable();
            $table->decimal('potential', 10, 2)->nullable()->comment('Calculated field (target_price - current_price) / current_price * 100');
            $table->string('expect_hold_period')->nullable();
            $table->string('company_logo')->nullable();
        });
    }

    public function down()
    {
        Schema::table('research_reports', function (Blueprint $table) {
            $table->string('report')->nullable(); // Restore original column
            
            // Remove new columns
            $table->dropColumn([
                'nse_code',
                'recommendation',
                'current_price',
                'target_price',
                'potential',
                'expect_hold_period',
                'company_logo'
            ]);
        });
    }
};