<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use Auth;
use App\Models\Category;
use App\Models\ServiceBooking;
use App\Models\ServicesPost;
use App\Models\User;


class ServiceStatusController extends Controller
{

     public function showServicesStatus()
      {
      	if (!isset(Auth::user()->id))
          {
            return redirect(route('login'))->with('login_check_error','Please login first...!');
            return redirect()->back();
          }

        $posted_by_id = Auth::user()->id;
        $S_status = ServiceBooking::where(['booking_posted_id'=>$posted_by_id])->orderBy('id', 'desc')->get();
        return view('service_status')->with(compact('S_status'));
      }
}
