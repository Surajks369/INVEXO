<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResearchReport;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResearchReportController extends Controller
{
    public function index()
    {
        $reports = ResearchReport::with('categoryRelation')->get();
        return view('admin.research_reports.index', compact('reports'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.research_reports.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'report' => 'required|mimes:pdf|max:10240', // max 10MB
            'status' => 'required|in:0,1',
        ]);

        if ($request->hasFile('report')) {
            $pdfName = time() . '.' . $request->report->extension();
            $request->report->storeAs('public/reports', $pdfName);

            ResearchReport::create([
                'name' => $request->name,
                'category' => $request->category,
                'report' => 'reports/' . $pdfName,
                'status' => $request->status,
            ]);

            return redirect()->route('research-reports.index')
                ->with('success', 'Research report created successfully.');
        }

        return back()->with('error', 'Please upload a PDF file.');
    }

    public function edit($id)
    {
        $report = ResearchReport::findOrFail($id);
        $categories = Category::all();
        return view('admin.research_reports.edit', compact('report', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'report' => 'nullable|mimes:pdf|max:10240', // max 10MB
            'status' => 'required|in:0,1',
        ]);

        $report = ResearchReport::findOrFail($id);
        $data = [
            'name' => $request->name,
            'category' => $request->category,
            'status' => $request->status,
        ];

        if ($request->hasFile('report')) {
            // Delete old file if exists
            if ($report->report && Storage::exists('public/' . $report->report)) {
                Storage::delete('public/' . $report->report);
            }

            // Store new file
            $pdfName = time() . '.' . $request->report->extension();
            $request->report->storeAs('public/reports', $pdfName);
            $data['report'] = 'reports/' . $pdfName;
        }

        $report->update($data);

        return redirect()->route('research-reports.index')
            ->with('success', 'Research report updated successfully.');
    }

    public function destroy($id)
    {
        $report = ResearchReport::findOrFail($id);
        
        // Delete PDF file if exists
        if ($report->report && Storage::exists('public/' . $report->report)) {
            Storage::delete('public/' . $report->report);
        }

        $report->delete();

        return redirect()->route('research-reports.index')
            ->with('success', 'Research report deleted successfully.');
    }
}
