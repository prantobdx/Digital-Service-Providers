<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\ServiceProviders;
use Auth;
use DB;


class SP_ResetPasswordController extends Controller
{

    public function SPshowResetForm(Request $request, $token = null)
    {  
       return view('auth.SP-PasswordReset')->with(
            ['token' => $token, 'email' => $request->email]);
    }


    public function ResetPassword(Request $request)
    {  
        
    if ($request->isMethod('post'))
     {
        $request->validate([
      'email' => 'required|email|exists:users',
      'password' => 'required|string|min:6|confirmed',
      'password_confirmation' => 'required',
       ]);

   $updatePassword = DB::table('password_resets')
                      ->where(['email' => $request->email, 'token' => $request->token])
                      ->first();

   if(!$updatePassword)
    {
      return back()->withInput()->with('error', 'Invalid token!');
    }

    $user = ServiceProviders::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

    DB::table('password_resets')->where(['email'=> $request->email])->delete();

    return redirect('ServiceProvider/')->with('message', 'Your password has been changed!');
     }
  }

}
