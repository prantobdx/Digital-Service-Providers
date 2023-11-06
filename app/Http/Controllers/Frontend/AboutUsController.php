<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;
use Validator;
Use App\Models\User;
Use App\Models\Contact;


class AboutUsController extends Controller
{
    public function Aboutus()
    {
       return view('about_us');
    }

    public function ContactFormSubmit(Request $request)
    {
    	if (!isset(Auth::user()->id))
          {
            return redirect(route('login'))->with('login_check_error','Please login first...!');
          }

        if ($request->isMethod('post'))
         {
            $this->validate($request,[
                'name' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ]);

            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->posted_by_id = Auth::user()->id;

            $contact->save();
            return redirect()->back()->with('message_flash_success','Your Message is successfully send');
         }

    }
}
