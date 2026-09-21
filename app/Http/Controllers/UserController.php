<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register(UserRegisterRequest $request)
    {
        $user = new User();
        $user->FIO = $request->FIO;
        $user->number = $request->number;
        $user->email = $request->email;
        $user->login = $request->login;
        $user->password = $request->password;
        $user->save();
        return response()->json(["token" => $user->createToken("api")->plainTextToken], 201);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(UserLoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
       if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return response()->json(['message' => 'ok', "token" => $user->createToken('api')->plainTextToken], 200);
            }
        }
        return response()->json(['message' => 'пользователь не найден', 'errors' => ["password" => ['пользователь не найден']]], 404);
    }

      public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(["mesage" => "ok"], 200);
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
