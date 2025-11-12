<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('research_reports', function (Blueprint $table) {
            if (!Schema::hasColumn('research_reports', 'public_id')) {
                $table->string('public_id', 64)->nullable()->unique()->after('id');
            }
        });

        // Populate existing rows with a UUID public_id where missing
        $rows = DB::table('research_reports')->whereNull('public_id')->get();
        foreach ($rows as $row) {
            DB::table('research_reports')->where('id', $row->id)->update([
                'public_id' => (string) Str::uuid()
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('research_reports', function (Blueprint $table) {
            if (Schema::hasColumn('research_reports', 'public_id')) {
                $table->dropColumn('public_id');
            }
        });
    }
};
