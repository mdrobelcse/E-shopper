<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {

        $contacts = Contact::latest()->get();
        return view('admin.contact.index',compact('contacts'));
    }

    public function view($id)
    {

        $contact = Contact::findOrfail($id);
        return view('admin.contact.view',compact('contact'));

    }


    public function destroy($id)
    {

           $contact = Contact::findOrfail($id);
           $contact->delete();
           Toastr::success('Contact deleted successfully :)','Success');
           return redirect()->back();


    }



}//end class
