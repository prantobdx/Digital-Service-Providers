<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
   public function index()
    {
        return view('index');
    }
   public function showServicesCategory()
    {
        return view('services_category');
    }

}
