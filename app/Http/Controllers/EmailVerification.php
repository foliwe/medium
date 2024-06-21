<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerification extends Controller
{
    public function verifyNotice()
    {
        return view('auth.verify-email');

    }


    public function VerifyEmail(EmailVerificationRequest $request) {
        $request->fulfill();
        return to_route('blogs.index');
    }


    public function VerifyHandler(Request $request)
     {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}