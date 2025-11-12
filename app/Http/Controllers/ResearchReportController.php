<?php

namespace App\Http\Controllers;

use App\Models\ResearchReport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ResearchReportController extends Controller
{
    public function download($public_id, $token)
    {
        try {
            // Get the report
            $report = ResearchReport::where('public_id', $public_id)
                                ->where('status', 1) // Only active reports
                                ->firstOrFail();

            // Try both storage paths
            $filePath = storage_path('app/public/' . $report->report);
            $publicPath = public_path('storage/' . $report->report);
            
            // Check which path exists
            if (file_exists($filePath)) {
                $finalPath = $filePath;
            } elseif (file_exists($publicPath)) {
                $finalPath = $publicPath;
            } else {
                return response()->json(['error' => 'Report file not found'], 404);
            }

            // Get file name with slug
            $fileName = Str::slug($report->name) . '.pdf';

            // Force download the file
            return response()->download($finalPath, $fileName, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0'
            ]);
            
        } catch (\Exception $e) {
            Log::error('Download failed: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to download report'], 500);
        }
    }

    public function show($public_id)
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }

        $user = Auth::user();
        $today = now();
        $isActive = $user->renewal_date && $user->renewal_date >= $today;

    $report = ResearchReport::where('public_id', $public_id)->firstOrFail();

        // Render the detail view and let the view show subscribe prompt when not active
        return view('research_report_detail', compact('report', 'user', 'isActive'));
    }
}
