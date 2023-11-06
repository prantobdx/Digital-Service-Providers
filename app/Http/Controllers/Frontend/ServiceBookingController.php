<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\ServiceProviders;
use App\Models\ServiceBooking;
use validator;
use App\Models\User;


class ServiceBookingController extends Controller
{

    public function serviceBooking(Request $request)
      {

         if (!isset(Auth::user()->id))
          {
            return redirect(route('login'))->with('login_check_error','Please login first...!');
            return redirect()->back();
          }

        if ($request->isMethod('post')) {
            $this->validate($request,[
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'date' => 'required',
                'time' => 'required',
            ]);

//            $have_booking = ServiceBooking::where(['service_post_id'=>$request->servicePost_id])->where(['booking_date'=>$request->date])->where(['booking_time'=>$request->time])->where(['status'=>1])->count();
//            if ($have_booking>0)
//            {
//                return redirect()->back()->with('booking_flash_danger','This service already booked at this time....');
//            }

            $booking = new  ServiceBooking;
            $booking->booked_by_name = $request->name;
            $booking->email = $request->email;
            $booking->phone = $request->phone;
            $booking->address = $request->address;
            $booking->booking_date = $request->date;
            $booking->booking_time = $request->time;
            $booking->No_of_service = $request->No_of_service;
            $booking->note = $request->note;
            $booking->service_post_id = $request->servicePost_id;
            $booking->booking_posted_id = Auth::user()->id;

            $booking->save();
            return redirect()->back()->with('booking_flash_success','Your booking will be confirmed after phone call...');
        }

    }
}
