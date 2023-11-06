<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Validator;
Use App\Models\Admin;
Use App\Models\Contact;
Use App\Models\User;

class MessageController extends Controller
{
      public function __construct()
    {
        $this->middleware('all-auth:admin');
    }

    public function showMessageList()
    {

        $messages = Contact::get();
        return view('Admin.user_message_List')->with(compact('messages'));
    }


    public function deleteMessage($id=null)
    {
        if (!empty($id))
        {
            Contact::find($id)->delete();
            return redirect()->back()->with ('delete_message_flash_success',
            	'Message successfully deleted');
        }

    }

}
