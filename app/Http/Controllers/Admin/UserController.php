<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'subscription_type' => 'required|string',
            'join_date' => 'required|date',
            'renewal_date' => 'required|date|after_or_equal:join_date',
            'status' => 'required|boolean',
        ]);
        $data = $request->only('name', 'email', 'subscription_type', 'join_date', 'renewal_date', 'status');
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'subscription_type' => 'required|string',
            'join_date' => 'required|date',
            'renewal_date' => 'required|date|after_or_equal:join_date',
            'status' => 'required|boolean',
        ]);
        $data = $request->only('name', 'email', 'subscription_type', 'join_date', 'renewal_date', 'status');
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
