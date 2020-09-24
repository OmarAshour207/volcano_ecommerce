<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactNotification;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('site.contact');
    }

    public function sendContact(Request $request)
    {
        $data = $request->validate([
            'name'      => 'sometimes|nullable|string',
            'phone'     => 'sometimes|nullable|numeric',
            'email'     => 'required|email',
            'message'   => 'required|string|min:10'
        ]);

        Contact::create($data);
        ContactNotification::create([
            'name'  => $data['name'],
            'content'=> ' ' . __('admin.sent_message'),
            'status'=> 0
        ]);
        session()->flash('success', trans('home.sent_successfully'));
        return redirect()->back();
    }
}
