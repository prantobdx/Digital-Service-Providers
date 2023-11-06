<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\ServicesPost;
Use App\Models\ServiceProviders;
use function Termwind\breakLine;


class OrganizationController extends Controller
{
    public function organizationList($id=null)
    {
        $org_type = Category::where(['id'=>$id])->pluck('name')[0];
    	$servicesList = ServicesPost::where(['category_id'=>$id])->orderBy('id', 'desc')->paginate(2);
    return view('organization')->with(compact('org_type','servicesList'));
    }

    public function showServiceDetails($id)
    {
        $service = ServicesPost::find($id);
    return view('Service_details')->with(compact('service'));
    }
}
