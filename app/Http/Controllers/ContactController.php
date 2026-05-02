<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // ✅ FRONTEND: FORM SUBMIT
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required'
        ]);

        // 🔥 SAVE TO DATABASE
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return back()->with('success', '✅ Message sent successfully!');
    }

    // ✅ ADMIN: LIST + SEARCH
    public function index(Request $request)
    {
        $search = $request->search;

        $contacts = Contact::when($search, function ($query, $search) {
            $query->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('message', 'like', "%$search%");
        })->latest()->get();

        return view('admin.contact', compact('contacts', 'search'));
    }

    // ✏️ EDIT PAGE
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact_edit', compact('contact'));
    }

    // 🔄 UPDATE
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('admin.contact')->with('success', 'Message Updated!');
    }

    // ❌ DELETE
    public function delete($id)
    {
        Contact::findOrFail($id)->delete();
        return back()->with('success', 'Message Deleted!');
    }
}