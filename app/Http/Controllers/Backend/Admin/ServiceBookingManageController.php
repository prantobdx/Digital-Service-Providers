<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceBooking;
use Illuminate\Http\Request;

class ServiceBookingManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('all-auth:admin');
    }
    public function showUnapprovedBookingList($id=null)
    {
        $bookings = ServiceBooking::get();
        if (!empty($id)) {
            $book = ServiceBooking::find($id);
            $book->status = 1;
            $book->save();
            return redirect()->back()->with('booking_flash_success','Successfully approved',compact('bookings'));
        }
        return view('Admin.ServiceBookingList')->with(compact('bookings'));
    }
    public function ChangeUnapprovedBookingList($id=null)
    {
        $bookings = ServiceBooking::get();
        if (!empty($id)) {
            $book = ServiceBooking::find($id);
            $book->status = 0;
            $book->save();
            return redirect()->back()->with('booking_flash_unapproved','Successfully Unapproved',compact('bookings'));
        }
        return view('Admin.ServiceBookingList')->with(compact('bookings'));
    }


    public function deleteBooking($id=null)
    {
        if (!empty($id))
        {
            ServiceBooking::find($id)->delete();
            return redirect()->back()->with('booking_flash_delete',' Service request successfully deleted');
        }

    }
}
