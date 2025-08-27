<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchReport;
use Illuminate\Support\Facades\Auth;

class ResearchReportController extends Controller
{
    public function show($id)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }

        $user = Auth::user();
        $today = now();
        
        // Check if user has active subscription
        if (!$user->renewal_date || $user->renewal_date < $today) {
            return redirect()->route('user.dashboard')->with('error', 'Your subscription has expired. Please renew to access reports.');
        }

        $report = ResearchReport::findOrFail($id);
        
        return view('research_report_detail', compact('report', 'user'));
    }
}
