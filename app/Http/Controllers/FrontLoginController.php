<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class FrontLoginController extends Controller
{
    // Show the user login form (GET /user-login)
    public function showLoginForm()
    {
        return view('frontend_login');
    }

    // Handle user login (POST /user-login)
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('user.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    // Show user dashboard
    public function dashboard()
    {
        $user = Auth::user();
        $today = now();
        
        // Check if renewal date is upcoming (not expired)
        $isActive = $user->renewal_date && $user->renewal_date >= $today;
        
        if ($isActive) {
            // Get research reports for active users
            $reports = \App\Models\ResearchReport::where('status', 1)->orderBy('created_at', 'desc')->get();
            return view('user_dashboard', compact('user', 'reports'));
        } else {
            // Get subscription plans for expired users
            $subscriptions = \App\Models\Subscription::where('status', 'Active')->get();
            return view('user_subscriptions', compact('user', 'subscriptions'));
        }
    }

    // Show research reports listing for authenticated user
    public function researchReports()
    {
        $user = Auth::user();
        $today = now();
        $isActive = $user->renewal_date && $user->renewal_date >= $today;

        // Prepare categories and reports grouped by category
        $categories = \App\Models\Category::all();
        $reportsByCategory = [];

        foreach ($categories as $category) {
            $allReports = \App\Models\ResearchReport::where('category', $category->id)
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->get();

            if ($isActive) {
                // For subscribed users show latest 6 full items and keep headings for the rest
                $reportsByCategory[$category->id] = [
                    'visible' => $allReports->take(6),
                    'headings' => $allReports->slice(6)->pluck('name'),
                ];
            } else {
                // For non-subscribed users return empty visible list (or maybe only headings)
                $reportsByCategory[$category->id] = [
                    'visible' => collect([]),
                    'headings' => collect([]),
                ];
            }
        }

        return view('user_research_reports', compact('user', 'isActive', 'categories', 'reportsByCategory'));
    }

    // Show user profile
    public function profile()
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }
        $user = Auth::user();
        return view('user_profile', compact('user'));
    }

    // Show edit form for profile
    public function editProfile()
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }
        $user = Auth::user();
        return view('user_profile_edit', compact('user'));
    }

    // Update logged in user's profile
    public function updateProfile(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }

        $user = Auth::user();

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'remove_avatar' => ['nullable'],
        ];

        $data = $request->validate($rules);

        // Handle avatar upload or removal
        if ($request->hasFile('avatar')) {
            // delete old avatar if exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        } elseif ($request->filled('remove_avatar')) {
            // Remove avatar request (no upload)
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = null;
        }

        // Handle password change if provided
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        // Update user
        $user->update($data);

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }

    // Handle user logout (POST /user-logout)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
