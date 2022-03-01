<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        # code...
        $contacts = Contact::latest()->get();

        return view('control-panel.contacts.index',[
            'contacts' => $contacts,
        ]);
    }

    public function show(Contact $contact)
    {
        # code...
        return view('control-panel.contacts.edit',[
            'contact' => $contact,
        ]);
    }

    public function destroy(Contact $contact)
    {
        # code...
        $contact->delete();
        return redirect()->route('contacts.index')->with('success','Message Deleted Successfully!');
    }
}
