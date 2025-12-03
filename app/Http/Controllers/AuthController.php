<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegister()
    {
        //route --> /register
        return view('auth.register');
    }

    public function showLogin()
    {
        //route --> /login
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        $user = User::create($validated);

        Auth::login($user);
        return redirect()->route('Files.index')->with('success', 'Registration successful.');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if ( Auth::attempt($validated) ){
            $request->session()->regenerate();
            return redirect()->route('Files.index')->with('success', 'Login successful.');
        }

        else{
            throw ValidationException::withMessages([
                'email' => 'Incorrect email or password'
            ]);

        }
    }
    
    public function logout(Request $request)
    {
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect()->route('show.login')->with('success', 'Logged out successfully.');
    }
}