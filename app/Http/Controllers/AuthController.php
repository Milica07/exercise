<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'logout']);
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
    $data = $request->validated();
    $data['password'] = Hash::make($data['password']);
    $newUser = User::create($data);

    Auth::login($newUser);
    return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return back();
    }

    public function getLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return view('auth.login', ['invalid_credentials' => true]);
    }


}
