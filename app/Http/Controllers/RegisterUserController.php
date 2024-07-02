<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Throwable;

class RegisterUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        try {
            $user = User::create($request->validated());
            Auth::login($user);
        } catch (Throwable) {
        } finally {
            return redirect(
                route('listings.index'),
            );
        }
    }
}
