<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class   FacebookController extends Controller
{
    public function showPage()
    {
        return view('dashboard.facebook.facebook');
    }

    public function store(Request $request)
    {
        setting($request->except('_token'))->save();
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->back();
    }
}
