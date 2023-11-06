<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Admin;

class AdminLoginController extends Controller
{
   public function __construct(){
        $this->middleware('guest:admin', ['except'=>['logout']]);
    }

    public function showLoginForm(){
        return view('auth.Admin_Login');
    }


    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password], $request->remember))
        {

            return redirect()->intended(route('admin.dashboard'));
        }

        $request->session()->flash('flash_message_for_error','Email or Password is incoorect');
        return redirect()->back()->withInput($request->only('email','remember'));
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect('/admin/')->with('flash_message_success','Logged out successfully');
    }
}
