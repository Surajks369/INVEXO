<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubscriptionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('subscriptions')->insert([
            [
                'name' => 'Weekly Plan',
                'price' => 9.99,
                'duration' => 'WEEKLY',
                'status' => 'Active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Monthly Plan',
                'price' => 29.99,
                'duration' => 'MONTHLY',
                'status' => 'Active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Yearly Plan',
                'price' => 199.99,
                'duration' => 'YEARLY',
                'status' => 'Expired',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
