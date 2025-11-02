<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPercentageFieldsToResearchReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('research_reports', function (Blueprint $table) {
            $table->float('buy_percentage')->nullable()->after('potential');
            $table->float('hold_percentage')->nullable()->after('buy_percentage');
            $table->float('sell_percentage')->nullable()->after('hold_percentage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('research_reports', function (Blueprint $table) {
            $table->dropColumn(['buy_percentage', 'hold_percentage', 'sell_percentage']);
        });
    }
}