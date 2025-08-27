<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $reports = \App\Models\ResearchReport::where('status', 1)->get();
            return view('user_dashboard', compact('user', 'reports'));
        } else {
            // Get subscription plans for expired users
            $subscriptions = \App\Models\Subscription::where('status', 'Active')->get();
            return view('user_subscriptions', compact('user', 'subscriptions'));
        }
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
