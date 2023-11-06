<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class SP_ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
    return view('auth.SP-ForgotPassword')->with('user_type', request()->user_type);
    }

    public function __construct()
    {
        $this->middleware('guest:Service');
    }
    public function broker()
    {
       return Password::broker('service_providers');
    }


}
