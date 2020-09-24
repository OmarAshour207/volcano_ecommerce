<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function showPage()
    {
        return view('dashboard.analytics.analytics');
    }

    public function store(Request $request)
    {
        setting($request->except('_token'))->save();
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->back();
    }
}
