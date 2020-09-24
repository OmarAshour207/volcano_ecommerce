<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function showSeoPage()
    {
        return view('dashboard.seo.seo');
    }

    public function store(Request $request)
    {
        Setting::set([
            'website_title'    => $request->title,
            'keywords'         => $request->meta_keywords,
            'author'           => $request->meta_author,
            'description'      => $request->meta_description,
        ]);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->back();
    }
}
