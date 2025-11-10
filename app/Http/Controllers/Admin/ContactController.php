<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
            $contacts = Contact::latest()->paginate(10)->through(function ($contact) {
            return [
                'id' => $contact->id,
                'name' => $contact->name,
                'email' => $contact->email,
                'message' => $contact->message,
            ];
        });
        return Inertia::render('Admin/Contact/Index',[
            'contacts' => $contacts
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        Contact::create($data);

        return back()->with('succes','Pesan berhasil di kirim');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('succes','Pesan berhasil di hapus');
    }
}
