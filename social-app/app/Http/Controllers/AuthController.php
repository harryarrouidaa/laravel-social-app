<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // auth views
    public function loginView()
    {
        return view("auth.login");
    }
    public function registerView()
    {
        return view("auth.register");
    }

    // auth actions
    public function login(Request $request)
    {
        $credentials = $request->only("email", "password");
        if (auth()->attempt($credentials)) {
            return redirect()->route('posts.view');
        } else {
            return redirect()->back();
        }
    }
    public function register(Request $request)
    {
        $user = User::create(['username' => $request->username, 'email' => $request->email, 'password' => $request->password]);
        if ($user) {
            auth()->login($user);
            return redirect()->route('profile.upload');
        }
    }
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('login.view');
    }

}
