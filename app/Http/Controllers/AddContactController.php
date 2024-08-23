<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AddContactController extends Controller
{
    public function addContact(Request $request){
        $name=request()->user_name;
        $phone=request()->contact_no;

        $contact=new Contact();
        $contact->name=$name;
        $contact->phone_no=$phone;
        $contact->save();

        return redirect()->back();
    }

    public function getContact(){
        $contacts=Contact::select('id','name','phone_no')->get();
        return view('all-contact',compact('contacts'));
    }

    public function deleteContact(){
        $contactID=request()->id;
        $contact=Contact::find($contactID);
        if($contact!==NULL){
            $contact->delete();
        }

        return redirect()->back();
    }
}