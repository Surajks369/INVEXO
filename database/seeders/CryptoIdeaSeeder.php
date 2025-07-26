<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CryptoIdeaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('crypto_ideas')->insert([
            [
                'name' => 'Bitcoin',
                'current_price' => 60000.00,
                'risk_level' => 'moderate',
                'description' => 'The original and most well-known cryptocurrency.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Ethereum',
                'current_price' => 3500.00,
                'risk_level' => 'high',
                'description' => 'A popular platform for decentralized applications.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dogecoin',
                'current_price' => 0.25,
                'risk_level' => 'extreme',
                'description' => 'A meme coin with high volatility.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
