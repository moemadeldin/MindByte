<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\DTOs\Auth\LoginDTO;
use App\DTOs\Auth\RegisterDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\StoreUserRequest;
use App\Interfaces\AuthServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Throwable;

final class AuthController extends Controller
{
    public function __construct(private readonly AuthServiceInterface $authService) {}

    public function registerForm(): View
    {
        return view('pages.auth.register');
    }

    public function register(StoreUserRequest $request): RedirectResponse
    {
        $user = $this->authService->register(RegisterDTO::fromArray($request->validated()));

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'registered, logged in successfully');
    }

    public function loginForm(): View
    {
        return view('pages.auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        try {
            $user = $this->authService->login(LoginDTO::fromArray($request->validated()));
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->route('home')->with('success', 'logged in successfully');

        } catch (Throwable $e) {
            report($e);

            return back()
                ->withInput($request->only('email'))
                ->with('error', 'Invalid credentials');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'logged out successfully');
    }
}
