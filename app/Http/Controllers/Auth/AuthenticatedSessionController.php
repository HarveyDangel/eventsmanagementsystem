<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return $this->redirectBasedOnRole();
    }

    protected function redirectBasedOnRole(): RedirectResponse
    {
        $user = Auth::user();

        // Redirect based on the role
        if ($user->is_admin === '0') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->is_admin === '1') {
            return redirect()->route('dashboard');
        }
         //  Default fallback if the role does not match
        // return redirect()->route('dashboard');
        abort(403, 'Unauthorized Access');
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
