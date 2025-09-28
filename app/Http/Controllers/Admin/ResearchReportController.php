<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResearchReport;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResearchReportController extends Controller
{
    public function index()
    {
        $reports = ResearchReport::with('category')->latest()->paginate(10);
        return view('admin.research_reports.index', compact('reports'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.research_reports.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'nse_code' => 'required|string|max:50',
            'recommendation' => 'required|string|max:50',
            'current_price' => 'required|numeric',
            'target_price' => 'required|numeric',
            'potential' => 'required|numeric',
            'expect_hold_period' => 'required|string|max:50',
            'company_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:0,1',
        ]);

        if ($request->hasFile('company_logo')) {
            $file = $request->file('company_logo');
            $filename = Str::slug($request->name) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('company-logos', $filename, 'public');
            $validated['company_logo'] = $path;
        }

        ResearchReport::create($validated);

        return redirect()->route('research-reports.index')
            ->with('success', 'Research report created successfully.');
    }

    public function edit($id)
    {
        $report = ResearchReport::findOrFail($id);
        $categories = Category::all();
        return view('admin.research_reports.edit', compact('report', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $report = ResearchReport::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'nse_code' => 'required|string|max:50',
            'recommendation' => 'required|string|max:50',
            'current_price' => 'required|numeric',
            'target_price' => 'required|numeric',
            'potential' => 'required|numeric',
            'expect_hold_period' => 'required|string|max:50',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:0,1',
        ]);

        if ($request->hasFile('company_logo')) {
            // Delete old logo if exists
            if ($report->company_logo && Storage::exists('public/' . $report->company_logo)) {
                Storage::delete('public/' . $report->company_logo);
            }

            // Store new logo
            $file = $request->file('company_logo');
            $filename = Str::slug($request->name) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('company-logos', $filename, 'public');
            $validated['company_logo'] = $path;
        }

        $report->update($validated);

        return redirect()->route('research-reports.index')
            ->with('success', 'Research report updated successfully.');
    }

    public function destroy($id)
    {
        $report = ResearchReport::findOrFail($id);
        
        // Delete company logo if exists
        if ($report->company_logo && Storage::exists('public/' . $report->company_logo)) {
            Storage::delete('public/' . $report->company_logo);
        }

        $report->delete();

        return redirect()->route('research-reports.index')
            ->with('success', 'Research report deleted successfully.');
    }
}
