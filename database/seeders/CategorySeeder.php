<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate the table first to clear existing data
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();
        Schema::enableForeignKeyConstraints();

        $now = now();
        $categories = [
            ['name' => 'category1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'category2', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'category3', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'category4', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'category5', 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('categories')->insert($categories);
    }
}
