<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('dashboard.contacts.index', compact('contacts'));
    }

    public function edit(Contact $contact)
    {
        return view('dashboard.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'name'      => 'required|string',
            'phone'     => 'sometimes|nullable|numeric',
            'email'     => 'required|email',
            'message'   => 'required|string|min:10'
        ]);
        $contact->update($data);
        session()->flash('success', trans('admin.updated_successfully'));
        return redirect()->route('contacts.index');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('contacts.index');
    }
}
