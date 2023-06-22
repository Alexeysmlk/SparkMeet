<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationPromtController extends Controller
{
    public function __invoke(Request $request){
        if (Auth::user()->hasVerifiedEmail()){
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        return view('auth.verify-email');
    }
}
