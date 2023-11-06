<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceProviders;
use App\Models\Category;


class DashbordController extends Controller
{
    public function __construct()
    {
        $this->middleware('all-auth:admin');
    }

    public function index()
    {
    	$SP_users = ServiceProviders::orderBy('id', 'desc')->paginate(5);
        return view('Admin.dashboard')->with(compact('SP_users'));
    }

}
