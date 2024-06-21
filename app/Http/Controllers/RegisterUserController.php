<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function register(){

        return view('auth.register');

    }


    public function store(Request $request){

         $attributes = request()->validate([
            'name' => ['required','min:5', 'max:255'],
            'email' => ['required','email','unique:users'],
            'password' => ['required', 'min:6', 'confirmed',Password::defaults()]
        ]);

        $user = User::create($attributes);


        Auth::login($user);
        event(new Registered($user));

        return to_route('blogs.index');

    }

    
}