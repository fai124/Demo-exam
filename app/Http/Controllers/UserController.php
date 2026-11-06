<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerForm(){
        return view("register");
    }
    public function register(UserRegisterRequest $request){
        $user = new User();
        $user -> name = $request->login;
        $user -> login = $request->login;
        $user -> password = Hash::make($request->password);
        $user -> FIO = $request->FIO;
        $user -> number = $request->number;
        $user -> email = $request->email;
        $user -> role = 'user';
        $user->save();
        Auth::login($user);
        return redirect()->route("dashboard");
    }
    public function loginForm(){
        return view("login");
    }
    public function login(UserLoginRequest $request){
        $user = User::where("login", $request->login)->first();
        if($user && Hash::check($request->password, $user->password)){
            Auth::login($user);
            return redirect()->route("dashboard");
        }
        return back()->withErrors(["login" => "Неверный логин или пароль"])->withInput();
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route("login");
    }
}
