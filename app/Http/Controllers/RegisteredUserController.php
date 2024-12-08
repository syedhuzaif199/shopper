<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $userAttributes = $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'unique:users,username', 'max:255'],
            'password' => ['required', 'confirmed', Password::min(8)]
        ]);

        $user = User::create($userAttributes);

        Auth::login($user);

        return redirect('/');
    }
}
