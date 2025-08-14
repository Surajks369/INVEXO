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
                'category' => 1, // Make sure category with id 1 exists in categories table
                'report' => 'market_analysis_q1.pdf',
                'status' => 1,
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(10),
            ],
            [
                'name' => 'Crypto Trends 2025',
                'category' => 2, // Make sure category with id 2 exists in categories table
                'report' => 'crypto_trends_2025.pdf',
                'status' => 0,
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'name' => 'Investment Opportunities',
                'category' => 1, // Make sure category with id 1 exists in categories table
                'report' => 'investment_opportunities.pdf',
                'status' => 1,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
        ]);
    }
}
