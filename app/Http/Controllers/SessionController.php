<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Email or Password do not match',
            ]);
        }

        request()->session()->regenerate();

        return redirect(
            route('listings.index'),
        );
    }

    public function destroy(): RedirectResponse
    {
        Auth::logout();

        return redirect(
            route('listings.index'),
        );
    }
}
