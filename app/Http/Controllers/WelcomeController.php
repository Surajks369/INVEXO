<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ResearchReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WelcomeController extends Controller
{
    public function index()
    {
        try {
            // Get all categories
            $categories = Category::all();

            if ($categories->isEmpty()) {
                Log::warning('No categories found in the database');
            }

            // Get research reports for each category
            $reports = [];
            $downloadTokens = [];
            foreach ($categories as $category) {
                $categoryReports = ResearchReport::where('category', $category->id)
                                        ->where('status', 1)
                                        ->orderBy('created_at', 'desc')
                                        ->take(3)
                                        ->get();
                
                $reports[$category->id] = $categoryReports;
                
                // Generate tokens for each report
                foreach ($categoryReports as $report) {
                    $downloadTokens[$report->id] = substr(md5($report->id . $report->name . $report->created_at), 0, 10);
                }
            }

            return view('welcome', [
                'categories' => $categories,
                'reports' => $reports,
                'downloadTokens' => $downloadTokens
            ]);
        } catch (\Exception $e) {
            Log::error('Error in WelcomeController@index: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            
            // If there's an error, return the welcome view with empty data but include error info
            return view('welcome', [
                'categories' => collect([]),
                'reports' => [],
                'error' => $e->getMessage()
            ]);
        }
    }
}
