<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerForm()
    {
        return view('register');
    }

    public function register(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->login;
        $user->login = $request->login;
        $user->password = Hash::make($request->password);
        $user->FIO = $request->FIO;
        $user->number = $request->number;
        $user->email = $request->email;
        $user->save();

        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'Пользователь создан');
    }

    public function loginForm()
    {
        return view('login');
    }

    public function login(UpdateUserRequest $request)
    {
        $user = User::where('login', $request->login)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Добро пожаловать');
        }

        return back()->withErrors(['login' => 'Неверный логин или пароль'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Вы вышли из системы');
    }
}
