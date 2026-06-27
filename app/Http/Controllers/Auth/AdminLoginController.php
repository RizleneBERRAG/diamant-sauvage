<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect()->route('admin.index');
        }

        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'Veuillez indiquer votre adresse email.',
            'email.email' => 'Veuillez indiquer une adresse email valide.',
            'password.required' => 'Veuillez indiquer votre mot de passe.',
        ]);

        $this->ensureIsNotRateLimited($request);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey($request), 60);

            throw ValidationException::withMessages([
                'email' => 'Les identifiants indiqués ne correspondent à aucun compte administrateur.',
            ]);
        }

        RateLimiter::clear($this->throttleKey($request));

        $request->session()->regenerate();

        return redirect()->intended(route('admin.index'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Vous êtes bien déconnectée.');
    }

    private function ensureIsNotRateLimited(Request $request): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        throw ValidationException::withMessages([
            'email' => "Trop de tentatives. Réessayez dans {$seconds} seconde(s).",
        ]);
    }

    private function throttleKey(Request $request): string
    {
        return Str::transliterate(Str::lower($request->input('email', '')).'|'.$request->ip());
    }
}
