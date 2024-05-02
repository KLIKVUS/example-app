<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function create()
    {
        return view('pages.register.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $candidate = User::where('login', $validated['login'])->first();

        if ($candidate) {
            throw ValidationException::withMessages([
                'login' => 'Login уже занят.'
            ]);
        }

        $new_user = User::create([
            'login' => $validated['login'],
            'password' => $validated['password'],
        ]);

        Auth::login($new_user);

        return redirect()->route('home.index');
    }
}
