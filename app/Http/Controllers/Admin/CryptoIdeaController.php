<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CryptoIdea;

class CryptoIdeaController extends Controller
{
    public function index()
    {
        $ideas = CryptoIdea::orderBy('created_at', 'desc')->get();
        return view('admin.crypto_ideas.index', compact('ideas'));
    }

    public function create()
    {
        return view('admin.crypto_ideas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'current_price' => 'required|numeric',
            'risk_level' => 'required|in:low,moderate,high,extreme',
            'description' => 'nullable|string',
        ]);
        CryptoIdea::create($request->only('name', 'current_price', 'risk_level', 'description'));
        return redirect()->route('crypto-ideas.index')->with('success', 'Crypto idea created successfully.');
    }

    public function edit($id)
    {
        $idea = CryptoIdea::findOrFail($id);
        return view('admin.crypto_ideas.edit', compact('idea'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'current_price' => 'required|numeric',
            'risk_level' => 'required|in:low,moderate,high,extreme',
            'description' => 'nullable|string',
        ]);
        $idea = CryptoIdea::findOrFail($id);
        $idea->update($request->only('name', 'current_price', 'risk_level', 'description'));
        return redirect()->route('crypto-ideas.index')->with('success', 'Crypto idea updated successfully.');
    }

    public function destroy($id)
    {
        $idea = CryptoIdea::findOrFail($id);
        $idea->delete();
        return redirect()->route('crypto-ideas.index')->with('success', 'Crypto idea deleted successfully.');
    }
}
