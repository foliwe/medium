<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class SessionUserController extends Controller
{
    public function login(){

        return view('auth.login');
    }


    public function store(){

        $attributes = request()->validate([

        'email' => ['required', 'email'],
        'password' => ['required']
        ]);

        if ( Auth::attempt($attributes)){
        request()->session()->regenerate();
        return redirect()->intended('blogs');
        };

        return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }




    public function destroy(Request $request): RedirectResponse
    {

        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('blogs.index');
    }

    public function passwordForm() {
    return view('auth.forgot-password');
    }




}