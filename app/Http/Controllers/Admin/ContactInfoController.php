<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function contactInfo()
    {
       return view('dashboard.contactinfo.contactinfo');
    }

    public function store(Request $request)
    {
        setting($request->except('_token', 'add'))->save();
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->back();
    }
}
