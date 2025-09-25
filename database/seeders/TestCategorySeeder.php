<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TestCategorySeeder extends Seeder
{
    public function run()
    {
        try {
            DB::statement("SET FOREIGN_KEY_CHECKS=0");
            DB::table('categories')->truncate();
            DB::statement("SET FOREIGN_KEY_CHECKS=1");
            
            $category = Category::create([
                'name' => 'Test Category'
            ]);
            
            Log::info('Category created:', ['category' => $category]);
            echo "Category created successfully\n";
            
        } catch (\Exception $e) {
            Log::error('Error seeding category:', ['error' => $e->getMessage()]);
            echo "Error: " . $e->getMessage() . "\n";
        }
    }
}