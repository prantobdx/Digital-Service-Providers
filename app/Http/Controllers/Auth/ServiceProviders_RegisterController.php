<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ServiceProviders;
use Illuminate\Support\Facades\Hash;

class ServiceProviders_RegisterController extends Controller
{
   public function __construct()
    {
        $this->middleware('guest:Service');
    }

    public function showRegisterForm()
    {
        return view('auth.ServiceProviders_Registration');
    }

    public function Register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:service_providers'],
            'org_type' => ['required'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $request['password'] = Hash::make($request->password);
        $request['org_type_id'] = $request->org_type;
        ServiceProviders::create($request->all());

        return redirect (route('ServiceProviders.login'));
     }
}
