<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\ServiceProviders;


class ServiceProviders_LoginController extends Controller
{
     public function __construct()
     {
        $this->middleware('guest:Service', ['except'=>['logout']]);

     }

    public function showLogin()
    {
        return view('auth.ServiceProviders_Login',['url' => 'ServiceProvider']);
    }


    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('Service')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
       $request->session()->flash('flash_message_success','Welcome! You are Sucessfully login');
            return redirect (route('ServicePro.dashboard'));
        }


        $request->session()->flash('flash_message_error','Email or Password is incoorect');

        return redirect()->back()->withInput($request->only('email','remember'));

    }


    public function logout(Request $request)
    {
        Auth::guard('Service')->logout();

        return redirect('/ServiceProvider/')->with('flash_message_success','Logged out successfully');
    }

    protected function guard()
  {
    return Auth::guard('Service');
  }

}
