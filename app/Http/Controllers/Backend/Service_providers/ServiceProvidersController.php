<?php

namespace App\Http\Controllers\Backend\Service_providers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\ServiceProviders;
use App\Models\ServicesPost;
use App\Models\ServiceBooking;


class ServiceProvidersController extends Controller
{

	public function __construct()
    {
        $this->middleware('all-auth:Service');
    }

    public function index()
    {

       $bookings = DB::table('services_posts')
              ->join('service_bookings', 'services_posts.id', '=', 'service_bookings.service_post_id')
                ->where(['services_posts.posted_by_id'=>Auth::user()->id])
                ->where(['service_bookings.status'=>1])
                ->orderBy('service_bookings.id', 'DESC')
                ->paginate(3);
        return view('service-providers.dashboard')->with(compact('bookings'));
    }
}
