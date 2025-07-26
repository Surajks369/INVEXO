<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        return view('admin.notifications.index', compact('notifications'));
    }

    public function create()
    {
        return view('admin.notifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'status' => 'required|boolean',
        ]);
        Notification::create($request->only('title', 'message', 'status'));
        return redirect()->route('notifications.index')->with('success', 'Notification created successfully.');
    }

    public function edit($id)
    {
        $notification = Notification::findOrFail($id);
        return view('admin.notifications.edit', compact('notification'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'status' => 'required|boolean',
        ]);
        $notification = Notification::findOrFail($id);
        $notification->update($request->only('title', 'message', 'status'));
        return redirect()->route('notifications.index')->with('success', 'Notification updated successfully.');
    }

    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        return redirect()->route('notifications.index')->with('success', 'Notification deleted successfully.');
    }
}
