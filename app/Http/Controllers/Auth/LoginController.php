<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show admin login form
     */
    public function showAdminLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('backend.pages.auth.admin-panel');
    }

    /**
     * Handle admin login submission
     */
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
    }

    /**
     * Handle admin logout - ✅ FIXED: Redirect to admin-panel, NOT login
     */
    public function adminLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // ✅ Redirect to admin-panel (not frontend 'login')
        return redirect()->route('admin-panel')
            ->with('success', 'You have been logged out.');
    }
}
