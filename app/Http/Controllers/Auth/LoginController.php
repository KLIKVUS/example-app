<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('pages.login.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($validated)) {
            $candidate = User::query()->where('login', '=', $validated['login'])->first();

            if (isset($candidate)) {
                throw ValidationException::withMessages([
                    'password' => 'Неверный пароль.'
                ]);
            }

            throw ValidationException::withMessages([
                'login' => 'Пользователь с таким login-ом не найден.'
            ]);
        }

        return redirect()->route('home.index');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('home.index');
    }
}
