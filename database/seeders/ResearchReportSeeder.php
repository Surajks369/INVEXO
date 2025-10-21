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
                'name' => 'HDFC Bank Ltd Analysis',
                'category' => 1,
                'nse_code' => 'HDFCBANK',
                'recommendation' => 'Buy',
                'current_price' => 1550.75,
                'target_price' => 1850.00,
                'potential' => 19.30,
                'expect_hold_period' => '12 months',
                'company_logo' => 'company-logos/hdfc-bank.png',
                'status' => 1,
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(10),
            ],
            [
                'name' => 'Reliance Industries Analysis',
                'category' => 2,
                'nse_code' => 'RELIANCE',
                'recommendation' => 'Buy',
                'current_price' => 2450.25,
                'target_price' => 2900.00,
                'potential' => 18.35,
                'expect_hold_period' => '12 months',
                'company_logo' => 'company-logos/reliance.png',
                'status' => 1,
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'name' => 'Infosys Technical Analysis',
                'category' => 1,
                'nse_code' => 'INFY',
                'recommendation' => 'Hold',
                'current_price' => 1475.50,
                'target_price' => 1600.00,
                'potential' => 8.44,
                'expect_hold_period' => '6 months',
                'company_logo' => 'company-logos/infosys.png',
                'status' => 1,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
        ]);
    }
}
