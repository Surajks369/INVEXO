<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ResearchReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('research_reports')->insert([
            [
                'name' => 'Market Analysis Q1',
                'category' => 1, // Example category_id, ensure this exists in categories table
                'status' => 1,
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(10),
            ],
            [
                'name' => 'Crypto Trends 2025',
                'category' => 2, // Example category_id, ensure this exists in categories table
                'status' => 0,
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'name' => 'Investment Opportunities',
                'category' => 1, // Example category_id, ensure this exists in categories table
                'status' => 1,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
        ]);
    }
}
