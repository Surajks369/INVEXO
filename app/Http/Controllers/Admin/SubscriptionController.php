<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::orderBy('created_at', 'desc')->get();
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    public function create()
    {
        return view('admin.subscriptions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'duration' => 'required|in:WEEKLY,MONTHLY,YEARLY',
            'status' => 'required|in:Active,Expired',
        ]);
        Subscription::create($request->only('name', 'price', 'duration', 'status'));
        return redirect()->route('subscriptions.index')->with('success', 'Subscription created successfully.');
    }

    public function edit($id)
    {
        $subscription = Subscription::findOrFail($id);
        return view('admin.subscriptions.edit', compact('subscription'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'duration' => 'required|in:WEEKLY,MONTHLY,YEARLY',
            'status' => 'required|in:Active,Expired',
        ]);
        $subscription = Subscription::findOrFail($id);
        $subscription->update($request->only('name', 'price', 'duration', 'status'));
        return redirect()->route('subscriptions.index')->with('success', 'Subscription updated successfully.');
    }

    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        return redirect()->route('subscriptions.index')->with('success', 'Subscription deleted successfully.');
    }
}
