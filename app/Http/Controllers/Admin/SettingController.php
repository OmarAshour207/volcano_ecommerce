<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $websiteSettings = WebsiteSetting::first();
        return view('dashboard.settings.index', compact('websiteSettings'));
    }

    public function create()
    {
        return view('dashboard.settings.create');
    }

    public function store(Request $request, WebsiteSetting $websiteSetting)
    {
        if ($request->filter_page != null) {
            $pageFilter = serialize($request->filter_page);
            $websiteSetting->page_filter = $pageFilter;
        }
        $websiteSetting->save();

        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('website-settings.index');
    }

    public function edit()
    {
        $websiteSettings = WebsiteSetting::first();
        $page_filter = '';
        if ($websiteSettings->page_filter != null) {
            $page_filter = unserialize($websiteSettings->page_filter);
        }
        return view('dashboard.settings.edit', compact('page_filter', 'websiteSettings'));
    }

    public function update(Request $request, WebsiteSetting $websiteSetting)
    {
        if ($request->filter_page != null) {
            $pageFilter = serialize($request->filter_page);
            $websiteSetting->page_filter = $pageFilter;
        }
        $websiteSetting->color = $request->color;
        $websiteSetting->update();
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('website-settings.index');
    }

}
